<?php 
	class Work_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		public function fetch_all($limit = NULL, $start = NULL, $like = null, $sub_service_id = null){
            $this->db->select('work.*, sub_service.title as sub_service_title');
            $this->db->from('work');
            // $this->db->join('service', 'service.id = work.service_id');
            $this->db->join('sub_service', 'sub_service.id = work.sub_service_id');
            $this->db->where('work.is_deleted', 0);
            if($sub_service_id != null){
                $this->db->where('work.sub_service_id', $sub_service_id);
            }
            $this->db->like('work.title', $like);
            $this->db->limit($limit, $start);
            $this->db->order_by('work.id', 'desc');
            $query = $this->db->get();

            if($query->num_rows() > 0){
                return $query->result_array();
            }

            return false;
        }
        public function insert($data){
            $this->db->set($data)->insert('work');

            if($this->db->affected_rows() == 1){
                return $this->db->insert_id();
            }

            return false;
        }

        public function update($id, $data){
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('work');

            if($this->db->affected_rows() == 1){
                return true;
            }
            return false;
        }

        public function remove($id) {
            $this->db->set('is_deleted', 1);
            $this->db->where('id', $id);
            $this->db->update('work');
            return true;
        }

        public function getById($id){
            $query = $this->db->where('id', $id)->get('work');
            return $result = $query->row_array();
        }

        public function get_by_id($id) {
            $this->db->select('*');
            $this->db->from('work');
            $this->db->where('is_deleted', 0);
            $this->db->where('id', $id);
            $this->db->limit(1);

            return $this->db->get()->row_array();
        }

        public function count_search($search = null, $service_id = null, $sub_service_id = null) {
            $this->db->select('*')
             ->from('work');
            $this->db->where('is_deleted', 0);
            if($service_id != null){
                $this->db->where('service_id', $service_id);
            }
            if($sub_service_id != null){
                $this->db->where('sub_service_id', $sub_service_id);
            }
            if($search != null){
             $this->db->like('title', $search);
            }
            return $this->db->get()->num_rows();
        }

        public function fetch_all_by_type($limit = NULL, $start = NULL, $type = null){
            $this->db->select('work.*, service.title as service_title, sub_service.title as sub_service_title');
            $this->db->from('work');
            $this->db->join('service', 'service.id = work.service_id');
            $this->db->join('sub_service', 'sub_service.id = work.sub_service_id');
            $this->db->where('work.is_deleted', 0);

            if($type != null){
                $this->db->where('work.type', $type);
            }
            $this->db->limit($limit, $start);
            $this->db->order_by('work.id', 'desc');
            $query = $this->db->get();

            if($query->num_rows() > 0){
                return $query->result_array();
            }

            return false;
        }

        public function count_by_type($type = null) {
            $this->db->select('*')
             ->from('work');
            $this->db->where('is_deleted', 0);
            if($type != null){
                $this->db->where('type', $type);
            }
            return $this->db->get()->num_rows();
        }

        public function get_all_lazy_load($ids = array()){
            $this->db->select('*');
            $this->db->from('work');
            $this->db->where('is_deleted', 0);
            if(!empty($ids)){
                $this->db->where_not_in('id', $ids);
            }
            $this->db->limit(3);
            $this->db->order_by('rand()');

            return $result = $this->db->get()->result_array();
        }

        public function search_lazy_load($title){
            $this->db->select('*');
            $this->db->from('work');
            $this->db->where('is_deleted', 0);
            $this->db->like('title', $title);
            $this->db->order_by('rand()');

            return $result = $this->db->get()->result_array();
        }

        public function get_by_sub_service_id($id){
            $this->db->select('*');
            $this->db->from('work');
            $this->db->where('is_deleted', 0);
            if($id != null){
                $this->db->where('sub_service_id', $id);
            }
            $this->db->order_by('rand()');

            return $result = $this->db->get()->result_array();
        }

        public function get_all($limit = NULL, $start = NULL, $sub_service_id = null){
            $this->db->select('work.*, sub_service.title as sub_service_title');
            $this->db->from('work');
            $this->db->join('sub_service', 'sub_service.id = work.sub_service_id');
            $this->db->where('work.is_deleted', 0);
            if($sub_service_id != null){
                $this->db->where('work.sub_service_id', $sub_service_id);
            }
            $this->db->limit($limit, $start);
            $this->db->order_by('work.id', 'desc');
            $query = $this->db->get();

            if($query->num_rows() > 0){
                return $query->result_array();
            }

            return false;
        }


	}
