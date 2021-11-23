<?php
class manager extends CI_Controller{  
  function __construct(){
    parent::__construct();
    $this->cek_login_lib->logged_in_false();
    $this->load->model(array('model_manager', 'M_data'));
  }

  public function tambah_tujuh_hari()
  {
    // echo date('Y-m-d', strtotime("2019-10-18 +3 days"));

    $tgl_skrg = date("Y-m-d", now('Asia/Jakarta'));

    return $tgl_plus_7 = date('Y-m-d', strtotime("$tgl_skrg +7 days"));
  }

  public function tes()
  {
    $data = array();
    
    // dokumen asset
      $this->db->select('*');
      $this->db->from('dokumen_asset');
      $h = $this->db->get()->result();
      $ar = array();
      foreach ($h as $b) {
          $ar[] = $b->id_debitur;
      }
      $im = implode(",", $ar);
      $ex = explode(",", $im);

      $this->db->select('d.id_debitur, d.nama_debitur');
      $this->db->from('debitur as d');
      
      if ($ex[0] != "") {
          $this->db->where_in('d.id_debitur', $ex);
      }

      $this->db->order_by('d.id_debitur', 'asc');
      

      $hasil = $this->db->get()->result_array();

      foreach ($hasil as $h) {
        array_push($data, $h['id_debitur']);
      }

    // tr_fu
      $this->db->select('*');
      $this->db->from('tr_fu');
      $h = $this->db->get()->result();
      $ar = array();
      foreach ($h as $b) {
          $ar[] = $b->id_debitur;
      }
      $im = implode(",", $ar);
      $ex = explode(",", $im);

      $this->db->select('d.id_debitur, d.nama_debitur');
      $this->db->from('debitur as d');
      
      if ($ex[0] != "") {
          $this->db->where_in('d.id_debitur', $ex);
      }

      $this->db->order_by('d.id_debitur', 'asc');
      

      $hasil2 = $this->db->get()->result_array();

      foreach ($hasil2 as $h) {
        array_push($data, $h['id_debitur']);
      }

    // kunjungan
      $this->db->select('*');
      $this->db->from('kunjungan');
      $h = $this->db->get()->result();
      $ar = array();
      foreach ($h as $b) {
          $ar[] = $b->id_debitur;
      }
      $im = implode(",", $ar);
      $ex = explode(",", $im);

      $this->db->select('d.id_debitur, d.nama_debitur');
      $this->db->from('debitur as d');
      
      if ($ex[0] != "") {
          $this->db->where_in('d.id_debitur', $ex);
      }

      $this->db->order_by('d.id_debitur', 'asc');
      

      $hasil3 = $this->db->get()->result_array();

      foreach ($hasil3 as $h) {
        array_push($data, $h['id_debitur']);
      }

    // tr_prioritas
      $this->db->select('*');
      $this->db->from('tr_prioritas');
      $h = $this->db->get()->result();
      $ar = array();
      foreach ($h as $b) {
          $ar[] = $b->id_debitur;
      }
      $im = implode(",", $ar);
      $ex = explode(",", $im);

      $this->db->select('d.id_debitur, d.nama_debitur');
      $this->db->from('debitur as d');
      
      if ($ex[0] != "") {
          $this->db->where_in('d.id_debitur', $ex);
      }

      $this->db->order_by('d.id_debitur', 'asc');
      

      $hasil4 = $this->db->get()->result_array();

      foreach ($hasil4 as $h) {
        array_push($data, $h['id_debitur']);
      }

    // tr_recov_as
      $this->db->select('*');
      $this->db->from('tr_recov_as');
      $h = $this->db->get()->result();
      $ar = array();
      foreach ($h as $b) {
          $ar[] = $b->id_debitur;
      }
      $im = implode(",", $ar);
      $ex = explode(",", $im);

      $this->db->select('d.id_debitur, d.nama_debitur');
      $this->db->from('debitur as d');
      
      if ($ex[0] != "") {
          $this->db->where_in('d.id_debitur', $ex);
      }

      $this->db->order_by('d.id_debitur', 'asc');
      

      $hasil5 = $this->db->get()->result_array();

      foreach ($hasil5 as $h) {
        array_push($data, $h['id_debitur']);
      }

    // tr_foto_dokumen
      $this->db->select('*');
      $this->db->from('tr_foto_dokumen');
      $h = $this->db->get()->result();
      $ar = array();
      foreach ($h as $b) {
          $ar[] = $b->id_debitur;
      }
      $im = implode(",", $ar);
      $ex = explode(",", $im);

      $this->db->select('d.id_debitur, d.nama_debitur');
      $this->db->from('debitur as d');
      
      if ($ex[0] != "") {
          $this->db->where_in('d.id_debitur', $ex);
      }

      $this->db->order_by('d.id_debitur', 'asc');
      

      $hasil6 = $this->db->get()->result_array();

      foreach ($hasil6 as $h) {
        array_push($data, $h['id_debitur']);
        // echo $h['id_debitur'], "<br>";
      }

    $a = array_unique($data);

    // foreach ($a as $b) {
    //   echo $b,"<br>";
    // }

    $data2 = array();

    $deb = $this->db->get('debitur')->result_array();
    
    foreach ($deb as $d) {
      array_push($data2, $d['id_debitur']);
    }

    $c = array_diff($data2, $a);

    foreach ($c as $cc) {
      // $this->db->delete('debitur', array('id_debitur' => $cc));
      echo $cc;
    }

    // echo "sukses";
    
  }

  /***********************************************************************/
  /*
  /*                        HALAMAN SUMMARY  
  /*
  /***********************************************************************/

  public function summary()
  {
    $data = [ 'judul'       => 'Summary',
              'asuransi'    => $this->M_data->get_data('m_asuransi')->result_array(),
              'bank'        => $this->M_data->get_data('m_bank')->result_array(),
              'verifikator' => $this->model_manager->get_verifikator()->result_array(),
              'spk'         => $this->M_data->get_data('spk')->result_array()
            ];

    $this->template->load('layout/template', 'manager/V_summary', $data);
  }

  // tampil data pada dataTable
  public function tampil_list_summary()
  {
    $dt = [ 'bank'              => $this->input->post('bank'),
            'cabang_bank'       => $this->input->post('cabang_bank'),
            'capem_bank'        => $this->input->post('capem_bank'),
            'tanggal_awal'      => $this->input->post('tanggal_awal'),
            'tanggal_akhir'     => $this->input->post('tanggal_akhir'),
            'id_karyawan'       => $this->input->post('verifikator'),
            'spk'               => $this->input->post('spk')
        ];

    $list = $this->model_manager->get_data_summary($dt);

    $data   = array();
    $no     = $this->input->post('start');

    foreach ($list as $a) {
        $no++;
        $tbody = array();

        if ($a['debitur_kelolaan'] == 0) {
          $persen_ots = 0;
        } else {
          $persen_ots = ($a['sudah_ots'] / $a['debitur_kelolaan']) * 100;
        }
        

        $tbody[]    = "<div align='center'>".$no."</div>";
        $tbody[]    = $a['cabang_bank'];
        $tbody[]    = $a['capem_bank'];
        $tbody[]    = "<div align='right'>".$a['debitur_kelolaan']."</div>";
        $tbody[]    = "<div align='right'>".$a['sudah_ots']."</div>";
        $tbody[]    = "<div align='right'>".number_format($persen_ots,'2','.','.')." %"."</div>";
        $tbody[]    = "<div align='center'>".$a['potensial']."</div>";
        $tbody[]    = "<div align='center'>".$a['non_potensial']."</div>";
        $tbody[]    = $a['verifikator'];
        $data[]     = $tbody;
    }

    $output = [ "draw"             => $_POST['draw'],
                "recordsTotal"     => $this->model_manager->jumlah_semua_summary($dt),
                "recordsFiltered"  => $this->model_manager->jumlah_filter_summary($dt),   
                "data"             => $data
              ];

    echo json_encode($output);
  }

  public function tampil_list_summary_as()
  {
    $dt = [ 'asuransi'          => $this->input->post('asuransi'),
            'cabang_asuransi'   => $this->input->post('cabang_asuransi'),
            'tanggal_awal'      => $this->input->post('tanggal_awal'),
            'tanggal_akhir'     => $this->input->post('tanggal_akhir'),
            'id_karyawan'       => $this->input->post('verifikator'),
            'spk'               => $this->input->post('spk')
        ];

    $list = $this->model_manager->get_data_summary_as($dt);

    $data   = array();
    $no     = $this->input->post('start');

    foreach ($list as $a) {
        $no++;
        $tbody = array();

        if ($a['debitur_kelolaan'] == 0) {
          $persen_ots = 0;
        } else {
          $persen_ots = ($a['sudah_ots'] / $a['debitur_kelolaan']) * 100;
        }
        
        $tbody[]    = "<div align='center'>".$no."</div>";
        $tbody[]    = $a['cabang_asuransi'];
        $tbody[]    = "<div align='right'>".$a['debitur_kelolaan']."</div>";
        $tbody[]    = "<div align='right'>".$a['sudah_ots']."</div>";
        $tbody[]    = "<div align='right'>".number_format($persen_ots,'2','.','.')." %"."</div>";
        $tbody[]    = "<div align='center'>".$a['potensial']."</div>";
        $tbody[]    = "<div align='center'>".$a['non_potensial']."</div>";
        $data[]     = $tbody;
    }

    $output = [ "draw"             => $_POST['draw'],
                "recordsTotal"     => $this->model_manager->jumlah_semua_summary_as($dt),
                "recordsFiltered"  => $this->model_manager->jumlah_filter_summary_as($dt),   
                "data"             => $data
              ];

    echo json_encode($output);
  }

  // 12-03-2020

    // unduh excel summary 
    public function unduh_excel_summary()
    {
        $bank               = $this->input->post('bank');
        $cabang_bank        = $this->input->post('cabang_bank');
        $capem_bank         = $this->input->post('capem_bank');
        $ver                = $this->input->post('verifikator1');
        $spk                = $this->input->post('spk');

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
        
        $nama = [
                'bank'              => $bank,
                'cabang_bank'       => $cabang_bank,
                'capem_bank'        => $capem_bank,
                'id_karyawan'       => $ver,
                'spk'               => $spk
        ];

        if ($nama['spk'] != 'a') {
            if ($nama['spk'] == 'null') {
                $spk = 'No SPK';
            } else {
                $sp    = $this->model_manager->cari_data('spk', array('id_spk' => $nama['spk']))->row_array();
                $spk   = $sp['no_spk'];
            }
        } else {
            $spk    = []; 
        }

        $data = [ 'data_deb'     => $this->model_manager->get_data_unduh_excel_summary($nama)->result_array(),
                  'list'         => $nama,
                  'report'       => 'Summary Bank',
                  'bank'         => $bank_n['bank'],
                  'cbg_bank'     => $cabang_bank_n['cabang_bank'],
                  'cpm_bank'     => $capem_bank_n['capem_bank'],
                  'ver'          => $ver_n['nama_lengkap'],
                  'no_spk'       => $spk
                ];

        $this->template->load('template_excel', 'manager/V_excel_summary', $data);

    }

