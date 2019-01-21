<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Databaseu extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //Must to Load!
        $this->load->library('session');
        //load model loginm
        $this->load->model('loginm');
    }

    public function index(){
		redirect("user/dashboard");
	}
}