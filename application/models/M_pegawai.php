<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pegawai extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_all()
	{
		return $this->db->get('pegawai');
	}

}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */