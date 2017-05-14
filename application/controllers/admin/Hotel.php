<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_hom')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/hotel_model');
	}

	public function index() {
		if($this->session->userdata('logged_in_hom')) {
			$data['detail'] 		= $this->hotel_model->select_detail()->row();
			$data['listSocial'] 	= $this->hotel_model->select_social()->result();
			$data['listFacility'] 	= $this->hotel_model->select_facility()->result();
			$this->template->display('admin/hotel_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function updatedatahotel() {
		$this->hotel_model->update_data_hotel();
		$this->session->set_flashdata('notification','Update Hotel Information Success.');
		redirect(site_url('admin/hotel'));
	}

	public function updatedataadditional() {
		$this->hotel_model->update_data_additional();
		$this->session->set_flashdata('notification','Update Additional Information Success.');
		redirect(site_url('admin/hotel'));
	}

	public function savedatasocial() {
		$this->hotel_model->insert_data_social();
		$this->session->set_flashdata('notification','Save Data Social Media Success.');
 		redirect(site_url('admin/hotel'));
	}

	public function updatedatasocial() {
		$this->hotel_model->update_data_social();
		$this->session->set_flashdata('notification','Update Data Social Media Success.');
		redirect(site_url('admin/hotel'));
	}

	public function deletedatasocial($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		if ($kode == null) {
			redirect(site_url('admin/hotel'));
		} else {
			$this->hotel_model->delete_data_social($kode);
			$this->session->set_flashdata('notification','Delete Data Social Media Success.');
			redirect(site_url('admin/hotel'));
		}
	}

	public function updatedatatripadvisor() {
		$this->hotel_model->update_data_tripadvisor();
		$this->session->set_flashdata('notification','Update TripAdvisor Widget Success.');
		redirect(site_url('admin/hotel'));
	}

	function updatedatafacility() {
		$this->hotel_model->update_data_facility();
		$this->session->set_flashdata('notification','Update Hotel Facility Success.');
		redirect(site_url('admin/hotel'));
	}
}
/* Location: ./application/controller/admin/Hotel.php */