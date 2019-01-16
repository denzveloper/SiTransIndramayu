<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //load model loginm
        $this->load->model('loginm');
    }

    public function index(){
    	$data['welcmsg'] = array('title' => $this->loginm->getsm('homepage', 'title'),  'content' => $this->loginm->getsm('homepage', 'text'), 'img' => $this->loginm->getsmimg('home_img', FALSE, 'data/img/home/', 'name'));
		$this->load->view('homes/home', $data);
	}
}