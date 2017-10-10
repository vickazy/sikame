<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pegawai extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_id()
	{
		return $this->db->query("SELECT MAX(id_pegawai) as id_max FROM pegawai");
	}

	public function get_all()
	{
		return $this->db->get('pegawai');
	}

	public function get_by_id($id)
	{
		$this->db->where('id_pegawai', $id);
		return $this->db->get('pegawai');
	}

	public function tambah_proses()
	{
		$data = array(
			'id_pegawai'	=> $this->input->post('id_pegawai'),
			'nama_pegawai'	=> $this->input->post('nama_pegawai'),
			'alamat_pegawai'=> $this->input->post('alamat_pegawai'),
			'akses_pegawai'	=> $this->input->post('akses_pegawai'),
			'username'		=> $this->input->post('username'),
			'password'		=> md5($this->input->post('password')),
			'status'		=> 'aktif'
		);

		$this->db->insert('pegawai', $data);
	}

	public function edit_proses($id)
	{
		$data = array(
			'nama_pegawai'	=> $this->input->post('nama_pegawai'),
			'alamat_pegawai'=> $this->input->post('alamat_pegawai'),
			'akses_pegawai'	=> $this->input->post('akses_pegawai')
		);

		$this->db->where('id_pegawai', $id);
		$this->db->update('pegawai', $data);
	}

	public function hapus($id)
	{
		$this->db->where('id_pegawai', $id);
		$this->db->delete('pegawai');
	}

}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */