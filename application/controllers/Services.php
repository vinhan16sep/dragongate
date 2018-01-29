<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('service_model');
    }

    public function index(){
    	$this->data['services'] = $this->service_model->get_all();

        $this->render('services_view');
    }
}
