<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotelfacility_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function select_all() {
		$this->db->select('*');
		$this->db->from('hom_facility_hotel');
		$this->db->order_by('facility_id', 'asc');

		return $this->db->get();
	}

	function insert_data() {
		$data = array(
				'facility_name'			=> trim($this->input->post('name')),
				'facility_class'		=> trim($this->input->post('class')),
			   	'facility_date_update' 	=> date('Y-m-d'),
			   	'facility_time_update' 	=> date('Y-m-d H:i:s')
			);

		$this->db->insert('hom_facility_hotel', $data);
	}

	function update_data() {
		$facility_id     = $this->input->post('id');

		$data = array(
				'facility_name'			=> trim($this->input->post('name')),
				'facility_class'		=> trim($this->input->post('class')),
			   	'facility_date_update' 	=> date('Y-m-d'),
			   	'facility_time_update' 	=> date('Y-m-d H:i:s')
			);

		$this->db->where('facility_id', $facility_id);
		$this->db->update('hom_facility_hotel', $data);
	}

	function delete_data($kode) {
		$this->db->where('facility_id', $kode);
		$this->db->delete('hom_facility_hotel');
	}
}
/* Location: ./application/model/admin/Hotelfacility_model.php */