    // unduh excel summary asuransi
    public function unduh_excel_summary_as()
    {
      $asuransi           = $this->input->post('asuransi');
      $cabang_asuransi    = $this->input->post('cabang_asuransi');
      $ver                = $this->input->post('verifikator1');
      $spk                = $this->input->post('spk');

      if ($asuransi != 'a') {
          $asuransi_n         = $this->M_data->cari_data('m_asuransi', array('id_asuransi' => $asuransi))->row_array(); 
      }
      if ($cabang_asuransi != 'a') {
          $cabang_asuransi_n  = $this->M_data->cari_data('m_cabang_asuransi', array('id_cabang_asuransi' => $cabang_asuransi))->row_array();
      }
      if ($ver != 'a') {
          $ver_n      = $this->M_data->cari_data('karyawan', array('id_karyawan' => $ver))->row_array();
      }
      
      $nama = ['asuransi'         => $asuransi,
              'cabang_asuransi'   => $cabang_asuransi,
              'id_karyawan'       => $ver,
              'spk'               => $spk
      ];

      if ($nama['spk'] != 'a') {
          if ($nama['spk'] == 'null') {
              $spk = 'No SPK';
          } else {
              $sp    = $this->model_manager->cari_data('spk', array('id_spk' => $nama['spk']))->row_array();
              $spk   = $sp['no_spk'];
          }
      } else {
          $spk    = []; 
      }

      $data = [ 'data_deb'     => $this->model_manager->get_data_unduh_excel_summary_asuransi($nama)->result_array(),
                'list'         => $nama,
                'report'       => 'Summary Asuransi',
                'asuransi'     => $asuransi_n['asuransi'],
                'cbg_asuransi' => $cabang_asuransi_n['cabang_asuransi'],
                'ver'          => $ver_n['nama_lengkap'],
                'no_spk'       => $spk
              ];

      // print_r($data['data_deb']); exit();

      $this->template->load('template_excel', 'manager/V_excel_summary_as', $data);
    }

  // Akhir 12-03-2020
  
  /***********************************************************************/
  /*
  /*                      HALAMAN LIST PRIORITAS  
  /*
  /***********************************************************************/

  // menampilkan data list prioritas
  public function list_prioritas()
  {
    $tgl_skrg1 = date("Y-m-d", now('Asia/Jakarta'));

    $tgl_skrg2 = '2019-11-19';

    $cek_data = '';

    $tgl_skrg = strtotime($tgl_skrg1);

    $hasil = $this->M_data->get_data('tr_prioritas')->result_array();

    foreach ($hasil as $h) {
        $tgl_exp1 = $h['end'];
        $tgl_exp  = strtotime($tgl_exp1);

        // jika data expired
        if ($tgl_skrg >= $tgl_exp) {

          // cek pada tabel kunjungan
          $cek1 = $this->model_manager->cari_data('kunjungan', array('id_debitur' => $h['id_debitur']))->num_rows();

          // cek pada tabel debitur
          $cek2 = $this->model_manager->cari_data('debitur', array('id_debitur' => $h['id_debitur']))->row_array();

          // jika telah ada kunjugan
          if ($cek1 != 0) {

             // jika belum ots
            if ($cek2['ots'] == 0) {
              $cari_e = $this->model_manager->cari_data('tr_prioritas', array('id_debitur' => $h['id_debitur'], 'status' => 4))->num_rows();

              if ($cari_e == 0) {
                $this->M_data->ubah_data('tr_prioritas', array('id_tr_prioritas' => $h['id_tr_prioritas']), array('status' => 4));
              }

              $da2 = $this->model_manager->cari_data('tr_prioritas', array('id_tr_prioritas' => $h['id_tr_prioritas']))->row_array();

              $data2 = ['id_debitur' => $da2['id_debitur'],
                        'status'     => 1,
                        'end'        => $this->tambah_tujuh_hari()
                      ];
              
              $ck_id = $this->model_manager->cari_data('tr_prioritas', array('id_debitur' => $da2['id_debitur'], 'status' => 1))->num_rows();

              if ($ck_id == 0) {
                // input lagi status 1 
                $this->model_manager->input_data('tr_prioritas', $data2);

                $cek_data = 'ada kunjungan';
              }
            } 
          } else {
            // ubah status jdi 3
            $cari_d = $this->model_manager->cari_data('tr_prioritas', array('id_debitur' => $h['id_debitur'], 'status' => 3))->num_rows();

            if ($cari_d == 0) {
              $this->M_data->ubah_data('tr_prioritas', array('id_tr_prioritas' => $h['id_tr_prioritas']), array('status' => 3));
            }

            $da = $this->model_manager->cari_data('tr_prioritas', array('id_tr_prioritas' => $h['id_tr_prioritas']))->row_array();

            $data1 = ['id_debitur' => $da['id_debitur'],
                      'status'     => 1,
                      'end'        => $this->tambah_tujuh_hari()
                    ];

            $ck_id2 = $this->model_manager->cari_data('tr_prioritas', array('id_debitur' => $da['id_debitur'], 'status' => 1))->num_rows();

            $ck_id3 = $this->model_manager->cari_data_order('tr_prioritas', array('id_debitur' => $da['id_debitur']), 'add_time', 'desc')->row_array();

            if ($ck_id2 == 0) {

              if ($ck_id3['status'] != 2) {
                // input lagi status 1 
                $this->model_manager->input_data('tr_prioritas', $data1);
                $cek_data = 'tidak ada kunjungan';
              }

            }
          }
         

        } else {
          if ($h['status'] == 0) {
            $this->M_data->ubah_data('tr_prioritas', array('id_tr_prioritas' => $h['id_tr_prioritas']), array('status' => 1)); 
          } 

            $cek1 = $this->model_manager->cari_data('kunjungan', array('id_debitur' => $h['id_debitur']))->num_rows();

            // $ck = $this->model_manager->cari_data('debitur', array('id_debitur' => $h['id_debitur']))->row_array();

            $ck = $this->model_manager->cari_data('tr_potensial', array('id_kunjungan' => $cek1['id_kunjungan']))->row_array();

            // print_r($ck);

            // exit();

            if ($cek1 != 0) {
              if ($ck['ots'] == 1 && $ck['status'] == 1) {
                $this->M_data->ubah_data('tr_prioritas', array('id_tr_prioritas' => $h['id_tr_prioritas']), array('status' => 5));
              }
            }
          
        }

    }

    $data = [ 'judul'       => 'List Prioritas',
              'asuransi'    => $this->M_data->get_data('m_asuransi')->result_array(),
              'bank'        => $this->M_data->get_data('m_bank')->result_array(),
              'jml_deb'     => $this->model_manager->get_jml_deb_tambah_pri(),
              'verifikator' => $this->model_manager->get_verifikator()->result_array(),
              'cek_data'    => $cek_data,
              'spk'         => $this->M_data->get_data('spk')->result_array()
            ];

    $this->template->load('layout/template', 'kelolaan/V_list_prioritas', $data);
  }

  // proses tambah prioritas
  public function proses_tambah_prioritas()
  {
    $id_debitur = $this->input->post('id_debitur');
    $tgl_end    = $this->input->post('tgl_end');
    $start      = date("Y-m-d", now('Asia/Jakarta'));

    $hasil = array();
    
    for ($i=0; $i < count($id_debitur); $i++) { 
      $hasil[] = ['status'      => 1,
                  'id_debitur'  => $id_debitur[$i],
                  'start'       => $start,
                  'end'         => $tgl_end[$i]
                ];
      // dihilangkan dikomen tgl 07-04-2021
      // $this->model_manager->ubah_data('debitur', array('ots' => 1), array('id_debitur' => $id_debitur[$i]));
    }

    $this->model_manager->input_data_batch('tr_prioritas', $hasil); 
    // $this->model_manager->simpan_prioritas($hasil);

    echo json_encode(['status' => TRUE]);

  }

  // halaman tambah data prioritas
  public function tambah_data_prioritas()
  {
    $data = [ 'judul'     => 'Tambah data prioritas',
              'd_debitur' => $this->model_manager->get_data_prioritas_2()->result_array()
    ];

    $this->template->load('layout/template', 'master/V_tambah_data_prioritas', $data);
  }

  // ambil capem bank verifikator
  public function ambil_capem_ver()
  {
    $id_verifikator = $this->input->post('id_verifikator');

    if ($id_verifikator == "a") {
      $option = "<option value='a'>-- Pilih Capem Bank --</option>";
    } else {
      $list_cap = $this->model_manager->cari_cap_ver($id_verifikator)->result_array();

      $option = "<option value='a'>-- Pilih Capem Bank --</option>";

      foreach ($list_cap as $a) {
          $option .= "<option value='".$a['id_capem_bank']."'>".$a['capem_bank']."</option>";
      }
    }

    $data = ['capem'  => $option];

    echo json_encode($data);
    
  }

  // menampilkan list data tambah prioritas
  public function tampil_list_tambah_prioritas()
  {
    $nama = ['verifikator'  => $this->input->post('verifikator'),
             'capem_bank'   => $this->input->post('capem_bank')
        ];

    $list = $this->model_manager->get_data_tambah_prioritas($nama);

    $data   = array();
    $no     = $this->input->post('start');

    foreach ($list as $c => $a) {
        $no++;
        $tbody = array();

        // $hasil = $this->model_manager->cari_data('tr_prioritas', array('id_debitur' => $a['id_debitur']))->num_rows();

        // if ($hasil != 0) {
        //   $tgl_end    = "<input type='date' class='form-control' name='tgl_end[]' disabled>";
        //   $pilih_pri  = "<div align='center'><input type='checkbox' name='pilih_pri[]' value='".$a['id_debitur']."' disabled></div>";
        // } else {
        //   $pilih_pri = "<div align='center'><input type='checkbox' name='pilih_pri[]' value='".$a['id_debitur']."'></div>";
        //   $tgl_end    = "<input type='date' class='form-control' name='tgl_end[]' data='".$a['id_debitur']."'> ";
        // }

        $shs = ($a['subrogasi'] - $a['recoveries']);

        if ($a['tgl_ots']) {
          $tgl = date("d-M-Y", strtotime($a['tgl_ots']));
        } else {
          $tgl = '-';
        }

        $tbody[]    = "<div align='center'>".$no.".</div>";
        $tbody[]    = "<div align='center'><input type='checkbox' name='pilih_pri[]' value='".$no."' id='prioritas_".$no."'></div>";
        $tbody[]    = $a['no_reff'];
        $tbody[]    = $a['no_klaim'];
        $tbody[]    = $a['nama_debitur'];
        $tbody[]    = number_format($shs,'2',',','.');
        $tbody[]    = $a['bank'];
        $tbody[]    = $a['cabang_bank'];
        $tbody[]    = $a['capem_bank'];
        $tbody[]    = $tgl;
        $tbody[]    = $a['nama_verifikator'];
        $tbody[]    = "<input type='date' class='form-control' name='tgl_end[]' data='".$a['id_debitur']."' id='tgl_".$no."' disabled>";
        $data[]     = $tbody;
    }

    $output = [ "draw"             => $_POST['draw'],
                "recordsTotal"     => $this->model_manager->jumlah_semua_tambah_prioritas($nama),
                "recordsFiltered"  => $this->model_manager->jumlah_filter_tambah_prioritas($nama),   
                "data"             => $data
              ];

    echo json_encode($output);
  } 

