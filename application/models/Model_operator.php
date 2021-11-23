<?php
class Model_operator extends CI_Model{
	
	function tampil_call(){		
		// $query  = "SELECT h.id_tr_ots_p,a.id_debitur,a.nama_debitur,a.no_klaim,d.bank,j.nama_proses,k.tindakan_fu,b.cabang_bank,c.capem_bank,i.tgl_fu FROM debitur a 
        // INNER JOIN m_capem_bank c ON (a.id_capem_bank = c.id_capem_bank) INNER JOIN m_cabang_bank b ON (c.id_cabang_bank = b.id_cabang_bank) 
        // INNER JOIN m_bank d ON (d.id_bank = b.id_bank) INNER JOIN m_cabang_asuransi e ON (a.id_cabang_as = e.id_cabang_asuransi) 
        // INNER JOIN ots f ON (f.id_debitur = a.id_debitur) INNER JOIN ots_status_debitur g ON (g.id_ots = f.id_ots) 
        // INNER JOIN tr_ots_p h ON (h.id_ots = f.id_ots) LEFT JOIN tr_ots_fu i ON (i.id_tr_ots_p = h.id_tr_ots_p) 
        // LEFT JOIN proses j ON (j.id_proses = i.id_proses) LEFT JOIN m_tindakan_fu k ON(i.id_tindakan = k.id_tindakan_fu) WHERE g.id_status_deb = 1";
        // return $this->db->query($query)->result_array();

        $query  = "SELECT g.id_tr_potensial as id_tr_ots_p ,a.id_debitur,a.nama_debitur,a.no_klaim,d.bank,j.nama_proses,k.tindakan_fu,b.cabang_bank,c.capem_bank,i.tgl_fu FROM debitur a 
        INNER JOIN m_capem_bank c ON (a.id_capem_bank = c.id_capem_bank) INNER JOIN m_cabang_bank b ON (c.id_cabang_bank = b.id_cabang_bank) 
        INNER JOIN m_bank d ON (d.id_bank = b.id_bank) INNER JOIN m_cabang_asuransi e ON (a.id_cabang_as = e.id_cabang_asuransi) 
        INNER JOIN kunjungan f ON (f.id_debitur = a.id_debitur) INNER JOIN tr_potensial g ON (g.id_kunjungan = f.id_kunjungan) 
        LEFT JOIN tr_fu i ON (i.id_tr_potensial = g.id_tr_potensial) 
        LEFT JOIN m_proses_fu j ON (j.id_proses_fu = i.id_proses) LEFT JOIN m_tindakan_fu k ON(i.id_tindakan = k.id_tindakan_fu) WHERE g.status = 1";
        return $this->db->query($query)->result_array();
	}

    function get_tindakan()
    {
        $query = "SELECT * FROM m_tindakan_fu";
        return $this->db->query($query)->result();
    }

    function get_proses($tindakanid){

        $proses="<option value='0'>--pilih--</pilih>";
        
        $this->db->order_by('nama_proses','ASC');
        $kab= $this->db->get_where('proses',array('id_tindakan_fu'=>$tindakanid));
        
        foreach ($kab->result_array() as $data ){
        $proses.= "<option value='$data[id_tindakan_fu]'>$data[nama_proses]</option>";
        }
        
        return $proses;
        
    }
    function get_one($id)
    {
        $query = "SELECT id_tr_ots_p FROM tr_ots_p WHERE id_tr_ots_p = $id";
        return $this->db->query($query)->row()->id_tr_ots_p;
    }
    function simpan_tindakan($data)
    {
        $this->db->insert('tr_ots_fu',$data);
    }
    function tampil_excel(){		
		$query  =   "SELECT h.id_tr_ots_p,a.id_debitur,a.nama_debitur,a.no_klaim,d.bank,j.nama_proses,b.cabang_bank,c.capem_bank,i.tgl_fu FROM debitur a 
        INNER JOIN m_capem_bank c ON (a.id_capem_bank = c.id_capem_bank) INNER JOIN m_cabang_bank b ON (c.id_cabang_bank = b.id_cabang_bank) 
        INNER JOIN m_bank d ON (d.id_bank = b.id_bank) INNER JOIN m_cabang_asuransi e ON (a.id_cabang_as = e.id_cabang_asuransi) 
        INNER JOIN ots f ON (f.id_debitur = a.id_debitur) INNER JOIN ots_status_debitur g ON (g.id_ots = f.id_ots) 
        INNER JOIN tr_ots_p h ON (h.id_ots = f.id_ots) LEFT JOIN tr_ots_fu i ON (i.id_tr_ots_p = h.id_tr_ots_p) 
        LEFT JOIN proses j ON (j.id_proses = i.id_tr_ots_fu) WHERE g.id_status_deb = 1";
        return $this->db->query($query)->result_array();
	}	
}