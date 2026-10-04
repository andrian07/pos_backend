<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Firebase\JWT\JWT;

class Jwt_lib {

	protected $ci;
	protected $secret;
	protected $algo;
	protected $expire;
	protected $issuer;

	public function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->config->load('jwt');

		$this->secret = $this->ci->config->item('jwt_secret');
		$this->algo   = $this->ci->config->item('jwt_algo');
		$this->expire = (int) $this->ci->config->item('jwt_expire');
		$this->issuer = $this->ci->config->item('jwt_issuer');
	}

	public function generate_token(array $payload)
	{
		$now = time();

		$claims = array_merge($payload, array(
			'iss' => $this->issuer,
			'iat' => $now,
			'exp' => $now + $this->expire,
		));

		return JWT::encode($claims, $this->secret, $this->algo);
	}

	public function validate_token($token)
	{
		return JWT::decode($token, $this->secret, array($this->algo));
	}
}