  public function coba()
  {
    $this->db->select('count(id_debitur) as jumlah');
    $this->db->from('kunjungan');
    $this->db->where('id_debitur', 122);
    $this->db->group_by('id_debitur');
    
    echo $a = $this->db->get()->num_rows();
    
  }

  // menampilkan data prioritas dengan prioritas
  public function tampil_list_prioritas()
  {
    $stat = $this->uri->segment(3);

    $nama = ['asuransi'         => $this->input->post('asuransi'),
            'cabang_asuransi'   => $this->input->post('cabang_asuransi'),
            'bank'              => $this->input->post('bank'),
            'cabang_bank'       => $this->input->post('cabang_bank'),
            'capem_bank'        => $this->input->post('capem_bank'),
            'tanggal_awal'      => $this->input->post('tanggal_awal'),
            'tanggal_akhir'     => $this->input->post('tanggal_akhir'),
            'verifikator'       => $this->input->post('verifikator'),
            'status'            => $stat,
            'spk'               => $this->input->post('spk')
        ];

    $list = $this->model_manager->get_data_prioritas($nama);

    $data   = array();
    $no     = $this->input->post('start');

    foreach ($list as $a) {
        $no++;
        $tbody = array();

        $shs = ($a['subrogasi'] - $a['recoveries']);

        // $cari = $this->model_manager->cari_data('kunjungan',array('id_debitur' => $a['id_debitur']))->num_rows();

        if ($a['jumlah'] != 0) {
          $status = "<div align='center'><h6><span class='badge badge-info badge-pill'>Sudah Dikerjakan</span></h6></div>";
          $hapus  = "";
        } else {
          $status = "<div align='center'><h6><span class='badge badge-danger badge-pill'>Belum Dikerjakan</span></h6></div>";
          $hapus  = "<div align='center'><button type='button' class='btn btn-sm waves-effect waves-light btn-outline-danger hapus-prioritas' data-id=".$a['id_tr_prioritas']." data-toggle='tooltip' data-placement='top' title='Hapus Prioritas'>Hapus</button></div>";
        }

        $tbody[]    = "<div align='center'>".$no."</div>";
        $tbody[]    = $a['no_reff'];
        $tbody[]    = $a['no_klaim'];
        $tbody[]    = $a['nama_debitur'];
        $tbody[]    = "Rp. ".number_format($shs,'2','.',',');
        $tbody[]    = $a['bank'];
        $tbody[]    = $a['cabang_bank'];
        $tbody[]    = $a['capem_bank'];
        $tbody[]    = $a['nama_verifikator'];
        $tbody[]    = nice_date($a['tgl_prioritas'], 'd-M-Y H:i:s');
        $tbody[]    = "<div align='center'>".nice_date($a['end'], "d-M-Y")."</div>";
        $tbody[]    = $status;
        $tbody[]    = $hapus;
        $data[]     = $tbody;
    }

    $output = [ "draw"             => $_POST['draw'],
                "recordsTotal"     => $this->model_manager->jumlah_semua_prioritas($nama),
                "recordsFiltered"  => $this->model_manager->jumlah_filter_prioritas($nama),   
                "data"             => $data
              ];

    echo json_encode($output);
  }

  // menampilkan form tambah prioritas
  public function form_tambah_prioritas()
  {
    $tgl_skrg = date("Y-m-d", now('Asia/Jakarta'));

    $tgl_plus_7 = date('Y-m-d', strtotime("$tgl_skrg +7 days"));

    $data = ['d_verifikator'  => $this->model_manager->get_data_ver()->result_array(),
             'jml_deb'        => $this->model_manager->get_jml_deb_tambah_pri(),
             'tgl_plus_7'     => $tgl_plus_7
            ];

    $this->load->view('kelolaan/V_tambah_prioritas', $data);
    
  }

  // proses hapus prioritas 
  public function proses_hapus_prioritas()
  {
    $id_tr_prioritas = $this->input->post('id_tr_prioritas');
    
    $this->model_manager->ubah_data('tr_prioritas', array('status' => 2), array('id_tr_prioritas' => $id_tr_prioritas));

    echo json_encode(['status' => TRUE]);
  }

  // proses unduh prioritas
  public function unduh_excel_prioritas()
  {
    $nama = [ 'asuransi'          => $this->input->post('asuransi'),
              'cabang_asuransi'   => $this->input->post('cabang_asuransi'),
              'bank'              => $this->input->post('bank'),
              'cabang_bank'       => $this->input->post('cabang_bank'),
              'capem_bank'        => $this->input->post('capem_bank'),
              'tanggal_awal'      => $this->input->post('tanggal_awal'),
              'tanggal_akhir'     => $this->input->post('tanggal_akhir'),
              'verifikator'       => $this->input->post('verifikator'),
              'status'            => $this->input->post('status'),
              'spk'               => $this->input->post('spk')
            ];

    $list = $this->model_manager->get_data_prioritas_excel($nama)->result_array();

    if ($this->input->post('status') == 1 ) {
      $status = 'Aktif';
    } elseif ($this->input->post('status') == 2) {
      $status = 'Dihapus / Dibatalkan'; 
    } elseif ($this->input->post('status') == 3 ) {
      $status = 'Expired Belum Dikerjakan'; 
    } elseif ($this->input->post('status') == 4 ) {
      $status = 'Expired Belum OTS'; 
    } else {
      $status = 'Selesai'; 
    }

      $data = ['data'             => $list,
              'report'            => "Prioritas $status",
              'status'            => $this->input->post('status'),
              'nama_pri'          => $status,
              'asuransi'          => $this->input->post('asuransi'),
              'cabang_asuransi'   => $this->input->post('cabang_asuransi'),
              'bank'              => $this->input->post('bank'),
              'cabang_bank'       => $this->input->post('cabang_bank'),
              'capem_bank'        => $this->input->post('capem_bank'),
              'tanggal_awal'      => $this->input->post('tanggal_awal'),
              'tanggal_akhir'     => $this->input->post('tanggal_akhir'),
              'verifikator'       => $this->input->post('verifikator')
            ];

    $this->template->load('template_excel', 'kelolaan/V_prioritas_excel', $data);
  }

  /***********************************************************************/
  /*
  /*                      HALAMAN LIST KELOLAAN  
  /*
  /***********************************************************************/

  public function list_kelolaan()
  {
    $data = [ 'judul'       => 'List Kelolaan',
              'asuransi'    => $this->M_data->get_data('m_asuransi')->result_array(),
              'bank'        => $this->M_data->get_data('m_bank')->result_array(),
              'verifikator' => $this->model_manager->cari_data('karyawan', ['verifikator' => 1])->result_array(),
              'cabang_bank' => $this->M_data->get_data('m_cabang_bank')->result_array(),
              'capem_bank'  => $this->M_data->get_data('m_capem_bank')->result_array()
            ];

    $this->template->load('layout/template', 'kelolaan/V_list_kelolaan', $data);
  }

  // menampilkan detail debitur menurut verifikator
  public function form_detail_kelolaan_ver()
  {
    $id_karyawan    = $this->input->post('id_karyawan');
    $id_capem_bank  = $this->input->post('id_capem_bank');

    $data = ['karyawan'   => $this->model_manager->cari_data_kar($id_capem_bank)->row_array(),
             'debitur'    => $this->model_manager->cari_capem_debitur($id_capem_bank, $id_karyawan)->result_array()
            ];
    
    $this->load->view('kelolaan/V_form_detail_kel', $data);
    
  }

  // proses simpan kelolaan
  public function proses_tambah_kelolaan()
  {
    $id_karyawan  = $this->input->post('id_karyawan');
    $id_capem     = $this->input->post('id_capem');

    $hasil = array();

    for ($i=0; $i < count($id_capem); $i++) { 
      $hasil[] = [ 'id_karyawan'    => $id_karyawan,
                   'id_capem_bank'  => $id_capem[$i]
                ];
    }
    
    $this->model_manager->input_data_batch('penempatan', $hasil);
    
    echo json_encode(['status' => TRUE]);
  }

  // public function tampil_karyawan()
  //   {   
  //       $data_karyawan = $this->M_master->get_data_karyawan()->result_array();
  //       $no =1;
  //       foreach ($data_karyawan as $value) {
  //           $tbody = array();
  //           $tbody[] = "<div align='center'>".$no++."</div>";
  //           $tbody[] = $value['nama_karyawan'];
  //           $tbody[] = $value['nik'];
  //           $tbody[] = $value['alamat'];
  //           $tbody[] = $value['no_telp'];
  //           $aksi= "<div align='center'> <button class='btn btn-icon btn-icon-circle btn-sun btn-icon-style-2 ubah-karyawan' data-toggle='modal' data-id=".$value['id_karyawan']."><span class='btn-icon-wrap'><i class='icon-pencil'></i></span></button>".' '."<button class='btn btn-icon btn-icon-circle btn-red btn-icon-style-2 hapus-karyawan' id='id' data-toggle='modal' data-id=".$value['id_karyawan']."><span class='btn-icon-wrap'><i class='icon-trash'></i></span></button> </div>";
  //           $tbody[] = $aksi;
  //           $data[]  = $tbody; 
  //       }

  //       if ($data_karyawan) {
  //           echo json_encode(array('data'=> $data));
  //       }else{
  //           echo json_encode(array('data'=>0));
  //       }
  //   }

