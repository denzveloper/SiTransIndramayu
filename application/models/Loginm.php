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

    function getail($f1, $f2, $f3){
        if($this->infoex($f1, $f2)){
            $this->db->from($f1);
            $this->db->where($f2);
            $query = $this->db->get();
            return $query->row()->$f3;
        }else{
            return null;
        }
    }

    function getsm($f1, $f2){
        $this->db->from($f1);
        $query = $this->db->get();
        return $query->row()->$f2;
    }

    function infoex($f1, $f2){
        $this->db->select('*');
        $this->db->from($f1);
        $this->db->where($f2);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        }else{
            return TRUE;
        }
    }

    function getsmimg($f1, $f2 = FALSE, $f3, $f4){
        $this->db->from($f1);
        if($f2 != FALSE){
            $this->db->where($f2);
        }
        $get = $this->db->get();
        if($get !== FALSE && $get->num_rows() > 0){
            foreach($get->result() as $hit){
            $got[] = base_url().$f3.$hit->$f4;
            }
        }else{
            $got = base_url()."data/img/default.png";
        }
        return $got;
    }
}