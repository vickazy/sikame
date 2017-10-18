<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class penjualan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->model('M_penjualan');
		$this->load->model('M_barang');
		$this->load->model('M_pelanggan');
		$this->load->model('M_jenis_barang');
	}

	public function index()
	{
		$data['judul']		= 'PENJUALAN';
		$data['menu']		= 'penjualan';
		$data['js']			= 'js_table';
		$data['konten']		= 'penjualan/index';
		$data['id_p']		= $this->M_penjualan->get_id();
		$data['penjualan']	= $this->M_penjualan->get_all()->result();
		$data['barang']		= $this->M_barang->get_all()->result();
		$data['pelanggan']	= $this->M_pelanggan->get_all()->result();
		//
		$data['id_max_barang']	= $this->M_barang->get_id()->row_array();
		$data['barang']			= $this->M_barang->get_all()->result();
		$data['jenis_barang'] 	= $this->M_jenis_barang->get_all()->result_array();
		$data['desain'] 		= $this->M_barang->get_desain()->result_array();
		$data['stok'] 			= $this->M_barang->get_stok()->result_array();
		//
		$data['id_pelanggan']		= $this->M_pelanggan->get_id()->row_array();
		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$data['judul']		= 'PENJUALAN || TAMBAH';
		$data['menu']		= 'penjualan';
		$data['js']			= 'js_table';
		$data['konten']		= 'penjualan/tambah';
		$data['id_p']		= $this->M_penjualan->get_id();
		$data['penjualan']	= $this->M_penjualan->get_all()->result();
		$data['barang']		= $this->M_barang->get_all()->result();
		$data['pelanggan']		= $this->M_pelanggan->get_all()->result();
		$this->load->view('template', $data);
	}

	public function tambah_proses()
	{
		$this->form_validation->set_rules('jumlah_barang', 'Jumlah Barang', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Jumlah Barang Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('id_barang', 'Barang', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Barang Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('id_pelanggan', 'Pelanggan', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Pelanggan Tidak Boleh Kosong.</div>'
					)
			);

		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$data['judul']		= 'PENJUALAN || TAMBAH';
			$data['menu']		= 'penjualan';
			$data['js']			= 'js_table';
			$data['konten']		= 'penjualan/tambah';
			$data['id_p']		= $this->M_penjualan->get_id();
			$data['penjualan']	= $this->M_penjualan->get_all()->result();
			$data['barang']		= $this->M_barang->get_all()->result();
			$data['pelanggan']	= $this->M_pelanggan->get_all()->result();
			$this->load->view('template', $data);
		}else{
			$this->M_penjualan->tambah_proses();
			$this->session->set_flashdata('sukses_tambah','1');
			redirect('penjualan','refresh');
		}
	}

	public function edit($id)
	{
		$data['judul']		= 'penjualan || EDIT';
		$data['menu']		= 'penjualan';
		$data['js']			= 'js_form';
		$data['konten']		= 'penjualan/edit';
		$data['penjualan']	= $this->M_penjualan->get_by_id($id)->row_array();
		$this->load->view('template', $data);
	}

	public function edit_proses($id)
	{
		$this->form_validation->set_rules('nama_penjualan', 'Nama penjualan', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Nama penjualan Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('alamat_penjualan', 'Alamat', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Alamat Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('cp_penjualan', 'Contact Person', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Gagal!</strong> Contact Person penjualan Tidak Boleh Kosong.</div>'
					)
			);

		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$data['judul']		= 'penjualan || EDIT';
			$data['menu']		= 'penjualan';
			$data['js']			= 'js_form';
			$data['konten']		= 'penjualan/edit';
			$data['penjualan']	= $this->M_penjualan->get_by_id($id)->row_array();
			$this->load->view('template', $data);
		}else{
			$this->M_penjualan->edit_proses($id);
			$this->session->set_flashdata('sukses_edit','1');
			redirect('penjualan','refresh');
		}
	}

	public function hapus()
	{
		$id = $this->input->post('id_penjualan');
		$this->M_penjualan->hapus($id);
		$this->session->set_flashdata('sukses_hapus','1');
		redirect('penjualan','refresh');
	}

	public function data_server()
	{
		$this->load->library('Datatables');
		$this->datatables->select('id_faktur, tanggal_penjualan, nama_barang, jumlah_barang');
		$this->datatables->join('barang', 'faktur_penjualan.id_barang = barang.id_barang', 'left');
		$this->datatables->from('faktur_penjualan');
		echo $this->datatables->generate();
	}

	public function get_barang() {
		$keyword = $this->uri->segment(3);

		$data = $this->db->from('barang')->like('nama_barang',$keyword)->get();	

		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'=>$row->nama_barang,
				'nama_barang'=>$row->nama_barang,
				'id_barang'	=>$row->id_barang
			);
		}
		echo json_encode($arr);
    }

    public function get_pelanggan() {
		$keyword = $this->uri->segment(3);

		$data = $this->db->from('pelanggan')->like('nama_pelanggan',$keyword)->get();	

		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'			=>$row->nama_pelanggan,
				'nama_pelanggan'	=>$row->nama_pelanggan,
				'id_pelanggan'		=>$row->id_pelanggan
			);
		}
		echo json_encode($arr);
    }
}

/* End of file penjualan.php */
/* Location: ./application/controllers/penjualan.php */ 