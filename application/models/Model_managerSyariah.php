<?php
class Model_managerSyariah extends CI_Model{
    
    function tampil_potensial()
    {   
        $query = "SELECT DISTINCT b.nama_debitur,b.no_klaim,e.bank,c.capem_bank,d.cabang_bank FROM ots a INNER JOIN debitur b ON(a.id_debitur = b.id_debitur) INNER JOIN m_cabang_asuransi AS cabAS ON (cabAS.id_cabang_asuransi = b.id_cabang_as) INNER JOIN m_korwil_asuransi AS korAS ON (korAS.id_korwil_asuransi = cabAS.id_korwil_asuransi) INNER JOIN m_asuransi AS asu ON (asu.id_asuransi = korAS.id_asuransi)
        INNER JOIN m_capem_bank c ON(c.id_capem_bank = b.id_capem_bank) INNER JOIN m_cabang_bank d ON(d.id_cabang_bank = c.id_cabang_bank) INNER JOIN m_bank e ON (e.id_bank = d.id_bank) 
        INNER JOIN ots_status_debitur f ON(f.id_ots = a.id_ots) INNER JOIN tr_ots_p g ON (f.id_ots = g.id_ots) WHERE a.status = 1 AND asu.id_asuransi = 2";
        
        return $this->db->query($query)->result_array();
    }


    function tasklist()
    {
        $this->db->SELECT('a.nama_lengkap,b.tugas,b.keterangan,b.tanggal,b.status,b.hasil');
        $this->db->FROM('karyawan a');
        $this->db->JOIN('task_list b','a.id_karyawan = b.id_karyawan','INNER');
        $this->db->JOIN('penempatan c','c.id_karyawan = a.id_karyawan','INNER');
        $this->db->JOIN('debitur d','d.id_capem_bank = c.id_capem_bank','INNER');
        $this->db->JOIN('m_cabang_asuransi cabAS','cabAS.id_cabang_asuransi = d.id_cabang_as','inner');
        $this->db->JOIN('m_korwil_asuransi korAS','korAS.id_korwil_asuransi = cabAS.id_korwil_asuransi','inner');
        $this->db->JOIN('m_asuransi asu','asu.id_asuransi = korAS.id_asuransi','inner');
        $this->db->where('asu.id_asuransi', 2);
        return $this->db->get()->result_array();
    }

    function list_verifikator()
    {
        $this->db->SELECT('a.id_karyawan,a.nama_lengkap');
        $this->db->FROM('karyawan a');
        $this->db->JOIN('pengguna b','a.id_karyawan = b.id_karyawan','INNER');
        $this->db->JOIN('penempatan c','c.id_karyawan = a.id_karyawan','INNER');
        $this->db->JOIN('debitur d','d.id_capem_bank = c.id_capem_bank','INNER');
        $this->db->JOIN('m_cabang_asuransi cabAS','cabAS.id_cabang_asuransi = d.id_cabang_as','inner');
        $this->db->JOIN('m_korwil_asuransi korAS','korAS.id_korwil_asuransi = cabAS.id_korwil_asuransi','inner');
        $this->db->JOIN('m_asuransi asu','asu.id_asuransi = korAS.id_asuransi','inner');
        $this->db->where('asu.id_asuransi', 2);
        $this->db->GROUP_BY('c.id_karyawan,a.id_karyawan');
        return $this->db->get()->result_array();
    }

    function simpan_tasklist($data)
    {
        $this->db->insert('task_list',$data);
    }

    function list_call()
    {	
		$query  = "SELECT h.id_tr_ots_p,a.id_debitur,a.nama_debitur,a.no_klaim,d.bank,j.nama_proses,k.tindakan_fu,b.cabang_bank,c.capem_bank,i.tgl_fu,h.status_tindakan 
        FROM debitur a
        INNER JOIN m_cabang_asuransi AS cabAS ON (cabAS.id_cabang_asuransi = a.id_cabang_as) 
        INNER JOIN m_korwil_asuransi AS korAS ON (korAS.id_korwil_asuransi = cabAS.id_korwil_asuransi) 
        INNER JOIN m_asuransi AS asu ON (asu.id_asuransi = korAS.id_asuransi) 
        INNER JOIN m_capem_bank c ON (a.id_capem_bank = c.id_capem_bank) INNER JOIN m_cabang_bank b ON (c.id_cabang_bank = b.id_cabang_bank) 
        INNER JOIN m_bank d ON (d.id_bank = b.id_bank) INNER JOIN m_cabang_asuransi e ON (a.id_cabang_as = e.id_cabang_asuransi) 
        INNER JOIN ots f ON (f.id_debitur = a.id_debitur) INNER JOIN ots_status_debitur g ON (g.id_ots = f.id_ots) 
        INNER JOIN tr_ots_p h ON (h.id_ots = f.id_ots) LEFT JOIN tr_ots_fu i ON (i.id_tr_ots_p = h.id_tr_ots_p) 
        LEFT JOIN proses j ON (j.id_proses = i.id_proses) LEFT JOIN m_tindakan_fu k ON(i.id_tindakan = k.id_tindakan_fu) WHERE g.id_status_deb = 1 AND asu.id_asuransi   = 2";
        return $this->db->query($query)->result_array();
    }

