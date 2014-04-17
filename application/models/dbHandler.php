<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
	 public function selectdata($table,$where,$content,$limit)
	 {
		$this->load->database();
		$this->db->where($where,$content);
		$this->db->limit($limit);
		$this->db->from($table);
		//$this->db->orderby($ordercol,$orderby);
	 	return $query = $this->db->get();
	 }
	 public function selectPartData($table,$where,$content)
	 {
		$this->load->database();
		$this->db->where($where,$content);
		$this->db->from($table);
		//$this->db->orderby($ordercol,$orderby);
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

}
?>
