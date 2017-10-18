<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['judul']	= 'HOME';
		$data['js']		= 'js_table';
		$data['menu']	= 'home';
		$data['konten']	= 'admin/tables';
		$this->load->view('template', $data);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */