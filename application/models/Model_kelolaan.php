<?php
class Model_kelolaan extends CI_Model{
    
    public function tampil_kelolaan()
    {
    	$query = "SELECT a.id_penempatan,b.id_karyawan,b.nama_lengkap, b.file_foto, c.capem_bank FROM penempatan a INNER JOIN karyawan b ON (b.id_karyawan = a.id_karyawan) INNER JOIN m_capem_bank c ON (c.id_capem_bank = a.id_capem_bank)";
    	return $this->db->query($query)->result_array();
    }

    public function get_kelolaan($id)
    {
        $param = "SELECT a.id_penempatan,b.id_karyawan,b.nama_lengkap, b.file_foto, c.id_capem_bank,c.capem_bank FROM penempatan a INNER JOIN karyawan b ON (b.id_karyawan = a.id_karyawan) INNER JOIN m_capem_bank c ON (c.id_capem_bank = a.id_capem_bank) WHERE a.id_penempatan = $id";
        return $this->db->query($param);
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

    public function pilihCapem()
    {
        $this->db->SELECT('*');
        $this->db->FROM('m_capem_bank');
        return $this->db->get()->result_array();
    }

    public function ambil_bank(){
        $hasil=$this->db->query("SELECT id_bank,bank FROM m_bank");
        return $hasil;
    }

    function ambil_cabang($id){
        $hasil=$this->db->query("SELECT * FROM m_cabang_bank WHERE id_bank='$id'");
        return $hasil->result();
    }

    function ambil_capem($id){
        $hasil=$this->db->query("SELECT * FROM m_capem_bank WHERE id_cabang_bank='$id'");
        return $hasil->result();
    }

    public function edit($data,$id)
    {
        $this->db->where('id_penempatan',$id);
        $this->db->update('penempatan',$data);
    }
}