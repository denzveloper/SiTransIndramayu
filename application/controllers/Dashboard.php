<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //Must to Load!
        $this->load->library('session');
        //load model loginm
        $this->load->model('loginm');
    }

    public function index(){
    	if(!$this->loginm->chksess()){
			redirect("login");
		}else{
			$this->load->view('login/dashboard');
		}
    }
    
    public function artikel(){
        if(!$this->loginm->chksess()){
			redirect("login");
		}else{
			$this->load->view('login/artikel');
		}
    }

    public function data(){
        if(!$this->loginm->chksess()){
			redirect("login");
		}else{
			$this->load->view('login/data');
		}
    }

    public function profil(){
        if(!$this->loginm->chksess()){
			redirect("login");
		}else{
            $data['user']= $this->loginm->getdata('pengguna',array("surel" => $this->session->userdata('mail')));
			$this->load->view('login/profil', $data);
		}
    }

    public function sandi(){
        if(!$this->loginm->chksess()){
			redirect("login");
		}else{
			$this->load->view('login/sandi');
		}
    }

    public function conf(){
        if(!$this->loginm->chksess()){
			redirect("login");
		}else{
            $data['user'] = array('title' => $this->loginm->getsm('homepage', 'title'), 'content' => $this->loginm->getsm('homepage', 'text'), 'img' => $this->loginm->getsmimgr('home_img', FALSE, 'data/img/home/', 'name'));
			$this->load->view('login/config', $data);
		}
    }
}