<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Telolet extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //Must to Load!
        //load model loginm
        $this->load->model("loginm");
    }

    public function index(){
		$this->load->library("safe");
		//$file = file_get_contents('assets/.easter/easter.txt');
		$fh = fopen("assets/.easter/easter.txt", 'r');
    	$file = fread($fh, 25000);
		echo nl2br($file)."<hr>";
		$hp = base64_encode($file);
		echo "<div style='word-wrap: break-word'>".$hp."</div><hr>";
		echo base64_encode("dandyoctavian@gmail.com").'<br>';
		echo $this->safe->encrypt("root");
	}
}