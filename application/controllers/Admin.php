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
    $sidebar['user'] = $this->Admin_model->getAdminDataAPI($this->session->userdata('email'));
    
    $sidebar['user']['data']['nama'] = 'Admin';
    $sidebar['user']['data']['img'] = 'http://localhost/server-manajemen-kuliah/assets/img/admin.jpg';
    $this->load->view('template/header', $title);
    $this->load->view('template/navbar');
    $this->load->view('template/sidebar_admin', $sidebar);
    $this->load->view('admin/dashboard');
    $this->load->view('template/footer');
  }

  public function manajemen_operator(){
    $title['string'] = 'Operator Administration | Admin';
    $sidebar['user'] = $this->Admin_model->getAdminDataAPI($this->session->userdata('email'));
    
    $sidebar['user']['data']['nama'] = 'Admin';
    $sidebar['user']['data']['img'] = 'http://localhost/server-manajemen-kuliah/assets/img/admin.jpg';

    $data['operator'] = $this->Admin_model->getOperatorDataAPI();
    $data['department'] = $this->Admin_model->getDepartmentDataAPI();
    $this->load->view('template/header', $title);
    $this->load->view('template/navbar');
    $this->load->view('template/sidebar_admin', $sidebar);
    $this->load->view('admin/operator', $data);
    $this->load->view('template/footer');
  }

  public function add_operator(){
    $nama = $this->input->post('nama');
    $email = $this->input->post('email');
    $jk = $this->input->post('jk');
    $tgl = $this->input->post('tgl');
    $department = $this->input->post('department');
    $password = $this->input->post('password');

    $this->load->model('Auth_model');
    $checkemail = $this->Auth_model->checkEmailIsUniqueAPI($email, $id_user=null);
    if ($checkemail['status'] == true){
      $add_operator = $this->Admin_model->addOperatorDataAPI($nama, $email, $jk, $tgl, $department, $password);
      if ($add_operator['status'] == true){
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">'.$add_operator['message'].'</div>');
        redirect('admin/manajemen_operator');
      }
      else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$add_operator['message'].'</div>');
        redirect('admin/manajemen_operator');
      }
    }
    else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$checkemail['message'].'</div>');
      redirect('admin/manajemen_operator');
    }
  }

  public function edit_operator(){
    $id_user = $this->input->post('id_user');
    $id_operator = $this->input->post('id_operator');
    $nama = $this->input->post('nama');
    $email = $this->input->post('email');
    $jk = $this->input->post('jk');
    $tgl = $this->input->post('tgl');
    $department = $this->input->post('department');
    $password = $this->input->post('password');

    $this->load->model('Auth_model');
    $checkemail = $this->Auth_model->checkEmailIsUniqueAPI($email, $id_user);
    if ($checkemail['status'] == true){
      $edit_operator = $this->Admin_model->editOperatorDataAPI($id_operator, $nama, $email, $jk, $tgl, $department, $password);
      if ($edit_operator['status'] == true){
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">'.$edit_operator['message'].'</div>');
        redirect('admin/manajemen_operator');
      }
      else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$edit_operator['message'].'</div>');
        redirect('admin/manajemen_operator');
      }
    }
    else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$checkemail['message'].'</div>');
      redirect('admin/manajemen_operator');
    }
  }

  public function delete_operator(){
    $id_operator = $this->input->post('id_operator');
   
    $delete_operator = $this->Admin_model->deleteOperatorDataAPI($id_operator);
    if ($delete_operator['status'] == true){
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">'.$delete_operator['message'].'</div>');
      redirect('admin/manajemen_operator');
    }
    else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$delete_operator['message'].'</div>');
      redirect('admin/manajemen_operator');
    }
  }

}