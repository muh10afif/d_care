<?php
class Model_lawyer extends CI_Model{
    
    function list_debitur($syariah)
    {
        // $this->db->SELECT('g.id_tr_ots_p,a.nama_debitur,a.no_klaim,b.capem_bank,c.cabang_bank,d.bank,h.id_tindakan_hukum,h.id_tr_tindakan_hukum,h.id_tr_ots_p,h.keputusan_manajer');
        // $this->db->FROM('debitur a');
        // $this->db->JOIN('m_capem_bank b','b.id_capem_bank = a.id_capem_bank','INNER');
        // $this->db->JOIN('m_cabang_bank c','c.id_cabang_bank = b.id_cabang_bank','INNER');
        // $this->db->JOIN('m_bank d','d.id_bank = c.id_bank','INNER');
        // $this->db->JOIN('ots e','e.id_debitur = a.id_debitur','INNER');
        // $this->db->JOIN('ots_status_debitur f','f.id_ots = e.id_ots','INNER');
        // $this->db->JOIN('tr_ots_p g','g.id_ots = e.id_ots','INNER');
        // $this->db->JOIN('tr_tindakan_hukum h','h.id_tr_ots_p = g.id_tr_ots_p','INNER');
        // $this->db->JOIN('m_tindakan_hukum j','j.id_tindakan_hukum = h.id_tindakan_hukum','LEFT');
        // $this->db->JOIN('tr_formtindakan k','k.id_tr_tindakan_hukum = h.id_tr_tindakan_hukum','LEFT');
        // $this->db->JOIN('surat_lawyer l','l.id_tr_formtindakan = k.id_tr_formtindakan','LEFT');
        // $this->db->JOIN('m_jenis_formtindakan m','m.id_jenis_formtindakan = k.id_jenis_formtindakan','LEFT');
        // return $this->db->get()->result_array();

        $this->db->SELECT('g.id_tr_potensial as id_tr_ots_p,a.nama_debitur,a.no_klaim,b.capem_bank,c.cabang_bank,d.bank,h.id_tindakan_hukum,h.id_tr_tindakan_hukum,h.id_tr_potensial as id_tr_ots_p,h.keputusan_manajer, g.status_tindakan');
        $this->db->FROM('debitur a');
        $this->db->JOIN('m_capem_bank b','b.id_capem_bank = a.id_capem_bank','INNER');
        $this->db->JOIN('m_cabang_bank c','c.id_cabang_bank = b.id_cabang_bank','INNER');
        $this->db->JOIN('m_bank d','d.id_bank = c.id_bank','INNER');
        $this->db->join('m_cabang_asuransi as asu','asu.id_cabang_asuransi = a.id_cabang_as','INNER');
		$this->db->join('m_korwil_asuransi as kor','kor.id_korwil_asuransi = asu.id_korwil_asuransi','INNER');
		$this->db->join('m_asuransi as asr', 'asr.id_asuransi = kor.id_asuransi', 'inner');
        $this->db->JOIN('kunjungan e','e.id_debitur = a.id_debitur','INNER');
        $this->db->JOIN('tr_potensial g','g.id_kunjungan = e.id_kunjungan','INNER');
        $this->db->JOIN('tr_tindakan_hukum h','h.id_tr_potensial = g.id_tr_potensial','INNER');
        $this->db->JOIN('m_tindakan_hukum j','j.id_tindakan_hukum = h.id_tindakan_hukum','LEFT');
        $this->db->JOIN('tr_formtindakan k','k.id_tr_tindakan_hukum = h.id_tr_tindakan_hukum','LEFT');
        $this->db->JOIN('surat_lawyer l','l.id_tr_formtindakan = k.id_tr_formtindakan','LEFT');
        $this->db->JOIN('m_jenis_formtindakan m','m.id_jenis_formtindakan = k.id_jenis_formtindakan','LEFT');

        if ($syariah != "") {
            $this->db->where('asr.id_asuransi', 2);
            
        }

        return $this->db->get()->result_array();
    }

    function get_tr_tindakan_hukum()
    {
        $this->db->SELECT('*');
        $this->db->FROM('tr_formtindakan');
        $this->db->ORDER_BY('id_tr_formtindakan');
        $this->db->LIMIT(1);
        return $this->db->get()->result_array();
    }

    function act_somasi_1($data)
    {
        $this->db->insert('tr_formtindakan',$data);
    }

    function act_tindakan_hukum($id,$data)
    {
        $this->db->where('id_tr_potensial',$id);
        $this->db->update('tr_tindakan_hukum',$data);
    }

    function act_somasi2($data)
    {
        $this->db->insert('surat_lawyer',$data);
    }
}