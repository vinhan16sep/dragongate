<?php
    /**
    * 
    */
    class Sub_service_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
        }
        public function fetch_all_pagination($limit, $start){
            
            $this->db->select('*');
            $this->db->from('sub_service');
            $this->db->where('is_deleted', 0);
            $this->db->limit($limit, $start);
            $this->db->order_by("id", "desc");

            return $result = $this->db->get()->result_array();
        }
        public function count_all(){
            return $this->db->count_all_results('sub_service');
        }

        public function insert($data){
            $this->db->set($data)->insert('sub_service');

            if($this->db->affected_rows() == 1){
                return $this->db->insert_id();
            }

            return false;
        }

        public function update($id, $data){
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('sub_service');

            if($this->db->affected_rows() == 1){
                return true;
            }
            return false;
        }

        public function remove($id) {
            $this->db->set('is_deleted', 1);
            $this->db->where('id', $id);
            $this->db->update('sub_service');
            return true;
        }

        public function getById($id){
            $query = $this->db->where('id', $id)->get('sub_service');
            return $result = $query->row_array();
        }

        public function get_by_id($id) {
            $this->db->select('*');
            $this->db->from('sub_service');
            $this->db->where('is_deleted', 0);
            $this->db->where('id', $id);
            $this->db->limit(1);

            return $this->db->get()->row_array();
        }
    }
?>