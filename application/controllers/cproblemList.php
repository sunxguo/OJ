<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CproblemList extends CI_Controller {
	function __construct(){
		 parent::__construct();
	}
	public function getProblems(){
		return $this->dbHandler->selectAllData('problem');
	}
	public function index()
	{
		$this->load->model("dbHandler");
		$problems=$this->getProblems();
		$this->load->view('header',array("title"=>"OJ-题目列表"));
		$this->load->view('problemList',array("problems"=>$problems));
		$this->load->view('footer');
	}
}
?>