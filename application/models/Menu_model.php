<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

    function select_kontak() {
        $this->db->select('*');
        $this->db->from('hom_contact');
        $this->db->where('contact_id', 1);

        return $this->db->get();
    }
    
	function select_social() {
		$this->db->select('*');
		$this->db->from('hom_social');
        $this->db->order_by('social_id', 'ASC');

		return $this->db->get();
	}

    function select_facility() {
        $this->db->select('*');
        $this->db->from('hom_facility');
        $this->db->order_by('facility_id', 'ASC');

        return $this->db->get();
    }    
}
/* Location: ./application/model/Menu_model.php */