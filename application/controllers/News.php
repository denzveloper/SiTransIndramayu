<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('datam');
        $this->load->library('pagination');
    }

    public function index(){
        $jumlah_data = $this->datam->jumlah_data();
        $config['base_url'] = base_url().'index.php/news/index/';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 5;
        $config['display_pages'] = FALSE;
        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>Previous Page';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next Page<i class="fa fa-long-arrow-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $from = ($this->uri->segment(3)) ? ($this->uri->segment(3) * $config["per_page"]) - $config["per_page"] : 0;
        $this->pagination->initialize($config);
        $data['news'] = $this->datam->data($config['per_page'], $from);
		$this->load->view('homes/news', $data);
	}
}
