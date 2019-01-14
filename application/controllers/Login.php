<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //Must to Load!
        $this->load->library('session');
        //load model loginm
        $this->load->model('loginm');
    }

    public function index(){
    	if($this->loginm->chksess()){
			//jika memang session sudah terdaftar, maka dialihkan ke halaman dahsboard
			redirect("dashboard");
		}else{
			//set form validation
			$this->form_validation->set_rules('mail', 'Email', 'required|valid_email|trim|max_length[128]');
			$this->form_validation->set_rules('pass', 'Password', 'required|max_length[64]');
			//set message form validation
			$this->form_validation->set_message('required', 'harus diisi!');
			//check Validation
			if ($this->form_validation->run() == TRUE){
				$mail = $this->input->post("mail", TRUE);
				$pass = $this->input->post("pass", TRUE);
				//check user mail and password
				$cek = $this->loginm->login($mail, $pass);
				if ($cek != FALSE){
					foreach ($cek as $hit){
						$sesar = array(
							'logged_in' => TRUE,
							'mail' => $hit->surel,
							'fnam' => $hit->namadepan,
							'lnam' => $hit->namabelakang
						);
						$fnam = $hit->namadepan;
					}
					//set session userdata
					$this->session->set_userdata($sesar);
					$msg[] = array('ico' => 'ti-check', 'txt' => "<b>Hi, $fnam!</b><br><i> Welcome to Admin Page.</i>", 'typ' => 'success');
					$this->session->set_flashdata('info', $msg);
					redirect('dashboard/');

				}else{
					$this->session->set_flashdata('login', FALSE);
					$msg[] = array('ico' => 'ti-close', 'txt' => '<b>Warning: </b><br><i>Mail or Password is Wrong!</i>', 'typ' => 'danger');
				}
			}else{
				if(validation_errors()){
					$msg[] = array('ico' => 'ti-info', 'txt' => '<b>Warning: </b><br><i>'.preg_replace("/(\n)+/m", '<br>', strip_tags(strip_tags(validation_errors()))).'</i>', 'typ' => 'warning');
				}
			}
			if(!empty($msg)) $this->session->set_flashdata('info', $msg);
			$this->load->view('homes/login');
		}
	}

    public function logout(){
		$this->loginm->logout(TRUE);
		$msg[] = array('ico' => 'ti-check', 'txt' => "<b>Good bye!</b><br><i> Youre now logout.</i>", 'typ' => 'warning');
		$this->session->set_flashdata('info', $msg);
		redirect('login');
	}
}