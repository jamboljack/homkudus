<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rateall_model extends CI_Model 
{
	function __construct() {
		parent::__construct();	
	}
		
	function select_all_room() {
		$this->db->select('*');
		$this->db->from('hom_room');
		$this->db->order_by('room_id', 'asc');
		
		return $this->db->get();
	}

	function select_rate_allotment($room_id, $From, $Ke) {
		$this->db->select('a.*, r.room_name');
		$this->db->from('hom_rate_allotment a');
		$this->db->join('hom_room r', 'a.room_id = r.room_id');
		$this->db->where('a.room_id', $room_id);
		$this->db->where('a.rate_date >=', $From);
		$this->db->where('a.rate_date <=', $Ke);
		$this->db->order_by('a.rate_date', 'asc');
			
		return $this->db->get();
	}

	function select_rate_date($room_id, $Dari) {
		$this->db->select('*');
		$this->db->from('hom_rate_allotment');
		$this->db->where('room_id', $room_id);
		$this->db->where('rate_date', $Dari);
			
		return $this->db->get();
	}

	function insert_new_Date($room_id, $Dari) {
		$data = array(
				'room_id'			=> $room_id,
				'rate_date'			=> $Dari,
				'rate_allotment'	=> 0,
				'rate_close' 		=> 0,
				'rate_price' 		=> 0,
				'user_username' 	=> $this->session->userdata('username'),
			   	'rate_date_update' 	=> date('Y-m-d'),
			   	'rate_time_update' 	=> date('Y-m-d H:i:s')
			);

		$this->db->insert('hom_rate_allotment', $data);
	}

	function update_data_rate_allotment() {
		// Update ID Rate
		$rate_id 	= $this->input->post('idrate');
		$jml_data 	= count($rate_id);
		$tanggal 	= date('Y-m-d');
		$jam     	= date('Y-m-d H:i:s');
		$user 		= $this->session->userdata('username');
		$allotment  = $this->input->post('allotment');
		$rate  		= $this->input->post('rate');

		for ($i=1; $i <= $jml_data; $i++) {
			$status 	= !isset($this->input->post('check')[$rate_id[$i]])?0:1;
			$q = "UPDATE hom_rate_allotment SET rate_allotment = '".$allotment[$i]."', rate_price = '".$rate[$i]."', rate_close = '".$status."', user_username = '".$user."', rate_date_update='".$tanggal."', 
				rate_time_update='".$jam."' WHERE rate_id= " . $rate_id[$i];

			$this->db->query($q);
    	}
	}
}
/* Location: ./application/models/admin/Rateall_model.php */