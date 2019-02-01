<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
		$this->load->view('register/first');
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
}