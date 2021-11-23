<?php
class Kelolaan extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->cek_login_lib->logged_in_false();
    $this->load->Model('model_kelolaan');
  }

  function Atur()
  {
    if(isset($_POST['submit'])){
        $options = ['cost' => 10,];
        $id_karyawan        =  $this->input->post('id_karyawan',true);
        $id_capem           =  $this->input->post('id_capem_bank',true);
        $data               =  array(   'id_karyawan'=>$id_karyawan,
                                        'id_capem_bank'=>$id_capem);
        $this->db->insert('penempatan',$data);
        redirect('Kelolaan/Atur');
    }
    else{
      $data['pilih'] = $this->model_kelolaan->pilihKaryawan();
      $data['unit'] = $this->model_kelolaan->pilihCapem();
      $data['record'] = $this->model_kelolaan->tampil_kelolaan();
      $data['data']=$this->model_kelolaan->ambil_bank();
      $this->load->view('kelolaan/atur_kelolaan',$data);
    }
  }

  function Edit_kelolaan($id)
  {
    $data['record'] = $this->model_kelolaan->tampil_kelolaan();
    $data['unit'] = $this->model_kelolaan->pilihCapem();
    $data['get'] = $this->model_kelolaan->get_kelolaan($id)->row_array();
    $this->load->view('kelolaan/edit_kelolaan',$data);
  }

  function act_edit()
  {
    $options = ['cost' => 10,];
    $id                 =  $this->input->post('id_pengguna',true);
    $id_karyawan        =  $this->input->post('id_karyawan',true);
    $id_capem           =  $this->input->post('id_capem_bank',true);
    $data               =  array(   'id_karyawan'=>$id_karyawan,
                                    'id_capem_bank'=>$id_capem);
    $this->model_kelolaan->edit($data,$id);
    redirect('kelolaan/Atur');
  }

  /**
 * AJAX ambil data
 */
    function get_cabang(){
        $id=$this->input->post('id');
        $data=$this->model_kelolaan->ambil_cabang($id);
        echo json_encode($data);
    }

    function get_capem(){
        $id=$this->input->post('capem');
        $data=$this->model_kelolaan->ambil_capem($id);
        echo json_encode($data);
    }
/**
 * AJAX ambil data
*/

}