<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth_model extends CI_Model {

	public function get_user_by_username($username)
	{
		$this->db->select('ms_user.user_id, ms_user.user_name, ms_user.user_password,
			ms_role.role_id, ms_role.role_name,
			ms_warehouse.warehouse_id, ms_warehouse.warehouse_name');
		$this->db->from('ms_user');
		$this->db->join('ms_role', 'ms_user.user_role = ms_role.role_id');
		$this->db->join('ms_warehouse', 'ms_user.user_branch = ms_warehouse.warehouse_id');
		$this->db->where('ms_user.user_name', $username);
		$this->db->where('ms_user.is_active', 'Y');
		$this->db->where('ms_role.is_active', 'Y');

		return $this->db->get()->row();
	}
}
