<?php defined('BASEPATH') OR exit('No direct script access allowed');
include "class.phpmailer.php";
include "class.smtp.php";
/**
* 
*/
class Subscribe extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('subscribe_model');
	}
	public function index(){
		$total_rows = $this->subscribe_model->count_all();
		$this->load->library('pagination');
		$config = array();
		$base_url = base_url('admin/subscribe/index');
		$per_page = 10;
		$uri_segment = 4;
		foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $result = $this->subscribe_model->fetch_all($per_page, $this->data['page']);

		$this->data['subscribes'] = $result;

		$this->render('admin/subcribe_view');
	}

	public function send_mail() {
        $isExitsts = false;
        $data = $this->input->get('email');
        $mail = new PHPMailer();
        $mail->IsSMTP(); // set mailer to use SMTP
        $mail->Host = "smtp.gmail.com"; // specify main and backup server
        $mail->Port = 465; // set the port to use
        $mail->SMTPAuth = true; // turn on SMTP authentication
        $mail->SMTPSecure = 'ssl';
        $mail->Username = "nghemalao@gmail.com"; // your SMTP username or your gmail username
        $mail->Password = "Huongdan1"; // your SMTP password or your gmail password
        $from = "nghemalao@gmail.com"; // Reply to this email
        $to = $data; // Recipients email ID
        $name = 'WEBMAIL'; // Recipient's name
        $mail->From = $from;
        $mail->FromName = $name; // Name to indicate where the email came from when the recepient received
        $mail->AddAddress($to, $name);
        $mail->CharSet = 'UTF-8';
        $mail->WordWrap = 50; // set word wrap
        $mail->IsHTML(true); // send as HTML
        $mail->Subject = "Mail từ " . strip_tags($data);

        $mail->Body = $this->email_template($data); //HTML Body

        //$mail->SMTPDebug = 2;

        if(!$mail->Send()){
            $isExitsts = false;
        } else {
            $isExitsts = true;
        }
        $this->output->set_status_header(200)->set_output(json_encode(array('isExitsts' => $isExitsts)));
    }

    public function send_mail_all(){
        $ids = $this->input->get('ids');
        $emails = $this->subscribe_model->getById($ids);
        $emails_false = array();
        foreach ($emails as $key => $value) {
            $mail = new PHPMailer();
            $mail->IsSMTP(); // set mailer to use SMTP
            $mail->Host = "smtp.gmail.com"; // specify main and backup server
            $mail->Port = 465; // set the port to use
            $mail->SMTPAuth = true; // turn on SMTP authentication
            $mail->SMTPSecure = 'ssl';
            $mail->Username = "nghemalao@gmail.com"; // your SMTP username or your gmail username
            $mail->Password = "Huongdan1"; // your SMTP password or your gmail password
            $from = "nghemalao@gmail.com"; // Reply to this email
            $to = $value['email']; // Recipients email ID
            $name = 'WEBMAIL'; // Recipient's name
            $mail->From = $from;
            $mail->FromName = $name; // Name to indicate where the email came from when the recepient received
            $mail->AddAddress($to, $name);
            $mail->CharSet = 'UTF-8';
            $mail->WordWrap = 50; // set word wrap
            $mail->IsHTML(true); // send as HTML
            $mail->Subject = "test header";

            $mail->Body = $this->email_template($value['email']); //HTML Body

            if(!$mail->Send()){
                $emails_false[] = $value['email'];
            }

        }
        $this->output->set_status_header(200)->set_output(json_encode($emails_false));
        
    }

    public function email_template($data){
        $message = 'Test body';

        return $message;
    }
}