<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type_model extends CI_Model 
{
	function __construct() {
		parent::__construct();	
	}
		
	function select_all() {
		$this->db->select('*');
		$this->db->from('hom_type');
		$this->db->order_by('type_id', 'asc');
		
		return $this->db->get();
	}
		
	function insert_data() {
		$data = array(
				'type_name'			=> trim(strtoupper($this->input->post('name'))),
				'user_username' 	=> $this->session->userdata('username'),
			   	'type_date_update' 	=> date('Y-m-d'),
			   	'type_time_update' 	=> date('Y-m-d H:i:s')
			);

		$this->db->insert('hom_type', $data);
	}

	function update_data() {
		$type_id     = $this->input->post('id');

		$data = array(
				'type_name'			=> trim(strtoupper($this->input->post('name'))),
				'user_username' 	=> $this->session->userdata('username'),
			   	'type_date_update' 	=> date('Y-m-d'),
			   	'type_time_update' 	=> date('Y-m-d H:i:s')
			);

		$this->db->where('type_id', $type_id);
		$this->db->update('hom_type', $data);
	}

	function delete_data($kode) {
		$this->db->where('type_id', $kode);
		$this->db->delete('hom_type');
	}		
}
/* Location: ./application/models/admin/Type_model.php */