<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facility_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function select_all() {
		$this->db->select('*');
		$this->db->from('hom_facility');
		$this->db->order_by('facility_id', 'asc');

		return $this->db->get();
	}

	function select_detail($facility_id) {
		$this->db->select('*');
		$this->db->from('hom_facility');
		$this->db->where('facility_id', $facility_id);

		return $this->db->get();
	}

	function insert_data() {
		if (!empty($_FILES['userfile']['name'])) {
			$data = array(
					'facility_name'			=> trim($this->input->post('name')),
					'facility_name_seo'		=> seo_title(trim($this->input->post('name'))),
					'facility_desc'			=> trim($this->input->post('desc')),
					'facility_image' 		=> $this->upload->file_name,
				   	'facility_date_update' 	=> date('Y-m-d'),
				   	'facility_time_update' 	=> date('Y-m-d H:i:s')
				);
		} else {
			$data = array(
					'facility_name'			=> trim($this->input->post('name')),
					'facility_name_seo'		=> seo_title(trim($this->input->post('name'))),
					'facility_desc'			=> trim($this->input->post('desc')),
				   	'facility_date_update' 	=> date('Y-m-d'),
				   	'facility_time_update' 	=> date('Y-m-d H:i:s')
				);
		}

		$this->db->insert('hom_facility', $data);
	}

	function update_data() {
		$facility_id     = $this->input->post('id');

		if (!empty($_FILES['userfile']['name'])) {
			$data = array(
					'facility_name'			=> trim($this->input->post('name')),
					'facility_name_seo'		=> seo_title(trim($this->input->post('name'))),
					'facility_desc'			=> trim($this->input->post('desc')),
					'facility_image' 		=> $this->upload->file_name,
				   	'facility_date_update' 	=> date('Y-m-d'),
				   	'facility_time_update' 	=> date('Y-m-d H:i:s')
				);
		} else {
			$data = array(
					'facility_name'			=> trim($this->input->post('name')),
					'facility_name_seo'		=> seo_title(trim($this->input->post('name'))),
					'facility_desc'			=> trim($this->input->post('desc')),
				   	'facility_date_update' 	=> date('Y-m-d'),
				   	'facility_time_update' 	=> date('Y-m-d H:i:s')
				);
		}

		$this->db->where('facility_id', $facility_id);
		$this->db->update('hom_facility', $data);
	}

	function delete_data($kode) {
		$this->db->where('facility_id', $kode);
		$this->db->delete('hom_facility');
	}
}
/* Location: ./application/model/admin/Facility_model.php */