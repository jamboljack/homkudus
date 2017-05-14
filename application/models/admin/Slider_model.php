<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends CI_Model 
{
	function __construct() {
		parent::__construct();	
	}
		
	function select_all() {
		$this->db->select('*');
		$this->db->from('hom_slider');
		$this->db->order_by('slider_id', 'asc');
		
		return $this->db->get();
	}
		
	function insert_data() {
		if (!empty($_FILES['userfile']['name'])) {
			$data = array(
					'slider_title'			=> trim($this->input->post('title')),
		   			'slider_image' 			=> $this->upload->file_name,
		   			'slider_date_update' 	=> date('Y-m-d'),
		   			'slider_time_update' 	=> date('Y-m-d H:i:s')
					);
		} else {
			$data = array(
					'slider_title'			=> trim($this->input->post('title')),
		   			'slider_date_update' 	=> date('Y-m-d'),
		   			'slider_time_update' 	=> date('Y-m-d H:i:s')
					);
		}

		$this->db->insert('hom_slider', $data);
	}

	function update_data() {
		$slider_id     = $this->input->post('id');

		if (!empty($_FILES['userfile']['name'])) {
			$data = array(
					'slider_title'			=> trim($this->input->post('title')),
		   			'slider_image' 			=> $this->upload->file_name,
		   			'slider_date_update' 	=> date('Y-m-d'),
		   			'slider_time_update' 	=> date('Y-m-d H:i:s')
					);
		} else {
			$data = array(
					'slider_title'			=> trim($this->input->post('title')),
		   			'slider_date_update' 	=> date('Y-m-d'),
		   			'slider_time_update' 	=> date('Y-m-d H:i:s')
					);
		}

		$this->db->where('slider_id', $slider_id);
		$this->db->update('hom_slider', $data);
	}

	function delete_data($kode) {
		$this->db->where('slider_id', $kode);
		$this->db->delete('hom_slider');
	}		
}
/* Location: ./application/models/admin/Slider_model.php */