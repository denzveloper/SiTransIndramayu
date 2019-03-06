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
        $config['per_page'] = 3;
        $config['display_pages'] = FALSE;
        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $config['prev_link'] = '<button class="btn btn-default">Previous Page</button>';
        $config['prev_tag_open'] = ' ';
        $config['prev_tag_close'] = '&nbsp;&middot&nbsp;';
        $config['next_link'] = '<button class="btn btn-default">Next Page</button>';
        $config['next_tag_open'] = '';
        $config['next_tag_close'] = '';
        $from = ($this->uri->segment(3)) ? ($this->uri->segment(3) * $config["per_page"]) - $config["per_page"] : 0;
        $this->pagination->initialize($config);
        $data['news'] = $this->datam->data($config['per_page'], $from);
		$this->load->view('homes/news', $data);
	}
}
