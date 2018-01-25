<?php
/**
 * Created by PhpStorm.
 * User: Luong Quoc Hung
 * Date: 1/19/18
 * Time: 5:34 PM
 */
class Work_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function fetch_all_pagination($limit, $start){

        $this->db->select('*');
        $this->db->from('work');
        $this->db->where('is_deleted', 0);
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");

        return $result = $this->db->get()->result_array();
    }

    public function get_all(){

        $this->db->select('*');
        $this->db->from('work');
        $this->db->where('is_deleted', 0);
        $this->db->order_by("id", "desc");

        return $result = $this->db->get()->result_array();
    }

    public function count_all(){
        return $this->db->count_all_results('work');
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

    public function count_search($search = null) {
        $this->db->select('*')
            ->from('work');
        $this->db->where('is_deleted', 0);

        if($search != null){
            $this->db->like('title', $search);
        }
        return $this->db->get()->num_rows();
    }

    public function fetch_all($limit = NULL, $start = NULL, $like = null){
        $this->db->select('*');
        $this->db->from('work');
        $this->db->where('is_deleted', 0);
        $this->db->like('title', $like);
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result_array();
        }

        return false;
    }


}