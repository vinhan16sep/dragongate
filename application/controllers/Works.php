<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Works extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->render('works_view');
    }

    public function detail(){
        $this->render('detail_works_view');
    }
}
