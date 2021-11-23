<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->cek_login_lib->logged_in_false();
        $this->load->model(array('model_manager', 'model_kunjungan'));
        
    }
    

    public function index()
    {
        $data = ['judul'        => 'Kunjungan',
                 'verifikator'  => $this->model_manager->get_verifikator()->result_array()
                ]; 

        $this->template->load('layout/template', 'kunjungan/V_kunjungan_ver', $data); 
    }

    public function tes()
    {
        $this->db->select('d.id_debitur, d.no_reff, d.nama_debitur, cap.capem_bank, asu.cabang_asuransi, d.*, k.pic, k.status_hubungan, k.keterangan, k.id_kunjungan, d.potensial, d.ots, k.add_time as tgl_ots, (SELECT sum(nominal) as tot_recov from tr_recov_as where id_debitur = d.id_debitur), (SELECT add_time as tgl_prioritas FROM tr_prioritas where id_debitur = d.id_debitur order by add_time asc limit 1)');
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
        // $this->db->join("tr_potensial as tp1", 'tp1.id_kunjungan = k.id_kunjungan', 'left');
        // $this->db->join("tr_non_potensial as tp", 'tp.id_kunjungan = k.id_kunjungan', 'left');
        // $this->db->where('tp.status', 1);
        $this->db->where('w.id_karyawan', 5);
        // $this->db->where('d.id_debitur', 605);
        
        $jml_d = $this->db->get()->result_array();

        $jml_p = $this->model_kunjungan->jml_potensial_non2('potensial', 5)->result_array();
        $jml_n = $this->model_kunjungan->jml_potensial_non2('non', 5)->result_array();

        $arr = [];
        foreach ($jml_p as $p) {
            array_push($arr, $p['id_debitur']);
        }

        foreach ($jml_n as $n) {
            array_push($arr, $n['id_debitur']);
        }

        $arr2 = [];
        foreach ($jml_d as $d) {
            array_push($arr2, $d['id_debitur']);
        }

        $ar = [];
        foreach ($arr2 as $r) {
            if (!in_array($r, $arr)) {
                array_push($ar, $r);
            }
        }

        $new_array = array_count_values($arr);
        arsort($new_array, SORT_NUMERIC);       

        echo "<pre>";
        print_r($arr2);
        echo "</pre>";
    }

    public function tampil_kj_verifikator()
    {
        // $verifikator = $this->input->post('verifikator');

        $list = $this->model_kunjungan->get_kj_verifikator();

        $data   = array();
        $no     = $this->input->post('start');

        foreach ($list as $a) {
            $no++;
            $tbody = array();

            // mencari jumlah potensial dan non
            $jml_p = $this->model_kunjungan->jml_potensial_non('potensial', $a['id_karyawan'])->num_rows();
            $jml_n = $this->model_kunjungan->jml_potensial_non('non', $a['id_karyawan'])->num_rows();

            $jml = $jml_p+$jml_n;

            $jml = $a['jml_deb'];

            $tbody[]    = "<div align='center'>".$no."</div>";
            $tbody[]    = $a['nama_lengkap'];
            $tbody[]    = "<div align='center'><h5><span>".$jml."</span></h5></div>";
            $tbody[]    = "<div align='center'><button type='button' class='btn waves-effect waves-light btn-outline-success btn-sm detail-ver' data-id=".$a['id_karyawan'].">Detail</button></div>";
            $data[]     = $tbody;
        }

        $output = [ "draw"             => $_POST['draw'],
                    "recordsTotal"     => $this->model_kunjungan->jumlah_semua_kj_ver(),
                    "recordsFiltered"  => $this->model_kunjungan->jumlah_filter_kj_ver(),   
                    "data"             => $data
                ];

        echo json_encode($output);
        
    }

    // menampilkan list debitur
    public function tampil_detail_deb()
    {
        $id_karyawan = $this->input->post('id_karyawan');

        $data = ['capem'        => $this->model_kunjungan->get_capem_ver($id_karyawan)->result_array(),
                 'debitur'      => $this->model_kunjungan->get_debitur_ver($id_karyawan, $x="")->result_array(),
                 'id_karyawan'  => $id_karyawan,
                 'bank'         => $this->model_kunjungan->get_data_order('m_bank', 'bank', 'asc')->result_array(),
                 'asuransi'     => $this->model_kunjungan->get_data_order('m_asuransi', 'asuransi', 'asc')->result_array(),
                 'spk'          => $this->model_manager->get_data('spk')->result_array()
                ];

        $this->load->view('kunjungan/V_detail_deb', $data);
    }

    public function ambil_deb()
    {
        $id_capem_bank  = $this->input->post('id_capem_bank');
        $id_karyawan    = $this->input->post('id_karyawan');
        
        if ($id_capem_bank == "a") {

            $deb = $this->model_kunjungan->get_debitur_ver($id_karyawan, $x="")->result_array();

            $option = "<option value='a'>-- Pilih Debitur --</option>";

            foreach ($deb as $a) {
                $option .= "<option value='".$a['id_debitur']."'>".$a['nama_debitur']."</option>";
            }
            
        } else {
            $list_deb = $this->model_kunjungan->get_debitur_ver($id_karyawan, $id_capem_bank)->result_array();

            $option = "<option value='a'>-- Pilih Debitur --</option>";

            foreach ($list_deb as $a) {
                $option .= "<option value='".$a['id_debitur']."'>".$a['nama_debitur']."</option>";
            }
        }
        
        $data = ['deb'    => $option];

        echo json_encode($data);
    }

    public function tampil_debitur_ver()
    {
        $dt = [ 'asuransi'          => $this->input->post('asuransi'),
                'cabang_asuransi'   => $this->input->post('cabang_asuransi'),
                'bank'              => $this->input->post('bank'),
                'cabang_bank'       => $this->input->post('cabang_bank'),
                'capem_bank'        => $this->input->post('capem_bank'),
                'tanggal_awal'      => $this->input->post('tanggal_awal'),
                'tanggal_akhir'     => $this->input->post('tanggal_akhir'),
                'verifikator'       => $this->input->post('verifikator'),
                'spk'               => $this->input->post('spk')
        ];

        $list = $this->model_kunjungan->get_tampil_debitur_ver($dt);

        $data   = array();
        $no     = $this->input->post('start');

        foreach ($list as $a) {
            $no++;
            $tbody = array();

            if ($a['potensial'] == 1) {
                $status = "<div align='center'><h4><span class='badge badge-info badge-pill'>Potensial</span></h4></div>";
            } elseif ($a['potensial'] == null) {
                $status = "";
            } elseif ($a['potensial'] == 0) {
                $status = "<div align='center'><h4><span class='badge badge-danger badge-pill'>Non Potensial</span></h4></div>";
            }

            if ($a['ots'] == 1) {
                $status_o = "<div align='center'><h4><span class='badge badge-info badge-pill'>OTS</span></h4></div>";
            } elseif ($a['ots'] == null) {
                $status_o = "";
            } else {
                $status_o = "<div align='center'><h4><span class='badge badge-danger badge-pill'>Bukan OTS</span></h4></div>";
            }

            $shs = ($a['subrogasi_as'] - $a['recoveries_awal_asuransi']) - $a['tot_recov'];

            $tbody[]    = "<div align='center'>".$no."</div>";
            $tbody[]    = $a['no_reff'];
            $tbody[]    = $a['nama_debitur'];
            $tbody[]    = $a['capem_bank'];
            $tbody[]    = $a['cabang_asuransi'];
            $tbody[]    = number_format($shs,'2',',','.');
            $tbody[]    = $a['pic'];
            $tbody[]    = $a['status_hubungan'];
            $tbody[]    = $status;
            $tbody[]    = $status_o;
            $tbody[]    = $a['keterangan'];
            $tbody[]    = nice_date($a['tgl_ots'], 'd-M-Y H:i:s');
            $tbody[]    = nice_date($a['tgl_prioritas'], 'd-M-Y H:i:s');
            $data[]     = $tbody;
        }

        $output = [ "draw"             => $_POST['draw'],
                    "recordsTotal"     => $this->model_kunjungan->jumlah_semua_debitur_ver($dt),
                    "recordsFiltered"  => $this->model_kunjungan->jumlah_filter_debitur_ver($dt),   
                    "data"             => $data
                 ];

        echo json_encode($output);
    }

    // 06-03-2020

        public function unduh_excel()
        {
            $dt = [ 'asuransi'          => $this->input->post('asuransi'),
                    'cabang_asuransi'   => $this->input->post('cabang_asuransi'),
                    'bank'              => $this->input->post('bank'),
                    'cabang_bank'       => $this->input->post('cabang_bank'),
                    'capem_bank'        => $this->input->post('capem_bank'),
                    'tanggal_awal'      => $this->input->post('tgl_awal'),
                    'tanggal_akhir'     => $this->input->post('tgl_akhir'),
                    'verifikator'       => $this->input->post('verifikator'),
                    'spk'               => $this->input->post('spk')
            ];

            $list = $this->model_kunjungan->get_tampil_debitur_ver_2($dt)->result_array();

            $cari = $this->model_kunjungan->cari_data('karyawan', array('id_karyawan' => $dt['verifikator']))->row_array();

            if ($dt['asuransi'] != 'a') {
                $asuransi   = $this->model_kunjungan->cari_data('m_asuransi', array('id_asuransi' => $dt['asuransi']))->row_array();
            } else {
                $asuransi   = [];
            }

            if ($dt['cabang_asuransi'] != 'a') {
                $cbg_asuransi   = $this->model_kunjungan->cari_data('m_cabang_asuransi', array('id_cabang_asuransi' => $dt['cabang_asuransi']))->row_array();
            } else {
                $cbg_asuransi   = [];
            }

            if ($dt['bank'] != 'a') {
                $bank   = $this->model_kunjungan->cari_data('m_bank', array('id_bank' => $dt['bank']))->row_array();
            } else {
                $bank   = [];
            }

            if ($dt['cabang_bank'] != 'a') {
                $cbg_bank   = $this->model_kunjungan->cari_data('m_cabang_bank', array('id_cabang_bank' => $dt['cabang_bank']))->row_array();
            } else {
                $cbg_bank   = [];
            }
            
            if ($dt['capem_bank'] != 'a') {
                $cpm_bank   = $this->model_kunjungan->cari_data('m_capem_bank', array('id_capem_bank' => $dt['capem_bank']))->row_array();
            } else {
                $cpm_bank       = []; 
            }

            if ($dt['spk'] != 'a') {
                if ($dt['spk'] == 'null') {
                    $spk = 'No SPK';
                } else {
                    $sp    = $this->model_kunjungan->cari_data('spk', array('id_spk' => $dt['spk']))->row_array();
                    $spk   = $sp['no_spk'];
                }
            } else {
                $spk    = []; 
            }

            $data = [   'data'              => $list,
                        'report'            => "Kunjungan ".$cari['nama_lengkap'],
                        'verifikator'       => $cari['nama_lengkap'],
                        'asuransi'          => $asuransi['asuransi'],
                        'cabang_asuransi'   => $cbg_asuransi['cabang_asuransi'],
                        'bank'              => $bank['bank'],
                        'cabang_bank'       => $cbg_bank['cabang_bank'],
                        'capem_bank'        => $cpm_bank['capem_bank'],
                        'tanggal_awal'      => $this->input->post('tgl_awal'),
                        'tanggal_akhir'     => $this->input->post('tgl_akhir'),
                        'no_spk'            => $spk
                        
                    ];

            $this->template->load('template_excel', 'kunjungan/V_kunjungan_excel', $data);
        }

    // Akhir 06

}

/* End of file Kunjungan.php */
