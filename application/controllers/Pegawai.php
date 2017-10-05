<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pegawai');
	}

	public function index()
	{
		$data['judul']		= 'PEGAWAI';
		$data['js']			= 'js_table';
		$data['konten']		= 'admin/pegawai/index';
		$data['pegawai']	= $this->M_pegawai->get_all()->result();
		$this->load->view('template', $data);
	}

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */ 