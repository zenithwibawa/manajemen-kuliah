<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->model('Mahasiswa_model');
    }
    
    public function index(){
        $email = $this->session->userdata('email');

        $title['string'] = 'Dashboard';
        $data['user'] = $this->Mahasiswa_model->getMahasiswaDataAPI($email);

        $this->load->view('template/header', $title);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar', $data);
        $this->load->view('mahasiswa/dashboard');
        $this->load->view('template/footer');
    }

}