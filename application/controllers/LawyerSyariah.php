<?php
class LawyerSyariah extends CI_Controller{
  function __construct(){
    parent::__construct();
    //validasi jika user belum login
    $this->cek_login_lib->logged_in_false();
    $this->load->model('model_lawyerSyariah');
  }
function lawyer()
  {
    $data['record'] = $this->model_lawyerSyariah->list_debitur();
    $this->template->load('layout/template','lawyersyariah/v_hukum',$data);
  }

  function somasi1()
  {
    $data['record'] = $this->model_lawyerSyariah->get_tr_tindakan_hukum();
    $this->template->load('layout/template','lawyersyariah/somasi1',$data);
  }
  function act_somasi1()
  {
    $id = $this->input->post('id_tr_tindakan_hukum');
    $no_surat = $this->input->post('nomor_surat');
    $jumlah_lampiran = $this->input->post('jumlah_lampiran');
    $jadwal_pertemuan = $this->input->post('jadwal_pertemuan');
    $tempat_pertemuan = $this->input->post('tempat_pertemuan');
    $tanggal_sampai = $this->input->post('tanggal_sampai');
    $cp1 = $this->input->post('cp_1');
    $cp2 = $this->input->post('cp_2');
    $pihak_berkepentingan = $this->input->post('pihak_berkepentingan');
    $alamat_berkepentingan = $this->input->post('alamat_berkepentingan');
    $data = array(
      'id_tr_tindakan_hukum'=>$id,
      'nomor_surat'=>$no_surat,
      'jumlah_lampiran'=>$jumlah_lampiran,
      'jadwal_pertemuan'=>$jadwal_pertemuan,
      'tempat_pertemuan'=>$tempat_pertemuan,
      'tanggal_sampai'=>$tanggal_sampai,
      'cp_1'=>$cp1,
      'cp_2'=>$cp2,
      'pihak_berkepentingan'=>$pihak_berkepentingan,
      'alamat_berkepentingan'=>$alamat_berkepentingan
    );
    $this->model_lawyerSyariah->act_somasi_1($data);
    redirect('admin/lawyersyariah');
  }
  function act_somasi1_4()
  {
    $id = $this->input->post('id_tr_tindakan_hukum');
    $data = array(
      'id_tr_tindakan_hukum'=>$id,
    );
    $this->model_lawyerSyariah->act_somasi_1($data);

    $number_of_files = sizeof($_FILES['userfiles']['tmp_name']);
    $files = $_FILES['userfiles'];
    $id = $this->input->post('id_tr_formtindakan');
    $config=array(  
      'upload_path' => './file/lawyer/', //direktori untuk menyimpan gambar  
      'allowed_types' => 'pdf|doc|docx|',  
      'max_size' => '2000'  
      );  
    for($i=0;$i<$number_of_files;$i++)
    {
      $_FILES['userfile']['name']=$files['name'][$i];
      $_FILES['userfile']['type']=$files['type'];
      $_FILES['userfile']['tmp_name']=$files['tmp_name'][$i];
      $_FILES['userfile']['error']=$files['error'][$i];
      $_FILES['userfile']['size']=$files['size'][$i];
      $this->load->library('upload',$config);
      $this->upload->do_upload('userfile');
      $data = array('id_tr_formtindakan'=>$id,
                    'file_surat'=>$_FILES['userfile']['name']=$files['name'][$i]);
      $this->model_lawyerSyariah->act_somasi2($data);
    }
    redirect('admin/lawyersyariah');

  }
  function somasi2()
  {
    $data['record'] = $this->model_lawyerSyariah->get_tr_tindakan_hukum();
    $this->template->load('layout/template','lawyersyariah/somasi2',$data);
  }
  function act_somasi2()
  {
    $number_of_files = sizeof($_FILES['userfiles']['tmp_name']);
    $files = $_FILES['userfiles'];
    $id = $this->input->post('id_tr_formtindakan');
    $config=array(  
      'upload_path' => './file/lawyer/', //direktori untuk menyimpan gambar  
      'allowed_types' => 'pdf|doc|docx|',  
      'max_size' => '2000'  
      );  
    for($i=0;$i<$number_of_files;$i++)
    {
      $_FILES['userfile']['name']=$files['name'][$i];
      $_FILES['userfile']['type']=$files['type'];
      $_FILES['userfile']['tmp_name']=$files['tmp_name'][$i];
      $_FILES['userfile']['error']=$files['error'][$i];
      $_FILES['userfile']['size']=$files['size'][$i];
      $this->load->library('upload',$config);
      $this->upload->do_upload('userfile');
      $data = array('id_tr_formtindakan'=>$id,
                    'file_surat'=>$_FILES['userfile']['name']=$files['name'][$i]);
      $this->model_lawyerSyariah->act_somasi2($data);
    }
    redirect('admin/lawyersyariah');
  }

  function act_LO($id)
  {
    $LO = 1;
    $data = array('status_tindakan'=>$LO);
    $this->model_lawyerSyariah->act_tindakan_hukum($id,$data);
    redirect('admin/lawyersyariah');
  }
  
  function act_Mediasi($id)
  {
    $LO = 2;
    $data = array('status_tindakan'=>$LO);
    $this->model_lawyerSyariah->act_tindakan_hukum($id,$data);
    redirect('admin/lawyersyariah');
  }

  function act_Litigasi($id)
  {
    $LO = 3;
    $data = array('status_tindakan'=>$LO);
    $this->model_lawyerSyariah->act_tindakan_hukum($id,$data);
    redirect('admin/lawyersyariah');
  }
}