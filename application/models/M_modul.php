<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_modul extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	
	function name_country($keyword) {
		$query = $this->db->from('countries')
						  ->like('list_name',$keyword)
						  ->get();
		return $query->result(); 				  
	}
}

/* End of file M_modul.php */
/* Location: ./application/models/M_modul.php */ 