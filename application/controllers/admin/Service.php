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
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Tiêu đề', 'required');
		if($this->input->post()){
			if($this->form_validation->run() == true){
				$image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/service', '');
				$data = array(
                        'title' => $this->input->post('title'),
                        'image' => $image,
                        'description' => $this->input->post('description'),
                        'content' => $this->input->post('content'),
                        'created_at'    => $this->author_info['created_at'],
                        'created_by'    => $this->author_info['created_by'],
                        'modified_at'   => $this->author_info['modified_at'],
                        'modified_by'   => $this->author_info['modified_by']
                    );
                    try {
                        $this->service_model->insert($data);
                        $this->session->set_flashdata('message', 'Thêm dịch vụ thành công');
                    }catch (Exception $e) {
                        $this->session->set_flashdata('message', 'Thêm dịch vụ thất bại: ' . $e->getMessage());
                    }
                    redirect('admin/service/index', 'refresh');
        	}
		}

		$this->render('admin/service/create_service_view');
	}

	public function edit(){
		$this->output->enable_profiler(TRUE);
		$id = $this->uri->segment(4);
		$service = $this->service_model->getById($id);
		$this->data['service'] = $service;
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Tiêu đề', 'required');
		if($this->input->post()){
			if($this->form_validation->run() == true){
				$image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/service', '');
				$data = array(
                        'title' => $this->input->post('title'),
                        'description' => $this->input->post('description'),
                        'content' => $this->input->post('content'),
                        'created_at'    => $this->author_info['created_at'],
                        'created_by'    => $this->author_info['created_by'],
                        'modified_at'   => $this->author_info['modified_at'],
                        'modified_by'   => $this->author_info['modified_by']
                    );
				if($image){
					$data['image'] = $image;
				}
                    try {
                        if($this->service_model->update($id, $data) == true){
                    		if($image != $service['image']){
                    			unlink('assets/upload/service/'.$service['image']);
                    		}
                    	}
                        $this->session->set_flashdata('message', 'Cập nhật dịch vụ thành công');
                    }catch (Exception $e) {
                        $this->session->set_flashdata('message', 'Cập nhật dịch vụ thất bại: ' . $e->getMessage());
                    }
                    redirect('admin/service/index', 'refresh');
        	}
		}

		$this->render('admin/service/edit_service_view');
	}

	public function remove(){
		$id = $_GET['id'];
        $service = $this->service_model->get_by_id($id);
        if($this->service_model->remove($id) == true){
            unlink('assets/upload/service/'.$service['image']);
        }
	}
}