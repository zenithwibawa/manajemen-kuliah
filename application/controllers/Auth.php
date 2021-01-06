<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Auth_model');
	}

	public function index(){ //login
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false){
			$title['string'] = 'Sistem Manajemen | Login';
			$this->load->view('template/auth_header', $title);
			$this->load->view('auth/login');
			$this->load->view('template/auth_footer');
		}
		else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$login = $this->Auth_model->getLoginAPI($email, $password);
			if ($login['status'] == true){ // login success
				$this->session->set_userdata($login['data']);
				redirect(strtolower($login['data']['role']));
			}
			else { // error
				$this->session->set_flashdata('email', $email);
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$login['message'].'</div>');
				redirect('auth');
			}
		}
	}

	public function forbidden(){
		$title['string'] = 'Access Forbidden';
		$this->load->view('auth/forbidden', $title);
	}

	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logged out</div>');
		redirect('auth');
	}

	/*public function register(){
		$this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false){
			$data['title'] = 'Sistem Manajemen | Register';
			$this->load->view('template/auth_header', $data);
			$this->load->view('auth/register');
			$this->load->view('template/auth_footer');
		}
		else {
			$data['fullname'] = htmlspecialchars($this->input->post('fullname'), true);
			$data = [
				'email' => htmlspecialchars($this->input->post('email'), true),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role' => 'Mahasiswa',
				'date_created' => date('m/d/Y h:i:s a', time()),
				'status' => 0
			];
		}
		// belum pakai model dan fullname belum di insert. Flow: data harus diinputkan ke dalam tabel user terlebih dahulu lalu gunakan id_user tersebut untuk keperluan penambahan mhs
		$this->db->insert('user', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil dibuat. Silahkan check email untuk melakukan aktivasi</div>');
		redirect('auth');
	}*/
	
}