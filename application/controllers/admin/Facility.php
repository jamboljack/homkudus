<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facility extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_hom')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/facility_model');
	}

	public function index() {
		if($this->session->userdata('logged_in_hom')) {
			$data['listData'] = $this->facility_model->select_all()->result();
			$this->template->display('admin/facility_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function adddata() {
		$this->template->display('admin/facility_add_view'); 
	}

	public function savedata() {
		if (!empty($_FILES['userfile']['name'])) {
			$jam 	= time();
			$name 	= seo_title(trim($this->input->post('name')));

			$config['file_name']    = 'Facility_'.$name.'_'.$jam.'.jpg';
			$config['upload_path'] = './img/facility_image/';
			$config['allowed_types'] = 'jpg|png|gif|png';		
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] = 'gd2';
			$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] = TRUE;
											
			$config['width'] = 770;
			$config['height'] = 420;
			$this->load->library('image_lib',$config);
					 
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}

		$this->facility_model->insert_data();
		$this->session->set_flashdata('notification','Save Data Success.');
 		redirect(site_url('admin/facility'));
	}

	public function editdata($facility_id) {
		$data['detail'] 		= $this->facility_model->select_detail($facility_id)->row();
		$this->template->display('admin/facility_edit_view', $data); 
	}

	public function updatedata() {
		if (!empty($_FILES['userfile']['name'])) {
			$jam 	= time();
			$name 	= seo_title(trim($this->input->post('name')));

			$config['file_name']    = 'Facility_'.$name.'_'.$jam.'.jpg';
			$config['upload_path'] = './img/facility_image/';
			$config['allowed_types'] = 'jpg|png|gif|png';		
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] = 'gd2';
			$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] = TRUE;
											
			$config['width'] = 770;
			$config['height'] = 420;
			$this->load->library('image_lib',$config);
					 
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}

		$this->facility_model->update_data();
		$this->session->set_flashdata('notification','Update Data Success.');
		redirect(site_url('admin/facility'));
	}

	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		if ($kode == null) {
			redirect(site_url('admin/facility'));
		} else {
			$this->facility_model->delete_data($kode);
			$this->session->set_flashdata('notification','Delete Data Success.');
			redirect(site_url('admin/facility'));
		}
	}
}
/* Location: ./application/controller/admin/Facility.php */