<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Base controller for JWT-protected JSON endpoints. Controllers under
 * application/controllers/api/ that need an authenticated user should
 * extend this instead of CI_Controller.
 */
class API_Controller extends CI_Controller {

	protected $auth_user;

	public function __construct()
	{
		parent::__construct();
		header('Content-Type: application/json');
		$this->load->library('jwt_lib');
		$this->auth_user = $this->_authenticate();
	}

	private function _authenticate()
	{
		$header = $this->input->get_request_header('Authorization', TRUE);

		if (empty($header) || stripos($header, 'Bearer ') !== 0)
		{
			$this->_unauthorized('Token tidak ditemukan');
		}

		$token = trim(substr($header, 7));

		try
		{
			$decoded = $this->jwt_lib->validate_token($token);
			return (array) $decoded;
		}
		catch (Exception $e)
		{
			$this->_unauthorized('Token tidak valid atau sudah kedaluwarsa');
		}
	}

	protected function _unauthorized($message)
	{
		http_response_code(401);
		echo json_encode(array('code' => 401, 'message' => $message));
		exit;
	}
}
