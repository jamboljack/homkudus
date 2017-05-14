<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_hom')) redirect(base_url());		
		$this->load->library('template');
		$this->load->model('admin/room_model');
	}
	
	public function index() {
		if($this->session->userdata('logged_in_hom')) {	
			$data['listData'] 	= $this->room_model->select_all()->result();
			$this->template->display('admin/room_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}	

	public function adddata() {
		$data['listFacility'] = $this->room_model->select_room_facility()->result();
		$this->template->display('admin/room_add_view', $data); 
	}

	public function savedata() {
		if (!empty($_FILES['userfile']['name'])) {
			$jam 	= time();
			$name 	= seo_title(trim($this->input->post('name')));

			$config['file_name']    = 'Room_'.$name.'_'.$jam.'.jpg';
			$config['upload_path'] = './img/room_image/';
			$config['allowed_types'] = 'jpg|png|gif|png';		
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] = 'gd2';
			$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] = TRUE;
											
			$config['width'] = 900;
			$config['height'] = 500;
			$this->load->library('image_lib',$config);
					 
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}

		$this->room_model->insert_data();
		$this->session->set_flashdata('notification','Save Data Success.');
 		redirect(site_url('admin/room'));
	}

	public function editdata($room_id) {
		$data['detail'] 		= $this->room_model->select_detail($room_id)->row();
		$data['listFacility'] 	= $this->room_model->select_room_facility_edit($room_id)->result();
		$this->template->display('admin/room_edit_view', $data); 
	}

	public function updatedata() {
		if (!empty($_FILES['userfile']['name'])) {
			$jam 	= time();
			$name 	= seo_title(trim($this->input->post('name')));

			$config['file_name']    = 'Room_'.$name.'_'.$jam.'.jpg';
			$config['upload_path'] = './img/room_image/';
			$config['allowed_types'] = 'jpg|png|gif|png';		
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] = 'gd2';
			$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] = TRUE;
											
			$config['width'] = 900;
			$config['height'] = 500;
			$this->load->library('image_lib',$config);
					 
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}

		$this->room_model->update_data();
		$this->session->set_flashdata('notification','Update Data Success.');
 		redirect(site_url('admin/room'));
	}	
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url('admin/room'));
		} else {
			$this->room_model->delete_data($kode);
			$this->session->set_flashdata('notification','Delete Data Success.');
			redirect(site_url('admin/room'));
		}
	}

	public function listimage($room_id) {
		$data['listImage'] 		= $this->room_model->select_all_image($room_id)->result();
		$data['detail'] 		= $this->room_model->select_detail($room_id)->row();
		$this->template->display('admin/room_picture_view', $data);
	}

	public function savedatapicture() {
		if (!empty($_FILES['userfile']['name'])) {
			$jam 	= time();

			$config['file_name']    = 'Room_'.$jam.'.jpg';
			$config['upload_path'] = './img/room_image/';
			$config['allowed_types'] = 'jpg|png|gif|png';		
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] = 'gd2';
			$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] = TRUE;
											
			$config['width'] = 900;
			$config['height'] = 500;
			$this->load->library('image_lib',$config);
					 
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}

		$this->room_model->insert_data_picture();
		$this->session->set_flashdata('notification','Save Data Picture Success.');
 		redirect(site_url('admin/room/listimage/'.$this->uri->segment(4)));
	}

	public function updatedatapicture() {
		if (!empty($_FILES['userfile']['name'])) {
			$jam 	= time();

			$config['file_name']    = 'Room_'.$jam.'.jpg';
			$config['upload_path'] = './img/room_image/';
			$config['allowed_types'] = 'jpg|png|gif|png';		
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] = 'gd2';
			$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] = TRUE;
											
			$config['width'] = 900;
			$config['height'] = 500;
			$this->load->library('image_lib',$config);
					 
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}

		$this->room_model->update_data_picture();
		$this->session->set_flashdata('notification','Update Data Picture Success.');
 		redirect(site_url('admin/room/listimage/'.$this->uri->segment(4)));
	}

	public function deletedatapicture($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(5));
		
		if ($kode == null) {
			redirect(site_url('admin/room/listimage/'.$this->uri->segment(4)));
		} else {
			$this->room_model->delete_data_picture($kode);
			$this->session->set_flashdata('notification','Delete Data Picture Success.');
			redirect(site_url('admin/room/listimage/'.$this->uri->segment(4)));
		}
	}
}
/* Location: ./application/controller/admin/Room.php */