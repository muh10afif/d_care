<?php
class Model_login extends CI_Model{
	//cek nip dan password dosen
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	

}
