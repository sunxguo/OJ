<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('safe_mode',0);
class Cproblem extends CI_Controller {
	function __construct(){
		 parent::__construct();
		 $this->load->helper("base");
	}
	public function getProblem(){
		$pid=isset($_GET['id'])?$_GET['id']:'1';
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
							array("error"=>"请先登录！","url"=>"/users/login")
							);
			return;
		}
		$data['c_pID']=$_POST['pro_id'];
		$data['c_code']=$_POST['code'];
		$data['c_uID']=$_SESSION['userid'];
		$data['c_creationDate']= date('Y-m-d H:i:s',time());
		$data['c_status']=0;
		$this->load->model("dbHandler");
		$result=$this->dbHandler->insertdata('code',$data);
		if($result==1){
			$this->load->view('redirect',
				array("error"=>"提交成功！","url"=>"/users/user_center_myCode"));
		}
		else $this->load->view('redirect',
				array("error"=>"提交失败！请重试！","url"=>"/problemList"));
	}
	public function get_arg(){
		$this->load->view('header',array("title"=>"OJ-获取参数"));
		$this->load->view('test');
		$this->load->view('footer');
	}
	public function execute_code(){
		//exec('ping www.baidu.com');
		//system('cmd /c ping www.baidu.com');
		/*
		$a = exec("dir",$out,$status);  
		print_r($a);  
		print_r($out);  
		print_r($status); */
		/*
		exec("./onj hello.c 1", $output, $verdict);
		print_r($output);
		echo "<br>";
		print_r($verdict);*/
		//$i = 0;
		/*
exec('ipconfig /all', $response);
foreach($response as $line) {
  
  $line = $line;
  
  if (strpos($line, "DNS")>0) {
    print (trim($line));
    echo ("\n");
    }"	
}
*/
	//	$code=$_POST['code'];
	//	if($this->write_cpp($code)){
			/*//$command="E:/Mycc/Bin/CL.exe E:/test.cpp".escapeshellcmd($_POST['args']);
			$command="cd /&&E:&&cd Mycc/Bin&&CL.exe program.cpp";
			exec($command);
			$command="cd /&&E:&&cd Mycc/Bin&&program.exe";
			exec($command,$result);*/
		//	$command="gcc /var/tmp/program.c -o /var/tmp/tt";
			$command="cd /; ./var/tmp/t";
			$this->execute($command,$stdout,$stderr,$process);
			print_r($stdout);
			print_r($stderr);
			print_r($process);
			
	//	}
		$this->load->view('header',array("title"=>"OJ-执行结果"));
//		$this->load->view('result',array("result"=>$stdout));
		$this->load->view('footer');
		
	}
	private function execute($command,&$stdout,&$stderr,&$processInfo)
	{
		//writelog("EXECUTE:".$command);
		$descriptorspec = array(
			0 => array("pipe", "r"),
			1 => array("pipe", "w"),
			2 => array("pipe", "w")
		);
		$process = proc_open($command, $descriptorspec, $pipes);
		if (is_resource($process))
		{
			$fpout = $pipes[1];
			$fperr = $pipes[2];

			$stdout = $this->fileread($fpout);
			$processInfo = proc_get_status($process);
		//	exec("ps -aef | grep ".($processInfo['pid']),$pro_detail);
			$pro_detail=fopen("/proc/".$processInfo['pid']."/statm","r");
			$processInfo['detail']=$this->fileread($pro_detail); 
			fclose($fpout);
			fclose($fperr);
			proc_close($process);
		}
	}
	private function fileread($fp)
	{
		$str = '';
		if (is_resource($fp))
		{
			while (!feof($fp))
				$str .= fgets($fp, 128);
		}
		return $str;
	}
	private function write_cpp($code){
		$filename="/var/tmp/program.c";
		$fp=fopen("$filename", "w+"); //打开文件指针，创建文件
		if ( !is_writable($filename) ){
			  die("文件:" .$filename. "不可写，请检查！");
		}
		$result=fwrite($fp,$code);
		fclose($fp);  //关闭指针
		return $result;
	}
	private function get_dir_name(){
		 return dirname(dirname(__FILE__)); 
	}
}
?>
