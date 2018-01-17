<?php

class MY_Controller extends CI_Controller {


    protected $data = array();
    protected $author_info = array();

    function __construct() {
        parent::__construct();

        $this->data['page_title'] = 'Template';
        $this->data['before_head'] = '';
        $this->data['before_body'] = '';
    }

    protected function render($the_view = NULL, $template = 'master') {
        if ($template == 'json' || $this->input->is_ajax_request()) {
            header('Content-Type: application/json');
            echo json_encode($this->data);
        } else {
            $this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view, $this->data, TRUE);
            $this->load->view('templates/' . $template . '_view', $this->data);
        }
    }

    protected function pagination_config($base_url, $total_rows, $per_page, $uri_segment){
        $config['base_url']    = $base_url;
        $config['per_page']    = $per_page;
        $config['uri_segment'] = $uri_segment;
        $config['prev_link'] = 'Prev';
        $config['next_link'] = 'Next';
        $config['total_rows']  = $total_rows;
        $config['reuse_query_string'] = true;
        return $config;
    }

}

class Admin_Controller extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect('admin/user/login', 'refresh');
        }
        $this->data['user_email'] = $this->ion_auth->user()->row()->username;
        $this->data['page_title'] = 'Administrator area';

        // Set timezone
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        // Insert author informations to database when insert, update or delete
        $this->author_info = array(
            'created_at' => date('Y-m-d H:i:s', now()),
            'created_by' => $this->ion_auth->user()->row()->username,
            'modified_at' => date('Y-m-d H:i:s', now()),
            'modified_by' => $this->ion_auth->user()->row()->username
        );
    }



    protected function render($the_view = NULL, $template = 'admin_master') {
        parent::render($the_view, $template);
    }

    protected function upload_image($image_input_id, $image_name, $upload_path, $upload_thumb_path = '', $thumbs_with = 75, $thumbs_height = 50) {
        $image = '';
        if (!empty($image_name)) {
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $image_name;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload($image_input_id)) {
                $upload_data = $this->upload->data();
                $image = $upload_data['file_name'];

                $config_thumb['source_image'] = $upload_path . '/' . $image;
                $config_thumb['create_thumb'] = TRUE;
                $config_thumb['maintain_ratio'] = TRUE;
                $config_thumb['new_image'] = $upload_thumb_path;
                $config_thumb['width'] = $thumbs_with;
                $config_thumb['height'] = $thumbs_height;

                $this->load->library('image_lib', $config_thumb);

                $this->image_lib->resize();
            }
        }

        return $image;
    }

    function upload_file($upload_path = '', $file_name = ''){
        //lay thong tin cau hinh upload
        $config = $this->config($upload_path);

        //lưu biến môi trường khi thực hiện upload
        $file  = $_FILES[$file_name];
        $count = count($file['name']);//lấy tổng số file được upload

        $image_list = array(); //luu ten cac file anh upload thanh cong
        for($i=0; $i<=$count-1; $i++) {

            $_FILES['userfile']['name']     = $file['name'][$i];  //khai báo tên của file thứ i
            $_FILES['userfile']['type']     = $file['type'][$i]; //khai báo kiểu của file thứ i
            $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i]; //khai báo đường dẫn tạm của file thứ i
            $_FILES['userfile']['error']    = $file['error'][$i]; //khai báo lỗi của file thứ i
            $_FILES['userfile']['size']     = $file['size'][$i]; //khai báo kích cỡ của file thứ i
            //load thư viện upload và cấu hình
            $this->load->library('upload', $config);
            //thực hiện upload từng file
            if($this->upload->do_upload())
            {
                //nếu upload thành công thì lưu toàn bộ dữ liệu
                $data = $this->upload->data();
                //in cấu trúc dữ liệu của các file
                $image_list[] = $data['file_name'];
            }
        }
        return $image_list;
    }

    function config($upload_path = ''){
        //Khai bao bien cau hinh
        $config = array();
        //thuc mục chứa file
        $config['upload_path']   = $upload_path;
        //Định dạng file được phép tải
        $config['allowed_types'] = 'jpg|png|gif';
        //Dung lượng tối đa
        $config['max_size']      = '1200';
//        //Chiều rộng tối đa
//        $config['max_width']     = '1028';
//        //Chiều cao tối đa
//        $config['max_height']    = '1028';

        return $config;
    }
}

class Public_Controller extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');

        date_default_timezone_set('Asia/Ho_Chi_Minh');

        //theme frontend
        $this->load->model('theme_model');
        $theme = $this->theme_model->fetch_row();
        $this->data['theme'] = $theme['name'];
    }

    protected function render($the_view = NULL, $template = 'master') {
        parent::render($the_view, $template);
    }
}
