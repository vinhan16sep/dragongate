<?php 
	class Work extends Admin_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model('work_model');
		}

		public function index(){
			$this->output->enable_profiler(TRUE);
			$this->load->model('service_model');
			$this->data['services'] = $this->service_model->get_all();
			

			$keywords = '';
			$search_service = "";
			$search_sub_service = '';
	        if($this->input->get('search')){
	            $keywords = $this->input->get('search');
	        }
	        if($this->input->get('search_service')){
	            $search_service = $this->input->get('search_service');
	        }
	        if($this->input->get('search_sub_service')){
	            $search_sub_service = $this->input->get('search_sub_service');
	        }

	        $total_rows  = $this->work_model->count_search();
	        if($keywords != ''){
	            $total_rows  = $this->work_model->count_search($keywords);
	        }
	        if($search_service != ''){
	            $total_rows  = $this->work_model->count_search(null, $search_service);
	        }
	        if($search_sub_service != ''){
	            $total_rows  = $this->work_model->count_search(null, null, $search_sub_service);
	        }

			$this->load->library('pagination');
			$config = array();
			$base_url = base_url('admin/work/index');
			$per_page = 3;
			$uri_segment = 4;
			foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
	            $config[$key] = $value;
	        }
	        $this->pagination->initialize($config);

	        $this->data['page_links'] = $this->pagination->create_links();
	        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
	        $result = $this->work_model->fetch_all($per_page, $this->data['page']);
	        if($keywords != ''){
	            $result = $this->work_model->fetch_all($per_page, $this->data['page'], $keywords);
	        }
	        if($search_service != ''){
	            $result = $this->work_model->fetch_all($per_page, $this->data['page'], null, $search_service);
	        }
	        if($search_sub_service != ''){
	            $result = $this->work_model->fetch_all($per_page, $this->data['page'], null, null, $search_sub_service);
	        }
	        $this->data['works'] = $result;

				$this->render('admin/work/list_work_view');
		}

		public function create(){
			$this->load->helper('form');
			$this->load->library('form_validation');

			$this->load->model('service_model');
			$services = $this->service_model->get_all();
			$this->data['service_array'] = $this->convert_dropdown($services);
			$this->form_validation->set_rules('title', 'Tiêu đề', 'required');
			$this->form_validation->set_rules('url', 'Đường dẫn', 'required');

			if($this->input->post()){
				if($this->form_validation->run() == true){
					$image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/works', '');
					$data = array(
	                        'title' => $this->input->post('title'),
	                        'image' => $image,
	                        'url' => $this->input->post('url'),
	                        'type' => $this->input->post('type'),
	                        'description' => $this->input->post('description'),
	                        'service_id' => $this->input->post('service'),
	                        'sub_service_id' => $this->input->post('sub_service'),
	                        'content' => $this->input->post('content'),
	                        'created_at'    => $this->author_info['created_at'],
	                        'created_by'    => $this->author_info['created_by'],
	                        'modified_at'   => $this->author_info['modified_at'],
	                        'modified_by'   => $this->author_info['modified_by']
	                    );
	                    try {
	                        $this->work_model->insert($data);
	                        $this->session->set_flashdata('message', 'Thêm dịch vụ thành công');
	                    }catch (Exception $e) {
	                        $this->session->set_flashdata('message', 'Thêm dịch vụ thất bại: ' . $e->getMessage());
	                    }
	                    redirect('admin/work/index', 'refresh');
	        	}
			}

			$this->render('admin/work/create_work_view');
		}

		public function edit(){
			$id = $this->uri->segment(4);

			$this->load->model('service_model');
			$services = $this->service_model->get_all();
			$this->data['service_array'] = $this->convert_dropdown($services);
			$work = $this->work_model->getById($id);
			$this->data['work'] = $work;
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title', 'Tiêu đề', 'required');
			if($this->input->post()){
				if($this->form_validation->run() == true){
					$image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/works', '');
					$data = array(
	                        'title' => $this->input->post('title'),
	                        'url' => $this->input->post('url'),
	                        'type' => $this->input->post('type'),
	                        'description' => $this->input->post('description'),
	                        'service_id' => $this->input->post('service'),
	                        'sub_service_id' => $this->input->post('sub_service'),
	                        'content' => $this->input->post('content'),
	                        'modified_at'   => $this->author_info['modified_at'],
	                        'modified_by'   => $this->author_info['modified_by']
	                    );
					if($image){
						$data['image'] = $image;
					}
	                    try {
	                    	if($this->work_model->update($id, $data) == true){
	                    		if(!empty($image) && $image != $sub_service['image']){
	                    			unlink('assets/upload/sub_service/'.$sub_service['image']);
	                    		}
	                    	}
	                        $this->session->set_flashdata('message', 'Cập nhật dịch vụ thành công');
	                        
	                    }catch (Exception $e) {
	                        $this->session->set_flashdata('message', 'Cập nhật dịch vụ thất bại: ' . $e->getMessage());
	                    }
	                    redirect('admin/work/index', 'refresh');
	        	}
			}

			$this->render('admin/work/edit_work_view');
		}

		public function remove(){
			$id = $_GET['id'];
	        $work = $this->work_model->get_by_id($id);
	        if($this->work_model->remove($id) == true){
	            unlink('assets/upload/works/'.$work['image']);
	        }
		}

		public function get_sub_service(){
			$this->load->model('sub_service_model');
			$service_id = $this->input->get('service_id');
			$sub_service = $this->sub_service_model->getIdService($service_id);
			$this->output->set_status_header(200)->set_output(json_encode(array('sub_service' => $sub_service)));
		}
	}
