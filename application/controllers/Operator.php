<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends CI_Controller {

    public function __construct(){
		parent::__construct();
    $this->load->model('Operator_model');
    $this->load->helper('Access');
		login_access();
    }
    
    public function index(){
        $email = $this->session->userdata('email');

        $title['string'] = 'Dashboard';
        $data['user'] = $this->Operator_model->getOperatorDataAPI($email);

        $this->load->view('template/header', $title);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar', $data);
        $this->load->view('operator/dashboard');
        $this->load->view('template/footer');
    }

}