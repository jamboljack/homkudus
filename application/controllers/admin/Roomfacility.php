<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roomfacility extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_hom')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/roomfacility_model');
	}

	public function index() {
		if($this->session->userdata('logged_in_hom')) {
			$data['listData'] = $this->roomfacility_model->select_all()->result();
			$this->template->display('admin/roomfacility_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function savedata() {
		$this->roomfacility_model->insert_data();
		$this->session->set_flashdata('notification','Save Data Success.');
 		redirect(site_url('admin/roomfacility'));
	}

	public function updatedata() {
		$this->roomfacility_model->update_data();
		$this->session->set_flashdata('notification','Update Data Success.');
		redirect(site_url('admin/roomfacility'));
	}

	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		if ($kode == null) {
			redirect(site_url('admin/roomfacility'));
		} else {
			$this->roomfacility_model->delete_data($kode);
			$this->session->set_flashdata('notification','Delete Data Success.');
			redirect(site_url('admin/roomfacility'));
		}
	}
}
/* Location: ./application/controller/admin/Roomfacility.php */