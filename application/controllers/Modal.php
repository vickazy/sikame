	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Modal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_modal');
	}

	public function index()
	{
		$data['judul']			= 'MODAL';
		$data['menu']			= 'modal';
		$data['js']				= 'js_table';
		$data['konten']			= 'modal/index';
		$data['id_max']			= $this->M_modal->get_id()->row_array();
		$data['modal']			= $this->M_modal->get_all()->result();
		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nama_bahan', 'Nama bahan', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger">Gagal! Nama Bahan Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('jumlah_bahan', 'Jumlah bahan', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger">Gagal! Jumlah Bahan Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('satuan', 'Satuan', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger">Gagal! Satuan Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('harga_beli', 'Harga', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger">Gagal! Harga Beli Tidak Boleh Kosong.</div>'
					)
			);

		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$data['modal_show'] = "$('#modal-form').modal('show');";
			$data['judul']		= 'MODAL || TAMBAH';
			$data['menu']		= 'modal';
			$data['js']			= 'js_table';
			$data['konten']		= 'modal/index';
			$data['id_max']		= $this->M_modal->get_id()->row_array();
			$data['modal']		= $this->M_modal->get_all()->result();

			$this->load->view('template', $data);
		}else{
			$this->M_modal->tambah_proses();
			$this->session->set_flashdata('sukses_tambah','1');
			redirect('modal','refresh');
		}
	}

	public function edit($id)
	{
		$data['judul']		= 'MODAL || EDIT';
		$data['menu']		= 'modal';
		$data['js']			= 'js_form';
		$data['konten']		= 'modal/edit';
		$data['modal']		= $this->M_modal->get_by_id($id)->row_array();

		$this->load->view('template', $data);
	}

	public function edit_proses($id)
	{
		$this->form_validation->set_rules('nama_bahan', 'Nama bahan', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger">Gagal! Nama Bahan Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('jumlah_bahan', 'Jumlah bahan', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger">Gagal! Jumlah Bahan Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('satuan', 'Satuan', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger">Gagal! Satuan Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('harga_beli', 'Harga', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger">Gagal! Harga Beli Tidak Boleh Kosong.</div>'
					)
			);

		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$data['judul']		= 'modal || EDIT';
			$data['menu']		= 'modal';
			$data['js']			= 'js_form';
			$data['konten']		= 'modal/edit';
			$data['id_max']		= $this->M_modal->get_id()->row_array();
			$data['modal']		= $this->M_modal->get_by_id($id)->row_array();
			$this->load->view('template', $data);
		}else{
			$this->M_modal->edit_proses($id);
			$this->session->set_flashdata('sukses_edit','1');
			redirect('modal','refresh');
		}
	}

	public function hapus()
	{
		$id = $this->input->post('id_modal');
		$this->M_modal->hapus($id);
		$this->session->set_flashdata('sukses_hapus','1');
		redirect('modal','refresh');
	}

	public function data_server()
	{
		$this->load->library('Datatables');
		$this->datatables->select('id_modal, nama_bahan, jumlah_bahan, satuan, harga_beli, tanggal_masuk');
		$this->datatables->from('modal');
		echo $this->datatables->generate();
	}

	}

	/* End of file modal.php */
	/* Location: ./application/controllers/modal.php */ 