<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('loginm');
    }

    public function index(){
      $data['reg'] = $this->loginm->year('tujuan');
		  $this->load->view('register/first', $data);
    }
    public function first(){
		  $this->load->view('register/first');
    }
    
    public function second(){
		  $this->load->view('register/first');
    }

    public function confirm(){
		  $this->load->view('register/first');
    }

    public function temp(){
      $this->load->library('session');
      $this->load->model('loginm');

      $tod = $this->input->get("sess", TRUE);

      if($sess == 1){
        //
      }
    }
}