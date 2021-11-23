<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_login'));
    }
    
    // menampilkan halaman default
    public function index()
    {
        $this->cek_login_lib->logged_in_true($this->session->userdata('level'));
        $this->load->view('V_login_2');
    }

    public function tes()
    {
        $a = '0001operator';

        echo $b = md5($a);
    }

    // proses cek login
    public function auth()
    {
        $username   = htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $sha        = htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
        
        $cari_user  = $this->M_login->cari_data('pengguna', array('username' => $username));

        $sha_s      = md5($sha);

        if ($cari_user->num_rows() != 0) {
            $data = $cari_user->row_array();
            if ($data['sha'] === $sha_s) {
                // sesuai dengan level user
                if(($data['level'] == 3) && ($data['status_pengguna'] == 1)){
                    $array = array(
                        'username'  => $username,
                        'masuk'     => 'd_care',
                        'level'     => 'operator'
                    );
                    $this->session->set_userdata($array);
                    // redirect("Admin/operator");
                    echo json_encode(['hasil'   => 'operator']);
                }
                elseif(($data['level'] == 4) && ($data['status_pengguna'] == 1)){
                    $array = array(
                        'username'  => $username,
                        'masuk'     => 'd_care',
                        'level'     => 'manager'
                    );
                    $this->session->set_userdata($array);
                    // redirect("Admin/manager");
                    echo json_encode(['hasil'   => 'manager']);
                }
                elseif(($data['level'] == 5) && ($data['status_pengguna'] == 1)){
                    $array = array(
                        'username'  => $username,
                        'masuk'     => 'd_care',
                        'level'     => 'lawyer'
                    );
                    $this->session->set_userdata($array);
                    // redirect("Admin/lawyer");
                    echo json_encode(['hasil'   => 'lawyer']);
                }
                elseif(($data['level'] == 8) && ($data['status_pengguna']))
                {
                    $array = array(
                        'username'  => $username,
                        'masuk'     => 'd_care',
                        'level'     => 'managerSyariah'
                    );
                    $this->session->set_userdata($array);
                    // redirect('Admin/managerSyariah');
                    echo json_encode(['hasil'   => 'managerSyariah']);
                }
                elseif(($data['level'] == 9) && ($data['status_pengguna']))
                {
                    $array = array(
                        'username'  => $username,
                        'masuk'     => 'd_care',
                        'level'     => 'lawyerSyariah'
                    );
                    $this->session->set_userdata($array);
                    // redirect('Admin/lawyerSyariah');
                    echo json_encode(['hasil'   => 'lawyerSyariah']);
                } else {
                    // anda tidak punya hak akses masuk
                    echo json_encode(['hasil'   => 4]);
                }
            } else {
                // password salah
                echo json_encode(['hasil'   => 2]);
            }
        } else {
            // username tidak ditemukan
            echo json_encode(['hasil'   => 3]);
        } 
    }

    // logout
    public function logout()
    {
        $us = $this->session->userdata('masuk');
        
        if ($us == 'd_care') {
            $this->session->sess_destroy();
            redirect(base_url());  
        } else {
            redirect(base_url());  
        }  
    }

}

/* End of file C_Login.php */
