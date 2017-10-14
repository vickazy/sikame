	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_barang');
		$this->load->model('M_jenis_barang');
	}

	public function index()
	{
		$data['judul']		= 'Barang';
		$data['menu']		= 'barang';
		$data['js']			= 'js_table';
		$data['konten']		= 'barang/index';
		$data['id_max']		= $this->M_barang->get_id()->row_array();
		$data['barang']	= $this->M_barang->get_all()->result();
		$data['jenis_barang'] = $this->M_jenis_barang->get_all()->result_array();
		$data['desain'] = $this->M_barang->get_desain()->result_array();
		$data['stok'] = $this->M_barang->get_stok()->result_array();
		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger">Gagal! Nama Barang Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('harga_jual_barang', 'Alamat', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger">Gagal! Alamat Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('id_jenis_barang', 'Username', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger">Gagal! Username Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('id_barang', 'Password', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger">Gagal! Password Tidak Boleh Kosong.</div>'
					)
			);

		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$data['modal_show'] = "$('#modal-form').modal('show');";
			$data['judul']		= 'Barang || TAMBAH';
			$data['menu']		= 'barang';
			$data['js']			= 'js_table';
			$data['konten']		= 'barang/index';
			$data['id_max']		= $this->M_barang->get_id()->row_array();
			$data['barang']		= $this->M_barang->get_all()->result();
			$data['jenis_barang'] = $this->M_barang->get_all()->result_array();

			$this->load->view('template', $data);
		}else{
			$this->M_barang->tambah_proses();
			$this->session->set_flashdata('sukses_tambah','1');
			redirect('Barang','refresh');
		}
	}

	public function edit($id)
	{
		$data['judul']		= 'Barang || EDIT';
		$data['menu']		= 'barang';
		$data['js']			= 'js_form';
		$data['konten']		= 'barang/edit';
		$data['barang']	= $this->M_barang->get_by_id($id)->row_array();
		$data['jenis_barang'] = $this->M_jenis_barang->get_all()->result_array();
		$data['desain'] = $this->M_barang->get_desain()->result_array();


		$this->load->view('template', $data);
	}

	public function edit_proses($id)
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger">Gagal! - Nama Barang Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('harga_jual_barang', 'Alamat', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger">Gagal! Alamat Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('harga_jual_barang', 'Akses', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger">Gagal! Akses Barang Tidak Boleh Kosong.</div>'
					)
			);

		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$data['judul']		= 'Barang || EDIT';
			$data['menu']		= 'barang';
			$data['js']			= 'js_form';
			$data['konten']		= 'barang/edit';
			$data['id_max']		= $this->M_barang->get_id()->row_array();
			$data['barang']	= $this->M_barang->get_by_id($id)->row_array();
			$this->load->view('template', $data);
		}else{
			$this->M_barang->edit_proses($id);
			$this->session->set_flashdata('sukses_edit','1');
			redirect('Barang','refresh');
		}
	}

	public function hapus()
	{
		$id = $this->input->post('id_barang');
		$this->M_barang->hapus($id);
		$this->session->set_flashdata('sukses_hapus','1');
		redirect('Barang','refresh');
	}

	public function data_server()
	{
		$this->load->library('Datatables');
		$this->datatables->select('id_barang, nama_barang, ukuran_barang, stok_barang, harga_jual_barang, nama_jenis_barang, keterangan_barang');
		$this->datatables->join('jenis_barang', 'barang.id_jenis_barang = jenis_barang.id_jenis_barang', 'left');
		$this->datatables->from('barang');
		echo $this->datatables->generate();
	}

	}

	/* End of file Barang.php */
	/* Location: ./application/controllers/Barang.php */ 