<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rateall extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_hom')) redirect(base_url());		
		$this->load->library('template');
		$this->load->model('admin/rateall_model');
	}
	
	public function index() {
		if($this->session->userdata('logged_in_hom')) {
			$data['Status']		= 'Index';
			$data['listRoom'] 	= $this->rateall_model->select_all_room()->result();
			$this->template->display('admin/rateall_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function search($room_id = '', $from = '', $to = '', $From = '', $Ke = '') {		
		$room_id 	= $this->input->post('lstRoom');
		$from 		= $this->input->post('from');
		$to 		= $this->input->post('to');

		if (!empty($from)) {
			$xfrom 	= explode("-",$from);
			$thn 	= $xfrom[2];
			$bln 	= $xfrom[1];
			$tgl 	= $xfrom[0];
			$Dari 	= $thn.'-'.$bln.'-'.$tgl;
		}

		if (!empty($to)) {
			$xto 	= explode("-",$to);
			$thn1 	= $xto[2];
			$bln1 	= $xto[1];
			$tgl1 	= $xto[0];
			$Ke 	= $thn1.'-'.$bln1.'-'.$tgl1;
		}

		while (strtotime($Dari) <= strtotime($Ke)) { // Perulangan by Tanggal			
			// Check Data by Tanggal
			$Check_by_Date	= $this->rateall_model->select_rate_date($room_id, $Dari)->result();
			// Jika Data belum Ada, Maka Insert Data Baru 
			if (count($Check_by_Date) == 0) {				
				$this->rateall_model->insert_new_Date($room_id, $Dari);
			}

			// Tanggal Terakhir di Tambah 1
			$Dari = date ("Y-m-d", strtotime("+1 day", strtotime($Dari)));
		}

		$data['Status']		= 'Cari';
		if (!empty($from)) {
			$xfrom 	= explode("-",$from);
			$thn 	= $xfrom[2];
			$bln 	= $xfrom[1];
			$tgl 	= $xfrom[0];
			$From 	= $thn.'-'.$bln.'-'.$tgl;
		}

		$data['listData']	= $this->rateall_model->select_rate_allotment($room_id, $From, $Ke)->result();
		$data['listRoom'] 	= $this->rateall_model->select_all_room()->result();
		$this->template->display('admin/rateall_view', $data);
	}

	public function updatedata() {
		$this->rateall_model->update_data_rate_allotment();
		$this->session->set_flashdata('notification','Update Data Success.');
 		redirect(site_url('admin/rateall'));
	}	
}
/* Location: ./application/controller/admin/Rateall.php */