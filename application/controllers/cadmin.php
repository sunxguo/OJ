<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cadmin extends CI_Controller {
	function __construct(){
		 parent::__construct();
		 session_start();
	}
	public function index()
	{
		$this->load->view('admin/login');
	}
	public function problems()
	{
		$this->load->model("dbHandler");
		$problems=$this->dbHandler->selectAllData('problem');
		$this->load->view('admin/header',array("adminNaviPro"=>true));
		$this->load->view('admin/problems',array("problems"=>$problems));
		$this->load->view('admin/footer');
	}
	public function add_problem()
	{
		$data['p_Title']=$_POST['title'];
		$data['p_Content']=$_POST['content'];
		$data['p_AuthorID']=0;
		date_default_timezone_set('PRC');
		$data['p_Date']= date('Y-m-d',time());
		$data['p_SubNum']=0;
		$data['p_DealNum']=0;
		$this->load->model("dbHandler");
		$result=$this->dbHandler->insertdata('problem',$data);
		if($result==1)echo "success";
		else echo "failed";
		
	}
	public function delete_problem()
	{
		$this->load->model("dbHandler");
		echo $result=$this->dbHandler->deletedata('problem','p_ID',$_POST['pro_id']);
		if($result==1)echo "success";
		else echo "failed";
		
	}
	public function login()
	{
		$userName=$_POST['userName'];
		$pwd=$_POST['pwd'];
		$this->load->model("dbHandler");
		$info=$this->dbHandler->selectPartData('managers','m_name',$userName);
		if(count($info)!=0&&isset($info['0']->m_pwd)){
			if($pwd==$info['0']->m_pwd){
				$_SESSION['username']=$userName;
				$_SESSION['email']=$info['0']->m_email;
				$_SESSION['userid']=$info['0']->m_ID;
				$this->load->view("redirect",array("error"=>'登录成功！',"url"=>'/admin/problems'));
			}else{
				$this->load->view("redirect",array("error"=>'密码错误！',"url"=>'/admin/index'));
			}
		}else{
			$this->load->view("redirect",array("error"=>'账号不存在！',"url"=>'/admin/index'));
		}
	}
}
?>