<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pelanggan');
	}

	public function index()
	{
		$data['judul']		= 'PELANGGAN';
		$data['menu']		= 'pelanggan';
		$data['js']			= 'js_table';
		$data['konten']		= 'pelanggan/index';
		$data['id_p']		= $this->M_pelanggan->get_id()->row_array();
		$data['pelanggan']	= $this->M_pelanggan->get_all()->result();
		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Nama Pelanggan Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('alamat_pelanggan', 'Alamat', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Alamat Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('cp_pelanggan', 'Contact Person', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Contact Tidak Boleh Kosong.</div>'
					)
			);

		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$data['modal_show'] = "$('#modal-form').modal('show');";
			$data['judul']		= 'PELANGGAN || TAMBAH';
			$data['menu']		= 'pelanggan';
			$data['js']			= 'js_table';
			$data['konten']		= 'pelanggan/index';
			$data['id_p']		= $this->M_pelanggan->get_id()->row_array();
			$data['pelanggan']	= $this->M_pelanggan->get_all()->result();
			$this->load->view('template', $data);
		}else{
			$this->M_pelanggan->tambah_proses();
			$this->session->set_flashdata('sukses_tambah','1');
			redirect('pelanggan','refresh');
		}
	}

	public function edit($id)
	{
		$data['judul']		= 'PELANGGAN || EDIT';
		$data['menu']		= 'pelanggan';
		$data['js']			= 'js_form';
		$data['konten']		= 'pelanggan/edit';
		$data['pelanggan']	= $this->M_pelanggan->get_by_id($id)->row_array();
		$this->load->view('template', $data);
	}

	public function edit_proses($id)
	{
		$this->form_validation->set_rules('nama_pelanggan', 'Nama pelanggan', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Nama pelanggan Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('alamat_pelanggan', 'Alamat', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Alamat Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('cp_pelanggan', 'Contact Person', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Contact Person Pelanggan Tidak Boleh Kosong.</div>'
					)
			);

		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$data['judul']		= 'PELANGGAN || EDIT';
			$data['menu']		= 'pelanggan';
			$data['js']			= 'js_form';
			$data['konten']		= 'pelanggan/edit';
			$data['pelanggan']	= $this->M_pelanggan->get_by_id($id)->row_array();
			$this->load->view('template', $data);
		}else{
			$this->M_pelanggan->edit_proses($id);
			$this->session->set_flashdata('sukses_edit','1');
			redirect('pelanggan','refresh');
		}
	}

	public function hapus()
	{
		$id = $this->input->post('id_pelanggan');
		$this->M_pelanggan->hapus($id);
		$this->session->set_flashdata('sukses_hapus','1');
		redirect('pelanggan','refresh');
	}

	public function data_server()
	{
		$this->load->library('Datatables');
		$this->datatables->select('id_pelanggan, nama_pelanggan, alamat_pelanggan , cp_pelanggan');
		$this->datatables->from('pelanggan');
		echo $this->datatables->generate();
	}

}

/* End of file pelanggan.php */
/* Location: ./application/controllers/pelanggan.php */ 