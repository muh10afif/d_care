<?php
class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('model_login');
	}

	function index(){
		$this->load->view('v_login');
	}

	function auth(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
		$sha=htmlspecialchars($this->input->post('sha',TRUE),ENT_QUOTES);
        $where = array(
        	'username' => $username,
			'sha' => md5($sha),
        );
        $cek = $this->model_login->cek_login('pengguna',$where);
        if($cek->num_rows() != 0){
			foreach($cek->result_array() as $c){
				if(($c['level'] == 3) && ($c['status_pengguna'] == 1)){
					$array = array(
						'username' => $username,
						'masuk'=> TRUE
					);
					$this->session->set_userdata($array);
					redirect("Admin/operator");
				}
				elseif(($c['level'] == 4) && ($c['status_pengguna'] == 1)){
					$array = array(
						'username' => $username,
						'masuk'=> TRUE
					);
					$this->session->set_userdata($array);
					redirect("Admin/manager");
				}
				elseif(($c['level'] == 5) && ($c['status_pengguna'] == 1)){
					$array = array(
						'username' => $username,
						'masuk'=> TRUE
					);
					$this->session->set_userdata($array);
					redirect("Admin/lawyer");
				}
				elseif(($c['level'] == 8) && ($c['status_pengguna']))
				{
					$array = array(
						'username' => $username,
						'masuk' => TRUE
					);
					$this->session->set_userdata($array);
					redirect('Admin/managerSyariah');
				}
				elseif(($c['level'] == 9) && ($c['status_pengguna']))
				{
					$array = array(
						'username' => $username,
						'masuk' => TRUE
					);
					$this->session->set_userdata($array);
					redirect('Admin/lawyerSyariah');
				}
			}
        }else{
        	$this->session->set_flashdata('info','Username atau Password salah');
        	redirect('Login');
        }
    }

    function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }

}