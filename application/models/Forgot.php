<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot extends CI_Model{

    //Code
    function mail($f1, $f2, $f3, $f4){
        $config = Array(
            //Configuration of sends mail
            'protocol' => 'smtp',
            'smtp_crypto' => 'tls',
            'smtp_host' => 'smtp.live.com',
            'smtp_port' => 587,
            'smtp_user' => 'refillbottleina@outlook.co.id',
            'smtp_pass' => 'refillid123',
            'mailtype'  => 'html',
            'charset'   => 'utf-8'
        );
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        $msg = $this->messages($f2, $f3, $f4);
        $this->email->from($config['smtp_user'], 'Recovery Passworf');
        $this->email->to($f1);

        $this->email->subject('Forgot Password Recovery');
        $this->email->message($msg);

        if(!$this->email->send()){
            echo $this->email->print_debugger();
        }
        exit;
    }

        //Generate Token
        function pass($f1){
            //Load Library and model
            $this->load->library('safe');
            $this->load->model('loginm');

            $t = time();
            $rand = rand(100000, 999999);
            $xb = $this->safe->encrypt($rand, $t);
            $x = $this->safe->encrypt($f1, $xb);
            $fnam = $this->loginm->getail('pengguna', array('surel' => $f1), 'namadepan');
            $c = $this->db->select('*')->from('pengguna')->where('surel', $f1)->limit(1)->get();
            if ($c->num_rows() > 0) {
                $this->mail($f1, $fnam, $x, $xb);
                $this->loginm->updt('pengguna', array('surel' => $f1), array('forgot' => 1));
            }
        }

    function messages($f1, $f2, $f3){
        $url = base_url('forget/recovery').'?kode='.$f2;
        return "Hi $f1! Here is Link Code: <i>$url</i>. And Activation Code is: \"<i><b><u>$f3</u></b></i>\".<br><i>Thanks Me Later :)</i>";
    }
}