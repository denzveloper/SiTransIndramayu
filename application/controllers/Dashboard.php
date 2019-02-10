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
            $data['namak'] = $this->loginm->getsm('kepaladinas','nama_kepala');
            $data['nik'] = $this->loginm->getsm('kepaladinas','nik');
			$this->load->view('login/config', $data);
		}
    }

    public function print(){
        if(!$this->loginm->chksess()) {
            redirect("login");
        }else{
            $this->load->model('loginm');
            $tod = $this->input->get("todo", TRUE);

            if($tod == "family"){
                $this->load->library('pdf');
                $who = $this->input->get("who", TRUE);
                $data['dok'] = $this->loginm->getean('data_kk', array('id' => $who));
                $this->load->view("login/data/cetakf",$data);
            }elseif($tod == "select"){
                $this->load->library('pdf');
                //Belum jadi
                //$this->load->view("login/data/cetaks",$data);
            }else{

            }
        }
    }
}