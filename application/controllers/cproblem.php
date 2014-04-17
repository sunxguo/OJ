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
			$this->load->view(
								'err_redirect',
								array("error"=>"请先登录！","url"=>"/problem")
							);
		}
		echo $_POST['code'];
	}
}
?>