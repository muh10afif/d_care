<?php
class Model_pengguna extends CI_Model{
    
    public function buat_pengguna($data)
    {
         $this->db->insert('pengguna',$data);
    }
    
    public function tampil_pengguna()
    {
    	$this->db->SELECT('*');
    	$this->db->FROM('pengguna a');
        $this->db->JOIN('level b','b.id_level = a.level','LEFT');
    	return $this->db->get()->result_array();
    }

    public function tampil_karyawan()
    {
        $this->db->SELECT('*');
        $this->db->FROM('karyawan');
        $this->db->ORDER_BY('id_karyawan','ASC');
        return $this->db->get()->result_array();
    }

    public function get_one($id)
    {
        $param = array('id_pengguna'=>$id);
        return $this->db->get_where('pengguna',$param);
    }

    public function get_karyawan($id)
    {
        $param = array('id_karyawan'=>$id);
        return $this->db->get_where('karyawan',$param);
    }

    public function pilihKaryawan()
    {
        $this->db->SELECT('*');
        $this->db->FROM('karyawan');
        return $this->db->get()->result_array();
    }

    public function edit($data,$id)
    {
        $this->db->where('id_pengguna',$id);
        $this->db->update('pengguna',$data);
    }
}