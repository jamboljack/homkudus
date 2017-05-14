<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_hom')) redirect(base_url());		
		$this->load->library('template');
		$this->load->model('admin/type_model');
	}
	
	public function index() {
		if($this->session->userdata('logged_in_hom')) {	
			$data['listData'] 	= $this->type_model->select_all()->result();
			$this->template->display('admin/type_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}	

	public function savedata() {
		$this->type_model->insert_data();
		$this->session->set_flashdata('notification','Save Data Success.');
 		redirect(site_url('admin/type'));
	}

	public function updatedata() {
		$this->type_model->update_data();
		$this->session->set_flashdata('notification','Update Data Success.');
 		redirect(site_url('admin/type'));
	}	
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url('admin/type'));
		} else {
			$this->type_model->delete_data($kode);
			$this->session->set_flashdata('notification','Delete Data Success.');
			redirect(site_url('admin/type'));
		}
	}
}
/* Location: ./application/controller/admin/Type.php */