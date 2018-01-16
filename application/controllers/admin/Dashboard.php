<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    function __construct(){
        parent::__construct();

        $this->load->helper('url');
        $this->load->model('contact_model');
    }

    public function index(){
        $this->render('admin/dashboard_view');
    }
}