  public function tampil_capem_bank()
  {
      $cabang_bank = $this->input->post('cabang_bank');

      $list = $this->model_manager->get_data_capem($cabang_bank)->result_array();

      $no = 1;
      foreach ($list as $d) {
        $tbody = array();
        $tbody[] = "<div align='center'>".$no++."</div>";
        $tbody[] = "<div align='center'><input type='checkbox' name='pilih_capem[]' value='".$d['id_capem_bank']."'></div>";
        $tbody[] = $d['cabang_bank'];
        $tbody[] = $d['capem_bank'];
        $data[]  = $tbody;
      }

      if ($list) {
          echo json_encode(array('data'=> $data));
      }else{
          echo json_encode(array('data'=>0));
      }
  }

  // menampilkan data list kelolaan datatables
  public function tampil_list_kelolaan()
  {
    // $nama = ['asuransi'         => $this->input->post('asuransi'),
    //         'cabang_asuransi'   => $this->input->post('cabang_asuransi'),
    //         'bank'              => $this->input->post('bank'),
    //         'cabang_bank'       => $this->input->post('cabang_bank'),
    //         'capem_bank'        => $this->input->post('capem_bank'),
    //         'tanggal_awal'      => $this->input->post('tanggal_awal'),
    //         'tanggal_akhir'     => $this->input->post('tanggal_akhir')
    //     ];

    $nama = [ 'id_karyawan'       => $this->input->post('verifikator'),
              'bank'              => $this->input->post('bank'),
              'cabang_bank'       => $this->input->post('cabang_bank'),
              'capem_bank'        => $this->input->post('capem_bank')
    ];

    $list = $this->model_manager->get_data_kelolaan($nama);

    $data   = array();
    $no     = $this->input->post('start');

    foreach ($list as $a) {
        $no++;
        $tbody = array();

        $tbody[]    = "<div align='center'>".$no."</div>";
        $tbody[]    = $a['bank'];
        $tbody[]    = $a['cabang_bank'];
        $tbody[]    = $a['capem_bank'];
        $tbody[]    = $a['nama_verifikator'];
        $tbody[]    = "<div align='center'><button type='button' class='btn btn-sm waves-effect waves-light btn-outline-dark edit-kelolaan mr-2' id_kar=".$a['id_karyawan']." id_capem=".$a['id_capem_bank']." id_penempatan=".$a['id_penempatan'].">Edit</button><button type='button' class='btn btn-sm waves-effect waves-light btn-outline-info detail-kelolaan mr-2' id_kar=".$a['id_karyawan']." id_capem=".$a['id_capem_bank'].">Detail</button><button type='button' class='btn btn-sm waves-effect waves-light btn-outline-danger hapus-kelolaan' id_kar=".$a['id_karyawan']." id_capem=".$a['id_capem_bank'].">Hapus</button></div>";
        $data[]     = $tbody;
    }

    $output = [ "draw"             => $_POST['draw'],
                "recordsTotal"     => $this->model_manager->jumlah_semua_kelolaan($nama),
                "recordsFiltered"  => $this->model_manager->jumlah_filter_kelolaan($nama),   
                "data"             => $data
              ];

    echo json_encode($output);
  }

  // form edit kelolaan
  public function form_edit_kelolaan_ver()
  {
      $id_karyawan    = $this->input->post('id_karyawan');
      $id_capem       = $this->input->post('id_capem_bank');
      $id_penempatan  = $this->input->post('id_penempatan');

      $cr_cbg_bank  = $this->M_data->cari_data('m_capem_bank', array('id_capem_bank' => $id_capem))->row_array();

      $cr_id_bank   = $this->M_data->cari_data('m_cabang_bank', array('id_cabang_bank' => $cr_cbg_bank['id_cabang_bank']))->row_array();

      $nm_karyawan  = $this->M_data->cari_data('karyawan', array('id_karyawan' => $id_karyawan))->row_array();
      
      $data = [ 'id_penempatan' => $id_penempatan,
                'nm_karyawan'   => $nm_karyawan['nama_lengkap'],
                'id_capem'      => $id_capem,
                'id_bank'       => $cr_id_bank['id_bank'],
                'id_cbg_bank'   => $cr_cbg_bank['id_cabang_bank'],
                'nm_capem'      => $cr_cbg_bank['capem_bank'],
                'list_capem'    => $this->model_manager->get_data_capem_ver($cr_cbg_bank['id_cabang_bank'])->result_array(),
                'list_bank'     => $this->M_data->get_data('m_bank')->result_array(),
                'list_cabang'   => $this->model_manager->cari_data('m_cabang_bank', array('id_bank' => $cr_id_bank['id_bank']))->result_array()
              ];

      $this->load->view('kelolaan/V_edit_kelolaan', $data); 
  }

  // proses edit kelolaan
  public function proses_edit_kelolaan()
  {
    $id_penempatan  = $this->input->post('id_penempatan');
    $id_bank        = $this->input->post('id_bank');
    $id_cabang      = $this->input->post('id_cabang');
    $id_capem       = $this->input->post('id_capem');
    
    $this->model_manager->ubah_data('penempatan', array('id_capem_bank' => $id_capem), array('id_penempatan' => $id_penempatan));
  
    echo json_encode(['hasil' => TRUE]);
  }

  // proses hapus kelolaan
  public function hapus_kelolaan()
  {
    $id_karyawan  = $this->input->post('id_karyawan');
    $id_capem     = $this->input->post('id_capem');

    $this->model_manager->hapus_data('penempatan', array('id_karyawan' => $id_karyawan, 'id_capem_bank' => $id_capem));
    
    echo json_encode(['status' => TRUE]);
  }

  /***********************************************************************/
  /*
  /*                            LAT LONG  
  /*
  /***********************************************************************/

  public function lat_long()
  {
    $data = ['judul'        => 'Latitude Longitude',
             'asuransi'     => $this->M_data->get_data('m_asuransi')->result_array(),
             'bank'         => $this->M_data->get_data('m_bank')->result_array(),
             'verifikator'  => $this->model_manager->get_verifikator()->result_array(),
             'spk'          => $this->M_data->get_data('spk')->result_array()
            ];

    $this->template->load('layout/template', 'manager/V_latlong', $data);
  }

  public function tampil_data_latlong()
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

    $list = $this->model_manager->get_data_latlong($nama);

    $data   = array();
    $no     = $this->input->post('start');

    foreach ($list as $a) {
        $no++;
        $tbody = array();

        $tbody[]    = "<div align='center'>".$no."</div>";
        $tbody[]    = $a['no_reff'];
        $tbody[]    = $a['no_klaim'];
        $tbody[]    = $a['nama_debitur'];
        $tbody[]    = $a['latitude'];
        $tbody[]    = $a['longitude'];
        $tbody[]    = $a['alamat'];
        $tbody[]    = nice_date($a['add_time'], 'd-M-Y H:i:s');
        $tbody[]    = $a['keterangan'];
        $tbody[]    = $a['bank'];
        $tbody[]    = $a['cabang_bank'];
        $tbody[]    = $a['capem_bank'];
        $tbody[]    = "<div align='center'><button type='button' class='btn btn-sm waves-effect waves-light btn-outline-info btn-sm ubah-latlong' data-id=".$a['id_kunjungan'].">Edit</button></div>";
        $data[]     = $tbody;
    }

    $output = [ "draw"             => $_POST['draw'],
                "recordsTotal"     => $this->model_manager->jumlah_semua_latlong($nama),
                "recordsFiltered"  => $this->model_manager->jumlah_filter_latlong($nama),   
                "data"             => $data
            ];

