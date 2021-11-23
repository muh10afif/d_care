<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model {

    public function cari_data($tabel, $where)
    {
        return $this->db->get_where($tabel, $where);
    }

    public function input_data($tabel, $where)
    {
        $this->db->insert($tabel, $where);
    }

    public function get_data($tabel)
    {
        return $this->db->get($tabel);
        
    }

    public function ubah_data($tabel, $where, $data)
    {
        $this->db->where($where);
        $this->db->update($tabel, $data);
        
        return $this->db->affected_rows();
        
    }

    public function cari_cab_asuransi($id_asuransi)
    {
        $this->db->select('c.id_cabang_asuransi, c.cabang_asuransi');
        $this->db->from('m_asuransi as s');
        $this->db->join('m_korwil_asuransi as k', 'k.id_asuransi = s.id_asuransi', 'inner');
        $this->db->join('m_cabang_asuransi as c', 'c.id_korwil_asuransi = k.id_korwil_asuransi', 'inner');
        $this->db->where('s.id_asuransi', $id_asuransi);
        
        return $this->db->get();
        
    }

    // mencari cabang bank
    public function cari_cab_bank($id_bank)
    {
        $this->db->select('cb.cabang_bank, cb.id_cabang_bank');
        $this->db->from('m_bank as b');
        $this->db->join('m_cabang_bank as cb', 'cb.id_bank = b.id_bank', 'inner');
        $this->db->where('b.id_bank', $id_bank);
        
        return $this->db->get();
        
    }

    // mencari capem bank
    public function cari_cap_bank($id_cabang_bank)
    {
        $this->db->select('c.id_capem_bank, c.capem_bank');
        $this->db->from('m_cabang_bank as cb');
        $this->db->join('m_capem_bank as c', 'c.id_cabang_bank = cb.id_cabang_bank', 'inner');
        $this->db->where('cb.id_cabang_bank', $id_cabang_bank);
        
        return $this->db->get();
    }

    public function get_asuransi_syariah($tabel, $angka)
    {
        $this->db->from($tabel);
        $this->db->where('id_asuransi', $angka);
        
        return $this->db->get();
        
    }

    // mencari verfikator
	public function cari_ver($id_capem_bank)
	{
		$this->db->select('k.id_karyawan, k.nama_lengkap');
		$this->db->from('penempatan p');
		$this->db->join('karyawan k', 'k.id_karyawan = p.id_karyawan', 'inner');
		$this->db->where('p.id_capem_bank', $id_capem_bank);
		
		$this->db->group_by('k.id_karyawan')->group_by('k.nama_lengkap');
		
		return $this->db->get();
    }
    
    // mencari bank sesuai verifikator 
    public function cari_bank_ver($id_karyawan)
    {
        $this->db->distinct();
        $this->db->select('b.*');
        $this->db->from('penempatan as p');
        $this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = p.id_capem_bank', 'inner');
        $this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        $this->db->where('p.id_karyawan', $id_karyawan);
        
        return $this->db->get();  
    }

    // mencari cabang bank sesuai verifikator 
    public function cari_cab_bank_ver($id_karyawan, $id_bank)
    {
        $this->db->distinct();
        $this->db->select('cab.*');
        $this->db->from('penempatan as p');
        $this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = p.id_capem_bank', 'inner');
        $this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        $this->db->where('p.id_karyawan', $id_karyawan);
        $this->db->where('b.id_bank', $id_bank);
        
        return $this->db->get();  
    }

    // mencari capem bank sesuai verifikator 
    public function cari_cap_bank_ver($id_karyawan, $id_cab_bank)
    {
        $this->db->distinct();
        $this->db->select('cap.*');
        $this->db->from('penempatan as p');
        $this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = p.id_capem_bank', 'inner');
        $this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
        $this->db->where('p.id_karyawan', $id_karyawan);
        $this->db->where('cab.id_cabang_bank', $id_cab_bank);
        
        return $this->db->get();  
    }

    /**********************************************************/
    /*
    /*                  Debitur Potensial
    /*
    /**********************************************************/

    // menampilkan dokumen asset 
    public function get_data_dok_asset($id_deb)
    {
        $this->db->select('d.id_debitur, d.nama_debitur, d.no_reff, ms.id_sifat_asset, s.id_status_asset, da.*, da.total_harga as harga, da.l_tanah as luas_tanah, ma.jenis_asset, l.legalitas_asset, ms.sifat_asset, s.status_asset');
        $this->db->from('dokumen_asset as da');        
        $this->db->join('m_jenis_asset as ma', 'ma.id_jenis_asset = da.id_jenis_asset', 'left');
        $this->db->join('debitur as d', 'd.id_debitur = da.id_debitur', 'left');
        $this->db->join('status_asset as s', 's.id_status_asset = da.id_status_asset', 'left');
        $this->db->join('kota as k', 'k.id_kota = da.id_kota', 'left');
        $this->db->join('m_sifat_asset as ms', 'ms.id_sifat_asset = da.id_sifat_asset', 'left');
        $this->db->join('legalitas_asset as l', 'l.id_legalitas_asset = da.id_legalitas_asset', 'left');
        $this->db->where('da.id_jenis_dok', '2');
        $this->db->where('da.status', '1');
        $this->db->where('d.id_debitur', $id_deb);

    	return $this->db->get();
    }

    // menampilkan foto dokumen asset 
    public function get_data_foto_dok_asset($id_debitur, $id_dok_asset)
    {
        $this->db->from('tr_foto_dokumen as f');
        $this->db->join('tampak_asset as t', 't.id_tampak_asset = f.id_tampak_asset', 'left');
        $this->db->where('f.id_dokumen_asset', $id_dok_asset);
        $this->db->where('f.id_debitur', $id_debitur);
        $this->db->order_by('f.id_foto_dokumen', 'asc');

        return $this->db->get()->result_array();

    }

    public function get_data_kunjungan_deb($nama, $status, $syariah)
    {
        if ($status == 1) {
            $tabel_k = "tr_potensial";

            $id = "tp.id_tr_potensial";

            $fu = ", COALESCE( (SELECT fu FROM tr_fu WHERE id_tr_potensial = tp.id_tr_potensial order by fu desc LIMIT 1) ,0) as fu";

        } else {
            $tabel_k = "tr_non_potensial";

            $id = "tp.id_tr_np";

            $fu = "";
        }

        $this->db->select("d.id_debitur, d.nama_debitur, d.id_care, d.no_reff, d.no_klaim, k.nama_lengkap as nama_verifikator, cab.cabang_bank, cap.capem_bank, b.bank, d.subrogasi_as as subrogasi, d.recoveries_awal_asuransi as r_awal_as, ( COALESCE( (d.subrogasi_as) ,0) - COALESCE( (d.recoveries_awal_asuransi) ,0) ) - COALESCE((SELECT sum(nominal) as tot_nominal_as FROM tr_recov_as where id_debitur=d.id_debitur) ,0) as total_shs, j.add_time as tanggal_ots, j.keterangan, (SELECT add_time as tanggal_pri FROM tr_prioritas where id_debitur = d.id_debitur order by add_time asc limit 1), $id $fu");
        
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
        $this->db->join("$tabel_k as tp", 'tp.id_kunjungan = j.id_kunjungan', 'inner');

        if ($status == 1) {
            // $this->db->where('tp.ots', 0);
        } else {
            $this->db->where('tp.status', 1);
        }

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

            $this->db->where("to_char(j.add_time, 'YYYY-MM-DD') BETWEEN '$tgl_awal' AND '$tgl_akhir+1'");
        }

        $this->db->order_by('j.add_time', 'desc');

        return $this->db->get();
    }

    // cari data 
    public function cari_data_fu($id_tr_potensial)
    {
        $this->db->order_by('fu', 'desc'); 
        return $this->db->get('tr_fu', array('id_tr_potensial' => $id_tr_potensial));
    }

    // Awal Datatables ServerSide

    // ambil data event
    public function get_data_potensial($nama, $syariah)
    {
        $this->_get_datatables_query_potensial($nama, $syariah);

        if ($this->input->post('length') != -1) {
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
            
            return $this->db->get()->result_array();
        }
    }

    var $kolom_order_potensial = [null,'d.no_reff', 'LOWER(d.no_klaim)', 'CAST(d.nama_debitur as VARCHAR)', 'total_shs', 'LOWER(b.bank)', 'LOWER(cab.cabang_bank)', 'LOWER(cap.capem_bank)', 'j.add_time', 'tanggal_pri', 'LOWER(j.keterangan)', 'LOWER(k.nama_lengkap)', 'fu'];
    var $kolom_cari_potensial  = ['LOWER(d.no_klaim)', 'LOWER(d.nama_debitur)', 'LOWER(b.bank)', 'LOWER(cab.cabang_bank)', 'LOWER(cap.capem_bank)', 'CAST(j.add_time AS VARCHAR)', 'LOWER(k.nama_lengkap)'];
    var $order_potensial       = ['j.add_time' => 'desc'];

    // query tampil data debitur potensial
    public function _get_datatables_query_potensial($nama, $syariah)
    {
        $this->db->select('d.id_debitur, d.nama_debitur, d.id_care, d.no_reff, d.no_klaim, k.nama_lengkap as nama_verifikator, cab.cabang_bank, cap.capem_bank, b.bank, d.subrogasi_as as subrogasi, d.recoveries_awal_asuransi as r_awal_as, ( COALESCE( (d.subrogasi_as) ,0) - COALESCE( (d.recoveries_awal_asuransi) ,0) ) - COALESCE((SELECT sum(nominal) as tot_nominal_as FROM tr_recov_as where id_debitur=d.id_debitur) ,0) as total_shs, COALESCE( (SELECT fu FROM tr_fu WHERE id_tr_potensial = tp.id_tr_potensial order by fu desc LIMIT 1) ,0) as fu,j.add_time as tanggal_ots, tp.id_tr_potensial, j.keterangan, (SELECT add_time as tanggal_pri FROM tr_prioritas where id_debitur = d.id_debitur order by add_time asc limit 1)');
        
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
        
        // $this->db->where('tp.ots', 0);

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

    // jumlah semua data event
    public function jumlah_semua_potensial($nama, $syariah)
    {
        $this->db->select('d.id_debitur, d.nama_debitur, d.id_care, d.no_reff, d.no_klaim, k.nama_lengkap as nama_verifikator, cab.cabang_bank, cap.capem_bank, b.bank, d.subrogasi_as as subrogasi, d.recoveries_awal_asuransi as r_awal_as, ( COALESCE( (d.subrogasi_as) ,0) - COALESCE( (d.recoveries_awal_asuransi) ,0) ) - COALESCE((SELECT sum(nominal) as tot_nominal_as FROM tr_recov_as where id_debitur=d.id_debitur) ,0) as total_shs, COALESCE( (SELECT fu FROM tr_fu WHERE id_tr_potensial = tp.id_tr_potensial order by fu desc LIMIT 1) ,0) as fu,j.add_time as tanggal_ots, tp.id_tr_potensial, j.keterangan, (SELECT add_time as tanggal_pri FROM tr_prioritas where id_debitur = d.id_debitur order by add_time asc limit 1)');
        
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
        
        // $this->db->where('tp.ots', 0);

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

            $this->db->where("to_char(j.add_time, 'YYYY-MM-DD') BETWEEN '$tgl_awal' AND '$tgl_akhir'");
        }

        return $this->db->count_all_results();
    }

    // jumlah data filter event
    public function jumlah_filter_potensial($nama, $syariah)
    {
        $this->_get_datatables_query_potensial($nama, $syariah);
        return $this->db->get()->num_rows();
    }

    // AKHIR table serverside


    // 09-03-2020

        // menampilkan data non non_potensial
        public function get_data_non_potensial($nama, $syariah)
        {
            $this->_get_datatables_query_non_potensial($nama, $syariah);

            if ($this->input->post('length') != -1) {
                $this->db->limit($this->input->post('length'), $this->input->post('start'));
                
                return $this->db->get()->result_array();
            }
        }

        var $kolom_order_non_potensial = [null,'d.no_reff', 'LOWER(d.no_klaim)', 'CAST(d.nama_debitur as VARCHAR)', 'total_shs', 'LOWER(b.bank)', 'LOWER(cab.cabang_bank)', 'LOWER(cap.capem_bank)', 'j.add_time', 'tanggal_pri', 'LOWER(j.keterangan)', 'LOWER(k.nama_lengkap)'];
        var $kolom_cari_non_potensial  = ['LOWER(d.no_klaim)', 'LOWER(d.nama_debitur)', 'LOWER(b.bank)', 'LOWER(cab.cabang_bank)', 'LOWER(cap.capem_bank)', 'CAST(j.add_time AS VARCHAR)', 'LOWER(k.nama_lengkap)'];
        var $order_non_potensial       = ['j.add_time' => 'desc'];

        // query tampil data debitur non_potensial
        public function _get_datatables_query_non_potensial($nama, $syariah)
        {
            $this->db->select('d.id_debitur, d.nama_debitur, d.id_care, d.no_reff, d.no_klaim, k.nama_lengkap as nama_verifikator, cab.cabang_bank, cap.capem_bank, b.bank, d.subrogasi_as as subrogasi, d.recoveries_awal_asuransi as r_awal_as, ( COALESCE( (d.subrogasi_as) ,0) - COALESCE( (d.recoveries_awal_asuransi) ,0) ) - COALESCE((SELECT sum(nominal) as tot_nominal_as FROM tr_recov_as where id_debitur=d.id_debitur) ,0) as total_shs,j.add_time as tanggal_ots, tp.id_tr_np, j.keterangan, (SELECT add_time as tanggal_pri FROM tr_prioritas where id_debitur = d.id_debitur order by add_time asc limit 1)');
        
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
            $this->db->join("tr_non_potensial as tp", 'tp.id_kunjungan = j.id_kunjungan', 'inner');
            
            $this->db->where('tp.status', 1);

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

                $this->db->where("to_char(j.add_time, 'YYYY-MM-DD') BETWEEN '$tgl_awal' AND '$tgl_akhir'");
            }
            
            $b = 0;

            $input_cari = strtolower($_POST['search']['value']);
            $kolom_cari = $this->kolom_cari_non_potensial;

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

                $kolom_order = $this->kolom_order_non_potensial;
                $this->db->order_by($kolom_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
                
            } elseif (isset($this->order_non_potensial)) {
                
                $order = $this->order_non_potensial;
                $this->db->order_by(key($order), $order[key($order)]);
                
            }
            
        }

        public function jumlah_semua_non_potensial($nama, $syariah)
        {
            $this->db->select('d.id_debitur, d.nama_debitur, d.id_care, d.no_reff, d.no_klaim, k.nama_lengkap as nama_verifikator, cab.cabang_bank, cap.capem_bank, b.bank, d.subrogasi_as as subrogasi, d.recoveries_awal_asuransi as r_awal_as, ( COALESCE( (d.subrogasi_as) ,0) - COALESCE( (d.recoveries_awal_asuransi) ,0) ) - COALESCE((SELECT sum(nominal) as tot_nominal_as FROM tr_recov_as where id_debitur=d.id_debitur) ,0) as total_shs,j.add_time as tanggal_ots, tp.id_tr_np, j.keterangan, (SELECT add_time as tanggal_pri FROM tr_prioritas where id_debitur = d.id_debitur order by add_time asc limit 1)');
        
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
            $this->db->join("tr_non_potensial as tp", 'tp.id_kunjungan = j.id_kunjungan', 'inner');
            
            $this->db->where('tp.status', 1);

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

                $this->db->where("to_char(j.add_time, 'YYYY-MM-DD') BETWEEN '$tgl_awal' AND '$tgl_akhir'");
            }
    
            return $this->db->count_all_results();
        }

        public function jumlah_filter_non_potensial($nama, $syariah)
        {
            $this->_get_datatables_query_non_potensial($nama, $syariah);
            return $this->db->get()->num_rows();
        }


    // Akhir 09-03-2020


}

/* End of file M_data.php */
