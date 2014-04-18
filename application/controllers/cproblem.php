<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cproblem extends CI_Controller {
	function __construct(){
		 parent::__construct();
		 $this->load->helper("base");
	}
	public function getProblem(){
		$pid=isset($_GET['pid'])?$_GET['pid']:'1';
		return $this->dbHandler->selectPartData('problem','p_ID',$pid);
	}
	public function index()
	{
		$this->load->model("dbHandler");
		$problem=$this->getProblem();
		$this->load->view('header',array("title"=>"OJ-题目-".$problem['0']->p_Title));
		$this->load->view('problem',array("problem"=>$problem['0']));
		$this->load->view('footer');
	}
	public function submit_code(){
		if(!checkLogin()){
			$this->load->view('redirect',
							array("error"=>"请先登录！","url"=>"/problemList")
							);
			return;
		}
		$data['c_pID']=$_POST['pro_id'];
		$data['c_code']=$_POST['code'];
		$data['c_uID']=$_SESSION['userid'];
		$data['c_creationDate']= date('Y-m-d h:i:s',time());
		$data['c_status']=0;
		$this->load->model("dbHandler");
		$result=$this->dbHandler->insertdata('code',$data);
		if($result==1){
			$this->load->view('redirect',
				array("error"=>"提交成功！","url"=>"/users/mycode"));
		}
		else $this->load->view('redirect',
				array("error"=>"提交失败！请重试！","url"=>"/problemList"));
	}
}
?>