<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in'))
		{
			redirect('dashboard', 'refresh');
			return;
		}

		$this->load->view('Pages/login');
	}

	public function processlogin()
	{
		$username = trim((string) $this->input->post('username'));
		$password = (string) $this->input->post('password');

		$user = $this->auth_model->get_user_by_username($username);

		if ($user === NULL || ! password_verify($password, $user->user_password))
		{
			$this->session->set_flashdata('login_error', 'Username atau password salah');
			redirect('auth', 'refresh');
			return;
		}

		$this->session->set_userdata(array(
			'user_id'    => (int) $user->user_id,
			'user_name'  => $user->user_name,
			'role_id'    => (int) $user->role_id,
			'role_name'  => $user->role_name,
			'warehouse'  => $user->warehouse_name,
			'logged_in'  => TRUE,
		));

		redirect('dashboard', 'refresh');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth', 'refresh');
	}
}
