<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_hom')) redirect(base_url());		
		$this->load->library('template');
		$this->load->model('admin/slider_model');
	}
	
	public function index() {
		if($this->session->userdata('logged_in_hom')) {	
			$data['listData'] 	= $this->slider_model->select_all()->result();
			$this->template->display('admin/slider_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}	

	public function savedata() {
		if (!empty($_FILES['userfile']['name'])) {
			$jam = time();			
					
			$config['file_name']    = 'Slider_'.$jam.'.jpg';
			$config['upload_path'] = './img/slider_image/';
			$config['allowed_types'] = 'jpg|png|gif|png';		
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] = 'gd2';
			$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] = TRUE;
											
			$config['width'] = 1920;
			$config['height'] = 980;
			$this->load->library('image_lib',$config);
					 
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}

		$this->slider_model->insert_data();
		$this->session->set_flashdata('notification','Save Data Success.');
 		redirect(site_url('admin/slider'));
	}

	public function updatedata() {
		if (!empty($_FILES['userfile']['name'])) {
			$jam = time();			
					
			$config['file_name']    = 'Slider_'.$jam.'.jpg';
			$config['upload_path'] = './img/slider_image/';
			$config['allowed_types'] = 'jpg|png|gif|png';		
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] = 'gd2';
			$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] = TRUE;
											
			$config['width'] = 1920;
			$config['height'] = 980;
			$this->load->library('image_lib',$config);
					 
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}

		$this->slider_model->update_data();
		$this->session->set_flashdata('notification','Update Data Success.');
 		redirect(site_url('admin/slider'));
	}	
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url('admin/slider'));
		} else {
			$this->slider_model->delete_data($kode);
			$this->session->set_flashdata('notification','Delete Data Success.');
			redirect(site_url('admin/slider'));
		}
	}
}
/* Location: ./application/controller/admin/Slider.php */