<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_data extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->cek_login_lib->logged_in_false();
        $this->load->model(array('M_data', 'model_manager'));
        
    }
    
    /***********************************************************************/
    /*
    /*                      Kunjungan Debitur Potensial   
    /*
    /***********************************************************************/

    // menampilkan data debitur potensial
    public function kunjungan_debitur($status = 1, $syariah = "")
    {
        if ($status == 1) {
            $status_deb = 'Debitur Potensial';
        } else {
            $status_deb = 'Debitur Non Potensial';
        }

        if ($syariah == "syariah") {
            $asuransi = $this->M_data->get_asuransi_syariah('m_asuransi', 2)->result_array();
        } else {
            $asuransi = $this->M_data->get_data('m_asuransi')->result_array();
        }

        $data = ['judul'        => $status_deb,
                 'status'       => $status,
                 'asuransi'     => $asuransi,
                 'syariah'      => $syariah,
                 'bank'         => $this->M_data->get_data('m_bank')->result_array(),
                 'verifikator'  => $this->model_manager->get_verifikator()->result_array(),
                 'komitmen'     => $this->M_data->get_data('m_jenis_komitmen')->result_array(),
                 'dt_detail'    => $this->M_data->get_data_dok_asset(320)->result_array(),
                 'spk'          => $this->M_data->get_data('spk')->result_array()
                ];

        $this->template->load('layout/template', 'kunjungan/V_kunjungan_deb', $data);
    }

    // unduh data
    public function unduh_data($status, $syariah = "")
    {
        $asuransi           = $this->input->post('asuransi');
        $cabang_asuransi    = $this->input->post('cabang_asuransi');
        $bank               = $this->input->post('bank');
        $cabang_bank        = $this->input->post('cabang_bank');
        $capem_bank         = $this->input->post('capem_bank');
        $tanggal_awal       = $this->input->post('tgl_awal');
        $tanggal_akhir      = $this->input->post('tgl_akhir');
        $ver                = $this->input->post('verifikator');
        $spk                = $this->input->post('spk');

        if ($asuransi != 'a') {
            $asuransi_n         = $this->M_data->cari_data('m_asuransi', array('id_asuransi' => $asuransi))->row_array(); 
        }
        if ($cabang_asuransi != 'a') {
            $cabang_asuransi_n  = $this->M_data->cari_data('m_cabang_asuransi', array('id_cabang_asuransi' => $cabang_asuransi))->row_array();
        }
        if ($bank != 'a') {
            $bank_n             = $this->M_data->cari_data('m_bank', array('id_bank' => $bank))->row_array();
        }
        if ($cabang_bank != 'a') {
            $cabang_bank_n      = $this->M_data->cari_data('m_cabang_bank', array('id_cabang_bank' => $cabang_bank))->row_array();
        }
        if ($capem_bank != 'a') {
            $capem_bank_n      = $this->M_data->cari_data('m_capem_bank', array('id_capem_bank' => $capem_bank))->row_array();
        }
        if ($ver != 'a') {
            $ver_n      = $this->M_data->cari_data('karyawan', array('id_karyawan' => $ver))->row_array();
        }

        $nama = ['asuransi'         => $asuransi,
                'cabang_asuransi'   => $cabang_asuransi,
                'bank'              => $bank,
                'cabang_bank'       => $cabang_bank,
                'capem_bank'        => $capem_bank,
                'tanggal_awal'      => $tanggal_awal,
                'tanggal_akhir'     => $tanggal_akhir,
                'ver'               => $ver,
                'spk'               => $spk
        ];

        if ($status == 1) {
            $status_deb = 'Debitur Potensial';
        } else {
            $status_deb = 'Debitur Non Potensial';
        }

        if ($spk != 'a') {
            if ($spk == 'null') {
                $spk = 'No SPK';
            } else {
                $sp    = $this->M_data->cari_data('spk', array('id_spk' => $spk))->row_array();
                $spk   = $sp['no_spk'];
            }
        } else {
            $spk    = []; 
        }

        $data = ['data_deb'     => $this->M_data->get_data_kunjungan_deb($nama, $status, $syariah)->result_array(),
                 'list'         => $nama,
                 'report'       => 'Kunjungan Debitur',
                 'status_deb'   => $status_deb,
                 'asuransi'     => $asuransi_n['asuransi'],
                 'cbg_asuransi' => $cabang_asuransi_n['cabang_asuransi'],
                 'bank'         => $bank_n['bank'],
                 'cbg_bank'     => $cabang_bank_n['cabang_bank'],
                 'cpm_bank'     => $capem_bank_n['capem_bank'],
                 'tgl_awal'     => $tanggal_awal,
                 'tgl_akhir'    => $tanggal_akhir,
                 'ver'          => $ver_n['nama_lengkap'],
                 'status'       => $status,
                 'no_spk'       => $spk
                ];

        $this->template->load('template_excel', 'kunjungan/lihat_print', $data);

    }

    // aksi ubah kembali data
    public function proses_ubah_kembali()
    {
        $id_tr_np   = $this->input->post('id_tr_np');
        $id_deb     = $this->input->post('id_deb');
        
        $hasil = $this->M_data->ubah_data('tr_non_potensial', array('id_tr_np' => $id_tr_np), array('status' => 0));

        // $hasil3 = $this->M_data->ubah_data('debitur', array('id_debitur' => $id_deb), array('potensial' => null, 'ots' => null));

        // $hasil1 = $this->M_data->ubah_data('tr_prioritas', array('id_debitur' => $id_deb), array('status' => 0));

        $hasil3 = $this->M_data->ubah_data('debitur', array('id_debitur' => $id_deb), array('potensial' => 1, 'ots' => 0));

        // cari id kunjungan
        $hasil4 = $this->M_data->cari_data('tr_non_potensial', array('id_tr_np' => $id_tr_np))->row_array();

        $tgl = $this->input->post('tgl');

        // tambah data ke tr_potensial
        $data = ['id_kunjungan'         => $hasil4['id_kunjungan'],
                 'id_jenis_komitmen'    => $this->input->post('komitmen'),
                 'tanggal'              => nice_date($tgl, 'Y-m-d'),
                 'nominal'              => $this->input->post('nominal'),
                 'status'               => 1,
                 'ots'                  => 0
                ];

        $this->M_data->input_data('tr_potensial', $data);

        echo json_encode(['hasil' => $hasil]);
    }

    // aksi ubah ots 
    public function proses_ubah_ots()
    {
        $id_tr_potensial = $this->input->post('id_tr_potensial');
        $id_debitur      = $this->input->post('id_debitur');
        
        // $hasil = $this->M_data->ubah_data('tr_potensial', array('id_tr_potensial' => $id_tr_potensial), array('ots' => 1));

        $hasil = $this->M_data->ubah_data('tr_potensial', array('id_tr_potensial' => $id_tr_potensial), array('ots' => 1, 'status' => 1));

        $hasil2 = $this->M_data->ubah_data('debitur', array('id_debitur' => $id_debitur), array('ots' => 1));

        $hasil3 = $this->M_data->ubah_data('tr_prioritas', array('id_debitur' => $id_debitur), array('status' => 5));

        echo json_encode(['hasil' => $hasil]);
        
    }

    // menampilkan detail dokumen aset
    public function form_detail_dok_aset()
    {
        $id_deb         = $this->input->post('id_debitur');
        $id_tr_pot      = $this->input->post('id_tr_pot');

        $nm = $this->M_data->cari_data('debitur', array('id_debitur' => $id_deb))->row_array();
        
        $data = [   'dt_detail'         => $this->M_data->get_data_dok_asset($id_deb)->result_array(),
                    'status_milik'      => $this->M_data->get_data('m_status_milik')->result_array(),
                    'sifat_asset'       => $this->M_data->get_data('m_sifat_asset')->result_array(),
                    'nama_debitur'      => $nm['nama_debitur'],
                    'id_debitur2'       => $id_deb,
                    'id_tr_pot'         => $id_tr_pot
                ];

        $this->load->view('manager/V_detail_dok_asset', $data);
        
    }

    // menampilkan data debitur potensial
    public function tampil_data_potensial($syariah = "")
    {
        $nama = ['asuransi'         => $this->input->post('asuransi'),
                'cabang_asuransi'   => $this->input->post('cabang_asuransi'),
                'bank'              => $this->input->post('bank'),
                'cabang_bank'       => $this->input->post('cabang_bank'),
                'capem_bank'        => $this->input->post('capem_bank'),
                'tanggal_awal'      => $this->input->post('tanggal_awal'),
                'tanggal_akhir'     => $this->input->post('tanggal_akhir'),
                'verifikator'       => $this->input->post('verifikator'),
                'spk'               => $this->input->post('spk')
        ];

        $list = $this->M_data->get_data_potensial($nama, $syariah);

        $data   = array();
        $no     = $this->input->post('start');

        foreach ($list as $a) {
            $no++;
            $tbody = array();

            // $shs = ($a['subrogasi'] - $a['r_awal_as']) - $a['tot_nominal_as'];

            // $angka = $this->M_data->cari_data_fu($a['id_tr_potensial'])->row_array();

            // if ($angka['fu'] == 0) {
            //     $a_fu = 0;
            // } else {
            //     $a_fu = $angka['fu'];
            // }

            $dok = $this->M_data->cari_data('dokumen_asset', array('id_debitur' => $a['id_debitur'], 'status' => 1, 'id_jenis_dok' => 2));

            // cari data ots di potensial bernilai 1 
            $pot = $this->M_data->cari_data('tr_potensial', array('id_tr_potensial' => $a['id_tr_potensial'], 'ots' => 1, 'status' => 1));
            
            if ($dok->num_rows() > 0) {

                if ($pot->num_rows() > 0) {
                    $nm_dok = "<div align='center'><h6><span class='badge badge-success badge-pill'>Data Valid Agunan</span></h6></div>";
                } else {
                    $nm_dok = "<button type='button' class='btn btn waves-effect waves-light btn-outline-dark btn-sm det-aset' data-id=".$a['id_debitur']." id_tr_pot=".$a['id_tr_potensial']." data-toggle='tooltip' data-placement='top' title='Dokumen Aset'>Dok. Aset</button>";
                }
                
            } else {
                $nm_dok = "<div align='center'><h6><span class='badge badge-danger badge-pill'>Tidak Ada Agunan</span></h6></div>";
            }

            $tbody[]    = "<div align='center'>".$no."</div>";
            $tbody[]    = $a['no_reff'];
            $tbody[]    = $a['no_klaim'];
            $tbody[]    = $a['nama_debitur'];
            $tbody[]    = "Rp. ".number_format($a['total_shs'],'2','.',',');
            $tbody[]    = $a['bank'];
            $tbody[]    = $a['cabang_bank'];
            $tbody[]    = $a['capem_bank'];
            $tbody[]    = nice_date($a['tanggal_ots'], 'd-M-Y H:i:s');
            $tbody[]    = nice_date($a['tanggal_pri'], 'd-M-Y H:i:s');
            $tbody[]    = $a['keterangan'];
            $tbody[]    = $a['nama_verifikator'];
            $tbody[]    = "<div align='center'><h4>FU-<span class='badge badge-success' style='font-weight: bold; font-size: 17px'>".$a['fu']."</span></h4></div>";
            // $tbody[]    = "<div align='center'><button type='button' class='btn btn waves-effect waves-light btn-outline-info btn-sm ubah-ots mr-3' data-id=".$a['id_tr_potensial']." id_deb=".$a['id_debitur']."  data-toggle='tooltip' data-placement='top' title='Sudah OTS'>OTS</button>".$nm_dok."</div>";
            $tbody[]    = "<div align='center'>".$nm_dok."</div>";
            $data[]     = $tbody;
        }
        
        $output = [ "draw"             => $_POST['draw'],
                    "recordsTotal"     => $this->M_data->jumlah_semua_potensial($nama, $syariah),
                    "recordsFiltered"  => $this->M_data->jumlah_filter_potensial($nama, $syariah),   
                    "data"             => $data
                ];

        echo json_encode($output);
    }

    public function tes()
    {
        $this->db->select('j.id_kunjungan');
        
            $this->db->from('debitur as d');
            $this->db->join('m_capem_bank as cap', 'cap.id_capem_bank = d.id_capem_bank', 'inner');
            $this->db->join('m_cabang_bank as cab', 'cab.id_cabang_bank = cap.id_cabang_bank', 'inner');
            $this->db->join('m_bank as b', 'b.id_bank = cab.id_bank', 'inner');
            $this->db->join('m_cabang_asuransi as asu','asu.id_cabang_asuransi = d.id_cabang_as','INNER');
            $this->db->join('m_korwil_asuransi as kor','kor.id_korwil_asuransi = asu.id_korwil_asuransi','INNER');
            $this->db->join('m_asuransi as asr', 'asr.id_asuransi = kor.id_asuransi', 'inner');
            $this->db->join('penempatan as p', 'p.id_capem_bank = cap.id_capem_bank', 'inner');
            $this->db->join('karyawan as k', 'k.id_karyawan = p.id_karyawan', 'inner');
            $this->db->join('kunjungan as j', 'j.id_debitur = d.id_debitur ', 'inner');
            // $this->db->join("tr_non_potensial as tp", 'tp.id_kunjungan = j.id_kunjungan', 'inner');
            // $this->db->where('tp.status', 0);
            $this->db->where('k.id_karyawan', 5);
            

        $cari = $this->db->get()->result_array();

        $cr = array();
        $au = array();
        $ap = array();

        foreach ($cari as $a) {

            $a1 = $this->db->get_where('tr_potensial', ['id_kunjungan' => $a['id_kunjungan']])->num_rows();
            
            if ($a1 == 0) {
                array_push($cr, $a['id_kunjungan']);
            }
        }

        foreach ($cr as $d) {

            $a11 = $this->db->get_where('tr_non_potensial', ['id_kunjungan' => $d, 'status' => 1])->num_rows();
            
            if ($a11 == 1) {
                array_push($au, $d);
            }
            
        }

        foreach ($au as $v) {

            $a12 = $this->db->get_where('tr_potensial', ['id_kunjungan' => $v])->num_rows();
            
            if ($a12 == 0) {
                array_push($ap, $v);
            }
        }

        echo "<pre>";
        print_r($ap);
        echo "</pre>";
        
    }

    // 09-03-2020

        // menampilkan data debitur non potensial
        public function tampil_data_non_potensial($syariah = "")
        {
            $nama = [   'asuransi'          => $this->input->post('asuransi'),
                        'cabang_asuransi'   => $this->input->post('cabang_asuransi'),
                        'bank'              => $this->input->post('bank'),
                        'cabang_bank'       => $this->input->post('cabang_bank'),
                        'capem_bank'        => $this->input->post('capem_bank'),
                        'tanggal_awal'      => $this->input->post('tanggal_awal'),
                        'tanggal_akhir'     => $this->input->post('tanggal_akhir'),
                        'verifikator'       => $this->input->post('verifikator'),
                        'spk'               => $this->input->post('spk')
                    ];

            $list = $this->M_data->get_data_non_potensial($nama, $syariah);

            $data   = array();
            $no     = $this->input->post('start');

            foreach ($list as $a) {
                $no++;
                $tbody = array();

                $tbody[]    = "<div align='center'>".$no."</div>";
                $tbody[]    = $a['no_reff'];
                $tbody[]    = $a['no_klaim'];
                $tbody[]    = $a['nama_debitur'];
                $tbody[]    = "Rp. ".number_format($a['total_shs'],'2','.',',');
                $tbody[]    = $a['bank'];
                $tbody[]    = $a['cabang_bank'];
                $tbody[]    = $a['capem_bank'];
                $tbody[]    = nice_date($a['tanggal_ots'], 'd-M-Y H:i:s');
                $tbody[]    = nice_date($a['tanggal_pri'], 'd-M-Y H:i:s');
                $tbody[]    = $a['keterangan'];
                $tbody[]    = $a['nama_verifikator'];
                $tbody[]    = "<div align='center'><button type='button' class='btn btn-sm waves-effect waves-light btn-rounded btn-outline-info ubah-potensial' tr_np=".$a['id_tr_np']." id_deb=".$a['id_debitur'].">Ubah Potensial</button></div>";
                $data[]     = $tbody;
            }

            $output = [ "draw"             => $_POST['draw'],
                        "recordsTotal"     => $this->M_data->jumlah_semua_non_potensial($nama, $syariah),
                        "recordsFiltered"  => $this->M_data->jumlah_filter_non_potensial($nama, $syariah),   
                        "data"             => $data
                    ];

            echo json_encode($output);
        }

    // Akhir 09-03-2020

    // ambil cabang asuransi
    public function ambil_cabang_asuransi()
    {
        $id_asuransi = $this->input->post('id_asuransi');

        if ($id_asuransi == "a") {
            
            $list_as = $this->M_data->get_data('m_cabang_asuransi')->result_array();

            $option = "<option value='a'>-- Pilih Cabang Asuransi --</option>";

            foreach ($list_as as $a) {
                $option .= "<option value='".$a['id_cabang_asuransi']."'>".$a['cabang_asuransi']."</option>";
            }

        } else {
            $list_as = $this->M_data->cari_cab_asuransi($id_asuransi)->result_array();

            $option = "<option value='a'>-- Pilih Cabang Asuransi --</option>";

            foreach ($list_as as $a) {
                $option .= "<option value='".$a['id_cabang_asuransi']."'>".$a['cabang_asuransi']."</option>";
            }
        }
        $data = ['cabang_as'    => $option];

        echo json_encode($data);
        
    }

    // menampilkan cabang bank 
    public function ambil_cabang_bank()
    {
        $id_bank = $this->input->post('id_bank');
        
        if ($id_bank == "a") {
            
            $list_bank = $this->M_data->get_data('m_cabang_bank')->result_array();

            $option = "<option value='a'>-- Semua --</option>";

            foreach ($list_bank as $a) {
                $option .= "<option value='".$a['id_cabang_bank']."'>".$a['cabang_bank']."</option>";
            }

        } else {
            $list_bank = $this->M_data->cari_cab_bank($id_bank)->result_array();

            $option = "<option value='a'>-- Semua --</option>";

            foreach ($list_bank as $a) {
                $option .= "<option value='".$a['id_cabang_bank']."'>".$a['cabang_bank']."</option>";
            }
        }

        $option1 = "<option value='a'>-- Pilih Capem Bank --</option>";

        $data = ['cabang_bank'    => $option, 'option1' => $option1];

        echo json_encode($data);
    }

    // menampilkan capem bank
    public function ambil_capem_bank()
    {
        $id_cabang_bank = $this->input->post('id_cabang_bank');
        $aksi           = $this->input->post('aksi');

        if ($id_cabang_bank == "a") {

            $option = "<option value='a'>-- Semua --</option>";

        } else {
            
            if ($aksi == 'cari_capem') {
                $list_cap_b = $this->model_manager->get_data_capem_ver($id_cabang_bank)->result_array();
            } else {
                $list_cap_b = $this->M_data->cari_cap_bank($id_cabang_bank)->result_array();
            }

            $option = "<option value='a'>-- Semua --</option>";

            foreach ($list_cap_b as $a) {
                $option .= "<option value='".$a['id_capem_bank']."'>".$a['capem_bank']."</option>";
            }
        }
        $data = ['capem_bank'    => $option];

        echo json_encode($data);
    }

    // menampilkan verifikator
    public function ambil_verifikator()
    {
        $id_capem_bank = $this->input->post('id_capem_bank');
        
        if ($id_capem_bank == "a") {

            $ver = $this->model_manager->get_verifikator()->result_array();

            $option = "<option value='a'>-- Pilih Verfikator --</option>";

            foreach ($ver as $a) {
                $option .= "<option value='".$a['id_karyawan']."'>".$a['nama_lengkap']."</option>";
            }
            
        } else {
            $list_ver = $this->M_data->cari_ver($id_capem_bank)->result_array();

            $option = "<option value='a'>-- Pilih Verfikator --</option>";

            foreach ($list_ver as $a) {
                $option .= "<option value='".$a['id_karyawan']."'>".$a['nama_lengkap']."</option>";
            }
        }
        
        $data = ['ver'    => $option];

        echo json_encode($data);
    }

    public function debitur_non_potensial()
    {
        $data = ['judul'    => 'Debitur Non Potensial',
                 'asuransi' => $this->M_data->get_data('m_asuransi')->result_array(),
                 'bank'     => $this->M_data->get_data('m_bank')->result_array()
                ];

        $this->template->load('layout/template', 'kunjungan/V_deb_non_potensial', $data);
    }

    // mencari bank sesuai verifikator
    public function ambil_bank_ver()
    {
        $id_karyawan = $this->input->post('id_karyawan');
        
        if ($id_karyawan == "a") {

            $list_bank = $this->M_data->get_data('m_bank')->result_array();

            $option = "<option value='a'>-- Semua --</option>";

            foreach ($list_bank as $a) {
                $option .= "<option value='".$a['id_bank']."'>".$a['bank']."</option>";
            }

        } else {
            $list_bank = $this->M_data->cari_bank_ver($id_karyawan)->result_array();

            $option = "<option value='a'>-- Semua --</option>";

            foreach ($list_bank as $a) {
                $option .= "<option value='".$a['id_bank']."'>".$a['bank']."</option>";
            }
        }

        $data = ['bank'    => $option];

        echo json_encode($data);
    }
    
    // mencari cabang bank sesuai verifikator 
    public function ambil_cabang_bank_ver()
    {
        $id_karyawan = $this->input->post('id_karyawan');
        $id_bank     = $this->input->post('id_bank');
        
        if ($id_karyawan == 'a' && $id_bank == 'a') {

            $list_cab_bank = $this->M_data->get_data('m_cabang_bank')->result_array();

            $option = "<option value='a'>-- Semua --</option>";

            foreach ($list_cab_bank as $a) {
                $option .= "<option value='".$a['id_cabang_bank']."'>".$a['cabang_bank']."</option>";
            }

            $c = 'kar bank kosong';

        } elseif ($id_karyawan == 'a' && $id_bank != 'a') {
            
            $list_cab_bank = $this->M_data->cari_cab_bank($id_bank)->result_array();

            $option = "<option value='a'>-- Semua --</option>";

            foreach ($list_cab_bank as $a) {
                $option .= "<option value='".$a['id_cabang_bank']."'>".$a['cabang_bank']."</option>";
            }

            $c = 'kar kosong bank ada';

        } elseif ($id_karyawan != 'a' && $id_bank == 'a') {
            
            $list_cab_bank = $this->M_data->get_data('m_cabang_bank')->result_array();

            $option = "<option value='a'>-- Semua --</option>";

            foreach ($list_cab_bank as $a) {
                $option .= "<option value='".$a['id_cabang_bank']."'>".$a['cabang_bank']."</option>";
            }

            $c = 'kar bank';

        } elseif ($id_karyawan != 'a' && $id_bank != 'a') {
            
            $list_cab_bank = $this->M_data->cari_cab_bank_ver($id_karyawan, $id_bank)->result_array();

            $option = "<option value='a'>-- Semua --</option>";

            foreach ($list_cab_bank as $a) {
                $option .= "<option value='".$a['id_cabang_bank']."'>".$a['cabang_bank']."</option>";
            }

            $c = 'kar bank';
        }

        $data = ['cabang_bank'    => $option, 'status' => $c];

        echo json_encode($data);
    }

    // mencari capem bank sesuai verifikator
    public function ambil_capem_bank_ver()
    {
        $id_cabang_bank = $this->input->post('id_cabang_bank');
        $id_karyawan    = $this->input->post('id_karyawan');

        if ($id_karyawan == 'a' && $id_cabang_bank != 'a') {

            $list_cab_bank = $this->M_data->cari_cap_bank($id_cabang_bank)->result_array();

            $option = "<option value='a'>-- Semua --</option>";

            foreach ($list_cab_bank as $a) {
                $option .= "<option value='".$a['id_capem_bank']."'>".$a['capem_bank']."</option>";
            }

        } elseif ($id_karyawan == 'a' && $id_cabang_bank == 'a') {
            
            $list_cab_bank = $this->M_data->get_data('m_capem_bank')->result_array();

            $option = "<option value='a'>-- Semua --</option>";

            foreach ($list_cab_bank as $a) {
                $option .= "<option value='".$a['id_capem_bank']."'>".$a['capem_bank']."</option>";
            }

        } elseif ($id_karyawan != 'a' && $id_cabang_bank == 'a') {
            
            $list_cab_bank = $this->M_data->get_data('m_capem_bank')->result_array();

            $option = "<option value='a'>-- Semua --</option>";

            foreach ($list_cab_bank as $a) {
                $option .= "<option value='".$a['id_capem_bank']."'>".$a['capem_bank']."</option>";
            }
        } elseif ($id_karyawan != 'a' && $id_cabang_bank != 'a') {
            
            $list_cap_b = $this->M_data->cari_cap_bank_ver($id_karyawan, $id_cabang_bank)->result_array();

            $option = "<option value='a'>-- Semua --</option>";

            foreach ($list_cap_b as $a) {
                $option .= "<option value='".$a['id_capem_bank']."'>".$a['capem_bank']."</option>";
            }
        }
        $data = ['capem_bank'    => $option];

        echo json_encode($data);
    }

}

/* End of file C_data.php */
