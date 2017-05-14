<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library('template_front');
		$this->load->model('home_model');
		$this->load->model('menu_model');
	}

	public function index() {
		$data['listSlider']	= $this->home_model->select_slider()->result();
		$data['listRoom']	= $this->home_model->select_room()->result();
		$data['listFacility']= $this->home_model->select_facility()->result();
		$this->template_front->display('home_view', $data);
	}
}
/* Location: ./application/controller/Home.php */