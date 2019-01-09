<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('datam');
    }

    public function index(){
        $jumlah_data = $this->datam->jumlah_data();
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/news/index/';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 5;
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['user'] = $this->datam->data($config['per_page'], $from);
		$this->load->view('homes/news', $data);
	}
}
