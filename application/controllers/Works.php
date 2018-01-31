<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Works extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('work_model');
    }

    public function index(){
        $this->load->model('sub_service_model');
        $sub_service = $this->sub_service_model->get_all();

        $works = $this->work_model->get_all();
        $this->data['sub_service'] = $sub_service;
        $this->data['works'] = $works;
        // print_r($works);die;
        $this->render('works_view');
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

    public function detail(){
        $this->render('detail_works_view');
    }
}
