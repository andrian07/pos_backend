<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		header('Content-Type: application/json');
		$this->load->model('auth_model');
		$this->load->library('jwt_lib');
	}

	public function login()
	{
		if ($this->input->method() !== 'post')
		{
			return $this->_respond(405, 'Method tidak diizinkan');
		}

		$username = trim((string) $this->input->post('username'));
		$password = (string) $this->input->post('password');

		if ($username === '' || $password === '')
		{
			return $this->_respond(400, 'Username dan password wajib diisi');
		}

		$user = $this->auth_model->get_user_by_username($username);

		if ($user === NULL || ! password_verify($password, $user->user_password))
		{
			return $this->_respond(401, 'Username atau password salah');
		}

		$token = $this->jwt_lib->generate_token(array(
			'sub'        => (int) $user->user_id,
			'user_name'  => $user->user_name,
			'role_id'    => (int) $user->role_id,
			'role_name'  => $user->role_name,
			'warehouse'  => $user->warehouse_name,
		));

		return $this->_respond(200, 'Sukses login', array(
			'token' => $token,
			'user'  => array(
				'id'      => (int) $user->user_id,
				'name'    => $user->user_name,
				'role'    => $user->role_name,
				'outlet'  => $user->warehouse_name,
			),
		));
	}

	private function _respond($code, $message, $data = null)
	{
		http_response_code($code === 200 ? 200 : $code);
		echo json_encode(array('code' => $code, 'message' => $message, 'data' => $data));
	}
}
