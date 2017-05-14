<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotel_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function select_detail($contact_id = 1) {
		$this->db->select('*');
		$this->db->from('hom_contact');
		$this->db->where('contact_id', $contact_id);

		return $this->db->get();
	}

	function select_social() {
		$this->db->select('*');
		$this->db->from('hom_social');
		$this->db->order_by('social_name', 'asc');

		return $this->db->get();
	}

	function select_facility() {
		$this->db->select('*');
		$this->db->from('hom_facility_hotel');
		$this->db->order_by('facility_id', 'asc');

		return $this->db->get();
	}

	function update_data_hotel($contact_id = 1) {
		$data = array(
				'contact_name'			=> trim($this->input->post('name')),
				'contact_star'			=> $this->input->post('star'),
				'contact_address'		=> trim($this->input->post('address')),
				'contact_city'			=> trim($this->input->post('city')),
				'contact_zipcode'		=> trim($this->input->post('zipcode')),
				'contact_phone'			=> trim($this->input->post('phone')),
				'contact_fax'			=> trim($this->input->post('fax')),
				'contact_email'			=> trim($this->input->post('email')),
				'contact_web'			=> trim($this->input->post('website')),
				'contact_room'			=> $this->input->post('room'),
				'contact_tax'			=> $this->input->post('lstTax'),
				'contact_maxstay'		=> $this->input->post('maxstay'),
				'contact_desc'			=> trim($this->input->post('desc')),
			   	'contact_date_update' 	=> date('Y-m-d'),
			   	'contact_time_update' 	=> date('Y-m-d H:i:s')
			);

		$this->db->where('contact_id', $contact_id);
		$this->db->update('hom_contact', $data);
	}

	function update_data_additional($contact_id = 1) {
		$data = array(
				'contact_late_ci'		=> $this->input->post('chkLate'),
				'contact_transport'		=> $this->input->post('chkTransport'),
				'contact_smooking'		=> $this->input->post('chkSmooking'),
				'contact_nonsmooking'	=> $this->input->post('chkNonSmooking'),
			   	'contact_date_update' 	=> date('Y-m-d'),
			   	'contact_time_update' 	=> date('Y-m-d H:i:s')
			);

		$this->db->where('contact_id', $contact_id);
		$this->db->update('hom_contact', $data);
	}

	function insert_data_social() {
		$data = array(
				'social_name'			=> $this->input->post('name'),
				'social_class'			=> $this->input->post('lstClass'),
				'social_url'			=> $this->input->post('url'),
				'user_username' 		=> $this->session->userdata('username'),
			   	'social_date_update' 	=> date('Y-m-d'),
			   	'social_time_update' 	=> date('Y-m-d H:i:s')
			);

		$this->db->insert('hom_social', $data);
	}

	function update_data_social() {
		$social_id  = $this->input->post('id');

		$data = array(
				'social_name'			=> $this->input->post('name'),
				'social_class'			=> $this->input->post('lstClass'),
				'social_url'			=> $this->input->post('url'),
				'user_username' 		=> $this->session->userdata('username'),
			   	'social_date_update' 	=> date('Y-m-d'),
			   	'social_time_update' 	=> date('Y-m-d H:i:s')
			);

		$this->db->where('social_id', $social_id);
		$this->db->update('hom_social', $data);
	}

	function delete_data_social($kode) {
		$this->db->where('social_id', $kode);
		$this->db->delete('hom_social');
	}

	function update_data_tripadvisor($contact_id = 1) {
		$data = array(
				'contact_tripadvisor'	=> $this->input->post('tripdesc'),
				'contact_date_update' 	=> date('Y-m-d'),
			   	'contact_time_update' 	=> date('Y-m-d H:i:s')
			);

		$this->db->where('contact_id', $contact_id);
		$this->db->update('hom_contact', $data);
	}

	function update_data_facility() {
		$id = $this->input->post('id');
		for($i=0; $i<count($id); $i++){
			$status = !isset($this->input->post('check')[$id[$i]])?0:1;
			$q = "UPDATE hom_facility SET facility_check='".$status."' WHERE facility_id= " . $id[$i];
			$this->db->query($q);
    	} 				
	}
}
/* Location: ./application/model/admin/Hotel_model.php */