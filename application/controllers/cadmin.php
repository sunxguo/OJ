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
	public function _get_page_info($table){
		$this->load->model("dbHandler");
		//获取记录总数
		$total=$this->dbHandler->amount_data_no_condition($table);
		//计算总页数
		$total_page=ceil($total/ADMIN_PAGE_COUNT);
		//获取当前页数
		$current_page=isset($_GET['page'])?$_GET['page']:1;
		//要取的数量
		$limit=ADMIN_PAGE_COUNT;
		//跳过的数量
		$offset=($current_page-1)*ADMIN_PAGE_COUNT;
		$data=array(
			'total'=>$total,
			'total_page'=>$total_page,
			'current_page'=>$current_page,
			'limit'=>$limit,
			'offset'=>$offset,
		);
		return $data;
	}
	public function problems()
	{
		$page_info=$this->_get_page_info('problem');
		$current_page=$page_info['current_page'];
		$total_page=$page_info['total_page'];
		$problems=$this->dbHandler->selectdata_no_condition('problem',$page_info['limit'],$page_info['offset'],'p_ID',"asc");
		$this->load->view('admin/header',array("adminNaviPro"=>true));
		$this->load->view('admin/problems',
							array(  "problems"=>$problems,
									"pre_link"=>$current_page<=1?"#":"/admin/problems?page=".($current_page-1),
									"next_link"=>$current_page>=$total_page?"#":"/admin/problems?page=".($current_page+1),
									"page"=>$current_page.'/'.$total_page.'页'));
		$this->load->view('admin/footer');
	}
	public function codes()
	{
		$page_info=$this->_get_page_info('code');
		$current_page=$page_info['current_page'];
		$total_page=$page_info['total_page'];
		$codes=$this->dbHandler->selectdata_no_condition('code',$page_info['limit'],$page_info['offset'],'c_ID',"asc");
		$this->load->view('admin/header',array("adminNaviPro"=>true));
		$this->load->view('admin/codes',
							array(  "codes"=>$codes,
									"pre_link"=>$current_page<=1?"#":"/admin/codes?page=".($current_page-1),
									"next_link"=>$current_page>=$total_page?"#":"/admin/codes?page=".($current_page+1),
									"page"=>$current_page.'/'.$total_page.'页'));
		$this->load->view('admin/footer');
	}
	public function users()
	{
		$page_info=$this->_get_page_info('users');
		$current_page=$page_info['current_page'];
		$total_page=$page_info['total_page'];
		$users=$this->dbHandler->selectdata_no_condition('users',$page_info['limit'],$page_info['offset'],'u_ID',"asc");
		$this->load->view('admin/header',array("adminNaviUsers"=>true));
		$this->load->view('admin/users',
							array(  "users"=>$users,
									"pre_link"=>$current_page<=1?"#":"/admin/users?page=".($current_page-1),
									"next_link"=>$current_page>=$total_page?"#":"/admin/users?page=".($current_page+1),
									"page"=>$current_page.'/'.$total_page.'页'));
		$this->load->view('admin/footer');
	}
	public function contests()
	{
		$page_info=$this->_get_page_info('contests');
		$current_page=$page_info['current_page'];
		$total_page=$page_info['total_page'];
		$contests=$this->dbHandler->selectdata_no_condition('contests',$page_info['limit'],$page_info['offset'],'cont_ID',"asc");
		$this->load->view('admin/header',array("adminNaviContests"=>true));
		$this->load->view('admin/contests',
							array(  "contests"=>$contests,
									"pre_link"=>$current_page<=1?"#":"/admin/contests?page=".($current_page-1),
									"next_link"=>$current_page>=$total_page?"#":"/admin/contests?page=".($current_page+1),
									"page"=>$current_page.'/'.$total_page.'页'));
		$this->load->view('admin/footer');
	}
	public function addContest()
	{
		$this->load->view('admin/header',array("adminNaviAddNewCont"=>true));
		$this->load->view('admin/addCont');
		$this->load->view('admin/footer');
	}
	public function add_data()
	{
		$dbData=$this->_get_request_data($_POST['type'],'add');
		$dbInfo=$this->convertToDb($_POST['type']);
		$this->load->model("dbHandler");
		if($dbInfo['dbTable']=="contests" && !$this->check_unique($dbInfo['dbTable'],array('cont_url'=>$_POST['url']))){
			echo json_encode(array("result"=>"failed","message"=>"urlnotunique"));
			return false;
		}
		if($dbInfo['dbTable']=="grouppro" && !$this->check_unique($dbInfo['dbTable'],array('gp_pID'=>$_POST['pid'],'gp_gID'=>$_POST['gid']))){
			echo json_encode(array("result"=>"failed","message"=>"problemnotunique"));
			return false;
		}
		$result=$this->dbHandler->insertdata($dbInfo['dbTable'],$dbData);
		$data=$this->dbHandler->sel_data_by_mul_condition($dbInfo['dbTable'],$dbData)[0];
		if($result==1)echo json_encode(array("result"=>"success","message"=>$data));
		else echo  json_encode(array("result"=>"failed","message"=>"internal error"));
		
	}
	public function delete_data()
	{
		$dbInfo=$this->convertToDb($_POST['type']);
		$this->load->model("dbHandler");
		$result=$this->dbHandler->deletedata($dbInfo['dbTable'],$dbInfo['dbField'],$_POST['id']);
		if($result=="")echo "success";
		else echo "failed";
		
	}
	public function modify_data()
	{
		$dbData=$this->_get_request_data($_POST['type']);
		$dbInfo=$this->convertToDb($_POST['type']);
		$this->load->model("dbHandler");
		/*
		if($dbInfo['dbTable']=="contests" && !$this->check_unique($dbInfo['dbTable'],array('cont_url'=>$_POST['url']))){
			echo "urlnotunique";
			return false;
		}*/
		$result=$this->dbHandler->updatedata($dbInfo['dbTable'],$dbData,$dbInfo['dbField'],$_POST['id']);
		if($result==1)echo "success";
		else echo "failed";
		
	}
	public function get_detail(){
		$id=$_POST['id'];
		$type=$_POST['type'];
		$this->load->model("dbHandler");
		$db_info=$this->convertToDb($type);
		$data=$this->dbHandler->selectPartData($db_info['dbTable'],$db_info['dbField'],$id);
		if($db_info['dbTable']=="contests"){
			$data[0]->lang=$this->get_code_languages_data(unserialize($data[0]->cont_lang));
		}
		if(count($data)>0) echo json_encode($data[0]);
		else echo json_encode('failed');
	}
	public function get_grouppro(){
		$id=$_POST['id'];
		$data=$this->get_list('grouppro',"gp_gID",$id,$limit=0,$offset=0,'gp_ID',"desc");
		foreach($data as $item){
			$item->problem=$this->dbHandler->selectPartData('problem','p_ID',$item->gp_pID);
		}
		echo json_encode($data);
	}
	public function get_list($type,$col="",$value="",$limit=10,$offset=0,$ordercol="",$orderby="desc"){
		$this->load->model("dbHandler");
		$db_info=$this->convertToDb($type);
		if($col!="" && $value!="" && $ordercol!=""){
			if($limit==0) $data=$this->dbHandler->select_all_data_by_order($db_info['dbTable'],$col,$value,$ordercol,$orderby);
			else $data=$this->dbHandler->selectdata($db_info['dbTable'],$col,$value,$limit,$offset,$ordercol,$orderby);
		}else{
			$data=$this->dbHandler->selectPartData($db_info['dbTable'],$db_info['dbField'],$id);
		}
		if($db_info['dbTable']=="contests"){
			foreach($data as $key=>$item){
				$item->lang=$this->get_code_languages_data(unserialize($item->cont_lang));
			}
		}
		return $data;
	}
	public function get_code_languages_data($langIdArray){
		$langData=array();
		foreach($langIdArray as $id){
			$langData[$id]=$this->dbHandler->selectPartData('languages','l_ID',$id)[0];
		}
		return $langData;
	}
	public function check_unique($table,$condition){
		$info=$this->dbHandler->sel_data_by_mul_condition($table,$condition);
		return count($info)<1?true:false;
	}
	public function _get_request_data($type,$oper='modify'){
		$dbData=array();
		switch($type){
			case "problem":
				if($oper=='modify'){
					$dbData=array(
						'p_Title'=>$_POST['title'],
						'p_Content'=>$_POST['content']
					);
				}else{
					$dbData=array(
						'p_Title'=>$_POST['title'],
						'p_Content'=>$_POST['content'],
						'p_AuthorID'=>0,
						'p_Date'=> date('Y-m-d',time()),
						'p_SubNum'=>0,
						'p_DealNum'=>0
					);
				}
			break;
			case "user":
				$dbData=array(
					'u_name'=>$_POST['name']
				);
			break;
			case "contest":
				if($oper=='modify'){
					$dbData=array(
						'cont_title'=>$_POST['title'],
						'cont_content'=>$_POST['content'],
						'cont_startTime'=>$_POST['start_time'],
						'cont_endTime'=>$_POST['end_time'],
						'cont_url'=>$_POST['url'],
						'cont_lang'=>serialize($_POST['lang'])
					);
				}else{
					$dbData=array(
						'cont_title'=>$_POST['title'],
						'cont_content'=>$_POST['content'],
						'cont_AuthorID'=>$_SESSION['userid'],
						'cont_CreationTime'=>date('Y-m-d H:i:s',time()),
						'cont_SubNum'=>0,
						'cont_DealNum'=>0,
						'cont_startTime'=>$_POST['start_time'],
						'cont_endTime'=>$_POST['end_time'],
						'cont_url'=>$_POST['url'],
						'cont_lang'=>serialize($_POST['lang'])
					);
				}
			break;
			case "grouppro":
				if($oper=='modify'){
					$dbData=array(
						'p_Title'=>$_POST['title'],
						'p_Content'=>$_POST['content']
					);
				}else{
					$dbData=array(
						'gp_pNum'=>$_POST['num'],
						'gp_pID'=>$_POST['pid'],
						'gp_gID'=>$_POST['gid']
					);
				}
			break;
			default:
			break;
		}
		return $dbData;
	}
	public function convertToDb($type){
		$dbInfo=array();
		switch($type){
			case "problem":
				$dbInfo=array(
					'dbField'=>"p_ID",
					'dbTable'=>"problem",
				);
			break;
			case "user":
				$dbInfo=array(
					'dbField'=>"u_ID",
					'dbTable'=>"users",
				);
			break;
			case "contest":
				$dbInfo=array(
					'dbField'=>"cont_ID",
					'dbTable'=>"contests",
				);
			break;
			case "grouppro":
				$dbInfo=array(
					'dbField'=>"gp_ID",
					'dbTable'=>"grouppro",
				);
			break;
			default:
			break;
		}
		return $dbInfo;
	}
	public function login()
	{
		$userName=$_POST['userName'];
		$pwd=$_POST['pwd'];
		$this->load->model("dbHandler");
		$info=$this->dbHandler->selectPartData('managers','m_name',$userName);
		if(count($info)!=0&&isset($info['0']->m_pwd)){
			if(md5("MKOJ".$pwd)==$info['0']->m_pwd){
				$_SESSION['username']=$userName;
				$_SESSION['email']=$info['0']->m_email;
				$_SESSION['userid']=$info['0']->m_ID;
				$this->load->view("redirect",array("url"=>'/admin/problems'));
			}else{
				$this->load->view("redirect",array("error"=>'密码错误！',"url"=>'/admin/index'));
			}
		}else{
			$this->load->view("redirect",array("error"=>'账号不存在！',"url"=>'/admin/index'));
		}
	}
	public function logout(){
		
	}
}
?>