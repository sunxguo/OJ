﻿<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DbHandler extends CI_Model{
	function _construct()
	{
		parent::__construct();
	}

	 public function insertdata($table,$data)
	 {
		$this->load->database();
       	        $this->db->insert($table, $data);
       	 	return $this->db->affected_rows();
	 }
	 public function deletedata($table,$where,$content)
	 {
		$this->load->database();
	 	$this->db->where($where,$content);
		$this->db->delete($table);
	 }
	 public function  updatedata($table,$data,$where,$content)
	 {
		$this->load->database();
	 	$this->db->where($where,$content);
		$this->db->update($table, $data);
		return $this->db->affected_rows();
	 }
	 public function selectdata($table,$where,$content,$limit,$offset,$ordercol,$orderby)
	 {
		$this->load->database();
		$this->db->where($where,$content);
		$this->db->limit($limit,$offset);
		$this->db->from($table);
		$this->db->order_by($ordercol,$orderby);
	 	return $query = $this->db->get()->result();
	 }
	  public function select_all_data_by_order($table,$where,$content,$ordercol,$orderby)
	 {
		$this->load->database();
		$this->db->where($where,$content);
		$this->db->from($table);
		$this->db->order_by($ordercol,$orderby);
	 	return $query = $this->db->get()->result();
	 }
	  public function selectdata_no_condition($table,$limit,$offset,$ordercol,$orderby)
	 {
		$this->load->database();
		$this->db->limit($limit,$offset);
		$this->db->from($table);
		$this->db->order_by($ordercol,$orderby);
	 	return $query = $this->db->get()->result();
	 }
	 public function selectPartData($table,$where,$content)
	 {
		$this->load->database();
		$this->db->where($where,$content);
		$this->db->from($table);
		//$this->db->orderby($ordercol,$orderby);
	 	return $query = $this->db->get()->result();
	 }
	 public function sel_data_by_mul_condition($table,$condition){
		$this->load->database();
		$this->db->where($condition);
		$this->db->from($table);
	 	return $query = $this->db->get()->result();
	 }
	 public function selectAllData($table)
	 {
		$this->load->database();
	 	return $query = $this->db->get($table)->result();
	 }
	 public function selectalldatadesc($table,$ordercol)
	 {
		$this->load->database();
	 	$this->db->order_by($ordercol,"desc");
	 	return $query = $this->db->get($table);
	 }
	 public function amount_data($table,$where,$content)
	 {
		$this->load->database();
	 	$this->db->where($where,$content);
		$this->db->from($table);
		return $total = $this->db->count_all_results();
	 }
	 public function amount_data_no_condition($table)
	 {
		$this->load->database();
		return $total = $this->db->count_all($table);
	 }

}
?>