    echo json_encode($output);
  }

  public function tampil_ubah_latlong()
  {
    $id_kunjungan = $this->input->post('id_kunjungan');

    $data = $this->model_manager->cari_data('kunjungan', array('id_kunjungan' => $id_kunjungan))->row_array();

    $nm_deb = $this->model_manager->cari_data('debitur', array('id_debitur' => $data['id_debitur']))->row_array();

    array_push($data, array('nm_deb' => $nm_deb['nama_debitur']));

    echo json_encode($data);    
  }

  // proses simpan latlong
  public function simpan_latlong()
  {
    $id_kunjungan = $this->input->post('id_kunjungan');
    $lat          = $this->input->post('latitude');
    $long         = $this->input->post('longitude');
    $ket          = $this->input->post('keterangan');
    $alamat       = $this->input->post('alamat');
    
    $data = [ 'latitude'  => $lat,
              'longitude' => $long,
              'keterangan'=> $ket,
              'alamat'    => $alamat
           ];

    $this->model_manager->ubah_data('kunjungan', $data, array('id_kunjungan' => $id_kunjungan));

    echo json_encode(['status' => TRUE]);
  }

  // 09-03-2020

    // proses unduh excel 
    public function unduh_excel_latlong()
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

        if ($nama['spk'] != 'a') {
            if ($nama['spk'] == 'null') {
                $spk = 'No SPK';
            } else {
                $sp    = $this->model_manager->cari_data('spk', array('id_spk' => $nama['spk']))->row_array();
                $spk   = $sp['no_spk'];
            }
        } else {
            $spk    = []; 
        }

        $data = [ 'data_deb'     => $this->model_manager->get_data_unduh_excel_latlong($nama)->result_array(),
                  'list'         => $nama,
                  'report'       => 'Latlong',
                  'asuransi'     => $asuransi_n['asuransi'],
                  'cbg_asuransi' => $cabang_asuransi_n['cabang_asuransi'],
                  'bank'         => $bank_n['bank'],
                  'cbg_bank'     => $cabang_bank_n['cabang_bank'],
                  'cpm_bank'     => $capem_bank_n['capem_bank'],
                  'tgl_awal'     => $tanggal_awal,
                  'tgl_akhir'    => $tanggal_akhir,
                  'ver'          => $ver_n['nama_lengkap'],
                  'no_spk'       => $spk
                ];

        // print_r($data['data_deb']); exit();

        $this->template->load('template_excel', 'manager/V_lihat_print_latlong', $data);

    }

  // Akhir 09-03-2020

  /***********************************************************************/
  /*
  /*                      HALAMAN ON THE SPOT / VALIDASI AGUNAN  
  /*
  /***********************************************************************/

  public function on_the_spot()
  {
    $data = ['judul'        => 'On the Spot',
             'asuransi'     => $this->M_data->get_data('m_asuransi')->result_array(),
             'bank'         => $this->M_data->get_data('m_bank')->result_array(),
             'verifikator'  => $this->model_manager->get_verifikator()->result_array(),
             'spk'          => $this->M_data->get_data('spk')->result_array()
            ];

    $this->template->load('layout/template', 'manager/V_on_the_spot', $data);
  }

  // aksi ubah kembali data
  public function proses_ubah_kembali()
  {
      $id_tr_p    = $this->input->post('id_tr_p');
      $id_deb     = $this->input->post('id_deb');
      
      // $hasil = $this->M_data->ubah_data('tr_potensial', array('id_tr_potensial' => $id_tr_p), array('status' => 0));

      // $hasil3 = $this->M_data->ubah_data('debitur', array('id_debitur' => $id_deb), array('potensial' => null, 'ots' => null));

      $hasil1 = $this->M_data->ubah_data('tr_prioritas', array('id_debitur' => $id_deb), array('status' => 0));

      $hasil  = $this->M_data->ubah_data('debitur', array('id_debitur' => $id_deb), array('potensial' => 1, 'ots' => 0));

      $hasil1 = $this->M_data->ubah_data('tr_potensial', array('id_tr_potensial' => $id_tr_p), array('status' => 0, 'ots' => 0));

      echo json_encode(['hasil' => $hasil]);
  }

  public function tampil_data_ots_2()
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

    $list = $this->model_manager->get_data_ots_2($nama);

    $data   = array();
    $no     = $this->input->post('start');

    foreach ($list as $a) {
        $no++;
        $tbody = array();

        $shs = ($a['subrogasi'] - $a['r_awal_as']) - $a['tot_nominal_as'];

        $tbody[]    = "<div align='center'>".$no."</div>";
        $tbody[]    = $a['no_reff'];
        $tbody[]    = $a['no_klaim'];
        $tbody[]    = $a['nama_debitur'];
        $tbody[]    = "Rp. ".number_format($shs,'2','.',',');
        $tbody[]    = $a['bank'];
        $tbody[]    = $a['cabang_bank'];
        $tbody[]    = $a['capem_bank'];
        $tbody[]    = nice_date($a['tanggal_ots'], 'd-M-Y H:i:s');
        $tbody[]    = $a['nama_verifikator'];
        $tbody[]    = "<div align='center'><button type='button' class='btn btn-sm waves-effect waves-light btn-outline-info btn-sm ubah-kembali' tr_p=".$a['id_tr_potensial']." id_deb=".$a['id_debitur'].">Kembalikan Data</button></div>";
        $data[]     = $tbody;
    }

    $output = [ "draw"             => $_POST['draw'],
                "recordsTotal"     => $this->model_manager->jumlah_semua_ots_2($nama),
                "recordsFiltered"  => $this->model_manager->jumlah_filter_ots_2($nama),   
                "data"             => $data
            ];

    echo json_encode($output);
  }

  // 10-03-2020

    // fungsi unduh excel 
    public function unduh_excel_validasi_agunan()
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

      if ($nama['spk'] != 'a') {
          if ($nama['spk'] == 'null') {
              $spk = 'No SPK';
          } else {
              $sp    = $this->model_manager->cari_data('spk', array('id_spk' => $nama['spk']))->row_array();
              $spk   = $sp['no_spk'];
          }
      } else {
          $spk    = []; 
      }

      $data = [ 'data_deb'     => $this->model_manager->get_data_excel_validasi_agunan($nama)->result_array(),
                'list'         => $nama,
                'report'       => 'Validasi Agunan',
                'asuransi'     => $asuransi_n['asuransi'],
                'cbg_asuransi' => $cabang_asuransi_n['cabang_asuransi'],
                'bank'         => $bank_n['bank'],
                'cbg_bank'     => $cabang_bank_n['cabang_bank'],
                'cpm_bank'     => $capem_bank_n['capem_bank'],
                'tgl_awal'     => $tanggal_awal,
                'tgl_akhir'    => $tanggal_akhir,
                'ver'          => $ver_n['nama_lengkap'],
                'no_spk'       => $spk
              ];

      // print_r($data['data_deb']); exit();

      $this->template->load('template_excel', 'manager/V_lihat_print_validasi_agunan', $data);
    }

  // Akhir 10-03-2020

  /***********************************************************************/
  /*
  /*                      HALAMAN DESK COLLECTION 
  /*
  /***********************************************************************/

  // menampilkan halaman desk_col
  public function desk_col()
  {
      $syariah = $this->uri->segment(3);

      if ($syariah == "syariah") {
          $asuransi = $this->M_data->get_asuransi_syariah('m_asuransi', 2)->result_array();
      } else {
          $asuransi = $this->M_data->get_data('m_asuransi')->result_array();
      }
      
      $data = ['judul'        => 'Desk Collection',
               'asuransi'     => $asuransi,
               'syariah'      => $syariah,
               'bank'         => $this->M_data->get_data('m_bank')->result_array(),
               'tindakan'     => $this->model_manager->get_data('m_tindakan_fu')->result_array(),
               'verifikator'  => $this->model_manager->get_verifikator()->result_array(),
               'spk'          => $this->model_manager->get_data('spk')->result_array()
              ];

      $this->template->load('layout/template', 'manager/V_desk_col', $data);
  }

  // proses unduh data excel
  public function unduh_data_dc()
  {
    $syariah = $this->uri->segment(3);
    
    $asuransi           = $this->input->post('asuransi');
    $cabang_asuransi    = $this->input->post('cabang_asuransi');
    $bank               = $this->input->post('bank');
    $cabang_bank        = $this->input->post('cabang_bank');
    $capem_bank         = $this->input->post('capem_bank');
    $tanggal_awal       = $this->input->post('tgl_awal');
    $tanggal_akhir      = $this->input->post('tgl_akhir');
    $verifikator        = $this->input->post('verifikator');
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
    if ($verifikator != 'a') {
        $ver_n      = $this->M_data->cari_data('karyawan', array('id_karyawan' => $verifikator))->row_array();
    }

    $nama = ['asuransi'         => $asuransi,
            'cabang_asuransi'   => $cabang_asuransi,
            'bank'              => $bank,
            'cabang_bank'       => $cabang_bank,
            'capem_bank'        => $capem_bank,
            'tanggal_awal'      => $tanggal_awal,
            'tanggal_akhir'     => $tanggal_akhir,
            'ver'               => $verifikator,
            'spk'               => $spk
    ];

    if ($nama['spk'] != 'a') {
        if ($nama['spk'] == 'null') {
            $spk = 'No SPK';
        } else {
            $sp    = $this->model_manager->cari_data('spk', array('id_spk' => $nama['spk']))->row_array();
            $spk   = $sp['no_spk'];
        }
    } else {
        $spk    = []; 
    }

    $data = [ 'data_deb'     => $this->model_manager->get_data_desk_col_unduh($nama, $syariah)->result_array(),
              'report'       => 'Desk Coll',
              'asuransi'     => $asuransi_n['asuransi'],
              'cbg_asuransi' => $cabang_asuransi_n['cabang_asuransi'],
              'bank'         => $bank_n['bank'],
              'cbg_bank'     => $cabang_bank_n['cabang_bank'],
              'cpm_bank'     => $capem_bank_n['capem_bank'],
              'tgl_awal'     => $tanggal_awal,
              'tgl_akhir'    => $tanggal_akhir,
              'ver'          => $ver_n['nama_lengkap'],
              'no_spk'       => $spk
            ];

    $this->template->load('template_excel', 'manager/excel_desk_col', $data);


  }

  // ambil proses fu
  public function ambil_proses_fu()
  {
    $id_tindakan = $this->input->post('id_tindakan');

    if ($id_tindakan == "a") {
      $option = "<option value='a'>-- Pilih Proses --</option>";
    } else {
      $list_as = $this->model_manager->cari_data('m_proses_fu', array('id_tindakan_fu' => $id_tindakan))->result_array();

      $option = "<option value='a'>-- Pilih Proses --</option>";

      foreach ($list_as as $a) {
          $option .= "<option value='".$a['id_proses_fu']."' data='".$a['nama_proses']."'>".$a['nama_proses']."</option>";
      }
    }
    $data = ['proses_fu'    => $option];

    echo json_encode($data);
    
  }

  // aksi input fu 
  public function input_fu()
  {
    $id_tr_p        = $this->input->post('id_tr_p');
    $id_debitur     = $this->input->post('id_debitur');
    $tgl_janji_byr1 = $this->input->post('tgl_janji_byr1');
    $tgl_janji_byr2 = $this->input->post('tgl_janji_byr2');
    $id_tindakan    = $this->input->post('id_tindakan');
    $id_proses      = $this->input->post('id_proses');
    $nominal1       = $this->input->post('nominal1');
    $nominal2       = $this->input->post('nominal2');
    $termin         = $this->input->post('termin');
    $jenis          = $this->input->post('jenis');

    // cek fu
    $cek = $this->model_manager->cari_data_fu($id_tr_p);

    if ($cek->num_rows() != 0) {
      $d  = $cek->row_array();
      $fu = $d['fu'] + 1;
      $this->model_manager->ubah_data('tr_fu', array('status_fu' => 0), array('id_tr_potensial' => $id_tr_p));
    } else {
      $fu = 0;
    }
    
    if ($jenis == 1) {
      $data = [ 'id_tr_potensial' => $id_tr_p,
                'id_debitur'      => $id_debitur,
                'status_fu'       => 1,
                'fu'              => $fu,
                'tgl_fu'          => $tgl_janji_byr1,
                'id_tindakan'     => $id_tindakan,
                'id_proses'       => $id_proses,
                'nominal'         => $nominal1
              ];
    } elseif($jenis == 2) {
      $data = [ 'id_tr_potensial' => $id_tr_p,
                'id_debitur'      => $id_debitur,
                'status_fu'       => 1,
                'fu'              => $fu,
                'tgl_fu'          => $tgl_janji_byr2,
                'id_tindakan'     => $id_tindakan,
                'id_proses'       => $id_proses,
                'nominal'         => $nominal2,
                'termin'          => $termin
              ];
    } else {
      $data = [ 'id_tr_potensial' => $id_tr_p,
                'id_debitur'      => $id_debitur,
                'status_fu'       => 1,
                'fu'              => $fu
              ];
    }

    // ubah data status tindakan
    $this->model_manager->ubah_data('tr_potensial', array('status_tindakan' => 1), array('id_tr_potensial' => $id_tr_p));

    // input data tr fu
    $this->model_manager->input_data('tr_fu', $data);
    
    echo json_encode(['status' => TRUE]);
  }

  // aksi proses ubah aksi call debitur
  public function ubah_aksi_call()
  {
    $aksi_call  = $this->input->post('aksi_call');
    $id_debitur = $this->input->post('id_debitur');
    $id_tr_pot  = $this->input->post('id_tr_p');

    // ubah pada tabel tr_potensial
    $this->model_manager->ubah_data('tr_potensial', array('status_tindakan' => $aksi_call), array('id_tr_potensial' => $id_tr_pot));

    if ($aksi_call == 3) {
      $this->model_manager->input_data('tr_tindakan_hukum', array('id_tr_potensial' => $id_tr_pot));
    } else {
      $this->model_manager->input_data('tr_eksekusi_asset', array('id_tr_potensial' => $id_tr_pot));
    }

    echo json_encode(['status' => TRUE]);

  }

  // input tasklist kunjungan
  public function simpan_tl_kunjungan()
  {
    $id_debitur = $this->input->post('id_debitur');
    $tgl_exp    = $this->input->post('tanggal_exp');
    
    // cari id_capem_bank dari debitur
    $dc = $this->model_manager->cari_data('debitur', array('id_debitur' => $id_debitur))->row_array();

    // cari id_karyawan
    $ck = $this->model_manager->cari_data('penempatan', array('id_capem_bank' => $dc['id_capem_bank']))->row_array(); 
    
    $data = [ 'id_karyawan'     => $ck['id_karyawan'],
              'expired'         => $tgl_exp,
              'id_debitur'      => $id_debitur,
              'jenis_tasklist'  => 2
    ];

    $this->model_manager->input_data('task_list', $data);

    $jml_deb = $this->model_manager->get_debitur_k()->num_rows();

    echo json_encode(['status' => TRUE, 'jml_deb' => $jml_deb]);
  }

  // menampilkan data desk_col
  public function tampil_desk_col()
  {
    $syariah  = $this->uri->segment(3);
    
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

    $list = $this->model_manager->get_data_desk_col($nama, $syariah);

    $data   = array();
    $no     = $this->input->post('start');

    foreach ($list as $a) {
        $no++;
        $tbody = array();

        $st = $this->model_manager->cari_data_status_tindakan($a['id_debitur'])->row_array();

        $tf = $this->model_manager->cari_data_fu($a['id_tr_potensial']);

        $fu = $tf->row_array();

        if ($tf->num_rows() == 1) {
          $last_call = "-";
        } else {
          if ($tf->num_rows() == 2) {
            $last_call = date("d-M-Y", strtotime($fu['add_time']));
          } else {
            $t = $tf->row_array(1);
            $last_call = date("d-M-Y", strtotime($t['tgl_fu']));
          }
        }

        // if (!empty($fu)) {
        //   $t = $tf->row_array(1);
        //   $last_call = $t['tgl_fu'];
        // } else {
        //   // $last_call = "-";
        //   $last_call = $fu['add_time'];
        // }

        $i_deb = $this->model_manager->cari_data('task_list', array('id_debitur' => $a['id_debitur']))->num_rows();

        if ($st['id_status_tindakan'] == 1) {
            $status = "<div align='center'><h4><span class='badge badge-info' style='font-weight: bold; font-size: 15px'>".$st['status_tindakan']."</span></h4></div>";
        } elseif($st['id_status_tindakan'] == 2) {
            $status = "<div align='center'><h4><span class='badge badge-warning' style='font-weight: bold; font-size: 15px'>".$st['status_tindakan']."</span></h4></div>";
        } else {
            $status = "<div align='center'><h4><span class='badge badge-danger' style='font-weight: bold; font-size: 15px'>".$st['status_tindakan']."</span></h4></div>";
        }

        // if ($fu['fu'] == 0) {
        //   $aksi = "<div align='center'><button type='button' class='btn btn-sm waves-effect waves-light btn-info aksi-call-debitur' id_deb=".$a['id_debitur']." id_tr_p=".$a['id_tr_potensial'].">Call Debitur</button></div>";
        // } else {

        //   if ($i_deb != 0) {
        //     $dis = 'disabled';
        //   } else {
        //     $dis = "";
        //   }

        //   $aksi = "<div align='center'><button type='button' class='btn btn-sm waves-effect waves-light btn-info aksi-call-debitur' id_deb=".$a['id_debitur']." id_tr_p=".$a['id_tr_potensial'].">Call Debitur</button>&nbsp;&nbsp;&nbsp;<button type='button' class='btn btn-sm waves-effect waves-light btn-success tl_kunjungan' data-id=".$a['id_debitur']." ".$dis.">Tasklist</button></div>";
        // }

        $aksi = "<div align='center'><button type='button' class='btn btn-sm waves-effect waves-light btn-info aksi-call-debitur' id_deb=".$a['id_debitur']." id_tr_p=".$a['id_tr_potensial'].">Call Debitur</button></div>";

        $tbody[]    = "<div align='center'>".$no."</div>";
        $tbody[]    = $a['no_reff'];
        $tbody[]    = $a['no_klaim'];
        $tbody[]    = $a['nama_debitur'];
        $tbody[]    = $a['telp_pic'];
        $tbody[]    = $last_call;
        $tbody[]    = "<div align='center'><h4>FU-<span class='badge badge-success' style='font-weight: bold; font-size: 17px'>".$fu['fu']."</span></h4></div>";
        $tbody[]    = $status; 
        $tbody[]    = $a['bank'];
        $tbody[]    = $a['cabang_bank'];
        $tbody[]    = $a['capem_bank'];
        $tbody[]    = "<div align='center'><a href='".base_url('manager/kartu_debitur/'.$a['id_debitur'])."'><button type='button' class='btn btn-warning kartu-debitur'><i class='fas fa-folder-open'></i> </button></a></div>";
        $tbody[]    = $aksi;
        $data[]     = $tbody;
    }

    $output = [ "draw"             => $_POST['draw'],
                "recordsTotal"     => $this->model_manager->jumlah_semua_desk_col($nama, $syariah),
                "recordsFiltered"  => $this->model_manager->jumlah_filter_desk_col($nama, $syariah),   
                "data"             => $data,
                "tgl_akhir"         => $nama['tanggal_akhir']
            ];

    echo json_encode($output);
  }

  // menampilkan halaman kartu debitur 
  public function kartu_debitur($id_debitur)
  {
    $data = [ 'judul'      => 'Kartu Debitur',
              'd_debitur'  => $this->model_manager->get_data_kartu_debitur($id_debitur)->row_array(),
              'd_recov'    => $this->model_manager->get_data_recov($id_debitur)->result_array()
          ];

    $this->template->load('layout/template', 'manager/V_form_kartu_debitur', $data);
  } 

  // menampilkan form kartu debitur
  public function form_kartu_debitur()
  {
    $id_debitur = $this->input->post('id_debitur');
    
    $data = ['d_debitur'  => $this->model_manager->get_data_kartu_debitur($id_debitur)->row_array(),
             'd_recov'    => $this->model_manager->get_data_recov($id_debitur)->result_array()
          ];

    $this->load->view('manager/V_form_kartu_debitur', $data);
  }

  // proses unduh excel kartu debitur 
  public function unduh_excel_deb($id_debitur)
  {
    $nm = $this->model_manager->cari_data('debitur', array('id_debitur' => $id_debitur))->row_array();

    $data = [ 'd_debitur'  => $this->model_manager->get_data_kartu_debitur($id_debitur)->row_array(),
              'd_recov'    => $this->model_manager->get_data_recov($id_debitur)->result_array(),
              'report'     => "Kartu Debitur ".$nm['nama_debitur']
          ];

    $this->template->load('template_excel', 'manager/lihat_print_kartu_deb', $data);
  }

  /***************************************************************************************/
  /*
  /*                                      TASKLIST
  /*
  /***************************************************************************************/

  function tasklist()
  {
    // $tgl_skrg1 = date("Y-m-d", now('Asia/Jakarta'));

    // $tgl_skrg2 = '2019-10-04';

    // $tgl_skrg = strtotime($tgl_skrg2);

    // $hasil = $this->M_data->get_data('task_list')->result_array();

    // foreach ($hasil as $h) {
    //     $tgl_exp1 = $h['expired'];
    //     $tgl_exp = strtotime($tgl_exp1);

    //     if ($tgl_skrg >= $tgl_exp) {
    //       if ($h['status'] == 0) {
    //         $this->M_data->ubah_data('task_list', array('id_task_list' => $h['id_task_list']), array('status' => 4));
    //       } elseif(cond) {
          
    //       } else {
          
    //       }
          
    //     } 
    // }

      $data   = [ 'judul'         => 'Tasklist',
                  'verifikator'   => $this->model_manager->list_verifikator(),
                  'debitur'       => $this->model_manager->get_debitur_k()->result_array(),
                  't_khusus'      => $this->model_manager->get_data_task_khusus_2()->result_array()
                ];

      $this->template->load('layout/template','manager/tasklist',$data);
  }

  // proses tambah tasklist
  public function tambah_tl_khusus()
  {
    $id_karyawan  = $this->input->post('id_karyawan');
    $tugas        = $this->input->post('tugas');
    $ket          = $this->input->post('ket');
    $tanggal      = $this->input->post('tanggal');
    
    $data = [ 'id_karyawan'     => $id_karyawan,
              'tugas'           => $tugas,
              'keterangan'      => $ket,
              'expired'         => $tanggal,
              'status'          => 0,
              'jenis_tasklist'  => 1
            ];

    $this->model_manager->input_data('task_list', $data);

    echo json_encode(['status' => TRUE]);
  }

  // form edit tasklist
  public function form_edit_tasklist()
  {
    $id_tasklist = $this->input->post('id_tasklist');

    $data = [ 'verifikator'   => $this->model_manager->list_verifikator(),
              'tasklist'      => $this->model_manager->cari_data('task_list', array('id_task_list' => $id_tasklist))->row_array()
            ];

    $this->load->view('manager/V_form_edit_tasklist', $data);
  }

  // form detail tasklist
  public function form_detail_tasklist()
  {
    $id_tasklist = $this->input->post('id_tasklist');
    
    $d_tasklist = $this->model_manager->cari_data_tasklist('task_list', array('t.id_task_list' => $id_tasklist))->row_array();

    define('UPLOAD_DIR', 'template/img/');

    $name_file = "foto_tasklist_$id_tasklist.png";
    
    $image_base64 = base64_decode($d_tasklist['foto']);
    $file = UPLOAD_DIR . $name_file;
    file_put_contents($file, $image_base64);

    $data['tasklist'] = $d_tasklist;
    $data['id_task']  = $id_tasklist;

    $this->load->view('manager/V_form_detail_tasklist', $data);
    
  }

  // proses ubah
  public function ubah_tasklist()
  {
    $id_tasklist  = $this->input->post('id_tasklist');
    $id_karyawan  = $this->input->post('id_karyawan');
    $tugas        = $this->input->post('tugas');
    $ket          = $this->input->post('ket');
    $tanggal      = $this->input->post('tanggal');
    
    $data = [ 'id_karyawan'     => $id_karyawan,
              'tugas'           => $tugas,
              'keterangan'      => $ket,
              'expired'         => $tanggal
            ];

    $this->model_manager->ubah_data('task_list', $data, array('id_task_list' => $id_tasklist));

    echo json_encode(['status' => TRUE]);
  }

  // proses hapus
  public function hapus_tasklist()
  {
    $id_tasklist = $this->input->post('id_tasklist');

    $this->model_manager->hapus_data('task_list', array('id_task_list' => $id_tasklist));

    echo json_encode(['status' => TRUE]);
    
  }

  // proses ubah status selesai dan tidak
  public function ubah_status_tasklist($Status)
  {
    $id_tasklist = $this->input->post('id_tasklist');

    $this->model_manager->ubah_data('task_list', array('status' => $Status), array('id_task_list' => $id_tasklist));

    echo json_encode(['status' => TRUE]);
  }

  public function tampil_tasklist_khushus_2()
  {
    $list = $this->model_manager->get_data_task_khusus_2()->result_array();

    $no = 1;
    foreach ($list as $a) {
        $tbody = array();

        if ($a['status'] == 0) {
          $status = "<div align='center'><h4><span class='label label-danger' style='font-weight: bold; font-size: 15px'>Belum Dikerjakan</span></h4></div>";

          $aksi   = "<div align='center'><button type='button' class='btn btn-warning btn-circle ubah-tasklist' data-id=".$a['id_task_list']." data-toggle='tooltip' data-placement='top' title='edit'><i class='fas fa-edit'></i> </button>&nbsp;&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-circle hapus-tasklist' data-id=".$a['id_task_list']." data-toggle='tooltip' data-placement='top' title='hapus'><i class='fas fa-trash'></i> </button></div>";

        } elseif($a['status'] == 1) {
          $status = "<div align='center'><h4><span class='label label-warning' style='font-weight: bold; font-size: 15px'>Sudah Dikerjakan</span></h4></div>";

          $aksi   = "<div align='center'><button type='button' class='btn btn-warning btn-circle detail-tasklist' data-id=".$a['id_task_list']." data-toggle='modal' data-target='#modal_detail_task' data-placement='top' title='detail'><i class='fas fa-info-circle'></i> </button>&nbsp;&nbsp;&nbsp;<button type='button' class='btn btn-info btn-circle selesai-tasklist' data-id=".$a['id_task_list']." data-st='2' data-toggle='tooltip' data-placement='top' title='selesai'><i class='fa fa-check'></i> </button>&nbsp;&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-circle tdk-selesai-tasklist' data-id=".$a['id_task_list']." data-st='3' data-toggle='tooltip' data-placement='belum selesai' title='belum selesai'><i class='fas fa-times-circle'></i> </button></div>";
        } elseif($a['status'] == 2) {
          $status = "<div align='center'><h4><span class='label label-success' style='font-weight: bold; font-size: 15px'>Selesai</span></h4></div>";

          $aksi   = "<div align='center'><button type='button' class='btn btn-warning btn-circle detail-tasklist' data-id=".$a['id_task_list']." data-toggle='tooltip' data-placement='top' title='detail'><i class='fas fa-info-circle'></i> </button></div>";
        } else {
          $status = "<div align='center'><h4><span class='label label-info' style='font-weight: bold; font-size: 15px'>Belum Selesai</span></h4></div>";

          $aksi   = "<div align='center'><button type='button' class='btn btn-warning btn-circle detail-tasklist' data-id=".$a['id_task_list']." data-toggle='tooltip' data-placement='top' title='detail'><i class='fas fa-info-circle'></i> </button></div>";
        }
        

        $tbody[]    = "<div align='center'>".$no++."</div>";
        $tbody[]    = $a['verifikator'];
        $tbody[]    = $a['tugas'];
        $tbody[]    = $a['keterangan'];
        $tbody[]    = nice_date($a['expired'], "d-M-Y");
        $tbody[]    = $status;
        $tbody[]    = $aksi;
        $data[]     = $tbody;

    }

    if ($list) {
      echo json_encode(array('data'=> $data));
    }else{
        echo json_encode(array('data'=>0));
    }

  }

  // menampilkan data tasklist datatables
  public function tampil_tasklist_khushus()
  {
    $list = $this->model_manager->get_data_task_khusus();

    $data   = array();
    $no     = $this->input->post('start');

    foreach ($list as $a) {
        $no++;
        $tbody = array();

        if ($a['status'] == 0) {
          $status = "<div align='center'><h6><span class='label label-danger' style='font-weight: bold;'>Belum Dikerjakan</span></h6></div>";

          $aksi   = "<div align='center'><button type='button' class='btn btn waves-effect waves-light btn-outline-dark btn-sm ubah-tasklist' data-id=".$a['id_task_list']." data-toggle='tooltip' data-placement='top' title='edit'>Edit</button>&nbsp;&nbsp;&nbsp;<button type='button' class='btn btn waves-effect waves-light btn-outline-danger btn-sm hapus-tasklist' data-id=".$a['id_task_list']." data-toggle='tooltip' data-placement='top' title='edit'>Hapus</button></div>";

        } elseif($a['status'] == 1) {
          $status = "<div align='center'><h6><span class='label label-warning' style='font-weight: bold;'>Sudah Dikerjakan</span></h6></div>";

          $aksi   = "<div align='center'><button type='button' class='btn btn waves-effect waves-light btn-outline-success btn-sm detail-tasklist' data-id=".$a['id_task_list']." data-toggle='modal' data-target='#modal_detail_task' data-placement='top' title='selesai'>Detail</button>&nbsp;&nbsp;&nbsp;<button type='button' class='btn waves-effect waves-light btn-outline-info btn-sm selesai-tasklist' data-id=".$a['id_task_list']." data-st='2' data-toggle='tooltip' data-placement='top' title='selesai'>Selesai</button>&nbsp;&nbsp;&nbsp;<button type='button' class='btn waves-effect waves-light btn-outline-danger btn-sm tdk-selesai-tasklist' data-id=".$a['id_task_list']." data-st='3' data-toggle='tooltip' data-placement='belum selesai' title='belum selesai'>Belum Selesai</button></div>";
        } elseif($a['status'] == 2) {
          $status = "<div align='center'><h6><span class='label label-success' style='font-weight: bold;'>Selesai</span></h6></div>";

          $aksi   = "<div align='center'><button type='button' class='btn btn waves-effect waves-light btn-outline-success btn-sm detail-tasklist' data-id=".$a['id_task_list']." data-toggle='tooltip' data-placement='top' title='selesai'>Detail</button></div>";
        } else {
          $status = "<div align='center'><h6><span class='label label-info' style='font-weight: bold;'>Belum Selesai</span></h6></div>";

          $aksi   = "<div align='center'><button type='button' class='btn btn waves-effect waves-light btn-outline-success btn-sm detail-tasklist' data-id=".$a['id_task_list']." data-toggle='tooltip' data-placement='top' title='selesai'>Detail</button></div>";
        }

        $tbody[]    = "<div align='center'>".$no."</div>";
        $tbody[]    = $a['verifikator'];
        $tbody[]    = $a['tugas'];
        $tbody[]    = $a['keterangan'];
        $tbody[]    = nice_date($a['expired'], "d-M-Y");
        $tbody[]    = $status;
        $tbody[]    = $aksi;
        $data[]     = $tbody;
    }

    $output = [ "draw"             => $_POST['draw'],
                "recordsTotal"     => $this->model_manager->jumlah_semua_task_khusus(),
                "recordsFiltered"  => $this->model_manager->jumlah_filter_task_khusus(),   
                "data"             => $data
            ];

    echo json_encode($output);
  }

  /***************************************************************************************/
  /*
  /*                              TASKLIST KUNJUNGAN
  /*
  /***************************************************************************************/

  public function ambil_nama_deb()
  {
    $id_deb = $this->input->post('id_debitur');
    
    $hasil  = $this->model_manager->cari_data('debitur', array('id_debitur' => $id_deb))->row_array();

    $exp    = $this->model_manager->cari_data_exp('task_list', array('id_debitur' => $id_deb))->row_array();

    echo json_encode(['nama' => $hasil['nama_debitur'], 'exp' => $exp['expired']]);
  }

  // proses ubah tasklist
  public function ubah_tl_kunjungan()
  {
    $id_tasklist  = $this->input->post('id_tasklist');
    $tgl_exp      = $this->input->post('tanggal_exp');
    
    $this->model_manager->ubah_data('task_list', array('expired' => $tgl_exp), array('id_task_list' => $id_tasklist));

    echo json_encode(['status' => TRUE]);
  }

  // proses hapus tasklist
  public function hapus_kunjungan()
  {
    $id_tasklist = $this->input->post('id_tasklist');

    $this->model_manager->hapus_data('task_list', array('id_task_list' => $id_tasklist));

    $jml_deb = $this->model_manager->get_debitur_k()->num_rows();

    echo json_encode(['status' => TRUE, 'jml_deb' => $jml_deb]);
  }

  // menampilkan datat takslist kunjungan
  public function tampil_tasklist_kunjugan()
  {
    $list_kunjungan = $this->model_manager->get_tasklist_kunjungan()->result_array();

    $no = 1;
    foreach ($list_kunjungan as $k) {
        $tbody = array();

        $shs = $k['subrogasi'] - $k['recoveries'];

        //$cari = $this->model_manager->cari_data('kunjungan',array('id_debitur' => $k['id_debitur']))->num_rows();

        if ($k['jumlah'] != 0) {
          $status = "<div align='center'><h4><span class='badge badge-info badge-pill'>Sudah Dikerjakan</span></h4></div>";
        } else {
          $status = "<div align='center'><h4><span class='badge badge-danger badge-pill'>Belum Dikerjakan</span></h4></div>";
        }

        $tbody[] = "<div align='center'>".$no++."</div>";
        $tbody[] = $k['no_reff'];
        $tbody[] = $k['no_klaim'];
        $tbody[] = $k['nama_debitur'];
        $tbody[] = $shs;
        $tbody[] = $k['bank'];
        $tbody[] = $k['cabang_bank'];
        $tbody[] = $k['capem_bank'];
        $tbody[] = nice_date($k['tanggal_ots'], "d-M-Y");
        $tbody[] = $k['nama_verifikator'];
        $tbody[] = nice_date($k['expired'], 'd-M-Y');
        $tbody[] = $status;
        $aksi= "<div align='center'> <button class='btn btn-circle btn-outline-success ubah-kunjungan' id_tk=".$k['id_task_list']." id_deb=".$k['id_debitur']."><span class='btn-icon-wrap'><i class='fa fa-edit'></i></span></button>&nbsp;&nbsp;<button class='btn btn-circle btn-outline-danger hapus-kunjungan' data-id=".$k['id_task_list']."><span class='btn-icon-wrap'><i class='fas fa-trash'></i></span></button> </div>";
        $tbody[] = $aksi;
        $data[]  = $tbody; 
    }

    if ($list_kunjungan) {
        echo json_encode(array('data'=> $data));
    }else{
        echo json_encode(array('data'=>0));
    }
  }

  function ots()
  {
    $data['record'] = $this->model_manager->tampil_ots();
    $this->template->load('layout/template','manager/v_ots',$data);
  }

  // menampilkan data ots dengan datatables
  public function tampil_data_ots()
  {
    $d_ots   = $this->model_manager->get_data_ots();

    $data       = array();
    $no         = $_POST['start'];

    foreach ($d_ots as $d) {
        $no++;

        $row    = array();
        $row[]  = "<div align='center'>".$no."</div>";
        $row[]  = $d['no_klaim'];
        $row[]  = $d['nama_debitur'];
        $row[]  = $d['singkatan'];
        $row[]  = $d['cabang_bank'];
        $row[]  = number_format($d['subrogasi'],2);
        $row[]  = number_format($d['shs'],2);
        $aksi   = "<div align='center'><a href='".base_url('manager/pageOTS/'.$d['id_debitur'])."'><button type='button' class='btn btn-primary btn-sm'>OTS</button></a></div>";
        $row[]  = $aksi;
        $data[] = $row;
    }

    $result = [ 'draw'              => $_POST['draw'],
                'recordsTotal'      => $this->model_manager->count_all_ots(),
                'recordsFiltered'   => $this->model_manager->count_filtered_ots(),
                'data'              => $data
            ];

    echo json_encode($result);
  }

  /***********************************************************************/
  /*
  /*                      HALAMAN TINDAKAN HUKUM 
  /*
  /***********************************************************************/

  // menampikan awal halaman tindakan hukum
  function tindakanHukum()
  {
    $syariah = $this->uri->segment(3);
    
    // $data['record'] = $this->model_manager->list_tindakan_hukum();
    $data = ['judul'  => 'Tindakan Hukum', 'syariah' => $syariah];

    $this->template->load('layout/template','manager/v_tindakan_hukum',$data);
  }

  // proses unduh excel
  public function unduh_data_th()
  {
    $syariah = $this->uri->segment(3);

    $data['data_deb'] = $this->model_manager->list_tindakan_hukum($syariah);
    $data['report']   = "Tindakan Hukum";

    $this->template->load('template_excel', 'manager/excel_tindakan_hukum', $data);
  }

  // menampilkan list data dataTable
  public function tampil_tindakan_hukum()
  {
    $syariah = $this->uri->segment(3);
    
    $list = $this->model_manager->list_tindakan_hukum($syariah);
    $no=1;
    foreach ($list as $d) {
        $tbody = array();

        if ($d['keputusan_manajer'] == 1) {
          $kp = "<div align='center'><h4><span class='badge badge-success'>A - Care</span></h4></div>";
        } else if($d['keputusan_manajer'] == 2) {
          $kp = "<div align='center'><h4><span class='badge badge-danger'>Not Potensial</span></h4></div>";
        } else if($d['keputusan_manajer'] == 3) {
          $kp = "<div align='center'><h4><span class='badge badge-dark'>No Action Needed</span></h4></div>";
        } else {
          $kp = "<div align='center'><button type='button' class='btn btn-sm waves-effect waves-light btn-outline-info ubah-tindakan-hukum mr-3' data-id=".$d['id_tr_potensial']." angka='1' data-toggle='tooltip' data-placement='left' title='A-Care'><i class='fas fa-check'></i></button><button type='button' class='btn btn-sm waves-effect waves-light btn-outline-danger ubah-tindakan-hukum mr-3' data-id=".$d['id_tr_potensial']." angka='2' data-toggle='tooltip' data-placement='left' title='Not Potensial'><i class='fas fa-times'></i></button><button type='button' class='btn btn-sm waves-effect waves-light btn-outline-dark ubah-tindakan-hukum' data-id=".$d['id_tr_potensial']." angka='3' data-toggle='tooltip' data-placement='left' title='No Action Needed'><i class='fas fa-minus'></i></button></div>";
        }



        $tbody[] = "<div align='center'>".$no++."</div>";
        $tbody[] = $d['nama_debitur'];
        $tbody[] = $d['no_klaim'];
        $tbody[] = $d['bank'];
        $tbody[] = $d['cabang_bank'];
        $tbody[] = $d['capem_bank'];
        $tbody[] = "";
        $tbody[] = $d['tindakan_hukum'];
        $tbody[] = "";
        $tbody[] = $kp;
        $data[]  = $tbody;
    }

    if ($list) {
      echo json_encode(array('data'=> $data));
    }else{
        echo json_encode(array('data'=>0));
    }
  }

  // ubah keputusan
  public function ubah_keputusan()
  {
    $angka       = $this->input->post('angka');
    $id_tr_pot   = $this->input->post('id_tr_pot');

    $this->model_manager->ubah_data('tr_tindakan_hukum', array('keputusan_manajer' => $angka), array('id_tr_potensial' => $id_tr_pot));

    echo json_encode(['status' => TRUE]);
  }

  /***********************************************************************/
  /*
  /*                      HALAMAN EKSEKUSI JAMINAN
  /*
  /***********************************************************************/

  // menampilkan halaman awal eksekusi jaminan
  function eksekusi()
  {
    // $data['record'] = $this->model_manager->listEksekusiAset();
    $data = [ 'judul'     => 'Eksekusi Jaminan',
              'st_info'   => $this->model_manager->get_data('status_info')->result_array(),
              'mkt'       => $this->model_manager->get_data('m_sifat_asset')->result_array(),
              'st_proses' => $this->model_manager->get_data_st_proses()->result_array()
            ];

    $this->template->load('layout/template','manager/v_eksekusi',$data);
  }

  // proses unduh excel
  public function unduh_data_eks()
  {
      $data = [ 'data_deb'  => $this->model_manager->listEksekusiAset(),
                'report'    => "Eksekusi Jaminan"
              ];

      $this->template->load('template_excel', 'manager/excel_eksekusi_kaminan', $data);
  }

  // menampilkan list data dengan dataTables
  public function tampil_ek_jaminan()
  {
      $list   = $this->model_manager->listEksekusiAset();

      $no=1;
      $data = array();

      foreach ($list as $j) {
          $tbody = array();

          $warna = ['success', 'danger', 'warning'];
          $title_info = ['Lengkap', 'Tidak Lengkap'];
          $info = $this->model_manager->get_data('status_info')->result_array();

          $i=0;
          foreach ($info as $f) {
            
            if ($j['status_info'] == $i) {
                $st_info = "<div align='center'><h4><span class='badge badge-".$warna[$i]." badge-pill ubah-status-info' data-id=".$j['id_debitur']." angka=".$i.">".$f['status_info']."</span></h4></div>";
            }
            $i++;
          }

          if ($j['status_info'] == null) {
              $st_info = "<div align='center'><h4><span class='badge badge-warning badge-pill ubah-status-info' data-id=".$j['id_debitur']." angka='null'>Pilih Status Info</span></h4></div>";
          }

          $market = $this->model_manager->get_data('m_sifat_asset')->result_array();
          $title_sifat = ['Pilih', 'Ya', 'Tidak'];
          $warna1 = ['warning','success', 'danger'];

          $i=1;
          foreach ($market as $m) {
              
              if ($j['id_sifat_asset'] == $i) {
                  $mkt = "<div align='center'><h4><span class='badge badge-".$warna1[$i]." badge-pill ubah-sifat-asset' data-id=".$j['id_debitur']." angka=".$i.">".$m['sifat_asset']."</span></h4></div>";
              }

              $i++;
          }

          if ($j['id_sifat_asset'] == null) {
              $mkt = "<div align='center'><h4><span class='badge badge-warning badge-pill ubah-sifat-asset' data-id=".$j['id_debitur']." angka='null'>Pilih Status Marketable</span></h4></div>";
          }

          $proses = $this->model_manager->get_data_st_proses()->result_array();
          $title_pros = ['A-Care', 'Pending', 'Negosiasi'];
          $warna_2 = ['success', 'info', 'primary'];

          $i=0;
          foreach ($proses as $p) {
              
              if($j['status_proses'] == $i){
                  $st_proses = "<div align='center'><h4><span class='badge badge-".$warna_2[$i]." badge-pill ubah-proses' data-id=".$j['id_tr_potensial']." angka=".$i.">".ucfirst($p['status_proses'])."</span></h4></div>";
              }
              $i++;
          }

          if($j['status_proses'] == null){
            $st_proses = "<div align='center'><h4><span class='badge badge-warning badge-pill ubah-proses' data-id=".$j['id_tr_potensial']." angka='null'>Pilih Status Proses</span></h4></div>";
          }

          $tbody[]  = "<div align='center'>".$no++."</div>";
          $tbody[]  = $j['nama_debitur'];
          $tbody[]  = $j['no_klaim'];
          $tbody[]  = $j['bank'];
          $tbody[]  = $j['cabang_bank'];
          $tbody[]  = $j['capem_bank'];
          $tbody[]  = $st_info;
          $tbody[]  = $mkt;
          $tbody[]  = $st_proses;
          $data[]   = $tbody;
      }

      if ($list) {
        echo json_encode(['data'  => $data]);
      } else {
        echo json_encode(['data'  => 0]);
      }
  }

  // ubah status info
  public function ubah_status_info()
  {
      $angka       = $this->input->post('angka');
      $id_debitur  = $this->input->post('id_debitur');

      $this->model_manager->ubah_data('dokumen_asset', array('status_info' => $angka), array('id_debitur' => $id_debitur));

      echo json_encode(['status' => TRUE]);
      
  }

  // ubah sifat asset
  public function ubah_sifat_asset()
  {
      $angka       = $this->input->post('angka');
      $id_debitur  = $this->input->post('id_debitur');

      $this->model_manager->ubah_data('dokumen_asset', array('id_sifat_asset' => $angka), array('id_debitur' => $id_debitur));

      echo json_encode(['status' => TRUE]);
  }

  // ubah status proses
  public function ubah_status_proses()
  {
      $angka        = $this->input->post('angka');
      $id_tr_pot    = $this->input->post('id_tr_pot');

      $this->model_manager->ubah_data('tr_eksekusi_asset', array('status_proses' => $angka), array('id_tr_potensial' => $id_tr_pot));

      echo json_encode(['status' => TRUE]);
  }



  

  function cetak_excel_call()
  {
    $data['record'] = $this->model_manager->list_call();
    $this->load->view('manager/cetak_call',$data);
  }
  function cetak_excel_hukum()
  {
    $data['record'] = $this->model_manager->list_tindakan_hukum();
    $this->load->view('manager/cetak_hukum',$data);
  }
  function cetak_jaminan()
  {
    $data['record'] = $this->model_manager->listEksekusiAset();
    $this->load->view('manager/cetak_jaminan',$data);
  }
 
}