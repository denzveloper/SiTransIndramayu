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
        $ret = $this->session->userdata('mail');
        if(!$ret && !$this->session->flashdata('info')){
            $this->session->set_flashdata('info', array(array('ico' => 'glyphicon glyphicon-remove', 'tit' => "Sorry!", 'txt' => '<i>You are not login</i>', 'typ' => 'danger')));
        }
        return $ret;
    }

    function chksessl(){
        return $this->session->userdata('mail');
    }

    function addsm($f1, $f2){
        $this->db->insert($f1, $f2);
        $query = $this->db->affected_rows();
        if ($query == 0) {
            return FALSE;
        }else{
            return $query;
        }
    }

    //Delete Somedata
    function delete($f1, $f2, $f3=FALSE){
        $this->db->where($f2);
        $this->db->delete($f1);
        if($f3 == TRUE) $this->db->limit(1);
        $query = $this->db->affected_rows();
        if ($query == 0) {
            return FALSE;
        }else{
            return $query;
        }
    }

    //Logout delete session
    function logout(){
        //logout
		$logdt = array(
            'logged_in', 'mail', 'fnam', 'lnam'
        );
        $this->session->unset_userdata($logdt);
    }

    //get data table
    function getdata($f1, $f2){
        if($this->infoex($f1, $f2)){
            $this->db->from($f1);
            $this->db->where($f2);
            $query = $this->db->get();
            return $query->row();
        }else{
            return null;
        }
    }

    //get detail all
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

    //get some data
    function getsm($f1, $f2){
        $this->db->from($f1);
        $query = $this->db->get();
        return $query->row()->$f2;
    }

    //get info exists?
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

    //get img
    function getsmimg($f1, $f2 = FALSE, $f3, $f4){
        $this->db->from($f1);
        if($f2 != FALSE){
            $this->db->where($f2);
        }
        $get = $this->db->get();
        if($get !== FALSE && $get->num_rows() > 0){
            foreach($get->result() as $hit){
            $got[] = $f3.$hit->$f4;
            }
        }else{
            $got = "default.png";
        }
        return $got;
    }

    //get img with id
    function getsmimgr($f1, $f2 = FALSE, $f3, $f4){
        $this->db->from($f1);
        if($f2 != FALSE){
            $this->db->where($f2);
        }
        $get = $this->db->get();
        if($get !== FALSE && $get->num_rows() > 0){
            foreach($get->result() as $hit){
            $got[] = array('id'=> $hit->id, 'img' => $f3.$hit->$f4);
            }
        }
        return $got;
    }

    //Update
    function updt($f1, $f2, $f3){
        $this->db->where($f2);
        $this->db->update($f1, $f3);
        $query = $this->db->affected_rows();
        if ($query == 0) {
            return FALSE;
        }else{
            return $query;
        }
    }

}