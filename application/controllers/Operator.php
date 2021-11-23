<?php
class Operator extends CI_Controller{
  function __construct(){
    parent::__construct();
    //validasi jika user belum login
    $this->cek_login_lib->logged_in_false();
    $this->load->model('model_operator');
  }

  function fu($id)
  {
    $data['tindakan'] = $this->model_operator->get_tindakan();
    $data['get'] = $this->model_operator->get_one($id);
    $this->template->load('layout/template','operator/fu',$data);
  }
  
  function ambil_data(){

    $modul=$this->input->post('modul');
    $id=$this->input->post('id');
        if($modul=="tindakan"){
        echo $this->model_operator->get_proses($id);
        }
    }

    function simpan_tindakan()
    {
        $tindakan = $this->input->post('tindakan');
        $proses = $this->input->post('proses');
        $tr_ots_p = $this->input->post('id_tr_ots_p');
        $nominal = $this->input->post('nominal');
        $termin = $this->input->post('termin');
        $tjb = $this->input->post('tgl_fu');
        $fu = 1;
        $data = array(
            'id_tr_ots_p'=>$tr_ots_p,
            'id_tindakan'=>$tindakan,
            'id_proses'=>$proses,
            'nominal'=>$nominal,
            'termin'=>$termin,
            'tgl_fu'=>$tjb,
            'fu'=>$fu
        );

        $this->model_operator->simpan_tindakan($data);
        redirect('admin/operator');
    }

    function cetak_excel()
    {
      $data['record'] = $this->model_operator->tampil_excel();
      $this->load->view('operator/cetak_excel',$data);
    }
}