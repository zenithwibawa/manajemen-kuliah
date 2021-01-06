<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

  public function __construct(){
  parent::__construct();
  $this->load->model('Admin_model');
  $this->load->helper('Access');
  login_access();
  }

  public function index(){
    $title['string'] = 'Dashboard | Admin';
    $data['user'] = $this->Admin_model->getAdminDataAPI($this->session->userdata('email'));
    
    $data['user']['data']['nama'] = 'Admin';
    $data['user']['data']['img'] = 'http://localhost/server-manajemen-kuliah/assets/img/admin.jpg';
    $this->load->view('template/header', $title);
    $this->load->view('template/navbar');
    $this->load->view('template/sidebar_admin', $data);
    $this->load->view('admin/dashboard');
    $this->load->view('template/footer');
  }

}