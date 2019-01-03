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
}