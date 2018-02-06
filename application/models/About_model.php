<?php
/**
* 
*/
class About_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	public function fetch_all_pagination($limit, $start){
		$this->db->select('*');
        $this->db->from('about');
        $this->db->where('is_deleted', 0);
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "asc");

        return $result = $this->db->get()->result_array();
	}

	public function fetch_all($limit = NULL, $start = NULL, $like = null){
        $this->db->select('*');
        $this->db->from('about');
        $this->db->where('is_deleted', 0);
        $this->db->like('name', $like);
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }

         return false;
    }

    public function count_search($search = null) {
		$this->db->select('*')
		 ->from('about');
		$this->db->where('is_deleted', 0);

		if($search != null){
		 $this->db->like('name', $search);
		}
		return $this->db->get()->num_rows();
    }

    public function insert($data){
		$this->db->set($data)->insert('about');

        if($this->db->affected_rows() == 1){
            return $this->db->insert_id();
        }

        return false;
	}

	public function getById($id){
		$query = $this->db->where('id', $id)->get('about');
		return $result = $query->row_array();
	}

	public function update($id, $data){
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update('about');

		if($this->db->affected_rows() == 1){
            return true;
        }
        return false;
	}

	public function remove($id) {
        $this->db->set('is_deleted', 1);
		$this->db->where('id', $id);
		$this->db->update('about');
        return true;
    }
}