<?php
class Model_manager extends CI_Model{

    
    public function cari_data_exp($tabel, $where)
    {
        $this->db->select('expired');
        
        return $this->db->get_where($tabel, $where);
        
    }
    public function cari_data($tabel, $where)
    {
        return $this->db->get_where($tabel, $where);
    }
    public function cari_data_order($tabel, $where, $field, $order)
    {
        $this->db->order_by($field, $order);
        
        return $this->db->get_where($tabel, $where);
    }

    public function get_data($tabel)
    {
        return $this->db->get($tabel);
    }

    public function ubah_data($tabel, $data, $where)
    {
        $this->db->where($where);
        $this->db->update($tabel, $data);
        
        return $this->db->affected_rows();  
    }

    public function input_data($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }

    public function hapus_data($tabel, $where)
    {
        $this->db->where($where);
        $this->db->delete($tabel);
    }

    public function input_data_batch($tabel, $data)
    {
        $this->db->insert_batch($tabel, $data);
    }

    /***********************************************************************/
    /*
    /*                      HALAMAN SUMMARY 
    /*
    /***********************************************************************/

    // 12-03-2020

        public function get_data_unduh_excel_summary($nama)
        {
            $this->db->select("cab.cabang_bank, cap.capem_bank, k.nama_lengkap as verifikator, (SELECT COUNT(d.id_debitur) as debitur_kelolaan FROM debitur as d WHERE d.id_capem_bank = cap.id_capem_bank), (SELECT COUNT(d.id_debitur) as sudah_ots FROM debitur as d WHERE d.id_capem_bank = cap.id_capem_bank and d.ots = 1), (SELECT COUNT(d.id_debitur) as potensial FROM debitur as d WHERE d.id_capem_bank = cap.id_capem_bank and d.potensial = 1), (SELECT COUNT(d.id_debitur) as non_potensial FROM debitur as d WHERE d.id_capem_bank = cap.id_capem_bank and d.potensial = 0)");
            $this->db->from('m_cabang_bank as cab');
            $this->db->join('m_capem_bank as cap', 'cap.id_cabang_bank = cab.id_cabang_bank', 'inner');
            $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
            $this->db->join('penempatan as p', 'p.id_capem_bank = cap.id_capem_bank', 'inner');
            $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'inner');
            $this->db->join('debitur as d', 'd.id_capem_bank = cap.id_capem_bank', 'inner');

            if ($nama['spk'] != 'a') {
                if ($nama['spk'] == 'null') {
                    $this->db->where("d.id_spk is null");
                } else {
                    $this->db->where('d.id_spk', $nama['spk']);
                }
            }
            if ($nama['bank'] != 'a') {
                $this->db->where('b.id_bank', $nama['bank']);
            }
            if ($nama['cabang_bank'] != 'a') {
                $this->db->where('cab.id_cabang_bank', $nama['cabang_bank']);
            }
            if ($nama['capem_bank'] != 'a') {
                $this->db->where('cap.id_capem_bank', $nama['capem_bank']);
            }
            if ($nama['id_karyawan'] != 'a') {
                $this->db->where('k.id_karyawan', $nama['id_karyawan']);
            }

            $this->db->group_by('cab.id_cabang_bank');
            $this->db->group_by('cap.id_capem_bank');
            $this->db->group_by('k.nama_lengkap');

