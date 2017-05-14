<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotelfacility extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_hom')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/hotelfacility_model');
	}

	public function index() {
		if($this->session->userdata('logged_in_hom')) {
			$data['listData'] = $this->hotelfacility_model->select_all()->result();
			$this->template->display('admin/hotelfacility_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function savedata() {
		$this->hotelfacility_model->insert_data();
		$this->session->set_flashdata('notification','Save Data Success.');
 		redirect(site_url('admin/hotelfacility'));
	}

	public function updatedata() {
		$this->hotelfacility_model->update_data();
		$this->session->set_flashdata('notification','Update Data Success.');
		redirect(site_url('admin/hotelfacility'));
	}

	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		if ($kode == null) {
			redirect(site_url('admin/hotelfacility'));
		} else {
			$this->hotelfacility_model->delete_data($kode);
			$this->session->set_flashdata('notification','Delete Data Success.');
			redirect(site_url('admin/hotelfacility'));
		}
	}
}
/* Location: ./application/controller/admin/Hotelfacility.php */