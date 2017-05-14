<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_hom')) redirect(base_url());		
		$this->load->library('template');
		$this->load->model('admin/users_model');
	}
	
	public function index() {
		if($this->session->userdata('logged_in_hom')) {	
			$data['listData'] 	= $this->users_model->select_all()->result();
			$this->template->display('admin/users_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}	

	public function savedata() {
		if (!empty($_FILES['userfile']['name'])) {
			$jam 	= time();
			$name 	= seo_title(trim($this->input->post('username')));
					
			$config['file_name']    = 'Users_'.$name.'_'.$jam.'.jpg';
			$config['upload_path'] = './img/avatar/';
			$config['allowed_types'] = 'jpg|png|gif|png';		
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] = 'gd2';
			$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] = TRUE;
											
			$config['width'] = 200;
			$config['height'] = 200;
			$this->load->library('image_lib',$config);
					 
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}

		$this->users_model->insert_data();
		$this->session->set_flashdata('notification','Save Data Success.');
 		redirect(site_url('admin/users'));
	}

	public function updatedata() {
		if (!empty($_FILES['userfile']['name'])) {
			$jam 	= time();
			$name 	= seo_title(trim($this->input->post('username')));
					
			$config['file_name']    = 'Users_'.$name.'_'.$jam.'.jpg';
			$config['upload_path'] = './img/avatar/';
			$config['allowed_types'] = 'jpg|png|gif|png';		
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] = 'gd2';
			$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] = TRUE;
											
			$config['width'] = 200;
			$config['height'] = 200;
			$this->load->library('image_lib',$config);
					 
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}
		
		$this->users_model->update_data();
		$this->session->set_flashdata('notification','Update Data Success.');
 		redirect(site_url('admin/users'));
	}
}
/* Location: ./application/controller/admin/Users.php */