<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_modal extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}

	public function get_id()
	{
		return $this->db->query("SELECT MAX(id_modal) as id_max FROM modal");
	}

	public function get_all()
	{
		return $this->db->get('modal');
	}

	public function get_by_id($id)
	{
		$this->db->where('id_modal', $id);
		return $this->db->get('modal');
	}

	public function tambah_proses()
	{
		$data = array(
			'id_modal'		=> $this->input->post('id_modal'),
			'nama_bahan'	=> $this->input->post('nama_bahan'),
			'jumlah_bahan'	=> $this->input->post('jumlah_bahan'),
			'satuan'		=> $this->input->post('satuan'),
			'harga_beli'	=> $this->input->post('harga_beli'),
			'tanggal_masuk'	=> date("Y-m-d H:i:s"),

		);
		$this->db->insert('modal', $data);
	}

	public function edit_proses($id)
	{
		$data = array(
			'id_modal'		=> $this->input->post('id_modal'),
			'nama_bahan'	=> $this->input->post('nama_bahan'),
			'jumlah_bahan'	=> $this->input->post('jumlah_bahan'),
			'satuan'		=> $this->input->post('satuan'),
			'harga_beli'	=> $this->input->post('harga_beli'),
			'tanggal_masuk'	=> date("Y-m-d H:i:s"),
		);

		$this->db->where('id_modal', $id);
		$this->db->update('modal', $data);
	}

	public function hapus($id)
	{
		$this->db->where('id_modal', $id);
		$this->db->delete('modal');
	}	

}

/* End of file M_modal.php */
/* Location: ./application/models/M_modal.php */