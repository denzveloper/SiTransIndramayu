<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //load model loginm
		$this->load->model("loginm");
    }

    public function index(){
    	if($this->loginm->chksessl()){
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
						$nd = $hit->namadepan;
						$nb = $hit->namabelakang;
						$name = $nd." ".$nb;
						$sesar = array(
							'logged_in' => TRUE,
							'mail' => $hit->surel,
							'fnam' => $nd,
							'lnam' => $nb,
							'nama' => $this->loginm->singkat($name),
							'lvl' => $hit->level
						);
					}
					$this->session->set_userdata($sesar);
					$msg[] = array('ico' => 'glyphicon glyphicon-log-in', 'tit' => "Hi, $name!", 'txt' => "<i>Welcome to Admin Page.</i>", 'typ' => 'success');
					$this->session->set_flashdata('info', $msg);
					redirect('dashboard');

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
		if(!$this->loginm->chksess()){
			redirect("login");
		}else{
			$name = $_SESSION['fnam'];
			$this->loginm->logout();
			redirect('login/logmsg');
		}
	}

	public function logmsg(){
		$msg[] = array('ico' => 'glyphicon glyphicon-log-out', 'tit' => "Good bye $name!", 'txt' => "<i> Youre now logout.</i>", 'typ' => 'info');
		$this->session->set_flashdata('info', $msg);
		redirect('login');
	}
}