<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_barang extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}

	public function get_id()
	{
		return $this->db->query("SELECT MAX(id_barang) as id_max FROM barang");
	}

	public function get_like($q)
	{
		$this->db->select('*');
	    $this->db->like('nama_barang', $q);
	    $query = $this->db->get('barang');
	    if($query->num_rows() > 0){
	      foreach ($query->result_array() as $row){
	        $row_set[] = htmlentities(stripslashes($row['nama_barang'])); //build an array
	      }
	      echo json_encode($row_set); //format the array into json data
	    }
	}

	public function get_desain()
	{
		return $this->db->get('desain');
	}

	public function get_stok()
	{
		$this->db->select('id_stok_barang, nama_barang, nama_pegawai, log_stok.stok_barang, tanggal_update');
		$this->db->join('barang', 'barang.id_barang = log_stok.id_barang', 'left');
		$this->db->join('pegawai', 'pegawai.id_pegawai = log_stok.id_pegawai', 'left');
		$this->db->order_by('id_stok_barang', 'desc');
		return $this->db->get('log_stok');
	}

	public function get_all()
	{
		return $this->db->get('barang');
	}

	public function get_by_id($id)
	{
		$this->db->where('id_barang', $id);
		return $this->db->get('barang');
	}

	public function tambah_proses()
	{
		$data = array(
			'id_barang'	=> $this->input->post('id_barang'),
			'nama_barang'	=> $this->input->post('nama_barang'),
			'ukuran_barang'	=> $this->input->post('ukuran_barang'),
			'material_barang'	=> $this->input->post('material_barang'),
			'id_desain'	=> $this->input->post('id_desain'),
			'harga_jual_barang'=> $this->input->post('harga_jual_barang'),
			'stok_barang'=> $this->input->post('stok_barang'),
			'id_jenis_barang'		=> $this->input->post('id_jenis_barang'),
			'keterangan_barang'	=> $this->input->post('keterangan_barang'),

		);

		$stok = array(
			'id_barang'	=> $this->input->post('id_barang'),
			'id_pegawai'=> $this->input->post('id_pegawai'),
			'stok_barang'=> $this->input->post('stok_barang'),
			'tanggal_update' => date("Y-m-d H:i:s")
		);

		try {
			$this->db->insert('barang', $data);
			$this->db->insert('log_stok', $stok);
		} catch (Exception $e) {
			return false;
		}

		
	}

	public function edit_proses($id)
	{
		$data = array(
			'nama_barang'	=> $this->input->post('nama_barang'),
			'ukuran_barang'	=> $this->input->post('ukuran_barang'),
			'material_barang'	=> $this->input->post('material_barang'),
			'id_desain'	=> $this->input->post('id_desain'),
			'harga_jual_barang'=> $this->input->post('harga_jual_barang'),
			'stok_barang'=> $this->input->post('stok_barang'),
			'id_jenis_barang'		=> $this->input->post('id_jenis_barang'),
			'keterangan_barang'	=> $this->input->post('keterangan_barang'),

		);

		$stok = array(
			'id_barang'	=> $this->input->post('id_barang'),
			'id_pegawai'=> $this->input->post('id_pegawai'),
			'stok_barang'=> $this->input->post('stok_barang'),
			'tanggal_update' => date("Y-m-d H:i:s")
		);

		try {
			$this->db->where('id_barang', $id);
			$this->db->update('barang', $data);

			$this->db->insert('log_stok', $stok);
		} catch (Exception $e) {
			return false;
		}

		$this->db->where('id_barang', $id);
		$this->db->update('barang', $data);
	}

	public function hapus($id)
	{
		$this->db->where('id_barang', $id);
		$this->db->delete('barang');
	}	

}

/* End of file M_barang.php */
/* Location: ./application/models/M_barang.php */