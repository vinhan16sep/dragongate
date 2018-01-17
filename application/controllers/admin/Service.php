<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('service_model');
	}

	public function index()
	{
		$this->load->library('pagination');
		$config = array();
		$base_url = base_url('admin/service/index');
		$per_page = 10;
		$total_rows = $this->service_model->count_all();
		$uri_segment = 4;
		foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->data['services'] = $this->service_model->fetch_all_pagination($per_page, $this->data['page']);

		$this->render('admin/service/list_service_view');
	}
	public function create()
	{
		$this->output->enable_profiler(TRUE);
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->render('admin/service/create_service_view');
	}
}