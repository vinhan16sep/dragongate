<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->render('about_view');
    }
}
