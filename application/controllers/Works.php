<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Works extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('work_model');
    }

//    public function index(){
//        $this->load->model('sub_service_model');
//        $sub_service = $this->sub_service_model->get_all();
//
//        $works = $this->work_model->get_all();
//        $this->data['sub_service'] = $sub_service;
//        $this->data['works'] = $works;
//        // print_r($works);die;
//        $this->render('works_view');
//    }

    public function index(){
        $this->load->model('sub_service_model');
        $sub_service = $this->sub_service_model->get_all();

        $works = $this->work_model->get_all();
        $this->data['sub_service'] = $sub_service;
        $this->data['works'] = $works;
        $this->render('works_view');
    }

    function call_work_id(){
        $id = $this->input->get('id');
        $this->load->model('sub_service_model');

        $result = $this->work_model->get_by_id($id);
//        echo '<pre>';
//        print_r($result);die;
        $this->output->set_output(json_encode($result));
    }

    function get_lazy_load_data(){
        $ids = $this->input->get('ids');

        $result = $this->data['images'] = $this->work_model->get_all_lazy_load($ids);
        $this->output->set_output(json_encode($result));
    }

    function get_lazy_load_data_for_search(){
        $title = $this->input->get('name');

        $result = $this->data['images'] = $this->work_model->search_lazy_load($title);
        $this->output->set_output(json_encode($result));
    }

    public function detail($id = null){
        $this->load->model('sub_service_model');

        if(!isset($id)){
            redirect('works', 'refresh');
        }

        $work = $this->work_model->get_by_id($id);

        $sub_service = $this->sub_service_model->get_by_id($work['sub_service_id']);

//        echo '<pre>';
//        print_r($sub_service);die;

        if(!$work){
            redirect('works', 'refresh');
        }

        $this->data['work'] = $work;
        $this->data['sub_service'] = $sub_service;






        $this->render('detail_works_view');
    }
}
