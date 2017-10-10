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
		$data['menu']		= 'pegawai';
		$data['js']			= 'js_table';
		$data['konten']		= 'pegawai/index';
		$data['id_p']		= $this->M_pegawai->get_id()->row_array();
		$data['pegawai']	= $this->M_pegawai->get_all()->result();
		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Nama Pegawai Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('alamat_pegawai', 'Alamat', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Alamat Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('username', 'Username', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Username Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('password', 'Password', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Password Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('akses_pegawai', 'Akses', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Akses Pegawai Tidak Boleh Kosong.</div>'
					)
			);

		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$data['modal_show'] = "$('#modal-form').modal('show');";
			$data['judul']		= 'PEGAWAI || TAMBAH';
			$data['menu']		= 'pegawai';
			$data['js']			= 'js_table';
			$data['konten']		= 'pegawai/index';
			$data['pegawai']	= $this->M_pegawai->get_all()->result();
			$this->load->view('template', $data);
		}else{
			$this->M_pegawai->tambah_proses();
			$this->session->set_flashdata('sukses_tambah','1');
			redirect('Pegawai','refresh');
		}
	}

	public function edit($id)
	{
		$data['judul']		= 'PEGAWAI || EDIT';
		$data['menu']		= 'pegawai';
		$data['js']			= 'js_form';
		$data['konten']		= 'pegawai/edit';
		$data['pegawai']	= $this->M_pegawai->get_by_id($id)->row_array();
		$this->load->view('template', $data);
	}

	public function edit_proses($id)
	{
		$this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Nama Pegawai Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('alamat_pegawai', 'Alamat', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Alamat Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('akses_pegawai', 'Akses', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Akses Pegawai Tidak Boleh Kosong.</div>'
					)
			);

		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$data['judul']		= 'PEGAWAI || EDIT';
			$data['menu']		= 'pegawai';
			$data['js']			= 'js_form';
			$data['konten']		= 'pegawai/edit';
			$data['pegawai']	= $this->M_pegawai->get_by_id($id)->row_array();
			$this->load->view('template', $data);
		}else{
			$this->M_pegawai->edit_proses($id);
			$this->session->set_flashdata('sukses_edit','1');
			redirect('Pegawai','refresh');
		}
	}

	public function hapus()
	{
		$id = $this->input->post('id_pegawai');
		$this->M_pegawai->hapus($id);
		$this->session->set_flashdata('sukses_hapus','1');
		redirect('Pegawai','refresh');
	}

	public function data_server()
	{
		$this->load->library('Datatables');
		$this->datatables->select('id_pegawai, nama_pegawai, alamat_pegawai');
		$this->datatables->from('pegawai');
		echo $this->datatables->generate();
	}

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */ 