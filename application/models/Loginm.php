<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginm extends CI_Model{
    
    public function __construct(){
        date_default_timezone_set("Asia/Bangkok");
        setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');

        //error_reporting(0);
    }

    //You Know lah ini login
    function login($f1, $f2){
        $this->load->library("safe");
        $ps = $this->safe->encrypt($f2);
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where('surel', $f1);
        $this->db->where('sandi', $ps);
        $this->db->where('block', 0);
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

    function updpro($f1, $f2){
        //Library
        $this->load->library('session');
        $mail = $_SESSION['mail'];
        $this->load->library("safe");
        $pss = $this->safe->encrypt($f1);
        $this->db->where('surel', $mail);
        $this->db->where('sandi', $pss);
        $this->db->update("pengguna", $f2);
        $query = $this->db->affected_rows();
        if ($query == 0) {
            return FALSE;
        }else{
            $this->logout();
            $cek = $this->login($f2['surel'], $f1);
            if ($cek != FALSE){
                foreach ($cek as $hit){
            	    $sesar = array(
                        'logged_in' => TRUE,
                        'mail' => $hit->surel,
                        'fnam' => $hit->namadepan,
                        'lnam' => $hit->namabelakang
                    );
                }
                //set session userdata
                $this->session->set_userdata($sesar);
            }
            return $query;
        }
    }

    function updsan($f1, $f2){
        //Library
        $this->load->library('session');
        $mail = $_SESSION['mail'];
        $this->load->library("safe");
        $pss = $this->safe->encrypt($f1);
        $psn = $this->safe->encrypt($f2);
        $this->db->where('surel', $mail);
        $this->db->where('sandi', $pss);
        $this->db->update("pengguna", array('sandi' => $psn));
        $query = $this->db->affected_rows();
        if ($query == 0) {
            return FALSE;
        }else{
            $this->logout();
            $cek = $this->login($mail, $f2);
            if ($cek != FALSE){
                foreach ($cek as $hit){
                    $nd = $hit->namadepan;
					$nb = $hit->namabelakang;
					$name = $nd." ".$nb;
            	    $sesar = array(
                        'logged_in' => TRUE,
						'mail' => $hit->surel,
						'fnam' => $nd,
						'lnam' => $nb,
						'nama' => $this->loginm->singkat($name),
						'lvl' => $hit->level
                    );
                }
                //set session userdata
                $this->session->set_userdata($sesar);
            }
            return $query;
        }
    }

    //Get any data?
    function getean($f1, $f2=FALSE, $f3=FALSE){
        $this->db->select('*');
        $this->db->from($f1);
        if($f2 != FALSE) $this->db->where($f2);
        if($f3 != FALSE) $this->db->order_by($f3, 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        }else{
            return $query->result_array();
        }
    }

    function area($f1, $f2){
        $list = $this->getean('tujuan', $f1);
        if($list != FALSE){
            foreach($list as $hit){
                $what = $hit[$f2];
                $data[] = "<option value=\"$what\">$what</option>";
            }
            return $data;
        }else{
            return array(print_r($f1));
        }
    }

    function year($f1){
        $list = $this->getean($f1);

        if($list != FALSE){
            foreach($list as $hit){
                $data[] = $hit['tahun'];
            }
        }

        return array_unique($data);
    }

    function chkean($f1, $f2){
        $this->db->select('*');
        $this->db->from($f1);
        $this->db->where($f2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    //... when > 16 char
    function singkat($an, $x = 16){
        if (strlen($an) > $x){
            $x = $x - 3;
            $an = substr($an, 0, $x) . '&#8230;';
        }
        return $an;
    }

    function getusrall(){
        $this->load->library("safe");
        $q = $this->getean('pengguna', 'level > 0');
        if(!empty($q)){
            foreach($q as $row){
                $n = $row['namadepan']; 
                $n .= ' '.$row['namabelakang'];
                $row['nama'] = $this->singkat($n, 20);
                $row['jbt'] = $this->singkat($row['jabatan'], 20);
                $row['stat'] = "Blokir";
                $row['text'] = "<i class=\"fa fa-lock\"></i>";
                if($row['block'] == 1){ $row['stat'] = "Unblock"; $row['text'] = "<i class=\"fa fa-unlock\"></i>";}
                $row['link'] = base_url('index.php/crud/usrtodo?usr=').$this->safe->encrypt($row['surel'], $_SESSION['mail']);
                $row['mail'] = $this->safe->encrypt($row['surel'], $_SESSION['mail']);
                $data[] = $row;
            }
            return $data;
        }else{
            return FALSE;
        }
    }

    function blockus($f1){
        $dis = $this->getail('pengguna', array('surel' => $f1), 'block');
        
        $this->db->where('surel', $f1);
        if($dis) $this->db->set("block", '0', false);
        else $this->db->set("block", '1', false);
        $this->db->update('pengguna');
        
        $query = $this->db->affected_rows();
        if ($query == 0) {
            return FALSE;
        }else{
            return $query;
        }
    }

    function gettrans(){
        $this->load->library("safe");
        $mail = $_SESSION['mail'];
        //$q = $this->getean('data_kk', "surel_petugas = '$mail' OR surel_petugas IS NULL");
        $q = $this->getean('data_kk');
        if(!empty($q)){
            foreach($q as $row){
                $row['dekk'] = $this->singkat($row['desa'], 20);
                if($row['berangkat']) $row['color'] = "success";
                elseif(isset($row['surel_petugas'])) $row['color'] = "warning";
                else $row['color'] = "danger";
                $row['tuju'] = $this->getail('tujuan', array('id' => $row['id_tuju']), 'lok');
                $row['link'] = base_url('index.php/view/data?id=').$this->safe->encrypt($row['id'], $mail);
                $data[] = $row;
            }
            return $data;
        }else{
            return FALSE;
        }
    }

    function getart(){
        $this->load->library("safe");
        $mail = $_SESSION['mail'];
        $q = $this->getean('kabar', array('pengguna' => $_SESSION['mail']), 'timedate');
        if(!empty($q)){
            foreach($q as $row){
                $row['artikel'] = $this->singkat($row['konten'], 200);
                $data[] = $row;
            }
            return $data;
        }else{
            return FALSE;
        }
    }

    function count(){
        $y = date('Y');
        $q1 = $this->db->from('data_kk')->get()->num_rows();
        $q2 = $this->db->from('data_kk')->like('date', $y, 'after')->where('berangkat', '1')->get()->num_rows();

        $a1 = $this->db->from('data_kk')->get()->num_rows();
        $a2 = $this->db->from('data_kk')->where('`surel_petugas` IS NOT NULL')->get()->num_rows();
        $a3 = $this->db->from('data_kk')->where('berangkat', '1')->get()->num_rows();

        return array('jumlah' => $q1, 'tym' => $q2, 'tot' => $a1, 'ok' => $a2, 'ber' => $a3);
    }
}