<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model 
{
	function __construct() {
		parent::__construct();	
	}
		
	function select_all() {
		$this->db->select('*');
		$this->db->from('hom_users');
		$this->db->order_by('user_name', 'asc');
		
		return $this->db->get();
	}
		
	function insert_data() {
		if (!empty($_FILES['userfile']['name'])) {
			$data = array(
					'user_username'		=> trim($this->input->post('username')),
					'user_password'		=> sha1(trim($this->input->post('password'))),
					'user_name'			=> trim(strtoupper($this->input->post('name'))),
					'user_dept'			=> trim(strtoupper($this->input->post('dept'))),
					'user_email'		=> $this->input->post('email'),
					'user_avatar' 		=> $this->upload->file_name,
				   	'user_date_update' 	=> date('Y-m-d'),
				   	'user_time_update' 	=> date('Y-m-d H:i:s')
				);
		} else {
			$data = array(
					'user_username'		=> trim($this->input->post('username')),
					'user_password'		=> sha1(trim($this->input->post('password'))),
					'user_name'			=> trim(strtoupper($this->input->post('name'))),
					'user_dept'			=> trim(strtoupper($this->input->post('dept'))),
					'user_email'		=> $this->input->post('email'),
				   	'user_date_update' 	=> date('Y-m-d'),
				   	'user_time_update' 	=> date('Y-m-d H:i:s')
				);
		}

		$this->db->insert('hom_users', $data);
	}

	function update_data() {
		$user_username     	= $this->input->post('id');
		$password 			= trim($this->input->post('password'));

		if (empty($password)) {
			if (!empty($_FILES['userfile']['name'])) {
				$data = array(
					'user_name'			=> trim(strtoupper($this->input->post('name'))),
					'user_dept'			=> trim(strtoupper($this->input->post('dept'))),
					'user_email'		=> $this->input->post('email'),
					'user_avatar' 		=> $this->upload->file_name,
				   	'user_date_update' 	=> date('Y-m-d'),
				   	'user_time_update' 	=> date('Y-m-d H:i:s')
				);
			} else {
				$data = array(
					'user_name'			=> trim(strtoupper($this->input->post('name'))),
					'user_dept'			=> trim(strtoupper($this->input->post('dept'))),
					'user_email'		=> $this->input->post('email'),
				   	'user_date_update' 	=> date('Y-m-d'),
				   	'user_time_update' 	=> date('Y-m-d H:i:s')
				);
			}			
		} else {
			if (!empty($_FILES['userfile']['name'])) {
				$data = array(
					'user_password' 	=> sha1(trim($this->input->post('password'))),
					'user_name'			=> trim(strtoupper($this->input->post('name'))),
					'user_dept'			=> trim(strtoupper($this->input->post('dept'))),
					'user_email'		=> $this->input->post('email'),
					'user_avatar' 		=> $this->upload->file_name,
				   	'user_date_update' 	=> date('Y-m-d'),
				   	'user_time_update' 	=> date('Y-m-d H:i:s')
				);
			} else {
				$data = array(
					'user_password' 	=> sha1(trim($this->input->post('password'))),
					'user_name'			=> trim(strtoupper($this->input->post('name'))),
					'user_dept'			=> trim(strtoupper($this->input->post('dept'))),
					'user_email'		=> $this->input->post('email'),
				   	'user_date_update' 	=> date('Y-m-d'),
				   	'user_time_update' 	=> date('Y-m-d H:i:s')
				);
			}
		}

		$this->db->where('user_username', $user_username);
		$this->db->update('hom_users', $data);
	}
}
/* Location: ./application/models/admin/Users_model.php */