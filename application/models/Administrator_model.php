<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function check_user_account($username, $password) {
		$this->db->select('*');
		$this->db->from('hom_users');
		$this->db->where('user_username', $username);
		$this->db->where('user_password', $password);

		return $this->db->get();
	}

	function get_user($username) {
		$this->db->select('*');
		$this->db->from('hom_users');
		$this->db->where('user_username', $username);

		return $this->db->get();
	}
}
/* Location: ./application/model/Administrator_model.php */