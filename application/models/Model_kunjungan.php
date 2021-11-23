<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kunjungan extends CI_Model {

    // 06-03-2020

        public function get_data_order($tabel, $field, $order)
        {
            $this->db->order_by($field, $order);
            return $this->db->get($tabel);
            
        }

        public function cari_data($tabel, $where)
        {
            return $this->db->get_where($tabel, $where);
        }

    // Akhir 06-03-2020

    public function get_capem_ver($id_karyawan)
    {
        $this->db->select('cap.capem_bank, cap.id_capem_bank');
        $this->db->from('penempatan as p');
        $this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = p.id_capem_bank', 'inner');
        $this->db->where('p.id_karyawan', $id_karyawan);
        
        return $this->db->get(); 
    }

    public function get_debitur_ver($id_karyawan, $id_capem_bank)
    {
        $this->db->select('d.id_debitur, d.nama_debitur');
        $this->db->from('penempatan as p');
        $this->db->join('debitur as d', 'd.id_capem_bank = p.id_capem_bank', 'inner');
        $this->db->where('p.id_karyawan', $id_karyawan);

        if (!empty($id_capem_bank)) {
            $this->db->where('p.id_capem_bank', $id_capem_bank);
            
        }

        $this->db->order_by('d.nama_debitur', 'asc');
        
        return $this->db->get();
        
    }

    // AWAL DATATABLE

    public function get_tampil_debitur_ver($data)
    {
        $this->_get_datatables_query_debitur_ver($data);

        if ($this->input->post('length') != -1) {
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
            
            return $this->db->get()->result_array();
        }
    }

    var $kolom_order_debitur_ver = [null, 'd.no_reff', 'LOWER(d.nama_debitur)', 'LOWER(cap.capem_bank)', 'LOWER(asu.cabang_asuransi)', null, null, null, 'd.potensial', 'd.ots', null, 'k.add_time', 'tgl_prioritas'];
    var $kolom_cari_debitur_ver  = ['d.no_reff','LOWER(d.nama_debitur)', 'LOWER(cap.capem_bank)', 'LOWER(asu.cabang_asuransi)', 'LOWER(k.pic)', 'LOWER(k.status_hubungan)','CAST(k.add_time as VARCHAR)'];
    var $order_debitur_ver       = ['d.id_debitur' => 'asc'];

    public function _get_datatables_query_debitur_ver($data)
    {
        $this->db->select('d.id_debitur, d.no_reff, d.nama_debitur, cap.capem_bank, asu.cabang_asuransi, d.*, k.pic, k.status_hubungan, k.keterangan, d.potensial, d.ots, k.add_time as tgl_ots, (SELECT sum(nominal) as tot_recov from tr_recov_as where id_debitur = d.id_debitur), (SELECT add_time as tgl_prioritas FROM tr_prioritas where id_debitur = d.id_debitur order by add_time asc limit 1)');
        $this->db->from('debitur as d');
        $this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'inner');
        $this->db->join('m_cabang_bank as cb', 'cb.id_cabang_bank = cap.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cb.id_bank', 'inner');
        $this->db->join('m_cabang_asuransi as asu', 'asu.id_cabang_asuransi = d.id_cabang_as','inner');
        $this->db->join('m_korwil_asuransi as ko', 'ko.id_korwil_asuransi = asu.id_korwil_asuransi', 'inner');
        $this->db->join('m_asuransi as ar', 'ar.id_asuransi = ko.id_asuransi', 'inner');
        $this->db->join('kunjungan as k', 'k.id_debitur = d.id_debitur', 'inner');
        $this->db->join('penempatan as p', 'p.id_capem_bank = cap.id_capem_bank', 'inner');
        $this->db->join('karyawan as w', 'w.id_karyawan = p.id_karyawan', 'inner');
        $this->db->where('w.id_karyawan', $data['verifikator']);

        if ($data['asuransi'] != 'a') {
            $this->db->where('ar.id_asuransi', $data['asuransi']);
        }
        if ($data['cabang_asuransi'] != 'a') {
            $this->db->where('asu.id_cabang_asuransi', $data['cabang_asuransi']);
        }
        if ($data['bank'] != 'a') {
            $this->db->where('b.id_bank', $data['bank']);
        }
        if ($data['cabang_bank'] != 'a') {
            $this->db->where('cb.id_cabang_bank', $data['cabang_bank']);
        }
        if ($data['capem_bank'] != 'a') {
            $this->db->where('cap.id_capem_bank', $data['capem_bank']);
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

            $this->db->where("CAST(k.add_time AS VARCHAR) BETWEEN '$tgl_awal' AND '$tgl_akhir+1'");
        }
        
        $b = 0;

        $input_cari = strtolower($_POST['search']['value']);
        $kolom_cari = $this->kolom_cari_debitur_ver;

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

            $kolom_order = $this->kolom_order_debitur_ver;
            $this->db->order_by($kolom_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            
        } elseif (isset($this->order_debitur_ver)) {
            
            $order = $this->order_debitur_ver;
            $this->db->order_by(key($order), $order[key($order)]);
            
        }
    }

    public function jumlah_semua_debitur_ver($data)
    {
        $this->db->select('d.id_debitur, d.no_reff, d.nama_debitur, cap.capem_bank, asu.cabang_asuransi, d.*, k.pic, k.status_hubungan, k.keterangan, d.potensial, d.ots, k.add_time as tgl_ots, (SELECT sum(nominal) as tot_recov from tr_recov_as where id_debitur = d.id_debitur), (SELECT add_time as tgl_prioritas FROM tr_prioritas where id_debitur = d.id_debitur order by add_time asc limit 1)');
        $this->db->from('debitur as d');
        $this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'inner');
        $this->db->join('m_cabang_bank as cb', 'cb.id_cabang_bank = cap.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cb.id_bank', 'inner');
        $this->db->join('m_cabang_asuransi as asu', 'asu.id_cabang_asuransi = d.id_cabang_as','inner');
        $this->db->join('m_korwil_asuransi as ko', 'ko.id_korwil_asuransi = asu.id_korwil_asuransi', 'inner');
        $this->db->join('m_asuransi as ar', 'ar.id_asuransi = ko.id_asuransi', 'inner');
        $this->db->join('kunjungan as k', 'k.id_debitur = d.id_debitur', 'inner');
        $this->db->join('penempatan as p', 'p.id_capem_bank = cap.id_capem_bank', 'inner');
        $this->db->join('karyawan as w', 'w.id_karyawan = p.id_karyawan', 'inner');
        $this->db->where('w.id_karyawan', $data['verifikator']);

        if ($data['asuransi'] != 'a') {
            $this->db->where('ar.id_asuransi', $data['asuransi']);
        }
        if ($data['cabang_asuransi'] != 'a') {
            $this->db->where('asu.id_cabang_asuransi', $data['cabang_asuransi']);
        }
        if ($data['bank'] != 'a') {
            $this->db->where('b.id_bank', $data['bank']);
        }
        if ($data['cabang_bank'] != 'a') {
            $this->db->where('cb.id_cabang_bank', $data['cabang_bank']);
        }
        if ($data['capem_bank'] != 'a') {
            $this->db->where('cap.id_capem_bank', $data['capem_bank']);
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

            $this->db->where("CAST(k.add_time AS VARCHAR) BETWEEN '$tgl_awal' AND '$tgl_akhir+1'");
        }

        return $this->db->count_all_results();
    }

    public function jumlah_filter_debitur_ver($data)
    {
        $this->_get_datatables_query_debitur_ver($data);
        return $this->db->get()->num_rows();
    }

    // AKHIR DATATABLE

    public function cari_tanggal_prioritas($id_debitur)
    {
        $this->db->from('tr_prioritas');
        $this->db->where('id_debitur', $id_debitur);
        $this->db->order_by('add_time', 'asc');
        
        return $this->db->get();
    }

    public function get_tampil_debitur_ver_2($data)
    {
        $this->db->select('d.id_debitur, d.no_reff, d.nama_debitur, cap.capem_bank, asu.cabang_asuransi, d.*, k.pic, k.status_hubungan, k.keterangan, d.potensial, d.ots, k.add_time as tgl_ots, (SELECT sum(nominal) as tot_recov from tr_recov_as where id_debitur = d.id_debitur), (SELECT add_time as tgl_prioritas FROM tr_prioritas where id_debitur = d.id_debitur order by add_time asc limit 1)');
        $this->db->from('debitur as d');
        $this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'inner');
        $this->db->join('m_cabang_bank as cb', 'cb.id_cabang_bank = cap.id_cabang_bank', 'inner');
        $this->db->join('m_bank as b', 'b.id_bank = cb.id_bank', 'inner');
        $this->db->join('m_cabang_asuransi as asu', 'asu.id_cabang_asuransi = d.id_cabang_as','inner');
        $this->db->join('m_korwil_asuransi as ko', 'ko.id_korwil_asuransi = asu.id_korwil_asuransi', 'inner');
        $this->db->join('m_asuransi as ar', 'ar.id_asuransi = ko.id_asuransi', 'inner');
        $this->db->join('kunjungan as k', 'k.id_debitur = d.id_debitur', 'inner');
        $this->db->join('penempatan as p', 'p.id_capem_bank = cap.id_capem_bank', 'inner');
        $this->db->join('karyawan as w', 'w.id_karyawan = p.id_karyawan', 'inner');
        $this->db->where('w.id_karyawan', $data['verifikator']);

        if ($data['asuransi'] != 'a') {
            $this->db->where('ar.id_asuransi', $data['asuransi']);
        }
        if ($data['cabang_asuransi'] != 'a') {
            $this->db->where('asu.id_cabang_asuransi', $data['cabang_asuransi']);
        }
        if ($data['bank'] != 'a') {
            $this->db->where('b.id_bank', $data['bank']);
        }
        if ($data['cabang_bank'] != 'a') {
            $this->db->where('cb.id_cabang_bank', $data['cabang_bank']);
        }
        if ($data['capem_bank'] != 'a') {
            $this->db->where('cap.id_capem_bank', $data['capem_bank']);
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

            $this->db->where("CAST(k.add_time AS VARCHAR) BETWEEN '$tgl_awal' AND '$tgl_akhir+1'");
        }

        return $this->db->get();
    }

    // AWAL DATATABLES
    public function get_kj_verifikator()
    {
        $this->_get_datatables_query_kj_verifikator();

        if ($this->input->post('length') != -1) {
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
            
            return $this->db->get()->result_array();
        }
    }

    var $kolom_order_kj_ver = [null, 'LOWER(k.nama_lengkap)'];
    var $kolom_cari_kj_ver  = ['LOWER(k.nama_lengkap)'];
    var $order_kj_ver       = ['k.nama_lengkap' => 'asc'];

    // query tampil data kelolaan
    public function _get_datatables_query_kj_verifikator()
    {
        $this->db->select('k.nama_lengkap, k.id_karyawan, (SELECT count(d.id_debitur) as jml_deb FROM penempatan as p 
        INNER JOIN karyawan as y ON y.id_karyawan = p.id_karyawan 
        INNER JOIN debitur as d ON d.id_capem_bank = p.id_capem_bank 
        INNER JOIN kunjungan as j ON j.id_debitur = d.id_debitur
        WHERE y.id_karyawan = k.id_karyawan )');
        $this->db->from('karyawan k');
        $this->db->join('penempatan p', 'p.id_karyawan = k.id_karyawan', 'inner');

        // if ($ver != 'a') {
        //     $this->db->where('k.id_karyawan', $ver);  
        // }

        $this->db->group_by('k.id_karyawan');
        $this->db->group_by('k.nama_lengkap');

        $b = 0;

        $input_cari = strtolower($_POST['search']['value']);
        $kolom_cari = $this->kolom_cari_kj_ver;

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

            $kolom_order = $this->kolom_order_kj_ver;
            $this->db->order_by($kolom_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            
        } elseif (isset($this->order_kj_ver)) {
            
            $order = $this->order_kj_ver;
            $this->db->order_by(key($order), $order[key($order)]);
            
        }
        
    }

    public function jumlah_semua_kj_ver()
    {
        $this->db->select('k.nama_lengkap, k.id_karyawan, (SELECT count(d.id_debitur) as jml_deb  FROM penempatan as p 
        JOIN karyawan as y ON y.id_karyawan = p.id_karyawan 
        JOIN debitur as d ON d.id_capem_bank = p.id_capem_bank 
        JOIN kunjungan as j ON j.id_debitur = d.id_debitur
        WHERE y.id_karyawan = k.id_karyawan )');
        $this->db->from('karyawan k');
        $this->db->join('penempatan p', 'p.id_karyawan = k.id_karyawan', 'inner');

        // if ($ver != 'a') {
        //     $this->db->where('k.id_karyawan', $ver);  
        // }

        $this->db->group_by('k.id_karyawan');
        $this->db->group_by('k.nama_lengkap');

        return $this->db->count_all_results();
    }

    public function jumlah_filter_kj_ver()
    {
        $this->_get_datatables_query_kj_verifikator();
        return $this->db->get()->num_rows();
    }
    // AKHIR DATATABLES

    // 04-03-2021
    public function jml_potensial_non($status, $id_karyawan)
    {
        $this->db->select('d.id_debitur');
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

        if ($status == 'potensial') {
            $this->db->join("tr_potensial as tp", 'tp.id_kunjungan = j.id_kunjungan', 'inner');
        } else {
            $this->db->join("tr_non_potensial as tp", 'tp.id_kunjungan = j.id_kunjungan', 'inner');
            $this->db->where('tp.status', 1);
        }

        $this->db->where('k.id_karyawan', $id_karyawan);
        
        return $this->db->get();
        
    }

    public function jml_potensial_non2($status, $id_karyawan)
    {
        $this->db->select('d.id_debitur, j.id_kunjungan');
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

        if ($status == 'potensial') {
            $this->db->join("tr_potensial as tp", 'tp.id_kunjungan = j.id_kunjungan', 'inner');
        } else {
            $this->db->join("tr_non_potensial as tp", 'tp.id_kunjungan = j.id_kunjungan', 'inner');
            $this->db->where('tp.status', 1);
        }

        $this->db->where('k.id_karyawan', $id_karyawan);
        
        return $this->db->get();
        
    }

}

/* End of file Model_kunjungan.php */
