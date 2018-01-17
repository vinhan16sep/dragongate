<?php
	/**
	* 
	*/
	class Service_model extends CI_Model{
		
		function __construct(){
			parent::__construct();
		}
		public function fetch_all_pagination($limit, $start){
			
			$this->db->select('*');
	        $this->db->from('service');
	        $this->db->where('is_deleted', 0);
	        $this->db->limit($limit, $start);
	        $this->db->order_by("id", "desc");

	        return $result = $this->db->get()->result_array();
		}
		 public function count_all(){
		 	return $this->db->count_all_results('service');
		 }
	}
?>