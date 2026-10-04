<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ( ! $this->session->userdata('logged_in'))
		{
			redirect('auth', 'refresh');
		}
	}

	public function index()
	{
		$data = array(
			'user_name' => $this->session->userdata('user_name'),
			'role_name' => $this->session->userdata('role_name'),
			'warehouse' => $this->session->userdata('warehouse'),
		);

		$this->load->view('Pages/dashboard', $data);
	}
}
