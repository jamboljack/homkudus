<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurant_model extends CI_Model 
{
	function __construct() {
		parent::__construct();	
	}
		
	function select_all() {
		$this->db->select('r.*, t.type_name');
		$this->db->from('hom_restaurant r');
		$this->db->join('hom_type t', 'r.type_id = t.type_id');
		$this->db->order_by('r.restaurant_name', 'asc');
		
		return $this->db->get();
	}

	function select_type() {
		$this->db->select('*');
		$this->db->from('hom_type');
		$this->db->order_by('type_name', 'asc');
		
		return $this->db->get();
	}
		
	function insert_data() {
		if (!empty($_FILES['userfile']['name'])) {
			$data = array(
					'type_id'					=> $this->input->post('lstType'),
					'restaurant_name'			=> trim(strtoupper($this->input->post('name'))),
					'restaurant_desc'			=> trim($this->input->post('desc')),
					'restaurant_price_insert'	=> $this->input->post('price'),
					'restaurant_price_delete'	=> $this->input->post('pricedisc'),
					'restaurant_disc'			=> $this->input->post('disc'),
					'restaurant_image' 			=> $this->upload->file_name,
					'user_username' 			=> $this->session->userdata('username'),
				   	'restaurant_date_update' 	=> date('Y-m-d'),
				   	'restaurant_time_update' 	=> date('Y-m-d H:i:s')
				);
		} else {
			$data = array(
					'type_id'					=> $this->input->post('lstType'),
					'restaurant_name'			=> trim(strtoupper($this->input->post('name'))),
					'restaurant_desc'			=> trim($this->input->post('desc')),
					'restaurant_price_insert'	=> $this->input->post('price'),
					'restaurant_price_delete'	=> $this->input->post('pricedisc'),
					'restaurant_disc'			=> $this->input->post('disc'),
					'user_username' 			=> $this->session->userdata('username'),
				   	'restaurant_date_update' 	=> date('Y-m-d'),
				   	'restaurant_time_update' 	=> date('Y-m-d H:i:s')
				);
		}

		$this->db->insert('hom_restaurant', $data);
	}

	function update_data() {
		$restaurant_id     = $this->input->post('id');

		if (!empty($_FILES['userfile']['name'])) {
			$data = array(
					'type_id'					=> $this->input->post('lstType'),
					'restaurant_name'			=> trim(strtoupper($this->input->post('name'))),
					'restaurant_desc'			=> trim($this->input->post('desc')),
					'restaurant_price_insert'	=> $this->input->post('price'),
					'restaurant_price_delete'	=> $this->input->post('pricedisc'),
					'restaurant_disc'			=> $this->input->post('disc'),
					'restaurant_image' 			=> $this->upload->file_name,
					'user_username' 			=> $this->session->userdata('username'),
				   	'restaurant_date_update' 	=> date('Y-m-d'),
				   	'restaurant_time_update' 	=> date('Y-m-d H:i:s')
				);
		} else {
			$data = array(
					'type_id'					=> $this->input->post('lstType'),
					'restaurant_name'			=> trim(strtoupper($this->input->post('name'))),
					'restaurant_desc'			=> trim($this->input->post('desc')),
					'restaurant_price_insert'	=> $this->input->post('price'),
					'restaurant_price_delete'	=> $this->input->post('pricedisc'),
					'restaurant_disc'			=> $this->input->post('disc'),
					'user_username' 			=> $this->session->userdata('username'),
				   	'restaurant_date_update' 	=> date('Y-m-d'),
				   	'restaurant_time_update' 	=> date('Y-m-d H:i:s')
				);
		}

		$this->db->where('restaurant_id', $restaurant_id);
		$this->db->update('hom_restaurant', $data);
	}

	function delete_data($kode) {
		$this->db->where('restaurant_id', $kode);
		$this->db->delete('hom_restaurant');
	}		
}
/* Location: ./application/models/admin/Restaurant_model.php */