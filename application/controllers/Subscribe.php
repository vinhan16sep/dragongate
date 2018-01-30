<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribe extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('subscribe_model');
    }

    public function save(){
    	$isExitsts = false;
    	$email = $this->input->post('email');
    	$where = array('email' => $email);
    	$count = $this->subscribe_model->count_all($where);
    	if($count > 0){
    		$isExitsts = false;
    	}else{
    		$data = array(
    				'email' => $email,
    				'created_at' => date("Y:m:d H:i:s")
    			);
    	
	    	if ($this->subscribe_model->save($data) == true) {
	    		$isExitsts = true;
	    	}
    	}

    	

    	$this->output->set_status_header(200)->set_output(json_encode(array('isExitsts' => $isExitsts)));
    }
}
