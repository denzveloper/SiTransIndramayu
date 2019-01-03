<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginm extends CI_Model{

    //You Know lah ini login
    function login($f1, $f2){
        $this->load->library("safe");
        $ps = $this->safe->encrypt($f2);
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where('surel', $f1);
        $this->db->where('sandi', $ps);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    //Function check access
    function chksess(){
        return $this->session->userdata('mail');
    }

    function logout($f1 = FALSE){
        //library
        $this->load->library('session');
        //logout
		$logdt = array(
            'logged_in', 'mail', 'fnam', 'lnam'
        );
        $this->session->unset_userdata($logdt);

        //if logout session
        if($f1 == TRUE){
            $this->session->sess_destroy();
        }
    }
}