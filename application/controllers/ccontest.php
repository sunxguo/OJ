<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('safe_mode',0);
class Ccontest extends CI_Controller {
	function __construct(){
		 parent::__construct();
		 $this->load->helper("base");
	}
	public function getContest(){
		if(isset($_GET['title']) && $_GET['title']!=""){
			return $this->dbHandler->selectPartData('contests','cont_url',$_GET['title'])[0];
		}
		elseif(isset($_GET['id']) && is_numeric($_GET['id'])){
			$id=isset($_GET['id'])?$_GET['id']:1;
			return $this->dbHandler->selectPartData('contests','cont_ID',$id)[0];
		}else{
			return array();
		}
	}
	public function getProblems($gid){
		$grouppro=$this->dbHandler->selectPartData('grouppro','gp_gID',$gid);
		foreach($grouppro as $item){
			$item->problem=$this->dbHandler->selectPartData('problem','p_ID',$item->gp_pID)[0];
		}
		return $grouppro;
	}
	public function index()
	{
		$this->load->model("dbHandler");
		$contest=$this->getContest();
		if(count($contest)==1){
			$contest->status=contest_status($contest->cont_startTime,$contest->cont_endTime);
			$problems=$this->getProblems($contest->cont_ID);
			$this->load->view('header',array("title"=>"OJ-比赛-".$contest->cont_title));
			$this->load->view('contest',array("contest"=>$contest,"problems"=>$problems));
			$this->load->view('footer');
		}else{
			load404();
		}
	}
	public function join_contest(){
		if(!checkLogin()){
			$this->load->view('redirect',
							array("error"=>"请先登录！","url"=>"/users/login")
							);
			return;
		}
		$data['gu_gID']=$_POST['id'];
		$data['gu_exposition']=$_POST['exposition'];
		$data['gu_uID']=$_SESSION['userid'];
		$data['gu_creationDate']= date('Y-m-d h:i:s',time());
		$data['gu_verification']="doing";
		$this->load->model("dbHandler");
		$result=$this->dbHandler->insertdata('groupuser',$data);
		if($result==1){
			$this->load->view('redirect',
				array("error"=>"申请成功，请等待审核！","url"=>"/users/user_center_myContest"));
		}
		else $this->load->view('redirect',
				array("error"=>"申请失败！请稍后重试！"));
	}
}
?>
