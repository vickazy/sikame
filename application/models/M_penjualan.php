<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_penjualan extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_id()
	{
		$q 	= $this->db->query("select MAX(LEFT(id_faktur,10)) as tanggal_fak from faktur_penjualan");
		$tgl 		= date("Y-m-d");
		$tgl_fak 	= $q->row_array();
		$tgl_faktur	= $tgl_fak['tanggal_fak']; 
		$kd = "";
		
		if ($q->num_rows() > 0) {
			if ($tgl == $tgl_faktur) {
				$id = $this->db->query("select MAX(MID(id_faktur, 12 , 10)) as id_fak from faktur_penjualan WHERE tanggal_penjualan = '$tgl'");
				foreach($id->result() as $k)
	            {
	                $tmp = ((int)$k->id_fak)+1;
	                $kd = sprintf("%1s", $tmp);
	            }
			}else{
				$kd = "1";
			}
		}

        return $tgl."-".$kd;
	}

	public function get_all()
	{
		return $this->db->get('faktur_penjualan');
	}

	public function get_by_id($id)
	{
		$this->db->where('id_faktur', $id);
		return $this->db->get('faktur_penjualan');
	}

	public function get_barang()
	{
		
	}

	public function tambah_proses()
	{
		$tgl 			= date("Y-m-d");
		$id_pegawai 	= ""; //ditambahi ngguri
		$id_pelanggan	= $this->input->post('id_pelanggan');

		$data = array(
			'id_faktur'			=> $this->input->post('id_faktur'),
			'no_faktur'			=> $tgl."-".$id_pegawai."-".$id_pelanggan,
			'tanggal_penjualan'	=> $tgl,
			'id_barang'			=> $this->input->post('id_barang'),
			'jumlah_barang'		=> $this->input->post('jumlah_barang'),
			'id_pegawai'		=> $id_pegawai,
			'id_pelanggan'		=> $id_pelanggan,
			'status'			=> 0
		);

		$this->db->insert('faktur_penjualan', $data);
	}

	public function edit_proses($id)
	{
		$data = array(
			'nama_faktur_penjualan'	=> $this->input->post('nama_faktur_penjualan'),
			'alamat_faktur_penjualan'=> $this->input->post('alamat_faktur_penjualan'),
			'cp_faktur_penjualan'	=> $this->input->post('cp_faktur_penjualan')
		);

		$this->db->where('id_faktur_penjualan', $id);
		$this->db->update('faktur_penjualan', $data);
	}

	public function hapus($id)
	{
		$this->db->where('id_faktur_penjualan', $id);
		$this->db->delete('faktur_penjualan');
	}

}

/* End of file M_penjualan.php */
/* Location: ./application/models/M_penjualan.php */