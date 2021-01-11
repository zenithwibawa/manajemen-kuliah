<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

  public function __construct(){
  parent::__construct();
  $this->load->model('Mahasiswa_model');
  $this->load->helper('Access');
  login_access();
  }

  public function index(){
    $title['string'] = 'Dashboard | Mahasiswa';
    $sidebar['user'] = $this->Mahasiswa_model->getMahasiswaDataAPI($this->session->userdata('email'));
    
    $this->load->view('template/header', $title);
    $this->load->view('template/navbar');
    $this->load->view('template/sidebar_mahasiswa', $sidebar);
    $this->load->view('mahasiswa/dashboard');
    $this->load->view('template/footer');
  }

}