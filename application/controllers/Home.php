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
		$data['konten']	= 'admin/tables';
		$this->load->view('template', $data);
	}

	public function table()
	{
		$data['judul']	= 'TABLE';
		$data['js']		= 'js_table';			//di load di template.php
		$data['konten']	= 'admin/tables';		//di load di template.php
		$this->load->view('template', $data);
	}

	public function form()
	{
		$data['judul']	= 'FORM';
		$data['js']		= 'js_form';			//di load di template.php
		$data['konten']	= 'admin/form';			//di load di template.php
		$this->load->view('template', $data);
	}


}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */