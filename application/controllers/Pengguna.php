<?php
class Pengguna extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->cek_login_lib->logged_in_false();
    $this->load->Model('model_pengguna');
  }

  function index()
  {
    $data['record'] = $this->model_pengguna->tampil_pengguna();
    $data['pilih'] = $this->model_pengguna->pilihKaryawan();
    $this->load->view('pengguna/tambah_pengguna',$data);
  }

  function buat_pengguna()
  {
    if(isset($_POST['submit'])){
        $options = ['cost' => 10,];
        $username           =  $this->input->post('username',true);
        $id_karyawan         =  $this->input->post('id_karyawan',true);
        $sha                =  $this->input->post('sha',true);
        $level              =  $this->input->post('level',true);
        $status             =  $this->input->post('status_pengguna',true);
        $data               =  array(   'username'=>$username,
                                        'status_pengguna'=>$status,
                                        'id_karyawan'=>$id_karyawan,
                                        'sha'=>password_hash($sha,PASSWORD_DEFAULT, $options),
                                        'level'=>$level);
        $this->db->insert('pengguna',$data);
        redirect('pengguna/buat_pengguna');
    }
    else{
      $data['pilih'] = $this->model_pengguna->pilihKaryawan();
      $data['record'] = $this->model_pengguna->tampil_pengguna();
      $this->load->view('pengguna/tambah_pengguna',$data);
    }
  }

  function buat_karyawan()
  {
    if(isset($_POST['submit'])){
        $options = ['cost' => 10,];
        $nama_lengkap       =  $this->input->post('nama_lengkap',true);
        $nik                =  $this->input->post('nik',true);
        $telpon             =  $this->input->post('telfon',true);
        $tempat_lahir       =  $this->input->post('tempat_lahir',true);
        $tanggal_lahir      =  $this->input->post('tanggal_lahir',true);
        $alamat             =  $this->input->post('alamat', true);
        $data               =  array( 'nama_lengkap'=>$nama_lengkap,
                                      'nik'=>$nik,
                                      'telfon'=>$telpon,
                                      'tempat_lahir'=>$tempat_lahir,
                                      'tanggal_lahir'=>$tanggal_lahir
                                    );
        //print_r($data);
        $this->db->insert('karyawan',$data);
        redirect('pengguna/buat_karyawan');
    }
    else{
      $data['record'] = $this->model_pengguna->tampil_karyawan();
      $this->load->view('pengguna/tambah_karyawan',$data);
    }
  }
  
  function edit_karyawan($id)
  {
    $data['record'] = $this->model_pengguna->tampil_karyawan();
    $data['get'] = $this->model_pengguna->get_karyawan($id)->row_array();
    $this->load->view('pengguna/edit_karyawan',$data);
  }

  function edit($id)
  {
    $data['pilih'] = $this->model_pengguna->pilihKaryawan();
    $data['record'] = $this->model_pengguna->tampil_pengguna();
    $data['get'] = $this->model_pengguna->get_one($id)->row_array();
    $this->load->view('pengguna/edit_pengguna',$data);
  }

  function act_edit()
  {
    $options = ['cost' => 10,];
    $id                 =  $this->input->post('id_pengguna',true);
    $username           =  $this->input->post('username',true);
    $sha                =  $this->input->post('sha',true);
    $level              =  $this->input->post('level',true);
    $status             =  $this->input->post('status_pengguna',true);
    $data               =  array(   'username'=>$username,
                                    'status_pengguna'=>$status,
                                    'sha'=>password_hash($sha,PASSWORD_DEFAULT, $options),
                                    'level'=>$level);
    $this->model_pengguna->edit($data,$id);
    redirect('pengguna/buat_pengguna');
  }
}