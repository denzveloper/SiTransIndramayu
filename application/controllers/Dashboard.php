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
            $data['user'] = $this->loginm->count();
			$this->load->view('login/dashboard', $data);
		}
    }
    
    public function artikel(){
        if(!$this->loginm->chksess()){
			redirect("login");
		}else{
            $data['artikel'] = $this->loginm->getart();
			$this->load->view('login/artikel', $data);
		}
    }

    public function data(){
        if(!$this->loginm->chksess()){
			redirect("login");
		}else{
            $data['list'] = $this->loginm->gettrans();
			$this->load->view('login/data', $data);
		}
    }

    public function tuju(){
        if(!$this->loginm->chksess()){
			redirect("login");
		}else{
            $data['to'] = $this->loginm->getean('tujuan', FALSE, 'id');
			$this->load->view('login/tuju', $data);
		}
    }

    public function user(){
        if(!$this->loginm->chksess()){
			    redirect("login");
		}else{
            $data['user'] = $this->loginm->getusrall();
			$this->load->view('login/user', $data);
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
            $this->load->library('pdf');
            $mail = $_SESSION['mail'];
            $tod = $this->input->get("todo", TRUE);
            if(!isset($tod))redirect("view/data");
            if($tod == "family"){
                $this->load->library('safe');
                $who = $this->input->get("id", TRUE);
                $who = $this->safe->dencrypt($who, $mail);
                $data['dok'] = $this->loginm->getean('data_kk', array('id' => $who));
                
                $this->load->view("login/data/cetakf", $data);
            }elseif($tod == "select"){
                //Belum jadi
                //$this->load->view("login/data/cetaks",$data);
            }else{
                redirect("view/data");
            }
        }
    }
}