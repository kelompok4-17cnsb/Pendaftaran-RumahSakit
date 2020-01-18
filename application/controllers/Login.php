<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        // if(!$this->session->userdata('status')){
        //     redirect(base_url('login'));
        // }
		$this->load->model('User_Model');
		$this->load->library('form_validation');
	}

	function index(){

		if ($this->session->userdata('login')) {
			redirect(base_url(''));
		} else {
			$this->load->view('login');
		}
	}
 
	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->User_Model->cek_login("tb_user",$where);
		if($cek->num_rows() > 0){
 
			$data_session = array(
				'username' => $username,
				'login' => TRUE,
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url(''));
 
		}else{
			$message = $this->session->set_flashdata('msg', 'Username / Password Salah!');
			redirect(base_url('login'), $message);
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

	private function _rules()
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
	}
}