    function list_tindakan_hukum()
    {
        $query ="SELECT a.id_debitur,a.nama_debitur,a.no_klaim,d.bank,b.cabang_bank,c.capem_bank, j.id_tr_ots_p, h.keputusan_manajer, k.tindakan_hukum 
        FROM debitur a
        INNER JOIN m_cabang_asuransi AS cabAS ON (cabAS.id_cabang_asuransi = a.id_cabang_as) 
        INNER JOIN m_korwil_asuransi AS korAS ON (korAS.id_korwil_asuransi = cabAS.id_korwil_asuransi) 
        INNER JOIN m_asuransi AS asu ON (asu.id_asuransi = korAS.id_asuransi)  
        INNER JOIN m_capem_bank c ON (a.id_capem_bank = c.id_capem_bank) INNER JOIN m_cabang_bank b ON (c.id_cabang_bank = b.id_cabang_bank) 
        INNER JOIN m_bank d ON (d.id_bank = b.id_bank) INNER JOIN m_cabang_asuransi e ON (a.id_cabang_as = e.id_cabang_asuransi) 
        INNER JOIN ots f ON (f.id_debitur = a.id_debitur) INNER JOIN tr_ots_p j ON (j.id_ots = f.id_ots) INNER JOIN ots_status_debitur g ON (g.id_ots = f.id_ots) INNER JOIN tr_tindakan_hukum h ON(h.id_tr_ots_p = j.id_tr_ots_p) LEFT JOIN m_tindakan_hukum k ON (k.id_tindakan_hukum = h.id_tindakan_hukum)  WHERE g.id_status_deb = 1 AND asu.id_asuransi = 2";
        /*$this->db->SELECT('a.nama_debitur,a.no_klaim,b.capem_bank,c.cabang_bank,d.bank,h.id_tindakan_hukum,h.id_tr_ots_p,h.keputusan_manajer');
        $this->db->FROM('debitur a');
        $this->db->JOIN('m_capem_bank b','b.id_capem_bank = a.id_capem_bank','INNER');
        $this->db->JOIN('m_cabang_bank c','c.id_cabang_bank = b.id_cabang_bank','INNER');
        $this->db->JOIN('m_bank d','d.id_bank = c.id_bank','INNER');
        $this->db->JOIN('ots e','e.id_debitur = a.id_debitur','INNER');
        $this->db->JOIN('ots_status_debitur f','f.id_ots = e.id_ots','INNER');
        $this->db->JOIN('tr_ots_p g','g.id_ots = e.id_ots','INNER');
        $this->db->JOIN('tr_tindakan_hukum h','h.id_tr_ots_p = g.id_tr_ots_p','LEFT');*/
        return $this->db->query($query)->result_array();
    }
    function simpan_keputusan($id,$data)
    {
        $this->db->where('id_tr_ots_p',$id);
        $this->db->update('tr_tindakan_hukum',$data);
    }
    function simpancall($id,$data)
    {
        $this->db->where('id_tr_ots_p',$id);
        $this->db->update('tr_ots_p',$data);
    }

    function simpanTindakanHukum($data)
    {
        $this->db->insert('tr_tindakan_hukum',$data);
    }

    function simpan_tindakan($data)
    {
        $this->db->insert('tr_ots_fu',$data);
    }
    function get_tindakan()
    {
        $query = "SELECT * FROM m_tindakan_fu";
        return $this->db->query($query)->result();
    }
    function get_one($id)
    {
        $query = "SELECT id_tr_ots_p FROM tr_ots_p WHERE id_tr_ots_p = $id";
        return $this->db->query($query)->row()->id_tr_ots_p;
    }
    function listEksekusiAset()
    {
        $this->db->DISTINCT();
        $this->db->SELECT('h.id_tr_ots_p,a.id_debitur,a.nama_debitur,a.no_klaim,b.capem_bank,c.cabang_bank,f.status_info,d.bank,f.id_sifat_asset,h.status_proses');
        $this->db->FROM('debitur a');
        $this->db->JOIN('m_capem_bank b','b.id_capem_bank = a.id_capem_bank','INNER');
        $this->db->JOIN('m_cabang_bank c','c.id_cabang_bank = b.id_cabang_bank','INNER');
        $this->db->JOIN('m_bank d','d.id_bank = c.id_bank','INNER');
        $this->db->JOIN('dokumen_asset f','f.id_debitur = a.id_debitur','INNER');
        $this->db->JOIN('ots g','g.id_debitur = a.id_debitur','INNER');
        $this->db->JOIN('tr_ots_p h','h.id_ots = g.id_ots','INNER');
        $this->db->WHERE('f.status = 1 AND g.status = 1');
        return $this->db->get()->result_array();
    }
    function simpan_statusInfo($id,$data)
    {
        $this->db->where('id_debitur',$id);
        $this->db->update('dokumen_asset',$data);
    }
    function simpan_sifatAset($id,$data)
    {
        $this->db->where('id_debitur',$id);
        $this->db->update('dokumen_asset',$data);
    }
    function simpan_statusProses($id,$data)
    {
        $this->db->where('id_tr_ots_p',$id);
        $this->db->update('tr_ots_p',$data);
    }
}