<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}

	function select_slider() {
		$this->db->select('*');
		$this->db->from('hom_slider');
		$this->db->order_by('slider_id', 'asc');
		
		return $this->db->get();
	}

	function select_room() {
		$this->db->select('*');
		$this->db->from('hom_room');
		$this->db->order_by('room_index', 'asc');
		
		return $this->db->get();
	}

	function select_facility() {
		$this->db->select('*');
		$this->db->from('hom_facility');
		$this->db->order_by('facility_id', 'asc');
		
		return $this->db->get();
	}
}
/* Location: ./application/model/Home_model.php */