<?php
/**
 * Created by PhpStorm.
 * User: Luong Quoc Hung
 * Date: 1/19/18
 * Time: 5:32 PM
 */
class Work extends Admin_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('work_model');
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
        $total_rows  = $this->work_model->count_search();
        if($keywords != ''){
            $total_rows  = $this->work_model->count_search($keywords, null);
        }
        if($keywords != ''){
            $total_rows  = $this->work_model->count_search(null, $search_service);
        }
        if($keywords != '' && $keywords != ''){
            $total_rows  = $this->work_model->count_search($keywords, $search_service);
        }

        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/work/index');
        $per_page = 10;
        $total_rows = $this->work_model->count_all();
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
        if($keywords != '' && $keywords != ''){
            $result = $this->work_model->fetch_all($per_page, $this->data['page'], $keywords, $search_service);
        }
        $this->data['works'] = $result;


        $this->render('admin/work/list_work_view');
    }

    public function create(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->data['types'] = array('Ảnh', 'Video');
        $this->load->model('service_model');
        $services = $this->service_model->get_all();
        $this->data['service_array'] = $this->convert_dropdown($services);
        $this->form_validation->set_rules('title', 'Tiêu đề', 'required');
        if($this->input->post()){
            if($this->form_validation->run() == true){
                $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/works', '');
                $data = array(
                    'title' => $this->input->post('title'),
                    'url' => $this->input->post('url'),
                    'type' => $this->input->post('type'),
                    'image' => $image,
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

        $this->data['types'] = array('Ảnh', 'Video');
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
                $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/sub_service', '');
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
                        if(!empty($image) && $image != $work['image']){
                            unlink('assets/upload/works/'.$sub_service['image']);
                        }
                    }
                    $this->session->set_flashdata('message', 'Cập nhật dịch vụ thành công');

                }catch (Exception $e) {
                    $this->session->set_flashdata('message', 'Cập nhật dịch vụ thất bại: ' . $e->getMessage());
                }
                redirect('admin/subservice/index', 'refresh');
            }
        }

        $this->render('admin/work/edit_work_view');
    }

    public function get_sub_service(){
        $this->load->model('sub_service_model');
        $service_id = $this->input->get('service_id');
        $sub_services = $this->sub_service_model->fetch_all(null, null, null, $service_id);
        $subServices = $this->convert_dropdown($sub_services);
        $this->output->set_status_header(200)->set_output(json_encode(array('subServices' => $subServices)));

    }
}