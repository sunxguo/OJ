<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->view('header',array("title"=>"OJ首页"));
		$this->load->view('index');
		$this->load->view('footer');
	}
}