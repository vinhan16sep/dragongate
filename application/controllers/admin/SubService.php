<?php
	class SubService extends Admin_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model('sub_service_model');
		}

		public function index(){
			$this->load->model('service_model');
			$this->data['services'] = $this->service_model->get_all();

			$keywords = '';
			$search_service = '';
	        if($this->input->get('search')){
	            $keywords = $this->input->get('search');
	        }
	        if($this->input->get('search_service')){
	            $search_service = $this->input->get('search_service');
	        }
	        // echo $search_service;die;
	        $total_rows  = $this->sub_service_model->count_search();
	        if($keywords != ''){
	            $total_rows  = $this->sub_service_model->count_search($keywords, null);
	        }
	        if($keywords != ''){
	            $total_rows  = $this->sub_service_model->count_search(null, $search_service);
	        }
	        if($keywords != '' && $keywords != ''){
	        	$total_rows  = $this->sub_service_model->count_search($keywords, $search_service);
	        }

			$this->load->library('pagination');
			$config = array();
			$base_url = base_url('admin/subservice/index');
			$per_page = 10;
			$total_rows = $this->sub_service_model->count_all();
			$uri_segment = 4;
			foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
	            $config[$key] = $value;
	        }
	        $this->pagination->initialize($config);

	        $this->data['page_links'] = $this->pagination->create_links();
	        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
	        $result = $this->sub_service_model->fetch_all($per_page, $this->data['page']);
	        if($keywords != ''){
	            $result = $this->sub_service_model->fetch_all($per_page, $this->data['page'], $keywords);
	        }
	        if($search_service != ''){
	            $result = $this->sub_service_model->fetch_all($per_page, $this->data['page'], null, $search_service);
	        }
	        if($keywords != '' && $keywords != ''){
	        	$result = $this->sub_service_model->fetch_all($per_page, $this->data['page'], $keywords, $search_service);
	        }
	        $this->data['sub_services'] = $result;

			$this->render('admin/sub_service/list_sub_service_view');
		}

		public function create(){
			$this->load->helper('form');
			$this->load->library('form_validation');

			$this->load->model('service_model');
			$services = $this->service_model->get_all();
			$this->data['service_array'] = $this->convert_dropdown($services);
			$this->form_validation->set_rules('title', 'Tiêu đề', 'required');
			if($this->input->post()){
				if($this->form_validation->run() == true){
					$image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/sub_service', '');
					$data = array(
	                        'title' => $this->input->post('title'),
	                        'image' => $image,
	                        'description' => $this->input->post('description'),
	                        // 'service_id' => $this->input->post('service'),
	                        'content' => $this->input->post('content'),
	                        'created_at'    => $this->author_info['created_at'],
	                        'created_by'    => $this->author_info['created_by'],
	                        'modified_at'   => $this->author_info['modified_at'],
	                        'modified_by'   => $this->author_info['modified_by']
	                    );
	                    try {
	                        $this->sub_service_model->insert($data);
	                        $this->session->set_flashdata('message', 'Thêm dịch vụ thành công');
	                    }catch (Exception $e) {
	                        $this->session->set_flashdata('message', 'Thêm dịch vụ thất bại: ' . $e->getMessage());
	                    }
	                    redirect('admin/subservice/index', 'refresh');
	        	}
			}

			$this->render('admin/sub_service/create_sub_service_view');
		}

		public function edit(){
			$id = $this->uri->segment(4);

			$this->load->model('service_model');
			$services = $this->service_model->get_all();
			$this->data['service_array'] = $this->convert_dropdown($services);
			$sub_service = $this->sub_service_model->getById($id);
			$this->data['sub_service'] = $sub_service;
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title', 'Tiêu đề', 'required');
			if($this->input->post()){
				if($this->form_validation->run() == true){
					$image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/sub_service', '');
					$data = array(
	                        'title' => $this->input->post('title'),
	                        'description' => $this->input->post('description'),
	                        // 'service_id' => $this->input->post('service'),
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
	                    	if($this->sub_service_model->update($id, $data) == true){
	                    		if(!empty($image) && $image != $sub_service['image']){
	                    			unlink('assets/upload/sub_service/'.$sub_service['image']);
	                    		}
	                    	}
	                        $this->session->set_flashdata('message', 'Cập nhật dịch vụ thành công');
	                        
	                    }catch (Exception $e) {
	                        $this->session->set_flashdata('message', 'Cập nhật dịch vụ thất bại: ' . $e->getMessage());
	                    }
	                    redirect('admin/subservice/index', 'refresh');
	        	}
			}

			$this->render('admin/sub_service/edit_sub_service_view');
		}

		public function remove(){
			$id = $_GET['id'];
	        $service = $this->sub_service_model->get_by_id($id);
	        if($this->sub_service_model->remove($id) == true){
	            unlink('assets/upload/sub_service/'.$service['image']);
	        }
		}



	}
?>