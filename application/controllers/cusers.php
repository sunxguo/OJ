<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Cusers extends CI_Controller {
	function __construct(){
		 parent::__construct();
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function login(){
		$this->load->view('header',array("title"=>"OJ用户登录"));
		$this->load->view('login');
		$this->load->view('footer');
	}
	public function register(){
		$this->load->view('header',array("title"=>"OJ用户注册"));
		$this->load->view('register');
		$this->load->view('footer');
	}
	public function subProblems()
	{
		$this->load->model("dbHandler");
		$problems=$this->dbHandler->selectAllData('problem');
		$this->load->view('admin/header',array("adminNaviPro"=>true));
		$this->load->view('admin/problems',array("problems"=>$problems));
		$this->load->view('admin/footer');
	}
	public function problemDetail()
	{
		$this->load->model("dbHandler");
		$problems=$this->dbHandler->selectAllData('problem');
		$this->load->view('admin/header',array("adminNaviPro"=>true));
		$this->load->view('admin/problems',array("problems"=>$problems));
		$this->load->view('admin/footer');
	}
	public function user_login()
	{
		$userName=$_POST['userName'];
		$pwd=$_POST['pwd'];
		$this->load->model("dbHandler");
		$info=$this->dbHandler->selectPartData('users','u_name',$userName);
		if(count($info)!=0&&isset($info['0']->u_pwd)){
			if($pwd==$info['0']->u_pwd){
				$_SESSION['username']=$userName;
				$_SESSION['email']=$info['0']->u_email;
				$_SESSION['userid']=$info['0']->u_ID;
				$_SESSION['type']="user";
				$this->load->view("redirect",array("url"=>'/problemList'));
			}else{
				$this->load->view("redirect",array("error"=>'密码错误！'));
			}
		}else{
			$this->load->view("redirect",array("error"=>'账号不存在！'));
		}
	}
	public function user_logout(){
		if($_SESSION['username']){
			session_unset(); 
			session_destroy(); 
			echo "success";
		}else echo "failed";
	}
	public function user_register()
	{
		$data['u_name']=$_POST['userName'];
		$data['u_pwd']=$_POST['pwd'];
		$data['u_email']=$_POST['email'];
		$data['u_regDate']=date('Y-m-d H:i:s',time());
		$this->load->model("dbHandler");
		$info=$this->dbHandler->selectPartData('users','u_name',$data['u_name']);
		if(count($info)<1){
			$result=$this->dbHandler->insertdata('users',$data);
			if($result==1)	$this->load->view("redirect",array("error"=>'注册成功，请登录！',"url"=>'/users/login'));
		}else{
			$this->load->view("redirect",array("error"=>'用户名已存在！'));
		}
	}
	public function getMyProblems(){
		return $info=$this->dbHandler->selectPartData('problem','m_name',$userName);
	}
	public function user_center_myCode(){
		$this->load->model("dbHandler");
		//获取提交代码总数
		$total=$this->dbHandler->amount_data('code','c_uID',$_SESSION['userid']);
		//计算总页数
		$total_page=ceil($total/MYCODE_PAGE_COUNT);
		//获取当前页数
		$current_page=isset($_GET['page'])?$_GET['page']:1;
		$limit=MYCODE_PAGE_COUNT;
		$offset=($current_page-1)*MYCODE_PAGE_COUNT;
		$code=$this->dbHandler->selectdata('code','c_uID',$_SESSION['userid'],$limit,$offset,'c_ID',"desc");
		//print_r($code);
		foreach($code as $key=>$value){
			$problem=$this->dbHandler->selectPartData('problem','p_ID',$value->c_pID);
			if(count($problem)>0)$value->problem=$problem[0];
			else {
				$value->problem = new stdClass();
				$value->problem->p_ID=0;
				$value->problem->p_Title="该题目不存在";
			}
			/*
				0 等待处理
				1 通过（Accepted,AC）
				2 答案错误(Wrong Answer,WA)
				3 超时(Time Limit Exceed,TLE)
				4 超过输出限制（Output Limit Exceed,OLE)
				5 超内存（Memory Limit Exceed,MLE）
				6 运行时错误（Runtime Error,RE）
				7 格式错误（Presentation Error,PE)
				8 无法编译（Compile Error,CE）
			*/
			switch($value->c_status){
				case 0:
					$value->status="等待处理";
				break;
				case 1:
					$value->status="通过";
				break;
				case 2:
					$value->status="答案错误";
				break;
				case 3:
					$value->status="超时";
				break;
				case 4:
					$value->status="超过输出限制";
				break;
				case 5:
					$value->status="超内存";
				break;
				case 6:
					$value->status="运行时错误";
				break;
				case 7:
					$value->status="格式错误";
				break;
				case 8:
					$value->status="无法编译";
				break;
				default:
					$value->status="未知状态";
				break;
			}
		}
		$this->load->view('header',array("title"=>"OJ-我的代码"));
		$this->load->view('codeList',
							array(
								"code"=>$code,
								"pre_link"=>$current_page<=1?"#":"/users/user_center_myCode?page=".($current_page-1),
								"next_link"=>$current_page>=$total_page?"#":"/users/user_center_myCode?page=".($current_page+1),
								"page"=>$current_page.'/'.$total_page.'页'
								));
		$this->load->view('footer');
	}
	public function user_center_perInfo(){
		
	}
}
?>