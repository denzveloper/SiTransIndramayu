<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //load model loginm
		$this->load->model("loginm");
		$this->load->library("image");
    }

    public function index(){
    	if($this->loginm->chksess()){
			redirect("dashboard");
		}else{
			$this->form_validation->set_rules('mail', 'Email', 'required|valid_email|trim|max_length[128]');
			$this->form_validation->set_rules('pass', 'Password', 'required|max_length[64]');
			$this->form_validation->set_message('required', 'harus diisi!');
			if ($this->form_validation->run() == TRUE){
				$mail = $this->input->post("mail", TRUE);
				$pass = $this->input->post("pass", TRUE);
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
					$this->session->set_userdata($sesar);
					$msg[] = array('ico' => 'glyphicon glyphicon-log-in', 'tit' => "Hi, $fnam!", 'txt' => "<i>Welcome to Admin Page.</i>", 'typ' => 'success');
					$this->session->set_flashdata('info', $msg);
					redirect('dashboard/');

				}else{
					$msg[] = array('ico' => 'glyphicon glyphicon-remove', 'tit' => "Warning:", 'txt' => '<i>Mail or Password is Wrong!</i>', 'typ' => 'danger');
				}
			}else{
				if(validation_errors()){
					$msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Warning:", 'txt' => '<i>'.preg_replace("/(\n)+/m", '<br>', strip_tags(strip_tags(validation_errors()))).'</i>', 'typ' => 'warning');
				}
			}
			if(!empty($msg)) $this->session->set_flashdata('info', $msg);
			$this->load->view('homes/login');
		}
	}

    public function logout(){
		$name = $_SESSION['fnam'];
		$this->loginm->logout();
		$msg[] = array('ico' => 'glyphicon glyphicon-log-out', 'tit' => "Good bye $name!", 'txt' => "<i> Youre now logout.</i>", 'typ' => 'warning');
		$this->session->set_flashdata('info', $msg);
		print_r($this->session->flashdata('info'));
		redirect('login');
	}
}