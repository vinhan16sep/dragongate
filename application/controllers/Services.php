<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->render('services_view');
    }
}
