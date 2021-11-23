<?php
class Admin extends CI_Controller{
  function __construct(){
    parent::__construct();
    //validasi jika user belum login
    $this->cek_login_lib->logged_in_false();

    $this->load->model('model_operator');
    $this->load->model('model_manager');
    $this->load->model('model_lawyer');
    $this->load->model('model_managerSyariah');
    $this->load->model('model_lawyerSyariah');
    $this->load->model('M_data');
    
  }

  function operator()
  {
    $data['record'] = $this->model_operator->tampil_call();
    // $this->load->view('operator/call',$data);
    $syariah = $this->uri->segment(3);

    if ($syariah == "syariah") {
        $asuransi = $this->M_data->get_asuransi_syariah('m_asuransi', 2)->result_array();
    } else {
        $asuransi = $this->M_data->get_data('m_asuransi')->result_array();
    }
    
    $data = ['judul'    => 'Desk Collection',
              'asuransi' => $asuransi,
              'syariah'  => $syariah,
              'bank'     => $this->M_data->get_data('m_bank')->result_array(),
              'tindakan' => $this->model_manager->get_data('m_tindakan_fu')->result_array()
            ];

    $this->template->load('layout/template', 'manager/V_desk_col', $data);
  }

  function manager(){
    // $data['record'] = $this->model_manager->tampil_potensial();

    $syariah = $this->uri->segment(3);

    if ($syariah == "syariah") {
        $asuransi = $this->M_data->get_asuransi_syariah('m_asuransi', 2)->result_array();
    } else {
        $asuransi = $this->M_data->get_data('m_asuransi')->result_array();
    }

    $data = ['judul'   => 'Debitur Potensial',
            'status'   => 1,
            'syariah'  => $syariah,
            'asuransi' => $asuransi,
            'bank'     => $this->M_data->get_data('m_bank')->result_array(),
            'spk'      => $this->M_data->get_data('spk')->result_array()
            ];
    //$this->load->view('manager/v_potensial',$data);
    $this->template->load('layout/template', 'kunjungan/V_kunjungan_deb', $data);
  }
  
  function lawyer()
  {
    $syariah = $this->uri->segment(3);
    
    $data['record']   = $this->model_lawyer->list_debitur($syariah);
    $data['syariah']  = $syariah;
    // $this->load->view('lawyer/v_hukum',$data);
    $this->template->load('layout/template', 'lawyer/v_hukum', $data);
  }

  function managerSyariah(){
    $data['record'] = $this->model_managerSyariah->tampil_potensial();
    // $this->load->view('managerSyariah/v_potensial',$data);
    $this->template->load('layout/template', 'managerSyariah/v_potensial', $data);
  }
  
  function lawyerSyariah()
  {
    $data['record'] = $this->model_lawyerSyariah->list_debitur();
    // $this->load->view('lawyerSyariah/v_hukum',$data);
    $this->template->load('layout/template', 'lawyerSyariah/v_hukum', $data);
  }

}