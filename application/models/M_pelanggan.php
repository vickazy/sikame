<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pelanggan extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_id()
	{
		return $this->db->query("SELECT MAX(id_pelanggan) as id_max FROM pelanggan");
	}

	public function get_all()
	{
		return $this->db->get('pelanggan');
	}

	public function get_by_id($id)
	{
		$this->db->where('id_pelanggan', $id);
		return $this->db->get('pelanggan');
	}

	public function tambah_proses()
	{
		$data = array(
			'id_pelanggan'	=> $this->input->post('id_pelanggan'),
			'nama_pelanggan'	=> $this->input->post('nama_pelanggan'),
			'alamat_pelanggan'=> $this->input->post('alamat_pelanggan'),
			'cp_pelanggan'	=> $this->input->post('cp_pelanggan')
		);

		$this->db->insert('pelanggan', $data);
	}

	public function edit_proses($id)
	{
		$data = array(
			'nama_pelanggan'	=> $this->input->post('nama_pelanggan'),
			'alamat_pelanggan'=> $this->input->post('alamat_pelanggan'),
			'cp_pelanggan'	=> $this->input->post('cp_pelanggan')
		);

		$this->db->where('id_pelanggan', $id);
		$this->db->update('pelanggan', $data);
	}

	public function hapus($id)
	{
		$this->db->where('id_pelanggan', $id);
		$this->db->delete('pelanggan');
	}

}

/* End of file M_pelanggan.php */
/* Location: ./application/models/M_pelanggan.php */