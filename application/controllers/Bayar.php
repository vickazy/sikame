<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bayar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('bayar');
	}

}

/* End of file Stok.php */
/* Location: ./application/controllers/Stok.php */