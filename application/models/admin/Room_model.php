<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room_model extends CI_Model 
{
	function __construct() {
		parent::__construct();	
	}
		
	function select_all() {
		$this->db->select('*');
		$this->db->from('hom_room');
		$this->db->order_by('room_id', 'asc');
		
		return $this->db->get();
	}

	function select_room_facility() {
		$this->db->select('*');
		$this->db->from('hom_facility_room');
		$this->db->order_by('facility_id', 'asc');
		
		return $this->db->get();
	}
	
	function insert_data() {
		if (!empty($_FILES['userfile']['name'])) {
			$data = array(
					'room_name'			=> strtoupper(trim($this->input->post('name'))),
					'room_name_seo'		=> seo_title(trim($this->input->post('name'))),
					'room_size'			=> $this->input->post('size'),
					'room_desc'			=> trim($this->input->post('desc')),
		   			'room_image' 		=> $this->upload->file_name,
		   			'room_index'		=> $this->input->post('index'),
		   			'room_adult'		=> $this->input->post('adult'),
		   			'room_child'		=> $this->input->post('child'),
		   			'user_username' 	=> $this->session->userdata('username'),
		   			'room_date_update' 	=> date('Y-m-d'),
		   			'room_time_update' 	=> date('Y-m-d H:i:s')
					);
		} else {
			$data = array(
					'room_name'			=> strtoupper(trim($this->input->post('name'))),
					'room_name_seo'		=> seo_title(trim($this->input->post('name'))),
					'room_size'			=> $this->input->post('size'),
					'room_desc'			=> trim($this->input->post('desc')),
		   			'room_index'		=> $this->input->post('index'),
		   			'room_adult'		=> $this->input->post('adult'),
		   			'room_child'		=> $this->input->post('child'),
		   			'user_username' 	=> $this->session->userdata('username'),
		   			'room_date_update' 	=> date('Y-m-d'),
		   			'room_time_update' 	=> date('Y-m-d H:i:s')
					);
		}

		$this->db->insert('hom_room', $data);
		
		$id 		= $this->db->insert_id(); // Cek ID Room Baru, dimasukkan ke Amenities/Fasilitas Room
		$check_id 	= $this->input->post('id'); // ID Checkbox
		for($i=0; $i<count($check_id); $i++) {
			$tanggal = date('Y-m-d');
			$jam     = date('Y-m-d H:i:s'); 
			$status = !isset($this->input->post('check')[$check_id[$i]])?0:1;
			$q = "INSERT hom_room_facility_check (room_id,facility_id,froom_checked,froom_date_update,froom_time_update)
			 	VALUES ('$id', '$check_id[$i]', '$status', '$tanggal', '$jam')";
			$this->db->query($q);
    	}
	}

	function select_detail($room_id) {
		$this->db->select('*');
		$this->db->from('hom_room');
		$this->db->where('room_id', $room_id);
		
		return $this->db->get();
	}

	function select_room_facility_edit($room_id) {
		$this->db->select('c.*, f.facility_name');
		$this->db->from('hom_room_facility_check c');
		$this->db->join('hom_facility_room f', 'c.facility_id = f.facility_id');
		$this->db->where('c.room_id', $room_id);
		$this->db->order_by('c.facility_id', 'asc');
		
		return $this->db->get();
	}

	function update_data() {
		$room_id     = $this->input->post('id');

		if (!empty($_FILES['userfile']['name'])) {
			$data = array(
					'room_name'			=> strtoupper(trim($this->input->post('name'))),
					'room_name_seo'		=> seo_title(trim($this->input->post('name'))),
					'room_size'			=> $this->input->post('size'),
					'room_desc'			=> trim($this->input->post('desc')),
		   			'room_image' 		=> $this->upload->file_name,
		   			'room_index'		=> $this->input->post('index'),
		   			'room_adult'		=> $this->input->post('adult'),
		   			'room_child'		=> $this->input->post('child'),
		   			'user_username' 	=> $this->session->userdata('username'),
		   			'room_date_update' 	=> date('Y-m-d'),
		   			'room_time_update' 	=> date('Y-m-d H:i:s')
					);
		} else {
			$data = array(
					'room_name'			=> strtoupper(trim($this->input->post('name'))),
					'room_name_seo'		=> seo_title(trim($this->input->post('name'))),
					'room_size'			=> $this->input->post('size'),
					'room_desc'			=> trim($this->input->post('desc')),
		   			'room_index'		=> $this->input->post('index'),
		   			'room_adult'		=> $this->input->post('adult'),
		   			'room_child'		=> $this->input->post('child'),
		   			'user_username' 	=> $this->session->userdata('username'),
		   			'room_date_update' 	=> date('Y-m-d'),
		   			'room_time_update' 	=> date('Y-m-d H:i:s')
					);
		}

		$this->db->where('room_id', $room_id);
		$this->db->update('hom_room', $data);

		// Update Fasilitas dan Amenities
		$check_id = $this->input->post('idf');
		for($i=0; $i<count($check_id); $i++) {
			$tanggal = date('Y-m-d');
			$jam     = date('Y-m-d H:i:s');
			$status = !isset($this->input->post('check')[$check_id[$i]])?0:1;
			$q = "UPDATE hom_room_facility_check SET froom_checked='".$status."', froom_date_update='".$tanggal."',
					froom_time_update='".$jam."' WHERE facility_id= " . $check_id[$i];
			$this->db->query($q);
    	}
	}

	function delete_data($kode) {
		$this->db->where('room_id', $kode);
		$this->db->delete('hom_room');
	}

	function select_all_image($room_id) {
		$this->db->select('*');
		$this->db->from('hom_room_picture');
		$this->db->where('room_id', $room_id);
		
		return $this->db->get();
	}

	function insert_data_picture() {
		if (!empty($_FILES['userfile']['name'])) {
			$data = array(
					'room_id'				=> $this->uri->segment(4),
		   			'picture_image' 		=> $this->upload->file_name,
		   			'picture_show'			=> $this->input->post('lstShow'),
		   			'user_username' 		=> $this->session->userdata('username'),
		   			'picture_date_update' 	=> date('Y-m-d'),
		   			'picture_time_update' 	=> date('Y-m-d H:i:s')
					);
		} else {
			$data = array(
					'room_id'				=> $this->uri->segment(4),
		   			'picture_show'			=> $this->input->post('lstShow'),
		   			'user_username' 		=> $this->session->userdata('username'),
		   			'picture_date_update' 	=> date('Y-m-d'),
		   			'picture_time_update' 	=> date('Y-m-d H:i:s')
					);
		}

		$this->db->insert('hom_room_picture', $data);
	}

	function update_data_picture() {
		$picture_id     = $this->input->post('id');

		if (!empty($_FILES['userfile']['name'])) {
			$data = array(
					'room_id'				=> $this->uri->segment(4),
		   			'picture_image' 		=> $this->upload->file_name,
		   			'picture_show'			=> $this->input->post('lstShow'),
		   			'user_username' 		=> $this->session->userdata('username'),
		   			'picture_date_update' 	=> date('Y-m-d'),
		   			'picture_time_update' 	=> date('Y-m-d H:i:s')
					);
		} else {
			$data = array(
					'room_id'				=> $this->uri->segment(4),
		   			'picture_show'			=> $this->input->post('lstShow'),
		   			'user_username' 		=> $this->session->userdata('username'),
		   			'picture_date_update' 	=> date('Y-m-d'),
		   			'picture_time_update' 	=> date('Y-m-d H:i:s')
					);
		}

		$this->db->where('picture_id', $picture_id);
		$this->db->update('hom_room_picture', $data);
	}

	function delete_data_picture($kode) {
		$this->db->where('picture_id', $kode);
		$this->db->delete('hom_room_picture');
	}
}
/* Location: ./application/models/admin/Room_model.php */