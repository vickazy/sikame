<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_jenis_barang extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}

	public function get_id()
	{
		return $this->db->query("SELECT MAX(id_jenis_barang) as id_max FROM jenis_barang");
	}

	public function get_all()
	{
		return $this->db->get('jenis_barang');
	}

	public function get_by_id($id)
	{
		$this->db->where('id_jenis_barang', $id);
		return $this->db->get('jenis_barang');
	}

	public function tambah_proses()
	{
		$data = array(
			'id_jenis_barang'	=> $this->input->post('id_jenis_barang'),
			'nama_jenis_barang'	=> $this->input->post('nama_jenis_barang'),
		);

		$this->db->insert('jenis_barang', $data);
	}

	public function edit_proses($id)
	{
		$data = array(
			'id_jenis_barang'	=> $this->input->post('id_jenis_barang'),
			'nama_jenis_barang'	=> $this->input->post('nama_jenis_barang'),
		);

		$this->db->where('id_jenis_barang', $id);
		$this->db->update('jenis_barang', $data);
	}

	public function hapus($id)
	{
		$this->db->where('id_jenis_barang', $id);
		$this->db->delete('jenis_barang');
	}	

}

/* End of file M_jenis_barang.php */
/* Location: ./application/models/M_jenis_barang.php */