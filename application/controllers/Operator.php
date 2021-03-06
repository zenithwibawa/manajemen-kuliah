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
    $title['string'] = 'Dashboard | Operator';
    $sidebar['user'] = $this->Operator_model->getOperatorDataAPI($this->session->userdata('email'));

    $this->load->view('template/header', $title);
    $this->load->view('template/navbar');
    $this->load->view('template/sidebar_operator', $sidebar);
    $this->load->view('operator/dashboard');
    $this->load->view('template/footer');
  }

}