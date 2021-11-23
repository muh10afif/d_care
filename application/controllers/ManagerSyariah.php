<?php
class ManagerSyariah extends CI_Controller{
  function __construct(){
    parent::__construct();
    //validasi jika user belum login
    $this->cek_login_lib->logged_in_false();
    $this->load->model('model_managerSyariah');
  }

  function tasklist()
  {
      $data['record'] = $this->model_managerSyariah->tasklist();
      $this->template->load('layout/template','managerSyariah/tasklist',$data);
  }
  function tambah_task()
  {
      $data['verifikator'] = $this->model_managerSyariah->list_verifikator();
      $this->template->load('layout/template','managerSyariah/tambah_task',$data);
  }
  function act_tasklist()
  {
      $verifikator = $this->input->post('id_karyawan');
      $tugas = $this->input->post('tugas');
      $keterangan = $this->input->post('keterangan');
      $tanggal = $this->input->post('tanggal');
      $data = array (
          'id_karyawan'=>$verifikator,
          'tugas'=>$tugas,
          'keterangan'=>$keterangan,
          'tanggal'=>$tanggal
      );
      $this->model_managerSyariah->simpan_tasklist($data);
      redirect('managerSyariah/tasklist');
  }
  function cetak_excel_call()
  {
    $data['record'] = $this->model_managerSyariah->list_call();
    $this->load->view('managerSyariah/cetak_call',$data);
  }
  function cetak_excel_hukum()
  {
    $data['record'] = $this->model_managerSyariah->list_tindakan_hukum();
    $this->load->view('managerSyariah/cetak_hukum',$data);
  }
  function cetak_jaminan()
  {
    $data['record'] = $this->model_managerSyariah->listEksekusiAset();
    $this->load->view('managerSyariah/cetak_jaminan',$data);
  }
  function callDebitur()
  {
    $data['record'] = $this->model_managerSyariah->list_call();
    $this->template->load('layout/template','managerSyariah/v_call',$data);
  }
  function tindakanHukum()
  {
    $data['record'] = $this->model_managerSyariah->list_tindakan_hukum();
    $this->template->load('layout/template','managerSyariah/v_tindakan_hukum',$data);
  }
  function actFU()
  {
      $tindakan = $this->input->post('tindakan');
      $proses = $this->input->post('proses');
      $tr_ots_p = $this->input->post('id_tr_ots_p');
      $nominal = $this->input->post('nominal');
      $termin = $this->input->post('termin');
      $tjb = $this->input->post('tgl_fu');
      $status = 0;
      $data = array('status_tindakan'=>$status);
      $this->model_managerSyariah->simpancall($tr_ots_p,$data);
      $fu = 1;
      $dataup = array(
          'id_tr_ots_p'=>$tr_ots_p,
          'id_tindakan'=>$tindakan,
          'id_proses'=>$proses,
          'nominal'=>$nominal,
          'termin'=>$termin,
          'tgl_fu'=>$tjb,
          'fu'=>$fu
      );
      $this->model_managerSyariah->simpan_tindakan($dataup);
      redirect('managerSyariah/callDebitur');
  }

  function FU($id)
  {
    $data['tindakan'] = $this->model_managerSyariah->get_tindakan();
    $data['get'] = $this->model_managerSyariah->get_one($id);
    $this->load->view('managerSyariah/fu',$data);
  }

  function actEksekusi_Asset($id)
  {
    $status = 2;
    $data = array('status_tindakan'=>$status);
    $this->model_managerSyariah->simpancall($id,$data);
    redirect('managerSyariah/callDebitur');
  }

  function actTindakanHukum($id)
  {
    $status = 3;
    $data = array('status_tindakan'=>$status);
    $this->model_managerSyariah->simpancall($id,$data);
    $data2 = array('id_tr_ots_p'=>$id);
    $this->model_managerSyariah->simpanTindakanHukum($data2);
    redirect('managerSyariah/callDebitur');
  }

  function act_acare($id)
  {
    $status = 1;
    $data = array('keputusan_manajer'=>$status);
    $this->model_managerSyariah->simpan_keputusan($id,$data);
    redirect('managerSyariah/tindakanHukum');
  }
  
  function act_np($id)
  {
    $status = 2;
    $data = array('keputusan_manajer'=>$status);
    $this->model_managerSyariah->simpan_keputusan($id,$data);
    redirect('managerSyariah/tindakanHukum');
  }

  function act_noAction($id)
  {
    $status = 3;
    $data = array('keputusan_manajer'=>$status);
    $this->model_managerSyariah->simpan_keputusan($id,$data);
    redirect('managerSyariah/tindakanHukum');
  }

  function eksekusi()
  {
    $data['record'] = $this->model_managerSyariah->listEksekusiAset();
    $this->load->view('managerSyariah/v_eksekusi',$data);
  }

  function actInfoLengkap($id)
  {
    $status = 1;
    $data = array(
      'status_info'=>$status
    );
    $this->model_managerSyariah->simpan_statusInfo($id,$data);
    redirect('managerSyariah/eksekusi');
  }

  function actInfoTlengkap($id)
  {
    $status = 2;
    $data = array(
      'status_info'=>$status
    );
    $this->model_managerSyariah->simpan_statusInfo($id,$data);
    redirect('managerSyariah/eksekusi');
  }

  function actSifatMarketable($id)
  {
    $status = 1;
    $data = array(
      'id_sifat_asset'=>$status
    );
    $this->model_managerSyariah->simpan_SifatAset($id,$data);
    redirect('managerSyariah/eksekusi');
  }

  function actSifatNmarketable($id)
  {
    $status = 2;
    $data = array(
      'id_sifat_asset'=>$status
    );
    $this->model_managerSyariah->simpan_SifatAset($id,$data);
    redirect('managerSyariah/eksekusi');
  }

  function actPending($id)
  {
    $status = 1;
    $data = array(
      'status_proses'=>$status
    );
    $this->model_managerSyariah->simpan_statusProses($id,$data);
    redirect('managerSyariah/eksekusi');
  }

  function actNegosiasi($id)
  {
    $status = 2;
    $data = array(
      'status_proses'=>$status
    );
    $this->model_managerSyariah->simpan_statusProses($id,$data);
    redirect('managerSyariah/eksekusi');
  }

  function actAcare($id)
  {
    $status = 3;
    $data = array(
      'status_proses'=>$status
    );
    $this->model_managerSyariah->simpan_statusProses($id,$data);
    redirect('managerSyariah/eksekusi');
  }
 
}