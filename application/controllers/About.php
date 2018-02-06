<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
    }

    public function index(){
    	$this->load->model('introduce_model');
        $introduce = $this->introduce_model->fetch_all_pagination(null, null);
        $active = $this->introduce_model->is_active(1, 0);

        $this->load->model('about_model');
        $teams = $this->about_model->fetch_all_pagination(null, null);

        $this->load->model('partner_model');
        $partner = $this->partner_model->fetch_all_pagination(null, null);

        $this->data['introduce'] = $introduce;
        $this->data['active'] = $active;
        $this->data['teams'] = $teams;
        $this->data['partner'] = $partner;

        $this->render('about_view');
    }
}
