<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurant extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_hom')) redirect(base_url());		
		$this->load->library('template');
		$this->load->model('admin/restaurant_model');
	}
	
	public function index() {
		if($this->session->userdata('logged_in_hom')) {	
			$data['listData'] 	= $this->restaurant_model->select_all()->result();
			$data['listType'] 	= $this->restaurant_model->select_type()->result();
			$this->template->display('admin/restaurant_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}	

	public function savedata() {
		if (!empty($_FILES['userfile']['name'])) {
			$jam 	= time();
			$name 	= seo_title(trim($this->input->post('name')));
					
			$config['file_name']    = 'MenuRestaurant_'.$name.'_'.$jam.'.jpg';
			$config['upload_path'] = './img/restaurant_image/';
			$config['allowed_types'] = 'jpg|png|gif|png';		
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] = 'gd2';
			$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] = TRUE;
											
			$config['width'] = 270;
			$config['height'] = 190;
			$this->load->library('image_lib',$config);
					 
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}

		$this->restaurant_model->insert_data();
		$this->session->set_flashdata('notification','Save Data Success.');
 		redirect(site_url('admin/restaurant'));
	}

	public function updatedata() {
		if (!empty($_FILES['userfile']['name'])) {
			$jam 	= time();
			$name 	= seo_title(trim($this->input->post('name')));
					
			$config['file_name']    = 'MenuRestaurant_'.$name.'_'.$jam.'.jpg';
			$config['upload_path'] = './img/restaurant_image/';
			$config['allowed_types'] = 'jpg|png|gif|png';		
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] = 'gd2';
			$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] = TRUE;
											
			$config['width'] = 270;
			$config['height'] = 190;
			$this->load->library('image_lib',$config);
					 
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}
		
		$this->restaurant_model->update_data();
		$this->session->set_flashdata('notification','Update Data Success.');
 		redirect(site_url('admin/restaurant'));
	}	
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url('admin/restaurant'));
		} else {
			$this->restaurant_model->delete_data($kode);
			$this->session->set_flashdata('notification','Delete Data Success.');
			redirect(site_url('admin/restaurant'));
		}
	}
}
/* Location: ./application/controller/admin/Restaurant.php */