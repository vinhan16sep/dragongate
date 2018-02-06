<?php 
/**
* 
*/
class About extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
	}

	/*=================================
	=            Introduce            =
	=================================*/
	public function getIntroduce(){
		$this->load->model('introduce_model');

		$keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $total_rows  = $this->introduce_model->count_search();
        if($keywords != ''){
            $total_rows  = $this->introduce_model->count_search($keywords);
        }

		$this->load->library('pagination');
		$config = array();
		$base_url = base_url('admin/about/getIntroduce');
		$per_page = 10;
		$uri_segment = 4;
		foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $result = $this->introduce_model->fetch_all($per_page, $this->data['page']);
        if($keywords != ''){
            $result = $this->introduce_model->fetch_all($per_page, $this->data['page'], $keywords);
        }
        $this->data['result'] = $result;

		$this->render('admin/introduce/list_introduce_view');
	}

	public function createIntroduce(){
		$this->load->model('introduce_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Tiêu đề', 'required');
		if($this->input->post()){
			if($this->form_validation->run() == true){
				$data = array(
                        'title' => $this->input->post('title'),
                        'description' => $this->input->post('description'),
                        'content' => $this->input->post('content'),
                        'created_at'    => $this->author_info['created_at'],
                        'created_by'    => $this->author_info['created_by'],
                        'modified_at'   => $this->author_info['modified_at'],
                        'modified_by'   => $this->author_info['modified_by']
                    );
                    try {
                        $this->introduce_model->insert($data);
                        $this->session->set_flashdata('message', 'Thêm thành công');
                    }catch (Exception $e) {
                        $this->session->set_flashdata('message', 'Thêm thất bại: ' . $e->getMessage());
                    }
                    redirect('admin/about/getIntroduce', 'refresh');
        	}
		}

		$this->render('admin/introduce/create_introduce_view');
	}

	public function editIntroduce($id){
		$this->load->model('introduce_model');
		$introduce = $this->introduce_model->getById($id);
		$this->data['introduce'] = $introduce;
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Tiêu đề', 'required');
		if($this->input->post()){
			if($this->form_validation->run() == true){
				$data = array(
                        'title' => $this->input->post('title'),
                        'description' => $this->input->post('description'),
                        'content' => $this->input->post('content'),
                        'created_at'    => $this->author_info['created_at'],
                        'created_by'    => $this->author_info['created_by'],
                        'modified_at'   => $this->author_info['modified_at'],
                        'modified_by'   => $this->author_info['modified_by']
                    );
                try {
                    $this->introduce_model->update($id, $data);
                    $this->session->set_flashdata('message', 'Cập nhật thành công');
                }catch (Exception $e) {
                    $this->session->set_flashdata('message', 'Cập nhật thất bại: ' . $e->getMessage());
                }
                redirect('admin/about/getIntroduce', 'refresh');
        	}
		}

		$this->render('admin/introduce/edit_introduce_view');
	}

	public function removeIntroduce(){
		$this->load->model('introduce_model');
		$id = $_GET['id'];
        $service = $this->introduce_model->getById($id);
        $this->introduce_model->remove($id);
	}

	/*=====  End of Introduce  ======*/



	/*=================================
	=            Your Team            =
	=================================*/
	
	public function getTeam(){
		$this->load->model('about_model');

		$keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $total_rows  = $this->about_model->count_search();
        if($keywords != ''){
            $total_rows  = $this->about_model->count_search($keywords);
        }

		$this->load->library('pagination');
		$config = array();
		$base_url = base_url('admin/about/getTeam');
		$per_page = 10;
		$uri_segment = 4;
		foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $result = $this->about_model->fetch_all($per_page, $this->data['page']);
        if($keywords != ''){
            $result = $this->about_model->fetch_all($per_page, $this->data['page'], $keywords);
        }
        $this->data['result'] = $result;

		$this->render('admin/about/list_about_view');
	}

	public function createTeam(){
		$this->load->model('about_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Họ tên', 'required');
		if($this->input->post()){
			if($this->form_validation->run() == true){
				$image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/about', '');
				$data = array(
                        'name' => $this->input->post('name'),
                        'image' => $image,
                        'position' => $this->input->post('position'),
                        'facebook' => $this->input->post('facebook'),
                        'instagram' => $this->input->post('instagram'),
                        'created_at'    => $this->author_info['created_at'],
                        'created_by'    => $this->author_info['created_by'],
                        'modified_at'   => $this->author_info['modified_at'],
                        'modified_by'   => $this->author_info['modified_by']
                    );
                    try {
                        $this->about_model->insert($data);
                        $this->session->set_flashdata('message', 'Thêm thành công');
                    }catch (Exception $e) {
                        $this->session->set_flashdata('message', 'Thêm thất bại: ' . $e->getMessage());
                    }
                    redirect('admin/about/getTeam', 'refresh');
        	}
		}

		$this->render('admin/about/create_about_view');
	}

	public function editTeam($id){
		$this->load->model('about_model');
		$about = $this->about_model->getById($id);
		$this->data['about'] = $about;
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Họ tên', 'required');
		if($this->input->post()){
			if($this->form_validation->run() == true){
				$image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/about', '');
				$data = array(
                        'name' => $this->input->post('name'),
                        'position' => $this->input->post('position'),
                        'facebook' => $this->input->post('facebook'),
                        'instagram' => $this->input->post('instagram'),
                        'created_at'    => $this->author_info['created_at'],
                        'created_by'    => $this->author_info['created_by'],
                        'modified_at'   => $this->author_info['modified_at'],
                        'modified_by'   => $this->author_info['modified_by']
                    );
				if($image){
					$data['image'] = $image;
				}
                try {
                	if($this->about_model->update($id, $data) == true){
                		if(!empty($image) && $image != $about['image']){
                			unlink('assets/upload/about/'.$about['image']);
                		}
                	}
                    $this->session->set_flashdata('message', 'Cập nhật thành công');
                }catch (Exception $e) {
                    $this->session->set_flashdata('message', 'Cập nhật thất bại: ' . $e->getMessage());
                }
                redirect('admin/about/getTeam', 'refresh');
        	}
		}

		$this->render('admin/about/edit_about_view');
	}

	public function removeTeam(){
		$this->load->model('about_model');
		$id = $_GET['id'];
		$about = $this->about_model->getById($id);
        if($this->about_model->remove($id) == true){
            unlink('assets/upload/about/'.$about['image']);
        }
	}
	
	/*=====  End of Your Team  ======*/
	

	/*===============================
	=            Partner            =
	===============================*/
	
	public function getPartner(){
		$this->load->model('partner_model');
        $total_rows  = $this->partner_model->count_all();

		$this->load->library('pagination');
		$config = array();
		$base_url = base_url('admin/about/getPartner');
		$per_page = 10;
		$uri_segment = 4;
		foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $result = $this->partner_model->fetch_all_pagination($per_page, $this->data['page']);
        $this->data['result'] = $result;

		$this->render('admin/partner/list_partner_view');
	}


	public function createPartner(){
		$this->load->model('partner_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		if($this->input->post()){
			$image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/about', '');
			$data = array(
                    'image' => $image,
                    'created_at'    => $this->author_info['created_at'],
                    'created_by'    => $this->author_info['created_by'],
                    'modified_at'   => $this->author_info['modified_at'],
                    'modified_by'   => $this->author_info['modified_by']
                );
                try {
                    $this->partner_model->insert($data);
                    $this->session->set_flashdata('message', 'Thêm thành công');
                }catch (Exception $e) {
                    $this->session->set_flashdata('message', 'Thêm thất bại: ' . $e->getMessage());
                }
            redirect('admin/about/getPartner', 'refresh');
		}

		$this->render('admin/partner/create_partner_view');
	}

	public function removePartner(){
		$this->load->model('partner_model');
		$id = $_GET['id'];
		$partner = $this->partner_model->getById($id);
        if($this->partner_model->remove($id) == true){
            unlink('assets/upload/about/'.$partner['image']);
        }
	}
	
	/*=====  End of Partner  ======*/
	
}