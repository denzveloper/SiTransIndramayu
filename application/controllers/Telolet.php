<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Telolet extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //Must to Load!
        //load model loginm
        $this->load->model('loginm');
    }

    public function index(){
		$this->load->library("safe");
		$hp = $this->safe->encrypt("root");
		echo $hp;
	}
}