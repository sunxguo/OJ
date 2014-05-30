<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CcontestList extends CI_Controller {
	function __construct(){
		 parent::__construct();
		 $this->load->helper("base");
	}
	public function index()
	{
		$this->load->model("dbHandler");
		//获取题目总数
		$total=$this->dbHandler->amount_data_no_condition('contests');
		//计算总页数
		$total_page=ceil($total/PROBLEMLIST_PAGE_COUNT);
		//获取当前页数
		$current_page=isset($_GET['page'])?$_GET['page']:1;
		//要取的数量
		$limit=PROBLEMLIST_PAGE_COUNT;
		//跳过的数量
		$offset=($current_page-1)*PROBLEMLIST_PAGE_COUNT;
		$contests=$this->dbHandler->selectdata_no_condition('contests',$limit,$offset,'cont_ID',"desc");
		foreach($contests as $item){
			$item->status=contest_status($item->cont_startTime,$item->cont_endTime);
		}
		$this->load->view('header',array("title"=>"OJ-比赛列表"));
		$this->load->view('contestList',
							array(
								"contests"=>$contests,
								"pre_link"=>$current_page<=1?"#":"/contestList?page=".($current_page-1),
								"next_link"=>$current_page>=$total_page?"#":"/contestList?page=".($current_page+1),
								"page"=>$current_page.'/'.$total_page.'页'));
		$this->load->view('footer');
	}	
}
?>
