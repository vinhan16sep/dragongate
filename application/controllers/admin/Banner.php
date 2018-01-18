<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('banner_model');
	}

	public function index(){
		$banners = $this->banner_model->get_all();
		$this->data['banners'] = $banners;
		$this->render('admin/banner/list_banner_view');
	}

	public function create(){
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('text', 'Tiêu đề', 'required');
        if($this->input->post()){
        	if($this->form_validation->run() == true){
        		$image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/banner', '');
        		$data = array(
                        'text' => $this->input->post('text'),
                        'image' => $image,
                        'url' => $this->input->post('url'),
                        'created_at'    => $this->author_info['created_at'],
                        'created_by'    => $this->author_info['created_by'],
                        'modified_at'   => $this->author_info['modified_at'],
                        'modified_by'   => $this->author_info['modified_by']
                    );
                    try {
                        $this->banner_model->insert($data);
                        $this->session->set_flashdata('message', 'Thêm Banner thành công');
                    }catch (Exception $e) {
                        $this->session->set_flashdata('message', 'Thêm Banner thất bại: ' . $e->getMessage());
                    }
                    redirect('admin/banner/index', 'refresh');
        	}
        }
		

		$this->render('admin/banner/create_banner_view');
	}

	public function remove(){
		$id = $_GET['id'];
        $banner = $this->banner_model->get_by_id($id);
        if($this->banner_model->remove($id) == true){
            unlink('assets/upload/banner/'.$banner['image']);
        }
	}

	public function active()
	{
		$id = $_GET['id'];
		$isExists = false;
		if($this->banner_model->update($id, 1) == true){
			$isExists = true;
		}
		
		$this->output->set_status_header(200)->set_output(json_encode(array('isExists' => $isExists)));
	}

	public function deactive()
	{
		$id = $_GET['id'];
		$isExists = false;
		if($this->banner_model->update($id, 0) == true){
			$isExists = true;
		}
		
		$this->output->set_status_header(200)->set_output(json_encode(array('isExists' => $isExists)));
	}
}