            return $this->db->get();
            
        }

        public function get_data_unduh_excel_summary_asuransi($nama)
        {
            $this->db->select("cab.cabang_asuransi, (SELECT COUNT(d.id_debitur) as debitur_kelolaan FROM debitur as d WHERE d.id_cabang_as = de.id_cabang_as), (SELECT COUNT(d.id_debitur) as sudah_ots FROM debitur as d WHERE d.id_cabang_as = de.id_cabang_as and d.ots = 1), (SELECT COUNT(d.id_debitur) as potensial FROM debitur as d WHERE d.id_cabang_as = de.id_cabang_as and d.potensial = 1), (SELECT COUNT(d.id_debitur) as non_potensial FROM debitur as d WHERE d.id_cabang_as = de.id_cabang_as and d.potensial = 0)");
            $this->db->from('m_cabang_asuransi as cab');
            $this->db->join('debitur as de', 'cab.id_cabang_asuransi = de.id_cabang_as', 'inner');
            $this->db->join('m_korwil_asuransi as ka', 'ka.id_korwil_asuransi = cab.id_korwil_asuransi', 'inner');
            $this->db->join('m_asuransi as ar', 'ar.id_asuransi = ka.id_asuransi', 'inner');
            $this->db->join('penempatan as p', 'p.id_capem_bank = de.id_capem_bank', 'inner');
            $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'inner');

            if ($nama['spk'] != 'a') {
                if ($nama['spk'] == 'null') {
                    $this->db->where("de.id_spk is null");
                } else {
                    $this->db->where('de.id_spk', $nama['spk']);
                }
            }
            if ($nama['asuransi'] != 'a') {
                $this->db->where('ar.id_asuransi', $nama['asuransi']);
            }
            if ($nama['cabang_asuransi'] != 'a') {
                $this->db->where('cab.id_cabang_asuransi', $nama['cabang_asuransi']);
            }
            if ($nama['id_karyawan'] != 'a') {
                $this->db->where('k.id_karyawan', $nama['id_karyawan']);
            }

            $this->db->group_by('cabang_asuransi');
            $this->db->group_by('de.id_cabang_as');

            return $this->db->get();
            
        }

    // Akhir 12-03-2020

    public function get_data_summary($dt)
    {
        $this->_get_datatables_query_summary($dt);

        if ($this->input->post('length') != -1) {
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
            
            return $this->db->get()->result_array();
        }
    }

    var $kolom_order_summary = [null, 'LOWER(cab.cabang_bank)', 'LOWER(cap.capem_bank)', 'LOWER(k.nama_lengkap)'];
    var $kolom_cari_summary  = ['LOWER(cab.cabang_bank)', 'LOWER(cap.capem_bank)', 'LOWER(k.nama_lengkap)'];
    var $order_summary       = ['cab.cabang_bank' => 'asc'];

    public function _get_datatables_query_summary($nama)
    {
        $this->db->select("cab.cabang_bank, cap.capem_bank, k.nama_lengkap as verifikator, (SELECT COUNT(d.id_debitur) as debitur_kelolaan FROM debitur as d WHERE d.id_capem_bank = cap.id_capem_bank), (SELECT COUNT(d.id_debitur) as sudah_ots FROM debitur as d WHERE d.id_capem_bank = cap.id_capem_bank and d.ots = 1), (SELECT COUNT(d.id_debitur) as potensial FROM debitur as d WHERE d.id_capem_bank = cap.id_capem_bank and d.potensial = 1), (SELECT COUNT(d.id_debitur) as non_potensial FROM debitur as d WHERE d.id_capem_bank = cap.id_capem_bank and d.potensial = 0)");
		$this->db->from('m_cabang_bank as cab');
		$this->db->join('m_capem_bank as cap', 'cap.id_cabang_bank = cab.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        $this->db->join('penempatan as p', 'p.id_capem_bank = cap.id_capem_bank', 'inner');
        $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'inner');
        $this->db->join('debitur as d', 'd.id_capem_bank = cap.id_capem_bank', 'inner');
        
        if ($nama['spk'] != 'a') {
            if ($nama['spk'] == 'null') {
                $this->db->where("d.id_spk is null");
            } else {
                $this->db->where('d.id_spk', $nama['spk']);
            }
        }
        if ($nama['bank'] != 'a') {
            $this->db->where('b.id_bank', $nama['bank']);
        }
        if ($nama['cabang_bank'] != 'a') {
            $this->db->where('cab.id_cabang_bank', $nama['cabang_bank']);
        }
        if ($nama['capem_bank'] != 'a') {
            $this->db->where('cap.id_capem_bank', $nama['capem_bank']);
        }
        if ($nama['id_karyawan'] != 'a') {
            $this->db->where('k.id_karyawan', $nama['id_karyawan']);
        }
        if (!empty($nama['tanggal_awal']) && !empty($nama['tanggal_akhir'])) {

            $tgl_awal   = nice_date($nama['tanggal_awal'], 'Y-m-d'); 
            $tgl_akhir  = nice_date($nama['tanggal_akhir'], 'Y-m-d');

            $this->db->where("CAST(cab.add_time AS VARCHAR) BETWEEN '$tgl_awal' AND '$tgl_akhir+1'");
        }

        $this->db->group_by('cab.id_cabang_bank');
        $this->db->group_by('cap.id_capem_bank');
        $this->db->group_by('k.nama_lengkap');
        
        $b = 0;

        $input_cari = strtolower($_POST['search']['value']);
        $kolom_cari = $this->kolom_cari_summary;

        foreach ($kolom_cari as $cari) {
            if ($input_cari) {
                if ($b === 0) {
                    $this->db->group_start();
                    $this->db->like($cari, $input_cari);
                } else {
                    $this->db->or_like($cari, $input_cari);
                }

                if ((count($kolom_cari) - 1) == $b ) {
                    $this->db->group_end();
                }
            }

            $b++;
        }

        if (isset($_POST['order'])) {

            $kolom_order = $this->kolom_order_summary;
            $this->db->order_by($kolom_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            
        } elseif (isset($this->order_summary)) {
            
            $order = $this->order_summary;
            $this->db->order_by(key($order), $order[key($order)]);
            
        }
    }

    public function jumlah_semua_summary($nama)
    {
        $this->db->select("cab.cabang_bank, cap.capem_bank, k.nama_lengkap as verifikator, (SELECT COUNT(d.id_debitur) as debitur_kelolaan FROM debitur as d WHERE d.id_capem_bank = cap.id_capem_bank), (SELECT COUNT(d.id_debitur) as sudah_ots FROM debitur as d WHERE d.id_capem_bank = cap.id_capem_bank and d.ots = 1), (SELECT COUNT(d.id_debitur) as potensial FROM debitur as d WHERE d.id_capem_bank = cap.id_capem_bank and d.potensial = 1), (SELECT COUNT(d.id_debitur) as non_potensial FROM debitur as d WHERE d.id_capem_bank = cap.id_capem_bank and d.potensial = 0)");
		$this->db->from('m_cabang_bank as cab');
		$this->db->join('m_capem_bank as cap', 'cap.id_cabang_bank = cab.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        $this->db->join('penempatan as p', 'p.id_capem_bank = cap.id_capem_bank', 'inner');
        $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'inner');
        $this->db->join('debitur as d', 'd.id_capem_bank = cap.id_capem_bank', 'inner');
        
        if ($nama['spk'] != 'a') {
            if ($nama['spk'] == 'null') {
                $this->db->where("d.id_spk is null");
            } else {
                $this->db->where('d.id_spk', $nama['spk']);
            }
        }
        if ($nama['bank'] != 'a') {
            $this->db->where('b.id_bank', $nama['bank']);
        }
        if ($nama['cabang_bank'] != 'a') {
            $this->db->where('cab.id_cabang_bank', $nama['cabang_bank']);
        }
        if ($nama['capem_bank'] != 'a') {
            $this->db->where('cap.id_capem_bank', $nama['capem_bank']);
        }
        if ($nama['id_karyawan'] != 'a') {
            $this->db->where('k.id_karyawan', $nama['id_karyawan']);
        }
        if (!empty($nama['tanggal_awal']) && !empty($nama['tanggal_akhir'])) {

            $tgl_awal   = nice_date($nama['tanggal_awal'], 'Y-m-d'); 
            $tgl_akhir  = nice_date($nama['tanggal_akhir'], 'Y-m-d');

            $this->db->where("CAST(cab.add_time AS VARCHAR) BETWEEN '$tgl_awal' AND '$tgl_akhir+1'");
        }

        $this->db->group_by('cab.id_cabang_bank');
        $this->db->group_by('cap.id_capem_bank');
        $this->db->group_by('k.nama_lengkap');
        
        return $this->db->count_all_results();
    }

    public function jumlah_filter_summary($dt)
    {
        $this->_get_datatables_query_summary($dt);
        return $this->db->get()->num_rows();
    }

    // summary asuransi 
    public function get_data_summary_as($dt)
    {
        $this->_get_datatables_query_summary_as($dt);

        if ($this->input->post('length') != -1) {
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
            
            return $this->db->get()->result_array();
        }
    }

    var $kolom_order_summary_as = [null, 'LOWER(cab.cabang_asuransi)'];
    var $kolom_cari_summary_as  = ['LOWER(cab.cabang_asuransi)'];
    var $order_summary_as       = ['cab.cabang_asuransi' => 'asc'];

    public function _get_datatables_query_summary_as($nama)
    {
        $this->db->select("cab.cabang_asuransi, (SELECT COUNT(d.id_debitur) as debitur_kelolaan FROM debitur as d WHERE d.id_cabang_as = de.id_cabang_as), (SELECT COUNT(d.id_debitur) as sudah_ots FROM debitur as d WHERE d.id_cabang_as = de.id_cabang_as and d.ots = 1), (SELECT COUNT(d.id_debitur) as potensial FROM debitur as d WHERE d.id_cabang_as = de.id_cabang_as and d.potensial = 1), (SELECT COUNT(d.id_debitur) as non_potensial FROM debitur as d WHERE d.id_cabang_as = de.id_cabang_as and d.potensial = 0)");
		$this->db->from('m_cabang_asuransi as cab');
		$this->db->join('debitur as de', 'cab.id_cabang_asuransi = de.id_cabang_as', 'inner');
		$this->db->join('m_korwil_asuransi as ka', 'ka.id_korwil_asuransi = cab.id_korwil_asuransi', 'inner');
		$this->db->join('m_asuransi as ar', 'ar.id_asuransi = ka.id_asuransi', 'inner');
        $this->db->join('penempatan as p', 'p.id_capem_bank = de.id_capem_bank', 'inner');
        $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'inner');

        if ($nama['spk'] != 'a') {
            if ($nama['spk'] == 'null') {
                $this->db->where("de.id_spk is null");
            } else {
                $this->db->where('de.id_spk', $nama['spk']);
            }
        }
        if ($nama['asuransi'] != 'a') {
            $this->db->where('ar.id_asuransi', $nama['asuransi']);
        }
        if ($nama['cabang_asuransi'] != 'a') {
            $this->db->where('cab.id_cabang_asuransi', $nama['cabang_asuransi']);
        }
        if ($nama['id_karyawan'] != 'a') {
            $this->db->where('k.id_karyawan', $nama['id_karyawan']);
        }
        if (!empty($nama['tanggal_awal']) && !empty($nama['tanggal_akhir'])) {

            $tgl_awal   = nice_date($nama['tanggal_awal'], 'Y-m-d'); 
            $tgl_akhir  = nice_date($nama['tanggal_akhir'], 'Y-m-d');

            $this->db->where("CAST(cab.add_time AS VARCHAR) BETWEEN '$tgl_awal' AND '$tgl_akhir+1'");
        }

        $this->db->group_by('cabang_asuransi');
        $this->db->group_by('de.id_cabang_as');
        
        $b = 0;

        $input_cari = strtolower($_POST['search']['value']);
        $kolom_cari = $this->kolom_cari_summary_as;

        foreach ($kolom_cari as $cari) {
            if ($input_cari) {
                if ($b === 0) {
                    $this->db->group_start();
                    $this->db->like($cari, $input_cari);
                } else {
                    $this->db->or_like($cari, $input_cari);
                }

                if ((count($kolom_cari) - 1) == $b ) {
                    $this->db->group_end();
                }
            }

            $b++;
        }

        if (isset($_POST['order'])) {

            $kolom_order = $this->kolom_order_summary_as;
            $this->db->order_by($kolom_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            
        } elseif (isset($this->order_summary_as)) {
            
            $order = $this->order_summary_as;
            $this->db->order_by(key($order), $order[key($order)]);
            
        }
    }

    public function jumlah_semua_summary_as($nama)
    {
        $this->db->select("cab.cabang_asuransi, (SELECT COUNT(d.id_debitur) as debitur_kelolaan FROM debitur as d WHERE d.id_cabang_as = de.id_cabang_as), (SELECT COUNT(d.id_debitur) as sudah_ots FROM debitur as d WHERE d.id_cabang_as = de.id_cabang_as and d.ots = 1), (SELECT COUNT(d.id_debitur) as potensial FROM debitur as d WHERE d.id_cabang_as = de.id_cabang_as and d.potensial = 1), (SELECT COUNT(d.id_debitur) as non_potensial FROM debitur as d WHERE d.id_cabang_as = de.id_cabang_as and d.potensial = 0)");
		$this->db->from('m_cabang_asuransi as cab');
		$this->db->join('debitur as de', 'cab.id_cabang_asuransi = de.id_cabang_as', 'inner');
		$this->db->join('m_korwil_asuransi as ka', 'ka.id_korwil_asuransi = cab.id_korwil_asuransi', 'inner');
		$this->db->join('m_asuransi as ar', 'ar.id_asuransi = ka.id_asuransi', 'inner');
        $this->db->join('penempatan as p', 'p.id_capem_bank = de.id_capem_bank', 'inner');
        $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'inner');

        if ($nama['spk'] != 'a') {
            if ($nama['spk'] == 'null') {
                $this->db->where("de.id_spk is null");
            } else {
                $this->db->where('de.id_spk', $nama['spk']);
            }
        }
        if ($nama['asuransi'] != 'a') {
            $this->db->where('ar.id_asuransi', $nama['asuransi']);
        }
        if ($nama['cabang_asuransi'] != 'a') {
            $this->db->where('cab.id_cabang_asuransi', $nama['cabang_asuransi']);
        }
        if ($nama['id_karyawan'] != 'a') {
            $this->db->where('k.id_karyawan', $nama['id_karyawan']);
        }
        if (!empty($nama['tanggal_awal']) && !empty($nama['tanggal_akhir'])) {

            $tgl_awal   = nice_date($nama['tanggal_awal'], 'Y-m-d'); 
            $tgl_akhir  = nice_date($nama['tanggal_akhir'], 'Y-m-d');

            $this->db->where("CAST(cab.add_time AS VARCHAR) BETWEEN '$tgl_awal' AND '$tgl_akhir+1'");
        }

        $this->db->group_by('cabang_asuransi');
        $this->db->group_by('de.id_cabang_as');
        
        return $this->db->count_all_results();
    }

    public function jumlah_filter_summary_as($dt)
    {
        $this->_get_datatables_query_summary_as($dt);
        return $this->db->get()->num_rows();
    }


    /***********************************************************************/
    /*
    /*                      HALAMAN LIST PRIORITAS 
    /*
    /***********************************************************************/

    public function cari_data_pri($tabel, $where)
    {
        $this->db->from($tabel);
        $this->db->where($where);
        $this->db->or_where('status', 0);
        
        return $this->db->get();
    }

    // simpan prioritas
    public function simpan_prioritas($data)
    {
        $this->db->insert_batch('tr_prioritas', $data);
    }

    // menampilkan data capem bank
    public function cari_cap_ver($id_ver)
    {
        $this->db->select('k.id_karyawan, k.nama_lengkap, c.id_capem_bank, c.capem_bank');
        $this->db->from('karyawan as k');
        $this->db->join('penempatan as p', 'p.id_karyawan = k.id_karyawan', 'inner');
        $this->db->join('m_capem_bank as c', 'c.id_capem_bank = p.id_capem_bank', 'inner');
        $this->db->where('p.id_karyawan', $id_ver);

        return $this->db->get();
        
        
    }

    public function get_data_ver()
    {
        $this->db->select('k.id_karyawan, k.nama_lengkap');
        $this->db->from('karyawan as k');
        $this->db->join('penempatan as p', 'p.id_karyawan = k.id_karyawan', 'inner');
        $this->db->group_by('k.id_karyawan');
        
        return $this->db->get();
    }

    // tambah prioritas 

    public function get_jml_deb_tambah_pri()
    {
        $this->db->select('*');
        $this->db->from('tr_prioritas');
        $a = $this->db->get()->result();
        $ay = array();
        foreach ($a as $b) {
            $ay[] = $b->id_debitur;
        }

        $im     = implode(',',$ay);
        $deb    = explode(',',$im); 

        $this->db->select('d.id_debitur, d.nama_debitur, d.id_care, d.no_klaim, k.nama_lengkap as nama_verifikator, cab.cabang_bank, cap.capem_bank, b.bank, d.subrogasi_as as subrogasi, sum(r.nominal) as recoveries, j.add_time as tgl_ots');
		$this->db->from('debitur as d');
		$this->db->join('tr_recov_as as r', 'r.id_debitur = d.id_debitur', 'left');
		$this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'inner');
		$this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        $this->db->join('m_cabang_asuransi as asu','asu.id_cabang_asuransi = d.id_cabang_as','INNER');
		$this->db->join('m_korwil_asuransi as kor','kor.id_korwil_asuransi = asu.id_korwil_asuransi','INNER');
		$this->db->join('m_asuransi as asr', 'asr.id_asuransi = kor.id_asuransi', 'inner');
        $this->db->join('penempatan as p', 'p.id_capem_bank = cap.id_capem_bank', 'inner');
        $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'inner');
        $this->db->join('tr_prioritas as pri', 'pri.id_debitur = d.id_debitur', 'left');
        $this->db->join('kunjungan as j', 'j.id_debitur = d.id_debitur', 'left');
        $this->db->where("d.id_spk is not null");

        if ($deb[0] != "") {
            $this->db->where_not_in('d.id_debitur', $deb);
        }

        $this->db->order_by('d.id_debitur', 'asc');
    
        $this->db->group_by('tgl_ots');
        $this->db->group_by('cap.capem_bank');
        $this->db->group_by('nama_verifikator');
		$this->db->group_by('d.id_debitur');
		$this->db->group_by('cab.id_cabang_bank');
        $this->db->group_by('b.bank');
        $this->db->group_by('d.nama_debitur');
        $this->db->group_by('d.id_care');
        $this->db->group_by('d.no_klaim');
        $this->db->group_by('d.subrogasi_as');
        

        return $this->db->count_all_results();
    }

    // Awal Datatables ServerSide

    // ambil data list kelolaan
    public function get_data_tambah_prioritas($nama)
    {
        $this->_get_datatables_query_tambah_prioritas($nama);

        if ($this->input->post('length') != -1) {
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
            
            return $this->db->get()->result_array();
        }
    }

    // jumlah semua data kelolaan
    public function jumlah_semua_tambah_prioritas($nama)
    {
        $this->db->select('*');
        $this->db->from('tr_prioritas');
        $a = $this->db->get()->result();
        $ay = array();
        foreach ($a as $b) {
            $ay[] = $b->id_debitur;
        }

        $im     = implode(',',$ay);
        $deb    = explode(',',$im); 

        $this->db->select('d.id_debitur, d.nama_debitur, d.id_care, d.no_reff, d.no_klaim, k.nama_lengkap as nama_verifikator, cab.cabang_bank, cap.capem_bank, b.bank, d.subrogasi_as as subrogasi, sum(r.nominal) as recoveries, j.add_time as tgl_ots');
		$this->db->from('debitur as d');
		$this->db->join('tr_recov_as as r', 'r.id_debitur = d.id_debitur', 'left');
		$this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'inner');
		$this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        $this->db->join('m_cabang_asuransi as asu','asu.id_cabang_asuransi = d.id_cabang_as','INNER');
		$this->db->join('m_korwil_asuransi as kor','kor.id_korwil_asuransi = asu.id_korwil_asuransi','INNER');
		$this->db->join('m_asuransi as asr', 'asr.id_asuransi = kor.id_asuransi', 'inner');
        $this->db->join('penempatan as p', 'p.id_capem_bank = cap.id_capem_bank', 'inner');
        $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'inner');
        $this->db->join('tr_prioritas as pri', 'pri.id_debitur = d.id_debitur', 'left');
        $this->db->join('kunjungan as j', 'j.id_debitur = d.id_debitur', 'left');
        $this->db->where("d.id_spk is not null");

        if ($deb[0] != "") {
            $this->db->where_not_in('d.id_debitur', $deb);
        }

        if ($nama['verifikator'] != 'a') {
            $this->db->where('k.id_karyawan', $nama['verifikator']);
        }
        if ($nama['capem_bank'] != 'a') {
            $this->db->where('cap.id_capem_bank', $nama['capem_bank']);
        }
    
        $this->db->group_by('tgl_ots');
        $this->db->group_by('cap.capem_bank');
        $this->db->group_by('nama_verifikator');
		$this->db->group_by('d.id_debitur');
		$this->db->group_by('cab.id_cabang_bank');
        $this->db->group_by('b.bank');
        $this->db->group_by('d.nama_debitur');
        $this->db->group_by('d.id_care');
        $this->db->group_by('d.no_klaim');
        $this->db->group_by('d.subrogasi_as');
        

        return $this->db->count_all_results();
    }

    // jumlah data filter kelolaan
    public function jumlah_filter_tambah_prioritas($nama)
    {
        $this->_get_datatables_query_tambah_prioritas($nama);
        return $this->db->get()->num_rows();
    }

    var $kolom_order_tambah_prioritas = [null, null, 'd.d.no_reff,', 'd.no_klaim', 'CAST(d.nama_debitur as VARCHAR)', null, 'b.bank', 'cab.cabang_bank', 'cap.capem_bank', 'CAST(j.add_time as VARCHAR)','k.nama_lengkap'];
    var $kolom_cari_tambah_prioritas  = ['LOWER(d.nama_debitur)', 'LOWER(b.bank)', 'LOWER(cab.cabang_bank)', 'LOWER(cap.capem_bank)'];
    var $order_tambah_prioritas       = ['d.nama_debitur' => 'asc'];

    // query tampil data kelolaan
    public function _get_datatables_query_tambah_prioritas($nama)
    {
        $this->db->select('*');
        $this->db->from('tr_prioritas');
        $a = $this->db->get()->result();
        $ay = array();
        foreach ($a as $b) {
            $ay[] = $b->id_debitur;
        }

        $im     = implode(',',$ay);
        $deb    = explode(',',$im); 

        $this->db->select('d.id_debitur, d.nama_debitur, d.id_care, d.no_reff, d.no_klaim, k.nama_lengkap as nama_verifikator, cab.cabang_bank, cap.capem_bank, b.bank, d.subrogasi_as as subrogasi, sum(r.nominal) as recoveries, j.add_time as tgl_ots');
		$this->db->from('debitur as d');
		$this->db->join('tr_recov_as as r', 'r.id_debitur = d.id_debitur', 'left');
		$this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'inner');
		$this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        $this->db->join('m_cabang_asuransi as asu','asu.id_cabang_asuransi = d.id_cabang_as','INNER');
		$this->db->join('m_korwil_asuransi as kor','kor.id_korwil_asuransi = asu.id_korwil_asuransi','INNER');
		$this->db->join('m_asuransi as asr', 'asr.id_asuransi = kor.id_asuransi', 'inner');
        $this->db->join('penempatan as p', 'p.id_capem_bank = cap.id_capem_bank', 'inner');
        $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'inner');
        $this->db->join('tr_prioritas as pri', 'pri.id_debitur = d.id_debitur', 'left');
        $this->db->join('kunjungan as j', 'j.id_debitur = d.id_debitur', 'left');
        $this->db->where("d.id_spk is not null");

        if ($deb[0] != "") {
            $this->db->where_not_in('d.id_debitur', $deb);
        }
        

        if ($nama['verifikator'] != 'a') {
            $this->db->where('k.id_karyawan', $nama['verifikator']);
        }
        if ($nama['capem_bank'] != 'a') {
            $this->db->where('cap.id_capem_bank', $nama['capem_bank']);
        }
        
        $this->db->group_by('tgl_ots');
        $this->db->group_by('cap.capem_bank');
        $this->db->group_by('nama_verifikator');
		$this->db->group_by('d.id_debitur');
		$this->db->group_by('cab.id_cabang_bank');
        $this->db->group_by('b.bank');
        $this->db->group_by('d.nama_debitur');
        $this->db->group_by('d.id_care');
        $this->db->group_by('d.no_klaim');
        $this->db->group_by('d.subrogasi_as');
        

        $b = 0;

        $input_cari = strtolower($_POST['search']['value']);
        $kolom_cari = $this->kolom_cari_tambah_prioritas;

        foreach ($kolom_cari as $cari) {
            if ($input_cari) {
                if ($b === 0) {
                    $this->db->group_start();
                    $this->db->like($cari, $input_cari);
                } else {
                    $this->db->or_like($cari, $input_cari);
                }

                if ((count($kolom_cari) - 1) == $b ) {
                    $this->db->group_end();
                }
            }

            $b++;
        }

        if (isset($_POST['order'])) {

            $kolom_order = $this->kolom_order_tambah_prioritas;
            $this->db->order_by($kolom_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            
        } elseif (isset($this->order_tambah_prioritas)) {
            
            $order = $this->order_tambah_prioritas;
            $this->db->order_by(key($order), $order[key($order)]);
            
        }
        
    }
    // AKHIR table serverside

    // Awal Datatables ServerSide

    // ambil data list kelolaan
    public function get_data_prioritas($nama)
    {
        $this->_get_datatables_query_prioritas($nama);

        if ($this->input->post('length') != -1) {
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
            
            return $this->db->get()->result_array();
        }
    }

    // jumlah semua data kelolaan
    public function jumlah_semua_prioritas($nama)
    {
        $this->db->select('count(id_debitur) as jumlah');
        $this->db->from('kunjungan');
        $this->db->where('id_debitur', 2);
        $a = $this->db->get_compiled_select();

        // $this->db->select('(SELECT SUM(payments.amount) FROM payments WHERE payments.invoice_id=4) AS amount_paid', FALSE);

        $this->db->select("d.id_debitur as id,d.nama_debitur, d.id_care, d.no_reff, d.no_klaim, k.nama_lengkap as nama_verifikator, cab.cabang_bank, cap.capem_bank, b.bank, d.subrogasi_as as subrogasi, sum(r.nominal) as recoveries, pri.end, pri.id_tr_prioritas, pri.add_time as tgl_prioritas, (SELECT COUNT(id_debitur) as jumlah FROM kunjungan WHERE id_debitur=d.id_debitur)");
		$this->db->from('debitur as d');
		$this->db->join('tr_recov_as as r', 'r.id_debitur = d.id_debitur', 'left');
		$this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'inner');
		$this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        $this->db->join('m_cabang_asuransi as asu','asu.id_cabang_asuransi = d.id_cabang_as','INNER');
		$this->db->join('m_korwil_asuransi as kor','kor.id_korwil_asuransi = asu.id_korwil_asuransi','INNER');
		$this->db->join('m_asuransi as asr', 'asr.id_asuransi = kor.id_asuransi', 'inner');
        $this->db->join('penempatan as p', 'p.id_capem_bank = cap.id_capem_bank', 'inner');
        $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'inner');
        $this->db->join('tr_prioritas as pri', 'pri.id_debitur = d.id_debitur', 'left');
        $this->db->where('pri.status', $nama['status']);
        $this->db->where("d.id_spk is not null");

        if ($nama['asuransi'] != 'a') {
            $this->db->where('asr.id_asuransi', $nama['asuransi']);
        }
        if ($nama['cabang_asuransi'] != 'a') {
            $this->db->where('asu.id_cabang_asuransi', $nama['cabang_asuransi']);
        }
        if ($nama['bank'] != 'a') {
            $this->db->where('b.id_bank', $nama['bank']);
        }
        if ($nama['cabang_bank'] != 'a') {
            $this->db->where('cab.id_cabang_bank', $nama['cabang_bank']);
        }
        if ($nama['capem_bank'] != 'a') {
            $this->db->where('cap.id_capem_bank', $nama['capem_bank']);
        }
        if (!empty($nama['tanggal_awal']) && !empty($nama['tanggal_akhir'])) {

            $tgl_awal   = nice_date($nama['tanggal_awal'], 'Y-m-d'); 
            $tgl_akhir  = nice_date($nama['tanggal_akhir'], 'Y-m-d');

            $this->db->where("CAST(pri.add_time AS VARCHAR) BETWEEN '$tgl_awal' AND '$tgl_akhir+1'");
        }
        if ($nama['verifikator'] != 'a') {
            $this->db->where('k.id_karyawan', $nama['verifikator']);
        }
        if ($nama['spk'] != 'a') {
            $this->db->where('d.id_spk', $nama['spk']);
        }

        $this->db->group_by('pri.id_tr_prioritas');
        $this->db->group_by('pri.end');
        $this->db->group_by('cap.capem_bank');
        $this->db->group_by('nama_verifikator');
		$this->db->group_by('d.id_debitur');
		$this->db->group_by('cab.id_cabang_bank');
        $this->db->group_by('b.bank');
        $this->db->group_by('d.nama_debitur');
        $this->db->group_by('d.id_care');
        $this->db->group_by('d.no_reff');
        $this->db->group_by('d.no_klaim');
        $this->db->group_by('d.subrogasi_as');

        return $this->db->count_all_results();
    }

    // jumlah data filter kelolaan
    public function jumlah_filter_prioritas($nama)
    {
        $this->_get_datatables_query_prioritas($nama);
        return $this->db->get()->num_rows();
    }

    var $kolom_order_prioritas = [null, 'd.no_reff', 'd.no_klaim', 'd.nama_debitur', null, 'b.bank', 'cab.cabang_bank', 'cap.capem_bank', 'k.nama_lengkap', 'CAST(pri.add_time as VARCHAR)', 'CAST(pri.end as VARCHAR)', 'jumlah'];
    var $kolom_cari_prioritas  = ['LOWER(d.nama_debitur)', 'LOWER(b.bank)', 'LOWER(cab.cabang_bank)', 'LOWER(cap.capem_bank)', 'LOWER(k.nama_lengkap)', 'LOWER(d.no_klaim)', 'CAST(pri.end as VARCHAR)'];
    var $order_prioritas       = ['d.nama_debitur' => 'asc'];

    // query tampil data kelolaan
    public function _get_datatables_query_prioritas($nama)
    {
        $this->db->select('count(id_debitur) as jumlah');
        $this->db->from('kunjungan');
        $this->db->where('id_debitur', 'd.id_debitur');
        $a = $this->db->get_compiled_select();

        // $this->db->select('(SELECT SUM(payments.amount) FROM payments WHERE payments.invoice_id=4) AS amount_paid', FALSE);

        $this->db->select("d.id_debitur as id,d.nama_debitur, d.id_care, d.no_reff, d.no_klaim, k.nama_lengkap as nama_verifikator, cab.cabang_bank, cap.capem_bank, b.bank, d.subrogasi_as as subrogasi, sum(r.nominal) as recoveries, pri.end, pri.id_tr_prioritas, pri.add_time as tgl_prioritas, (SELECT COUNT(id_debitur) as jumlah FROM kunjungan WHERE id_debitur=d.id_debitur GROUP BY id_debitur)");
		$this->db->from('debitur as d');
		$this->db->join('tr_recov_as as r', 'r.id_debitur = d.id_debitur', 'left');
		$this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'inner');
		$this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        $this->db->join('m_cabang_asuransi as asu','asu.id_cabang_asuransi = d.id_cabang_as','INNER');
		$this->db->join('m_korwil_asuransi as kor','kor.id_korwil_asuransi = asu.id_korwil_asuransi','INNER');
		$this->db->join('m_asuransi as asr', 'asr.id_asuransi = kor.id_asuransi', 'inner');
        $this->db->join('penempatan as p', 'p.id_capem_bank = cap.id_capem_bank', 'inner');
        $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'inner');
        $this->db->join('tr_prioritas as pri', 'pri.id_debitur = d.id_debitur', 'left');
        $this->db->where('pri.status', $nama['status']);
        $this->db->where("d.id_spk is not null");

        if ($nama['asuransi'] != 'a') {
            $this->db->where('asr.id_asuransi', $nama['asuransi']);
        }
        if ($nama['cabang_asuransi'] != 'a') {
            $this->db->where('asu.id_cabang_asuransi', $nama['cabang_asuransi']);
        }
        if ($nama['bank'] != 'a') {
            $this->db->where('b.id_bank', $nama['bank']);
        }
        if ($nama['cabang_bank'] != 'a') {
            $this->db->where('cab.id_cabang_bank', $nama['cabang_bank']);
        }
        if ($nama['capem_bank'] != 'a') {
            $this->db->where('cap.id_capem_bank', $nama['capem_bank']);
        }
        if (!empty($nama['tanggal_awal']) && !empty($nama['tanggal_akhir'])) {

            $tgl_awal   = nice_date($nama['tanggal_awal'], 'Y-m-d'); 
            $tgl_akhir  = nice_date($nama['tanggal_akhir'], 'Y-m-d');

            $this->db->where("CAST(pri.add_time AS VARCHAR) BETWEEN '$tgl_awal' AND '$tgl_akhir+1'");
        }
        if ($nama['verifikator'] != 'a') {
            $this->db->where('k.id_karyawan', $nama['verifikator']);
        }
        if ($nama['spk'] != 'a') {
            $this->db->where('d.id_spk', $nama['spk']);
        }

        $this->db->group_by('pri.id_tr_prioritas');
        $this->db->group_by('pri.end');
        $this->db->group_by('cap.capem_bank');
        $this->db->group_by('nama_verifikator');
		$this->db->group_by('d.id_debitur');
		$this->db->group_by('cab.id_cabang_bank');
        $this->db->group_by('b.bank');
        $this->db->group_by('d.nama_debitur');
        $this->db->group_by('d.id_care');
        $this->db->group_by('d.no_reff');
        $this->db->group_by('d.no_klaim');
        $this->db->group_by('d.subrogasi_as');

        $b = 0;

        $input_cari = strtolower($_POST['search']['value']);
        $kolom_cari = $this->kolom_cari_prioritas;

        foreach ($kolom_cari as $cari) {
            if ($input_cari) {
                if ($b === 0) {
                    $this->db->group_start();
                    $this->db->like($cari, $input_cari);
                } else {
                    $this->db->or_like($cari, $input_cari);
                }

                if ((count($kolom_cari) - 1) == $b ) {
                    $this->db->group_end();
                }
            }

            $b++;
        }

        if (isset($_POST['order'])) {

            $kolom_order = $this->kolom_order_prioritas;
            $this->db->order_by($kolom_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            
        } elseif (isset($this->order_prioritas)) {
            
            $order = $this->order_prioritas;
            $this->db->order_by(key($order), $order[key($order)]);
            
        }
        
    }
    // AKHIR table serverside

    // data untuk excel 
    public function get_data_prioritas_excel($nama)
    {
        $this->db->select("d.id_debitur as id,d.nama_debitur, d.id_care, d.no_reff, d.no_klaim, k.nama_lengkap as nama_verifikator, cab.cabang_bank, cap.capem_bank, b.bank, d.subrogasi_as as subrogasi, sum(r.nominal) as recoveries, pri.end, pri.id_tr_prioritas, pri.add_time, (SELECT COUNT(id_debitur) as jumlah FROM kunjungan WHERE id_debitur=d.id_debitur)");
		$this->db->from('debitur as d');
		$this->db->join('tr_recov_as as r', 'r.id_debitur = d.id_debitur', 'left');
		$this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'inner');
		$this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        $this->db->join('m_cabang_asuransi as asu','asu.id_cabang_asuransi = d.id_cabang_as','INNER');
		$this->db->join('m_korwil_asuransi as kor','kor.id_korwil_asuransi = asu.id_korwil_asuransi','INNER');
		$this->db->join('m_asuransi as asr', 'asr.id_asuransi = kor.id_asuransi', 'inner');
        $this->db->join('penempatan as p', 'p.id_capem_bank = cap.id_capem_bank', 'inner');
        $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'inner');
        $this->db->join('tr_prioritas as pri', 'pri.id_debitur = d.id_debitur', 'left');
        $this->db->where('pri.status', $nama['status']);

        if ($nama['asuransi'] != 'a') {
            $this->db->where('asr.id_asuransi', $nama['asuransi']);
        }
        if ($nama['cabang_asuransi'] != 'a') {
            $this->db->where('asu.id_cabang_asuransi', $nama['cabang_asuransi']);
        }
        if ($nama['bank'] != 'a') {
            $this->db->where('b.id_bank', $nama['bank']);
        }
        if ($nama['cabang_bank'] != 'a') {
            $this->db->where('cab.id_cabang_bank', $nama['cabang_bank']);
        }
        if ($nama['capem_bank'] != 'a') {
            $this->db->where('cap.id_capem_bank', $nama['capem_bank']);
        }
        if (!empty($nama['tanggal_awal']) && !empty($nama['tanggal_akhir'])) {

            $tgl_awal   = nice_date($nama['tanggal_awal'], 'Y-m-d'); 
            $tgl_akhir  = nice_date($nama['tanggal_akhir'], 'Y-m-d');

            $this->db->where("CAST(pri.add_time AS VARCHAR) BETWEEN '$tgl_awal' AND '$tgl_akhir+1'");
        }
        if ($nama['verifikator'] != 'a') {
            $this->db->where('k.id_karyawan', $nama['verifikator']);
        }
        if ($nama['spk'] != 'a') {
            $this->db->where('d.id_spk', $nama['spk']);
        }

        $this->db->group_by('pri.id_tr_prioritas');
        $this->db->group_by('pri.end');
        $this->db->group_by('cap.capem_bank');
        $this->db->group_by('nama_verifikator');
		$this->db->group_by('d.id_debitur');
		$this->db->group_by('cab.id_cabang_bank');
        $this->db->group_by('b.bank');
        $this->db->group_by('d.nama_debitur');
        $this->db->group_by('d.id_care');
        $this->db->group_by('d.no_reff');
        $this->db->group_by('d.no_klaim');
        $this->db->group_by('d.subrogasi_as');

        return $this->db->get();
    }

    /***********************************************************************/
    /*
    /*                      HALAMAN LIST KELOLAAN 
    /*
    /***********************************************************************/

    // menampilkan capem yang belum
    public function get_data_capem_ver($id_cab_bank)
    {
        $this->db->select('*');
        $this->db->from('penempatan');
        $a  = $this->db->get()->result();
        $ar = array();
        foreach ($a as $b) {
            $ar[] = $b->id_capem_bank;
        }
        $im = implode(",", $ar);
        $hasil = explode(",", $im);

        $this->db->select('cp.id_capem_bank, cab.cabang_bank, cp.capem_bank');
        $this->db->from('m_capem_bank cp');
		$this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cp.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        if (!empty($id_cab_bank)) {
            $this->db->where('cp.id_cabang_bank', $id_cab_bank);
        }
        
        if ($hasil[0] != "") {
            $this->db->where_not_in('cp.id_capem_bank', $hasil);
        }

        $this->db->order_by('cp.id_capem_bank', 'asc');
        

        return $this->db->get();
    }

    // fungsi untuk menampilkan data verfikator
     public function cari_data_kar($id_capem_bank)
     {
         $this->db->select('k.nama_lengkap as verifikator, c.capem_bank');
         $this->db->from('penempatan p');
         $this->db->join('karyawan k', 'k.id_karyawan = p.id_karyawan', 'inner');
         $this->db->join('m_capem_bank c', 'c.id_capem_bank = p.id_capem_bank', 'inner');
         $this->db->where('c.id_capem_bank', $id_capem_bank);
         
         
         return $this->db->get();
         
     }

    //  mencari detail debitur dari verifikator
    public function cari_capem_debitur($id_capem_bank, $id_karyawan)
    {
        // $this->db->select("d.id_debitur as id,d.nama_debitur, d.no_klaim, d.id_care, d.subrogasi_as as subrogasi, sum(r.nominal) as recoveries, cab.cabang_bank, cap.capem_bank, b.bank");
		// $this->db->from('debitur as d');
		// $this->db->join('tr_recov_as as r', 'r.id_debitur = d.id_debitur', 'inner');
		// $this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'inner');
		// $this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
        // $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        // $this->db->join('m_cabang_asuransi as asu','asu.id_cabang_asuransi = d.id_cabang_as','INNER');
        // $this->db->join('penempatan as p', 'p.id_capem_bank = d.id_capem_bank', 'inner');
        // $this->db->where('cap.id_capem_bank', $id_capem_bank);
        // $this->db->where('p.id_karyawan', $id_karyawan);
        
        // $this->db->group_by('cap.capem_bank');
		// $this->db->group_by('d.id_debitur');
		// $this->db->group_by('cab.id_cabang_bank');
        // $this->db->group_by('b.bank');
        // $this->db->group_by('d.nama_debitur');
        // $this->db->group_by('d.id_care');
        // $this->db->group_by('d.no_klaim');
        // $this->db->group_by('d.subrogasi_as');

        // SELECT d.nama_debitur, d.subrogasi_as, d.recoveries_awal_asuransi, (SELECT sum(nominal) as recoveries FROM tr_recov_as WHERE id_debitur = d.id_debitur)
        // FROM debitur as d 
        // JOIN penempatan as p ON p.id_capem_bank = d.id_capem_bank
        // WHERE p.id_capem_bank = 21 and p.id_karyawan = 6

        $this->db->select('d.*, b.*, cap.*, cab.*, asu.*, (SELECT sum(nominal) as recoveries FROM tr_recov_as WHERE id_debitur = d.id_debitur)');
        $this->db->from('debitur as d');
        $this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'inner');
		$this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        $this->db->join('m_cabang_asuransi as asu','asu.id_cabang_asuransi = d.id_cabang_as','inner');
        $this->db->join('penempatan as p', 'p.id_capem_bank = d.id_capem_bank', 'inner');
        $this->db->where('p.id_capem_bank', $id_capem_bank);
        $this->db->where('p.id_karyawan', $id_karyawan);
        
        return $this->db->get();
        
    }

    public function get_data_capem($id_cab_bank)
    {
        $this->db->select('*');
        $this->db->from('penempatan');
        $a  = $this->db->get()->result();
        $ar = array();
        foreach ($a as $b) {
            $ar[] = $b->id_capem_bank;
        }
        $im = implode(",", $ar);
        $hasil = explode(",", $im);

        $this->db->select('cp.id_capem_bank, cab.cabang_bank, cp.capem_bank');
        $this->db->from('m_capem_bank cp');
		$this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cp.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        if ($id_cab_bank != 'a') {
            $this->db->where('cp.id_cabang_bank', $id_cab_bank);
        }
        
        if ($hasil[0] != "") {
            $this->db->where_not_in('cp.id_capem_bank', $hasil);
        }

        $this->db->order_by('cp.id_capem_bank', 'asc');
        

        return $this->db->get();
        
    }

    // get data verfikator
    public function get_verifikator()
    {
        $this->db->select('k.nama_lengkap, k.id_karyawan');
        $this->db->from('karyawan k');
        $this->db->join('penempatan p', 'p.id_karyawan = k.id_karyawan', 'inner');
        $this->db->group_by('k.id_karyawan');
        $this->db->group_by('k.nama_lengkap');
        
        return $this->db->get();       
    }
    
    // Awal Datatables ServerSide

    // ambil data list kelolaan
    public function get_data_kelolaan($nama)
    {
        $this->_get_datatables_query_kelolaan($nama);

        if ($this->input->post('length') != -1) {
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
            
            return $this->db->get()->result_array();
        }
    }

    // jumlah semua data kelolaan
    public function jumlah_semua_kelolaan($nama)
    {
        $this->db->select('k.id_karyawan, k.nama_lengkap as nama_verifikator, cab.cabang_bank, cap.id_capem_bank, cap.capem_bank, b.bank');
        $this->db->from('penempatan p');
        $this->db->join('m_capem_bank cap', 'cap.id_capem_bank = p.id_capem_bank', 'inner');
        $this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'inner');

        if ($nama['bank'] != 'a') {
            $this->db->where('b.id_bank', $nama['bank']);
        }
        if ($nama['cabang_bank'] != 'a') {
            $this->db->where('cab.id_cabang_bank', $nama['cabang_bank']);
        }
        if ($nama['capem_bank'] != 'a') {
            $this->db->where('cap.id_capem_bank', $nama['capem_bank']);
        }
        if ($nama['id_karyawan'] != 'a') {
            $this->db->where('k.id_karyawan', $nama['id_karyawan']);
        }

        $this->db->order_by('p.id_penempatan', 'desc');
    
        $this->db->group_by('k.id_karyawan');
        $this->db->group_by('p.id_penempatan');
        $this->db->group_by('cab.cabang_bank');
        $this->db->group_by('cap.capem_bank');
        $this->db->group_by('cap.id_capem_bank');
        $this->db->group_by('b.bank');

        return $this->db->count_all_results();
    }

    // jumlah data filter kelolaan
    public function jumlah_filter_kelolaan($nama)
    {
        $this->_get_datatables_query_kelolaan($nama);
        return $this->db->get()->num_rows();
    }

    // var $kolom_order_kelolaan = [null, 'd.id_care', 'd.no_klaim', 'd.nama_debitur', null, 'b.bank', 'cab.cabang_bank', 'cap.capem_bank', 'k.nama_lengkap'];
    // var $kolom_cari_kelolaan  = ['d.id_care', 'd.no_klaim', 'd.nama_debitur', 'b.bank', 'cab.cabang_bank', 'cap.capem_bank', 'k.nama_lengkap'];
    // var $order_kelolaan       = ['d.id_debitur' => 'desc'];

    var $kolom_order_kelolaan = [null, 'LOWER(k.nama_lengkap)', 'LOWER(cab.cabang_bank)', 'LOWER(cap.capem_bank)', 'LOWER(b.bank)'];
    var $kolom_cari_kelolaan  = ['LOWER(k.nama_lengkap)', 'LOWER(cab.cabang_bank)', 'LOWER(cap.capem_bank)', 'LOWER(b.bank)'];
    var $order_kelolaan       = ['k.id_karyawan' => 'desc'];


    // query tampil data kelolaan
    public function _get_datatables_query_kelolaan($nama)
    {
        // $this->db->select('d.nama_debitur, d.id_care, d.no_klaim, k.nama_lengkap as nama_verifikator, cab.cabang_bank, cap.capem_bank, b.bank');
		// $this->db->from('debitur as d');
		// $this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'inner');
		// $this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
        // $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        // $this->db->join('m_cabang_asuransi as asu','asu.id_cabang_asuransi = d.id_cabang_as','INNER');
		// $this->db->join('m_korwil_asuransi as kor','kor.id_korwil_asuransi = asu.id_korwil_asuransi','INNER');
		// $this->db->join('m_asuransi as asr', 'asr.id_asuransi = kor.id_asuransi', 'inner');
        // $this->db->join('penempatan as p', 'p.id_capem_bank = cap.id_capem_bank', 'inner');
        // $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'inner');

        // if ($nama['asuransi'] != 'a') {
        //     $this->db->where('asr.id_asuransi', $nama['asuransi']);
        // }
        // if ($nama['cabang_asuransi'] != 'a') {
        //     $this->db->where('asu.id_cabang_asuransi', $nama['cabang_asuransi']);
        // }
        // if ($nama['bank'] != 'a') {
        //     $this->db->where('b.id_bank', $nama['bank']);
        // }
        // if ($nama['cabang_bank'] != 'a') {
        //     $this->db->where('cab.id_cabang_bank', $nama['cabang_bank']);
        // }
        // if ($nama['capem_bank'] != 'a') {
        //     $this->db->where('cap.id_capem_bank', $nama['capem_bank']);
        // }
        // if ($nama['tanggal_awal'] != '' && $nama['tanggal_akhir'] != '') {

        //     $tgl_awal   = $nama['tanggal_awal']; 
        //     $tgl_akhir  = $nama['tanggal_akhir'];

        //     $this->db->where("CAST(d.add_time AS VARCHAR) BETWEEN '$tgl_awal' AND '$tgl_akhir+1'");
        // }

        // $this->db->group_by('d.id_care');
        // $this->db->group_by('d.no_klaim');
        // $this->db->group_by('cap.capem_bank');
        // $this->db->group_by('nama_verifikator');
        // $this->db->group_by('d.nama_debitur');
        // $this->db->group_by('d.id_debitur');
		// $this->db->group_by('cab.id_cabang_bank');
        // $this->db->group_by('b.bank');
        
        $this->db->select('k.id_karyawan, k.nama_lengkap as nama_verifikator, cab.cabang_bank,cap.id_capem_bank, cap.capem_bank, b.bank, p.id_penempatan');
        $this->db->from('penempatan p');
        $this->db->join('m_capem_bank cap', 'cap.id_capem_bank = p.id_capem_bank', 'inner');
        $this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'inner');

        if ($nama['bank'] != 'a') {
            $this->db->where('b.id_bank', $nama['bank']);
        }
        if ($nama['cabang_bank'] != 'a') {
            $this->db->where('cab.id_cabang_bank', $nama['cabang_bank']);
        }
        if ($nama['capem_bank'] != 'a') {
            $this->db->where('cap.id_capem_bank', $nama['capem_bank']);
        }
        if ($nama['id_karyawan'] != 'a') {
            $this->db->where('k.id_karyawan', $nama['id_karyawan']);
        }

        $this->db->order_by('p.id_penempatan', 'desc');
    
        $this->db->group_by('k.id_karyawan');
        $this->db->group_by('p.id_penempatan');
        $this->db->group_by('cab.cabang_bank');
        $this->db->group_by('cap.capem_bank');
        $this->db->group_by('cap.id_capem_bank');
        $this->db->group_by('b.bank');
        

        $b = 0;

        $input_cari = strtolower($_POST['search']['value']);
        $kolom_cari = $this->kolom_cari_kelolaan;

        foreach ($kolom_cari as $cari) {
            if ($input_cari) {
                if ($b === 0) {
                    $this->db->group_start();
                    $this->db->like($cari, $input_cari);
                } else {
                    $this->db->or_like($cari, $input_cari);
                }

                if ((count($kolom_cari) - 1) == $b ) {
                    $this->db->group_end();
                }
            }

            $b++;
        }

        if (isset($_POST['order'])) {

            $kolom_order = $this->kolom_order_kelolaan;
            $this->db->order_by($kolom_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            
        } elseif (isset($this->order_kelolaan)) {
            
            $order = $this->order_kelolaan;
            $this->db->order_by(key($order), $order[key($order)]);
            
        }
        
    }
    // AKHIR table serverside

    /***********************************************************************/
    /*
    /*                      HALAMAN DESK COLLECTION 
    /*
    /***********************************************************************/

    // cari call_fu 
    public function cari_data_fu($id_tr_p)
    {
        $this->db->select('*');
        $this->db->from('tr_fu');
        $this->db->where('id_tr_potensial', $id_tr_p);
        $this->db->order_by('fu', 'desc');
        
        return $this->db->get();
    }

    public function cari_data_status_tindakan($id_debitur)
    {
        $this->db->select('t.status_tindakan, p.id_tr_potensial, t.id_status_tindakan');
        $this->db->from('kunjungan as k');
        $this->db->join('tr_potensial as p', 'p.id_kunjungan = k.id_kunjungan', 'inner');
        $this->db->join('status_tindakan as t', 't.id_status_tindakan = p.status_tindakan', 'inner');
        $this->db->where('k.id_debitur', $id_debitur);
        
        return $this->db->get();
        
    }

    // menampilkan data kartu debitur
    public function get_data_kartu_debitur($id_debitur)
    {
        $this->db->select('d.id_debitur, d.nama_debitur, d.id_care, d.no_klaim, d.no_reff, d.id_cabang_as, d.subrogasi_as as subrogasi, d.bunga, d.denda, d.jenis_kredit, t.telp_debitur, d.alamat_awal, d.besar_klaim, da.nilai_taksiran, ja.jenis_asset, l.legalitas_asset, cab.cabang_bank, cap.capem_bank, b.bank, sum(r.nominal) as recoveries, de.nominal_denda, (SELECT telp_pic FROM kunjungan where id_debitur = d.id_debitur order by add_time desc LIMIT 1), (select no_spk from spk where d.id_spk = spk.id_spk)');
		$this->db->from('debitur as d');
		$this->db->join('tr_recov_as as r', 'r.id_debitur = d.id_debitur', 'left');
		$this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'inner');
		$this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        $this->db->join('telp_debitur as t', 't.id_debitur = d.id_debitur', 'left');
        $this->db->join('alamat_debitur as a', 'a.id_debitur = d.id_debitur', 'left');
        $this->db->join('denda as de', 'de.id_debitur = d.id_debitur', 'left');
        $this->db->join('dokumen_asset as da', 'da.id_debitur = d.id_debitur', 'left');
        $this->db->join('m_jenis_asset as ja', 'ja.id_jenis_asset = da.id_jenis_asset', 'left');
        $this->db->join('legalitas_asset as l', 'l.id_legalitas_asset = da.id_legalitas_asset', 'left');
        $this->db->where('d.id_debitur', $id_debitur);
        // $this->db->where('da.status', 1);

        $this->db->group_by('d.nama_debitur');
        $this->db->group_by('d.no_klaim');
        $this->db->group_by('d.no_reff');
        $this->db->group_by('d.id_cabang_as');
        $this->db->group_by('d.id_capem_bank');
        $this->db->group_by('d.subrogasi_as');
        $this->db->group_by('d.add_by');
        $this->db->group_by('d.penyebab_klaim');
        $this->db->group_by('d.id_care');
        $this->db->group_by('d.potensial');
        $this->db->group_by('d.ots');
        $this->db->group_by('d.deal_type');
        $this->db->group_by('d.jenis_kredit');
        $this->db->group_by('d.pokok');
        $this->db->group_by('d.bunga');
        $this->db->group_by('d.denda');
        $this->db->group_by('d.jumlah');
        $this->db->group_by('d.besar_klaim');
        $this->db->group_by('de.nominal_denda');
        $this->db->group_by('d.alamat_awal');
        $this->db->group_by('d.besar_klaim');
        $this->db->group_by('da.nilai_taksiran');
        $this->db->group_by('ja.jenis_asset');
        $this->db->group_by('l.legalitas_asset');
        $this->db->group_by('t.telp_debitur');
        $this->db->group_by('d.id_debitur');
        $this->db->group_by('cab.cabang_bank');
        $this->db->group_by('cap.capem_bank');
        $this->db->group_by('b.bank');
        
        return $this->db->get();       
    }

    // menampilkan data recoveries
    public function get_data_recov($id_debitur)
    {
        $this->db->order_by('tgl_bayar', 'desc');
        return $this->db->get_where('tr_recov_as', array('id_debitur' => $id_debitur));
    }

    // ambil data deskcol excel
    public function get_data_desk_col_unduh($nama, $syariah)
    {
        $this->db->select('d.id_debitur, d.id_care, d.no_reff, d.nama_debitur, d.no_klaim, cab.cabang_bank, cap.capem_bank, b.bank, t.telp_debitur, f.id_tr_potensial');
		$this->db->from('debitur as d');
		$this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'inner');
		$this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        $this->db->join('m_cabang_asuransi as asu','asu.id_cabang_asuransi = d.id_cabang_as','INNER');
		$this->db->join('m_korwil_asuransi as kor','kor.id_korwil_asuransi = asu.id_korwil_asuransi','INNER');
        $this->db->join('m_asuransi as asr', 'asr.id_asuransi = kor.id_asuransi', 'inner');
        $this->db->join('telp_debitur as t', 't.id_debitur = d.id_debitur', 'left');
        $this->db->join('tr_fu as f', 'f.id_debitur = d.id_debitur', 'inner');
        $this->db->join('penempatan as p', 'p.id_capem_bank = cap.id_capem_bank', 'inner');
        $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'inner');
        $this->db->where('f.status_fu', 1);
        
        if ($syariah != "") {
            $this->db->where('asr.id_asuransi', 2);
        }
        
        if ($nama['asuransi'] != 'a') {
            $this->db->where('asr.id_asuransi', $nama['asuransi']);
        }
        if ($nama['cabang_asuransi'] != 'a') {
            $this->db->where('asu.id_cabang_asuransi', $nama['cabang_asuransi']);
        }
        if ($nama['bank'] != 'a') {
            $this->db->where('b.id_bank', $nama['bank']);
        }
        if ($nama['cabang_bank'] != 'a') {
            $this->db->where('cab.id_cabang_bank', $nama['cabang_bank']);
        }
        if ($nama['capem_bank'] != 'a') {
            $this->db->where('cap.id_capem_bank', $nama['capem_bank']);
        }
        if ($nama['ver'] != 'a') {
            $this->db->where('k.id_karyawan', $nama['ver']);
        }
        if ($nama['spk'] != 'a') {
            if ($nama['spk'] == 'null') {
                $this->db->where("d.id_spk is null");
            } else {
                $this->db->where('d.id_spk', $nama['spk']);
            }
        }
        if ($nama['tanggal_awal'] != '' && $nama['tanggal_akhir'] != '') {

            $tgl_awal   = nice_date($nama['tanggal_awal'], 'Y-m-d'); 
            $tgl_akhir  = nice_date($nama['tanggal_akhir'], 'Y-m-d');

            $this->db->where("CAST(d.add_time AS VARCHAR) BETWEEN '$tgl_awal' AND '$tgl_akhir+1'");
        }

        return $this->db->get();
    }

    // Awal Datatables ServerSide

    // ambil data ots
    public function get_data_desk_col($nama, $syariah)
    {
        $this->_get_datatables_query_desk_col($nama, $syariah);

        if ($this->input->post('length') != -1) {
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
            
            return $this->db->get()->result_array();
        }
    }

    // jumlah semua data ots
    public function jumlah_semua_desk_col($nama, $syariah)
    {
        $this->db->select('d.id_debitur, d.id_care, d.no_reff, d.nama_debitur, d.no_klaim, cab.cabang_bank, cap.capem_bank, b.bank, t.telp_debitur, f.id_tr_potensial, (SELECT telp_pic FROM kunjungan where id_debitur = d.id_debitur order by add_time desc LIMIT 1)');
		$this->db->from('debitur as d');
		$this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'inner');
		$this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        $this->db->join('m_cabang_asuransi as asu','asu.id_cabang_asuransi = d.id_cabang_as','INNER');
		$this->db->join('m_korwil_asuransi as kor','kor.id_korwil_asuransi = asu.id_korwil_asuransi','INNER');
        $this->db->join('m_asuransi as asr', 'asr.id_asuransi = kor.id_asuransi', 'inner');
        $this->db->join('telp_debitur as t', 't.id_debitur = d.id_debitur', 'left');
        $this->db->join('tr_fu as f', 'f.id_debitur = d.id_debitur', 'inner');
        $this->db->join('penempatan as p', 'p.id_capem_bank = cap.id_capem_bank', 'inner');
        $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'inner');
        $this->db->where('f.status_fu', 1);

        if ($syariah != "") {
            $this->db->where('asr.id_asuransi', 2);
        }

        if ($nama['asuransi'] != 'a') {
            $this->db->where('asr.id_asuransi', $nama['asuransi']);
        }
        if ($nama['cabang_asuransi'] != 'a') {
            $this->db->where('asu.id_cabang_asuransi', $nama['cabang_asuransi']);
        }
        if ($nama['bank'] != 'a') {
            $this->db->where('b.id_bank', $nama['bank']);
        }
        if ($nama['cabang_bank'] != 'a') {
            $this->db->where('cab.id_cabang_bank', $nama['cabang_bank']);
        }
        if ($nama['capem_bank'] != 'a') {
            $this->db->where('cap.id_capem_bank', $nama['capem_bank']);
        }
        if ($nama['verifikator'] != 'a') {
            $this->db->where('k.id_karyawan', $nama['verifikator']);
        }
        if ($nama['spk'] != 'a') {
            if ($nama['spk'] == 'null') {
                $this->db->where("d.id_spk is null");
            } else {
                $this->db->where('d.id_spk', $nama['spk']);
            }
        }
        if ($nama['tanggal_awal'] != '' && $nama['tanggal_akhir'] != '') {

            $tgl_awal   = nice_date($nama['tanggal_awal'], 'Y-m-d'); 
            $tgl_akhir  = nice_date($nama['tanggal_akhir'], 'Y-m-d');

            $this->db->where("to_char(tanggal_fu, 'YYYY-MM-DD') BETWEEN '$tgl_awal' AND '$tgl_akhir'");
        }

        return $this->db->count_all_results();
    }

    // jumlah data filter ots
    public function jumlah_filter_desk_col($nama, $syariah)
    {
        $this->_get_datatables_query_desk_col($nama, $syariah);
        return $this->db->get()->num_rows();
    }

    var $kolom_order_desk_col = [null, 'd.no_reff', 'd.no_klaim', 'd.nama_debitur', 'telp_pic', null, null, null, 'b.bank', 'cab.cabang_bank', 'cap.capem_bank'];
    var $kolom_cari_desk_col  = ['LOWER(d.no_klaim)', 'LOWER(d.nama_debitur)', 'LOWER(b.bank)', 'LOWER(cab.cabang_bank)', 'LOWER(cap.capem_bank)'];
    var $order_desk_col       = ['d.id_debitur' => 'desc'];

    // query tampil data ots
    public function _get_datatables_query_desk_col($nama, $syariah)
    {
        $this->db->select('d.id_debitur, d.id_care, d.no_reff, d.nama_debitur, d.no_klaim, cab.cabang_bank, cap.capem_bank, b.bank, t.telp_debitur, f.id_tr_potensial, (SELECT telp_pic FROM kunjungan where id_debitur = d.id_debitur order by add_time desc LIMIT 1)');
		$this->db->from('debitur as d');
		$this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'inner');
		$this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        $this->db->join('m_cabang_asuransi as asu','asu.id_cabang_asuransi = d.id_cabang_as','INNER');
		$this->db->join('m_korwil_asuransi as kor','kor.id_korwil_asuransi = asu.id_korwil_asuransi','INNER');
        $this->db->join('m_asuransi as asr', 'asr.id_asuransi = kor.id_asuransi', 'inner');
        $this->db->join('telp_debitur as t', 't.id_debitur = d.id_debitur', 'left');
        $this->db->join('tr_fu as f', 'f.id_debitur = d.id_debitur', 'inner');
        $this->db->join('penempatan as p', 'p.id_capem_bank = cap.id_capem_bank', 'inner');
        $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'inner');
        $this->db->where('f.status_fu', 1);

        if ($syariah != "") {
            $this->db->where('asr.id_asuransi', 2);
        }

        if ($nama['asuransi'] != 'a') {
            $this->db->where('asr.id_asuransi', $nama['asuransi']);
        }
        if ($nama['cabang_asuransi'] != 'a') {
            $this->db->where('asu.id_cabang_asuransi', $nama['cabang_asuransi']);
        }
        if ($nama['bank'] != 'a') {
            $this->db->where('b.id_bank', $nama['bank']);
        }
        if ($nama['cabang_bank'] != 'a') {
            $this->db->where('cab.id_cabang_bank', $nama['cabang_bank']);
        }
        if ($nama['capem_bank'] != 'a') {
            $this->db->where('cap.id_capem_bank', $nama['capem_bank']);
        }
        if ($nama['verifikator'] != 'a') {
            $this->db->where('k.id_karyawan', $nama['verifikator']);
        }
        if ($nama['spk'] != 'a') {
            if ($nama['spk'] == 'null') {
                $this->db->where("d.id_spk is null");
            } else {
                $this->db->where('d.id_spk', $nama['spk']);
            }
        }
        if ($nama['tanggal_awal'] != '' && $nama['tanggal_akhir'] != '') {

            $tgl_awal   = nice_date($nama['tanggal_awal'], 'Y-m-d'); 
            $tgl_akhir  = nice_date($nama['tanggal_akhir'], 'Y-m-d');

            $this->db->where("to_char(tanggal_fu, 'YYYY-MM-DD') BETWEEN '$tgl_awal' AND '$tgl_akhir'");
        }

        $b = 0;

        $input_cari = strtolower($_POST['search']['value']);
        $kolom_cari = $this->kolom_cari_desk_col;

        foreach ($kolom_cari as $cari) {
            if ($input_cari) {
                if ($b === 0) {
                    $this->db->group_start();
                    $this->db->like($cari, $input_cari);
                } else {
                    $this->db->or_like($cari, $input_cari);
                }

                if ((count($kolom_cari) - 1) == $b ) {
                    $this->db->group_end();
                }
            }

            $b++;
        }

        if (isset($_POST['order'])) {

            $kolom_order = $this->kolom_order_desk_col;
            $this->db->order_by($kolom_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            
        } elseif (isset($this->order_desk_col)) {
            
            $order = $this->order_desk_col;
            $this->db->order_by(key($order), $order[key($order)]);
            
        }
        
    }
    // AKHIR table serverside

    // ************************************************************ //

    // 09-03-2020

        // menampilkan data unduh excel
        public function get_data_unduh_excel_latlong($data)
        {
            $this->db->select('d.id_debitur, d.nama_debitur, d.id_care, d.no_reff, d.no_klaim, k.nama_lengkap as nama_verifikator, cab.cabang_bank, cap.capem_bank, b.bank, d.subrogasi_as as subrogasi, d.recoveries_awal_asuransi as r_awal_as, j.*');
            $this->db->from('debitur as d');
            $this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'inner');
            $this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
            $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
            $this->db->join('m_cabang_asuransi as asu','asu.id_cabang_asuransi = d.id_cabang_as','INNER');
            $this->db->join('m_korwil_asuransi as kor','kor.id_korwil_asuransi = asu.id_korwil_asuransi','INNER');
            $this->db->join('m_asuransi as asr', 'asr.id_asuransi = kor.id_asuransi', 'inner');
            $this->db->join('penempatan as p', 'p.id_capem_bank = cap.id_capem_bank', 'inner');
            $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'inner');
            $this->db->join('kunjungan as j', 'j.id_debitur = d.id_debitur', 'inner');        

            if ($data['asuransi'] != 'a') {
                $this->db->where('asr.id_asuransi', $data['asuransi']);
            }
            if ($data['cabang_asuransi'] != 'a') {
                $this->db->where('asu.id_cabang_asuransi', $data['cabang_asuransi']);
            }
            if ($data['bank'] != 'a') {
                $this->db->where('b.id_bank', $data['bank']);
            }
            if ($data['cabang_bank'] != 'a') {
                $this->db->where('cab.id_cabang_bank', $data['cabang_bank']);
            }
            if ($data['capem_bank'] != 'a') {
                $this->db->where('cap.id_capem_bank', $data['capem_bank']);
            }
            if ($data['ver'] != 'a') {
                $this->db->where('k.id_karyawan', $data['verifikator']);
            }
            if ($data['spk'] != 'a') {
                if ($data['spk'] == 'null') {
                    $this->db->where("d.id_spk is null");
                } else {
                    $this->db->where('d.id_spk', $data['spk']);
                }
            }
            if ($data['tanggal_awal'] != '' && $data['tanggal_akhir'] != '') {

                $tgl_awal   = nice_date($data['tanggal_awal'], 'Y-m-d'); 
                $tgl_akhir  = nice_date($data['tanggal_akhir'], 'Y-m-d');

                $this->db->where("to_char(j.add_time, 'YYYY-MM-DD') BETWEEN '$tgl_awal' AND '$tgl_akhir'");
            }

            return $this->db->get();
            
        }

    // Akhir 09-03-2020

    // Lat Long

    public function get_data_latlong($nama)
    {
        $this->_get_datatables_query_latlong($nama);

        if ($this->input->post('length') != -1) {
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
            
            return $this->db->get()->result_array();
        }
    }

    var $kolom_order_latlong = [null, 'd.no_reff', 'd.no_klaim', 'd.nama_debitur', 'CAST(j.latitude AS VARCHAR)', 'CAST(j.longitude AS VARCHAR)', 'j.alamat', 'j.add_time','j.keterangan', 'b.bank', 'cab.cabang_bank', 'cap.capem_bank'];
    var $kolom_cari_latlong  = ['LOWER(d.no_reff)', 'LOWER(d.no_klaim)', 'LOWER(d.nama_debitur)', 'LOWER(b.bank)', 'LOWER(cab.cabang_bank)', 'LOWER(cap.capem_bank)', 'LOWER(j.alamat)', 'CAST(j.longitude AS VARCHAR)', 'CAST(j.latitude AS VARCHAR)', 'LOWER(j.keterangan)'];
    var $order_latlong       = ['d.nama_debitur' => 'asc'];

    public function _get_datatables_query_latlong($nama)
    {
        $this->db->select('d.id_debitur, d.nama_debitur, d.id_care, d.no_reff, d.no_klaim, k.nama_lengkap as nama_verifikator, cab.cabang_bank, cap.capem_bank, b.bank, d.subrogasi_as as subrogasi, d.recoveries_awal_asuransi as r_awal_as, j.*');
        $this->db->from('debitur as d');
		$this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'inner');
		$this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        $this->db->join('m_cabang_asuransi as asu','asu.id_cabang_asuransi = d.id_cabang_as','INNER');
		$this->db->join('m_korwil_asuransi as kor','kor.id_korwil_asuransi = asu.id_korwil_asuransi','INNER');
		$this->db->join('m_asuransi as asr', 'asr.id_asuransi = kor.id_asuransi', 'inner');
        $this->db->join('penempatan as p', 'p.id_capem_bank = cap.id_capem_bank', 'inner');
        $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'inner');
        $this->db->join('kunjungan as j', 'j.id_debitur = d.id_debitur', 'inner');        

        if ($nama['asuransi'] != 'a') {
            $this->db->where('asr.id_asuransi', $nama['asuransi']);
        }
        if ($nama['cabang_asuransi'] != 'a') {
            $this->db->where('asu.id_cabang_asuransi', $nama['cabang_asuransi']);
        }
        if ($nama['bank'] != 'a') {
            $this->db->where('b.id_bank', $nama['bank']);
        }
        if ($nama['cabang_bank'] != 'a') {
            $this->db->where('cab.id_cabang_bank', $nama['cabang_bank']);
        }
        if ($nama['capem_bank'] != 'a') {
            $this->db->where('cap.id_capem_bank', $nama['capem_bank']);
        }
        if ($nama['verifikator'] != 'a') {
            $this->db->where('k.id_karyawan', $nama['verifikator']);
        }
        if ($nama['spk'] != 'a') {
            if ($nama['spk'] == 'null') {
                $this->db->where("d.id_spk is null");
            } else {
                $this->db->where('d.id_spk', $nama['spk']);
            }
        }
        
        if ($nama['tanggal_awal'] != '' && $nama['tanggal_akhir'] != '') {

            $tgl_awal   = nice_date($nama['tanggal_awal'], 'Y-m-d'); 
            $tgl_akhir  = nice_date($nama['tanggal_akhir'], 'Y-m-d');

            $this->db->where("to_char(j.add_time, 'YYYY-MM-DD') BETWEEN '$tgl_awal' AND '$tgl_akhir'");
        }

        $b = 0;

        $input_cari = strtolower($_POST['search']['value']);
        $kolom_cari = $this->kolom_cari_latlong;

        foreach ($kolom_cari as $cari) {
            if ($input_cari) {
                if ($b === 0) {
                    $this->db->group_start();
                    $this->db->like($cari, $input_cari);
                } else {
                    $this->db->or_like($cari, $input_cari);
                }

                if ((count($kolom_cari) - 1) == $b ) {
                    $this->db->group_end();
                }
            }

            $b++;
        }

        if (isset($_POST['order'])) {

            $kolom_order = $this->kolom_order_latlong;
            $this->db->order_by($kolom_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            
        } elseif (isset($this->order_latlong)) {
            
            $order = $this->order_latlong;
            $this->db->order_by(key($order), $order[key($order)]);
            
        }
        
    }

    public function jumlah_semua_latlong($nama)
    {
        $this->db->select('d.id_debitur, d.nama_debitur, d.id_care, d.no_reff, d.no_klaim, k.nama_lengkap as nama_verifikator, cab.cabang_bank, cap.capem_bank, b.bank, d.subrogasi_as as subrogasi, d.recoveries_awal_asuransi as r_awal_as, j.*');
        $this->db->from('debitur as d');
		$this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'inner');
		$this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        $this->db->join('m_cabang_asuransi as asu','asu.id_cabang_asuransi = d.id_cabang_as','INNER');
		$this->db->join('m_korwil_asuransi as kor','kor.id_korwil_asuransi = asu.id_korwil_asuransi','INNER');
		$this->db->join('m_asuransi as asr', 'asr.id_asuransi = kor.id_asuransi', 'inner');
        $this->db->join('penempatan as p', 'p.id_capem_bank = cap.id_capem_bank', 'inner');
        $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'inner');
        $this->db->join('kunjungan as j', 'j.id_debitur = d.id_debitur', 'inner');        

        if ($nama['asuransi'] != 'a') {
            $this->db->where('asr.id_asuransi', $nama['asuransi']);
        }
        if ($nama['cabang_asuransi'] != 'a') {
            $this->db->where('asu.id_cabang_asuransi', $nama['cabang_asuransi']);
        }
        if ($nama['bank'] != 'a') {
            $this->db->where('b.id_bank', $nama['bank']);
        }
        if ($nama['cabang_bank'] != 'a') {
            $this->db->where('cab.id_cabang_bank', $nama['cabang_bank']);
        }
        if ($nama['capem_bank'] != 'a') {
            $this->db->where('cap.id_capem_bank', $nama['capem_bank']);
        }
        if ($nama['verifikator'] != 'a') {
            $this->db->where('k.id_karyawan', $nama['verifikator']);
        }
        if ($nama['spk'] != 'a') {
            if ($nama['spk'] == 'null') {
                $this->db->where("d.id_spk is null");
            } else {
                $this->db->where('d.id_spk', $nama['spk']);
            }
        }
        if ($nama['tanggal_awal'] != '' && $nama['tanggal_akhir'] != '') {

            $tgl_awal   = nice_date($nama['tanggal_awal'], 'Y-m-d'); 
            $tgl_akhir  = nice_date($nama['tanggal_akhir'], 'Y-m-d');

            $this->db->where("to_char(j.add_time, 'YYYY-MM-DD') BETWEEN '$tgl_awal' AND '$tgl_akhir'");
        }

        return $this->db->count_all_results();
    }

    public function jumlah_filter_latlong($nama)
    {
        $this->_get_datatables_query_latlong($nama);
        return $this->db->get()->num_rows();
    }

    // Awal Datatables ServerSide

    // 10-03-2020

        // ambil data unduh excel validasi agunan
        public function get_data_excel_validasi_agunan($nama)
        {
            $this->db->select('d.id_debitur, d.nama_debitur, d.id_care, d.no_reff, d.no_klaim, k.nama_lengkap as nama_verifikator, cab.cabang_bank, cap.capem_bank, b.bank, d.subrogasi_as as subrogasi, d.recoveries_awal_asuransi as r_awal_as, (SELECT sum(nominal) as tot_nominal_as FROM tr_recov_as where id_debitur=d.id_debitur), j.add_time as tanggal_ots, tp.id_tr_potensial');
            $this->db->from('debitur as d');
            $this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'inner');
            $this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
            $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
            $this->db->join('m_cabang_asuransi as asu','asu.id_cabang_asuransi = d.id_cabang_as','INNER');
            $this->db->join('m_korwil_asuransi as kor','kor.id_korwil_asuransi = asu.id_korwil_asuransi','INNER');
            $this->db->join('m_asuransi as asr', 'asr.id_asuransi = kor.id_asuransi', 'inner');
            $this->db->join('penempatan as p', 'p.id_capem_bank = cap.id_capem_bank', 'inner');
            $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'inner');
            $this->db->join('kunjungan as j', 'j.id_debitur = d.id_debitur', 'inner');
            $this->db->join("tr_potensial as tp", 'tp.id_kunjungan = j.id_kunjungan', 'inner');

            $this->db->where('tp.ots', 1);
            $this->db->where('tp.status', 1);

            if ($nama['asuransi'] != 'a') {
                $this->db->where('asr.id_asuransi', $nama['asuransi']);
            }
            if ($nama['cabang_asuransi'] != 'a') {
                $this->db->where('asu.id_cabang_asuransi', $nama['cabang_asuransi']);
            }
            if ($nama['bank'] != 'a') {
                $this->db->where('b.id_bank', $nama['bank']);
            }
            if ($nama['cabang_bank'] != 'a') {
                $this->db->where('cab.id_cabang_bank', $nama['cabang_bank']);
            }
            if ($nama['capem_bank'] != 'a') {
                $this->db->where('cap.id_capem_bank', $nama['capem_bank']);
            }
            if ($nama['ver'] != 'a') {
                $this->db->where('k.id_karyawan', $nama['ver']);
            }
            if ($nama['spk'] != 'a') {
                if ($nama['spk'] == 'null') {
                    $this->db->where("d.id_spk is null");
                } else {
                    $this->db->where('d.id_spk', $nama['spk']);
                }
            }
            if ($nama['tanggal_awal'] != '' && $nama['tanggal_akhir'] != '') {

                $tgl_awal   = nice_date($nama['tanggal_awal'], 'Y-m-d'); 
                $tgl_akhir  = nice_date($nama['tanggal_akhir'], 'Y-m-d');

                $this->db->where("to_char(j.add_time, 'YYYY-MM-DD') BETWEEN '$tgl_awal' AND '$tgl_akhir'");
            }

            return $this->db->get();
        }

    // Akhir 10-03-2020

    // ambil data ots
    public function get_data_ots_2($nama)
    {
        $this->_get_datatables_query_ots_2($nama);

        if ($this->input->post('length') != -1) {
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
            
            return $this->db->get()->result_array();
        }
    }

    // jumlah semua data ots
    public function jumlah_semua_ots_2($nama)
    {
        $this->db->select('d.id_debitur, d.nama_debitur, d.id_care, d.no_reff, d.no_klaim, k.nama_lengkap as nama_verifikator, cab.cabang_bank, cap.capem_bank, b.bank, d.subrogasi_as as subrogasi, d.recoveries_awal_asuransi as r_awal_as, (SELECT sum(nominal) as tot_nominal_as FROM tr_recov_as where id_debitur=d.id_debitur), j.add_time as tanggal_ots, tp.id_tr_potensial');
        $this->db->from('debitur as d');
		$this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'inner');
		$this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        $this->db->join('m_cabang_asuransi as asu','asu.id_cabang_asuransi = d.id_cabang_as','INNER');
		$this->db->join('m_korwil_asuransi as kor','kor.id_korwil_asuransi = asu.id_korwil_asuransi','INNER');
		$this->db->join('m_asuransi as asr', 'asr.id_asuransi = kor.id_asuransi', 'inner');
        $this->db->join('penempatan as p', 'p.id_capem_bank = cap.id_capem_bank', 'inner');
        $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'inner');
        $this->db->join('kunjungan as j', 'j.id_debitur = d.id_debitur', 'inner');
        $this->db->join("tr_potensial as tp", 'tp.id_kunjungan = j.id_kunjungan', 'inner');

        $this->db->where('tp.ots', 1);
        $this->db->where('tp.status', 1);

        if ($nama['asuransi'] != 'a') {
            $this->db->where('asr.id_asuransi', $nama['asuransi']);
        }
        if ($nama['cabang_asuransi'] != 'a') {
            $this->db->where('asu.id_cabang_asuransi', $nama['cabang_asuransi']);
        }
        if ($nama['bank'] != 'a') {
            $this->db->where('b.id_bank', $nama['bank']);
        }
        if ($nama['cabang_bank'] != 'a') {
            $this->db->where('cab.id_cabang_bank', $nama['cabang_bank']);
        }
        if ($nama['capem_bank'] != 'a') {
            $this->db->where('cap.id_capem_bank', $nama['capem_bank']);
        }
        if ($nama['verifikator'] != 'a') {
            $this->db->where('k.id_karyawan', $nama['verifikator']);
        }
        if ($nama['spk'] != 'a') {
            if ($nama['spk'] == 'null') {
                $this->db->where("d.id_spk is null");
            } else {
                $this->db->where('d.id_spk', $nama['spk']);
            }
        }
        if ($nama['tanggal_awal'] != '' && $nama['tanggal_akhir'] != '') {

            $tgl_awal   = nice_date($nama['tanggal_awal'], 'Y-m-d'); 
            $tgl_akhir  = nice_date($nama['tanggal_akhir'], 'Y-m-d');

            $this->db->where("to_char(j.add_time, 'YYYY-MM-DD') BETWEEN '$tgl_awal' AND '$tgl_akhir'");
        }

        return $this->db->count_all_results();
    }

    // jumlah data filter ots
    public function jumlah_filter_ots_2($nama)
    {
        $this->_get_datatables_query_ots_2($nama);
        return $this->db->get()->num_rows();
    }

    var $kolom_order_potensial = [null, 'd.no_klaim', 'd.nama_debitur', 'b.bank', 'cab.cabang_bank', 'cap.capem_bank', 'CAST(j.add_time AS VARCHAR)', 'k.nama_lengkap'];
    var $kolom_cari_potensial  = ['LOWER(d.no_klaim)', 'LOWER(d.nama_debitur)', 'LOWER(b.bank)', 'LOWER(cab.cabang_bank)', 'LOWER(cap.capem_bank)', 'CAST(j.add_time AS VARCHAR)', 'LOWER(k.nama_lengkap)'];
    var $order_potensial       = ['d.id_debitur' => 'desc'];

    // query tampil data ots
    public function _get_datatables_query_ots_2($nama)
    {
        $this->db->select('d.id_debitur, d.nama_debitur, d.id_care, d.no_reff, d.no_klaim, k.nama_lengkap as nama_verifikator, cab.cabang_bank, cap.capem_bank, b.bank, d.subrogasi_as as subrogasi, d.recoveries_awal_asuransi as r_awal_as, (SELECT sum(nominal) as tot_nominal_as FROM tr_recov_as where id_debitur=d.id_debitur), j.add_time as tanggal_ots, tp.id_tr_potensial');
        $this->db->from('debitur as d');
		$this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'inner');
		$this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        $this->db->join('m_cabang_asuransi as asu','asu.id_cabang_asuransi = d.id_cabang_as','INNER');
		$this->db->join('m_korwil_asuransi as kor','kor.id_korwil_asuransi = asu.id_korwil_asuransi','INNER');
		$this->db->join('m_asuransi as asr', 'asr.id_asuransi = kor.id_asuransi', 'inner');
        $this->db->join('penempatan as p', 'p.id_capem_bank = cap.id_capem_bank', 'inner');
        $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'inner');
        $this->db->join('kunjungan as j', 'j.id_debitur = d.id_debitur', 'inner');
        $this->db->join("tr_potensial as tp", 'tp.id_kunjungan = j.id_kunjungan', 'inner');

        $this->db->where('tp.ots', 1);
        $this->db->where('tp.status', 1);
        
        if ($nama['asuransi'] != 'a') {
            $this->db->where('asr.id_asuransi', $nama['asuransi']);
        }
        if ($nama['cabang_asuransi'] != 'a') {
            $this->db->where('asu.id_cabang_asuransi', $nama['cabang_asuransi']);
        }
        if ($nama['bank'] != 'a') {
            $this->db->where('b.id_bank', $nama['bank']);
        }
        if ($nama['cabang_bank'] != 'a') {
            $this->db->where('cab.id_cabang_bank', $nama['cabang_bank']);
        }
        if ($nama['capem_bank'] != 'a') {
            $this->db->where('cap.id_capem_bank', $nama['capem_bank']);
        }
        if ($nama['verifikator'] != 'a') {
            $this->db->where('k.id_karyawan', $nama['verifikator']);
        }
        if ($nama['spk'] != 'a') {
            if ($nama['spk'] == 'null') {
                $this->db->where("d.id_spk is null");
            } else {
                $this->db->where('d.id_spk', $nama['spk']);
            }
        }
        if ($nama['tanggal_awal'] != '' && $nama['tanggal_akhir'] != '') {

            $tgl_awal   = nice_date($nama['tanggal_awal'], 'Y-m-d'); 
            $tgl_akhir  = nice_date($nama['tanggal_akhir'], 'Y-m-d');

            $this->db->where("to_char(j.add_time, 'YYYY-MM-DD') BETWEEN '$tgl_awal' AND '$tgl_akhir'");
        }

        $b = 0;

        $input_cari = strtolower($_POST['search']['value']);
        $kolom_cari = $this->kolom_cari_potensial;

        foreach ($kolom_cari as $cari) {
            if ($input_cari) {
                if ($b === 0) {
                    $this->db->group_start();
                    $this->db->like($cari, $input_cari);
                } else {
                    $this->db->or_like($cari, $input_cari);
                }

                if ((count($kolom_cari) - 1) == $b ) {
                    $this->db->group_end();
                }
            }

            $b++;
        }

        if (isset($_POST['order'])) {

            $kolom_order = $this->kolom_order_potensial;
            $this->db->order_by($kolom_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            
        } elseif (isset($this->order_potensial)) {
            
            $order = $this->order_potensial;
            $this->db->order_by(key($order), $order[key($order)]);
            
        }
        
    }
    // AKHIR table serverside

    // ************************************************************ //
    
    function tampil_potensial()
    {   
        $query = "SELECT DISTINCT b.nama_debitur,b.no_klaim,e.bank,c.capem_bank,d.cabang_bank FROM ots a INNER JOIN debitur b ON(a.id_debitur = b.id_debitur) 
        INNER JOIN m_capem_bank c ON(c.id_capem_bank = b.id_capem_bank) INNER JOIN m_cabang_bank d ON(d.id_cabang_bank = c.id_cabang_bank) INNER JOIN m_bank e ON (e.id_bank = d.id_bank) 
        INNER JOIN ots_status_debitur f ON(f.id_ots = a.id_ots) INNER JOIN tr_ots_p g ON (f.id_ots = g.id_ots) WHERE a.status = 1";
        
        return $this->db->query($query)->result_array();
    }

    function tampil_ots()
    {
       $query = "SELECT a.id_debitur,a.nama_debitur,a.no_klaim,a.no_reff,a.tgl_klaim,a.subrogasi,b.tot_recoveries,b.shs,d.cabang_bank,e.singkatan FROM debitur a INNER JOIN tr_recov b ON(a.id_debitur = b.id_debitur) INNER JOIN m_capem_bank c ON c.id_capem_bank = a.id_capem_bank INNER JOIN m_cabang_bank d ON d.id_cabang_bank = c.id_cabang_bank INNER JOIN m_bank e ON e.id_bank = d.id_bank";
        return $this->db->query($query)->result_array();
    }

    var $column_order   = [null, 'a.no_klaim','a.nama_debitur', 'e.singkatan','d.cabang_bank','a.subrogasi', 'b.shs', null];
    var $column_search  = ['LOWER(a.no_klaim)','LOWER(a.nama_debitur)', 'LOWER(e.singkatan)','LOWER(d.cabang_bank)','LOWER(a.subrogasi)', 'LOWE(b.shs)'];
    var $order          = ['a.id_debitur' => 'asc'];

    public function _get_datatables_query_ots()
    {
        $this->db->select('a.id_debitur,a.nama_debitur,a.no_klaim,a.no_reff,a.tgl_klaim,a.subrogasi,b.tot_recoveries,b.shs,d.cabang_bank,e.singkatan ');
        $this->db->from('debitur a');
        $this->db->join('tr_recov b', 'a.id_debitur = b.id_debitur', 'inner');
        $this->db->join('m_capem_bank c', 'c.id_capem_bank = a.id_capem_bank', 'inner');
        $this->db->join('m_cabang_bank d', 'd.id_cabang_bank = c.id_cabang_bank', 'inner');
        $this->db->join('m_bank e', 'e.id_bank = d.id_bank', 'inner');

        $a = 0;

        $input_cari = strtolower($_POST['search']['value']);
        $kolom_cari = $this->column_search;

        foreach ($kolom_cari as $cari) {
            if ($input_cari) {
                if ($a === 0) {
                    $this->db->group_start();
                    $this->db->like($cari, $input_cari);
                } else {
                    $this->db->or_like($cari, $input_cari);
                }

                if ((count($kolom_cari) - 1) == $a ) {
                    $this->db->group_end();
                }
            }

            $a++;
        }

        if (isset($_POST['order'])) {

            $kolom_order = $this->column_order;
            $this->db->order_by($kolom_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            
        } elseif (isset($this->order)) {
            
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
            
        }
        
    }
    
    // list data ots
    public function get_data_ots()
    {
        $this->_get_datatables_query_ots();

        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
            return $this->db->get()->result_array();
        }
    }

    // hitung jumlah filtered
    public function count_filtered_ots()
    {
        $this->_get_datatables_query_ots();
        $hasil = $this->db->get();
        
        return $hasil->num_rows();
    }
 
    // hitung jumlah semua data
    public function count_all_ots()
    {
        $this->db->select('a.id_debitur,a.nama_debitur,a.no_klaim,a.no_reff,a.tgl_klaim,a.subrogasi,b.tot_recoveries,b.shs,d.cabang_bank,e.singkatan ');
        $this->db->from('debitur a');
        $this->db->join('tr_recov b', 'a.id_debitur = b.id_debitur', 'inner');
        $this->db->join('m_capem_bank c', 'c.id_capem_bank = a.id_capem_bank', 'inner');
        $this->db->join('m_cabang_bank d', 'd.id_cabang_bank = c.id_cabang_bank', 'inner');
        $this->db->join('m_bank e', 'e.id_bank = d.id_bank', 'inner');

        return $this->db->count_all_results();
    }

    // cari data tasklist
    public function cari_data_tasklist($tabel, $where)
    {
        $this->db->from("$tabel t");
        $this->db->join('karyawan k', 'k.id_karyawan = t.id_karyawan', 'inner');
        $this->db->where($where);
        
        return $this->db->get();
        
    }

    public function get_debitur_k()
    {
        $this->db->select('*');
        $this->db->from('task_list');
        $this->db->where('id_debitur !=', null);
        $h = $this->db->get()->result();
        $ar = array();
        foreach ($h as $b) {
            $ar[] = $b->id_debitur;
        }
        $im = implode(",", $ar);
        $ex = explode(",", $im);

        $this->db->select('d.id_debitur, d.nama_debitur');
		$this->db->from('debitur as d');
		$this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'inner');
		$this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        $this->db->join('penempatan as p', 'p.id_capem_bank = cap.id_capem_bank', 'inner');
        $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'inner');
        $this->db->join('tr_fu as f', 'f.id_debitur = d.id_debitur', 'inner');
        $this->db->where('f.status_fu', 1);
        
        if ($ex[0] != "") {
            $this->db->where_not_in('f.id_debitur', $ex);
        }

        return $this->db->get();
        
    }

    function tasklist()
    {
        $this->db->SELECT('a.nama_lengkap,b.tugas,b.keterangan,b.tanggal,b.status,b.hasil');
        $this->db->FROM('karyawan a');
        $this->db->JOIN('task_list b','a.id_karyawan = b.id_karyawan','INNER');
        return $this->db->get()->result_array();
    }

    // menampilkan tasklist kunjungan
    public function get_tasklist_kunjungan()
    {
        $this->db->select('d.id_debitur, d.nama_debitur, d.id_care, d.no_reff, d.no_klaim, k.nama_lengkap as nama_verifikator, cab.cabang_bank, cap.capem_bank, b.bank, d.subrogasi_as as subrogasi, sum(r.nominal) as recoveries, j.add_time as tanggal_ots, t.id_task_list, t.expired, (SELECT COUNT(id_debitur) as jumlah FROM kunjungan WHERE id_debitur=d.id_debitur)');
        $this->db->from('debitur as d');
		$this->db->join('tr_recov_as as r', 'r.id_debitur = d.id_debitur', 'inner');
		$this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'inner');
		$this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        $this->db->join('m_cabang_asuransi as asu','asu.id_cabang_asuransi = d.id_cabang_as','INNER');
		$this->db->join('m_korwil_asuransi as kor','kor.id_korwil_asuransi = asu.id_korwil_asuransi','INNER');
		$this->db->join('m_asuransi as asr', 'asr.id_asuransi = kor.id_asuransi', 'inner');
        $this->db->join('penempatan as p', 'p.id_capem_bank = cap.id_capem_bank', 'inner');
        $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'inner');
        $this->db->join('kunjungan as j', 'j.id_debitur = d.id_debitur', 'inner');
        $this->db->join('task_list as t', 't.id_debitur = d.id_debitur', 'inner');
        $this->db->join('tr_potensial as tp', 'tp.id_kunjungan = j.id_kunjungan', 'inner');
        $this->db->where('tp.ots', 1);
        $this->db->where('t.jenis_tasklist', 2);

        $this->db->group_by('t.id_task_list');
        $this->db->group_by('cap.capem_bank');
        $this->db->group_by('nama_verifikator');
        $this->db->group_by('j.add_time');
		$this->db->group_by('d.id_debitur');
		$this->db->group_by('cab.id_cabang_bank');
        $this->db->group_by('b.bank');
        $this->db->group_by('d.nama_debitur');
        $this->db->group_by('d.id_care');
        $this->db->group_by('d.no_klaim');
        $this->db->group_by('d.subrogasi_as');

        return $this->db->get();
        
    }

    public function get_data_task_khusus_2()
    {
        $this->db->SELECT('a.nama_lengkap as verifikator, b.tugas,b.keterangan,b.expired,b.status,b.hasil, b.id_task_list');
        $this->db->FROM('karyawan a');
        $this->db->JOIN('task_list b','a.id_karyawan = b.id_karyawan','INNER');
        $this->db->where('b.jenis_tasklist', 1);

        return $this->db->get();
        
    }

    // Awal Datatables ServerSide

    // ambil data list kelolaan
    public function get_data_task_khusus()
    {
        $this->_get_datatables_query_task_khusus();

        if ($this->input->post('length') != -1) {
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
            
            return $this->db->get()->result_array();
        }
    }

    // jumlah semua data tasklist khuhsus
    public function jumlah_semua_task_khusus()
    {
        $this->db->SELECT('a.nama_lengkap as verifikator, b.tugas,b.keterangan,b.expired,b.status,b.hasil, b.id_task_list');
        $this->db->FROM('karyawan a');
        $this->db->JOIN('task_list b','a.id_karyawan = b.id_karyawan','INNER');
        $this->db->where('b.jenis_tasklist', 1);

        return $this->db->count_all_results();
    }

    // jumlah data filter tasklist khuhsus
    public function jumlah_filter_task_khusus()
    {
        $this->_get_datatables_query_task_khusus();
        return $this->db->get()->num_rows();
    }

    var $kolom_order_task_khusus = [null, 'a.nama_lengkap', 'b.tugas', 'b.keterangan', 'CAST(b.expired as VARCHAR)', null, null];
    var $kolom_cari_task_khusus  = ['LOWER(a.nama_lengkap)', 'LOWER(b.tugas)', 'LOWER(b.keterangan)', 'CAST(b.expired as VARCHAR)'];
    var $order_task_khusus       = ['b.id_task_list' => 'desc'];

    // query tampil data tasklist khuhsus
    public function _get_datatables_query_task_khusus()
    {
        $this->db->SELECT('a.nama_lengkap as verifikator, b.tugas,b.keterangan,b.expired,b.status,b.hasil, b.id_task_list');
        $this->db->FROM('karyawan a');
        $this->db->JOIN('task_list b','a.id_karyawan = b.id_karyawan','INNER');
        $this->db->where('b.jenis_tasklist', 1);
        
        $b = 0;

        $input_cari = strtolower($_POST['search']['value']);
        $kolom_cari = $this->kolom_cari_task_khusus;

        foreach ($kolom_cari as $cari) {
            if ($input_cari) {
                if ($b === 0) {
                    $this->db->group_start();
                    $this->db->like($cari, $input_cari);
                } else {
                    $this->db->or_like($cari, $input_cari);
                }

                if ((count($kolom_cari) - 1) == $b ) {
                    $this->db->group_end();
                }
            }

            $b++;
        }

        if (isset($_POST['order'])) {

            $kolom_order = $this->kolom_order_task_khusus;
            $this->db->order_by($kolom_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            
        } elseif (isset($this->order_task_khusus)) {
            
            $order = $this->order_task_khusus;
            $this->db->order_by(key($order), $order[key($order)]);
            
        }
        
    }
    // AKHIR table serversideh

    function list_verifikator()
    {
        $this->db->SELECT('a.id_karyawan,a.nama_lengkap');
        $this->db->FROM('karyawan a');
        $this->db->JOIN('penempatan b','a.id_karyawan = b.id_karyawan','INNER');
        $this->db->group_by('a.id_karyawan');
        
        return $this->db->get()->result_array();
    }

    function simpan_tasklist($data)
    {
        $this->db->insert('task_list',$data);
    }

    function postOTS($data)
    {
        $ok = false;
        
        try
        {
            $narasumber = $data['Narasumber'];
            $latitude = $data['Latitude'];
            $longitude = $data['Longitude'];
            $alamat = $data['Alamat'];
            $id_debitur = $data['Id_debitur'];
            $telp = $data['Telp'];
            $add_by = $data['Add_by'];
            $keterangan = $data['Keterangan'];
            $character_ = $data['Character_'];
            $capital = $data['Capital'];
            $condition = $data['Condition'];
            $collateral = $data['Collateral'];
            $capacity = $data['Capacity'];
            $add_time = date("Y-m-d H:i:s");

            $query = "SELECT * FROM ots WHERE id_debitur = '$id_debitur' AND status = 1";
            $value = $this->db->query($query)->result_array();
            if($value != null)
            {
                $this->db->query("UPDATE ots SET status=0 WHERE id_debitur = '$id_debitur'");
            }

            $this->db->query("INSERT INTO ots (narasumber, latitude, longitude, alamat, id_debitur, telp, add_by, keterangan, character_, capital, condition, collateral, capacity, status, add_time) VALUES ('$narasumber', '$latitude', '$longitude', '$alamat', '$id_debitur', '$telp', '$add_by', '$keterangan', '$character_', '$capital', '$condition', '$collateral', '$capacity', 1, '$add_time')"); 
            $id_ots = $this->db->insert_id();

            if ($this->db->affected_rows())
            {
                //$ok = true;
                $id_status_deb = $data['Id_status_deb'];
                $this->db->query("INSERT INTO ots_status_debitur (id_ots, id_status_deb, add_time) VALUES ('$id_ots', '$id_status_deb', '$add_time')");
    
                if ($this->db->affected_rows())
                {
                    //$ok = true;
                    if($id_status_deb == 1)
                    {
                        $this->db->query("INSERT INTO tr_ots_p (id_ots, add_time) VALUES ('$id_ots', '$add_time')");

                        if ($this->db->affected_rows())
                        {
                            $ok = true;
                        }
                        else
                        {
                            $ok = false;
                        }
                    }
                    else if($id_status_deb == 2)
                    {
                        $this->db->query("INSERT INTO tr_ots_np (id_ots, add_time) VALUES ('$id_ots', '$add_time')");

                        if ($this->db->affected_rows())
                        {
                            $ok = true;
                        }
                        else
                        {
                            $ok = false;
                        }
                    }
                }   
                else
                {
                    $ok = false;
                }


                $this->db->query("INSERT INTO alamat_debitur (alamat_deb, id_debitur, latitude, longitude, add_time) VALUES ('$alamat', '$id_debitur', '$latitude', '$longitude', '$add_time')");
                
                if ($this->db->affected_rows())
                {
                    $this->db->query("INSERT INTO telp_debitur (telp_debitur, id_debitur, add_time) VALUES ('$telp', '$id_debitur', '$add_time')");
                    if ($this->db->affected_rows())
                    {
                        $ok = true;
                    }
                    else
                    {
                        $ok = false;
                    }
                }
                else
                {
                    $ok = false;
                }
            }   
            else
            {
                $ok = false;
            }
        }
        catch (Exception $e) 
        {
            $ok = false;
        }

        return $ok;
    }

    function list_call()
    {	
		$query  = "SELECT h.id_tr_ots_p,a.id_debitur,a.nama_debitur,a.no_klaim,d.bank,j.nama_proses,k.tindakan_fu,b.cabang_bank,c.capem_bank,i.tgl_fu,h.status_tindakan 
        FROM debitur a 
        INNER JOIN m_capem_bank c ON (a.id_capem_bank = c.id_capem_bank) INNER JOIN m_cabang_bank b ON (c.id_cabang_bank = b.id_cabang_bank) 
        INNER JOIN m_bank d ON (d.id_bank = b.id_bank) INNER JOIN m_cabang_asuransi e ON (a.id_cabang_as = e.id_cabang_asuransi) 
        INNER JOIN ots f ON (f.id_debitur = a.id_debitur) INNER JOIN ots_status_debitur g ON (g.id_ots = f.id_ots) 
        INNER JOIN tr_ots_p h ON (h.id_ots = f.id_ots) LEFT JOIN tr_ots_fu i ON (i.id_tr_ots_p = h.id_tr_ots_p) 
        LEFT JOIN proses j ON (j.id_proses = i.id_proses) LEFT JOIN m_tindakan_fu k ON(i.id_tindakan = k.id_tindakan_fu) WHERE g.id_status_deb = 1";
        return $this->db->query($query)->result_array();
    }

    function getDataOTS($id)
    {
        $this->db->SELECT('*');
        $this->db->FROM('debitur');
        $this->db->WHERE('id_debitur',$id);

        return $this->db->get()->row_array();
    }

    function list_tindakan_hukum($syariah)
    {
        // $query ="SELECT a.id_debitur,a.nama_debitur,a.no_klaim,d.bank,b.cabang_bank,c.capem_bank, j.id_tr_ots_p, h.keputusan_manajer, k.tindakan_hukum 
        // FROM debitur a 
        // INNER JOIN m_capem_bank c ON (a.id_capem_bank = c.id_capem_bank) INNER JOIN m_cabang_bank b ON (c.id_cabang_bank = b.id_cabang_bank) 
        // INNER JOIN m_bank d ON (d.id_bank = b.id_bank) INNER JOIN m_cabang_asuransi e ON (a.id_cabang_as = e.id_cabang_asuransi) 
        // INNER JOIN ots f ON (f.id_debitur = a.id_debitur) INNER JOIN tr_ots_p j ON (j.id_ots = f.id_ots) INNER JOIN ots_status_debitur g ON (g.id_ots = f.id_ots) INNER JOIN tr_tindakan_hukum h ON(h.id_tr_ots_p = j.id_tr_ots_p) LEFT JOIN m_tindakan_hukum k ON (k.id_tindakan_hukum = h.id_tindakan_hukum)  WHERE g.id_status_deb = 1";

        $this->db->SELECT('a.nama_debitur,a.no_klaim,b.capem_bank,c.cabang_bank,d.bank,h.id_tindakan_hukum,h.id_tr_potensial,h.keputusan_manajer, th.tindakan_hukum');
        $this->db->FROM('debitur a');
        $this->db->JOIN('m_capem_bank b','b.id_capem_bank = a.id_capem_bank','INNER');
        $this->db->JOIN('m_cabang_bank c','c.id_cabang_bank = b.id_cabang_bank','INNER');
        $this->db->JOIN('m_bank d','d.id_bank = c.id_bank','INNER');
        $this->db->join('m_cabang_asuransi as asu','asu.id_cabang_asuransi = a.id_cabang_as','INNER');
		$this->db->join('m_korwil_asuransi as kor','kor.id_korwil_asuransi = asu.id_korwil_asuransi','INNER');
		$this->db->join('m_asuransi as asr', 'asr.id_asuransi = kor.id_asuransi', 'inner');
        $this->db->join('kunjungan k', 'k.id_debitur = a.id_debitur', 'inner');
        $this->db->JOIN('tr_potensial g','g.id_kunjungan = k.id_kunjungan','INNER');
        $this->db->JOIN('tr_tindakan_hukum h','h.id_tr_potensial = g.id_tr_potensial','inner');
        $this->db->join('m_tindakan_hukum th', 'th.id_tindakan_hukum = h.id_tindakan_hukum', 'left');

        if ($syariah != "") {
            $this->db->where('asr.id_asuransi', 2);  
        } 

        return $this->db->get()->result_array();
    }
    
    function simpan_keputusan($id,$data)
    {
        $this->db->where('id_tr_potensial',$id);
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

    public function get_data_st_proses()
    {
        $this->db->order_by('id_status_proses', 'asc');
        
        return $this->db->get('status_proses');
        
    }

    function listEksekusiAset()
    {
        $this->db->DISTINCT();
        $this->db->SELECT('p.id_tr_potensial,a.id_debitur,a.nama_debitur,a.no_klaim,b.capem_bank,c.cabang_bank,f.status_info,d.bank,f.id_sifat_asset, e.status_proses');
        $this->db->FROM('debitur a');
        $this->db->JOIN('m_capem_bank b','b.id_capem_bank = a.id_capem_bank','INNER');
        $this->db->JOIN('m_cabang_bank c','c.id_cabang_bank = b.id_cabang_bank','INNER');
        $this->db->JOIN('m_bank d','d.id_bank = c.id_bank','INNER');
        $this->db->JOIN('dokumen_asset f','f.id_debitur = a.id_debitur','INNER');
        $this->db->join('kunjungan k', 'k.id_debitur = a.id_debitur', 'inner');
        $this->db->join('tr_potensial p', 'p.id_kunjungan = k.id_kunjungan', 'inner');
        $this->db->join('tr_eksekusi_asset e', 'e.id_tr_potensial = p.id_tr_potensial', 'inner');
        $this->db->join('status_proses s', 's.id_status_proses = e.status_proses', 'left');
        
        $this->db->WHERE('f.status', 1);
        
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
        $this->db->where('id_tr_potensial',$id);
        $this->db->update('tr_eksekusi_asset',$data);
    }
}