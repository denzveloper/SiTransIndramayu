<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('loginm');
    }

    public function index(){
      $data['reg'] = $this->loginm->year('tujuan');
		  $this->load->view('register/first', $data);
    }
    
    public function second(){
      $this->form_validation->set_rules('jt', 'Jenis Transmigrasi', 'required');
      $this->form_validation->set_rules('ta', 'Tahun Keberangkatan', 'required|numeric');
      $this->form_validation->set_rules('prov', 'Provinsi Tujuan', 'required');
      $this->form_validation->set_rules('kab', 'Kota Tujuan', 'required');
      $this->form_validation->set_rules('lok', 'Lokasi Tujuan', 'required');
      if($this->form_validation->run() == TRUE){
        $tah = $this->input->post("ta", TRUE);
        $pro = $this->input->post("prov", TRUE);
        $kab = $this->input->post("kab", TRUE);
        $lok = $this->input->post("lok", TRUE);

        $array = array('prov' => $pro, 'kab' => $kab, 'lok' => $lok, 'tahun'=> $tah);
        $cek = $this->loginm->chkean('tujuan', $array);
        if(!$cek){
          $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>Place Unknown.</i> ', 'typ' => 'danger');
          $this->session->set_flashdata('info', $msg);
          redirect('register');
        }
        //Nanti pindah ke konfirm
        $id = $this->loginm->getail('tujuan', $array, 'id');
        //-----------------------
        $this->session->set_tempdata('place', $array, 3600);
        $msg[] = array('ico' => 'glyphicon glyphicon-floppy-saved', 'tit' => "Done!", 'txt' => "<i>$lok Selected.</i>", 'typ' => 'success');
        $this->load->view('register/second');
      }else{
        $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Warning!", 'txt' => '<i>'.preg_replace("/(\n)+/m", '<br>', strip_tags(strip_tags(validation_errors()))).'</i> ', 'typ' => 'warning');
        $this->session->set_flashdata('info', $msg);
        redirect('register');
      }
    }

    public function third(){
      $this->form_validation->set_rules('name', 'Nama', 'required');
      $this->form_validation->set_rules('alamat', 'Alamat', 'required');
      $this->form_validation->set_rules('desa', 'Desa/Kelurahan Asal', 'required');
      $this->form_validation->set_rules('kecamatan', 'Kecamatan Asal', 'required');
      $this->form_validation->set_rules('kota', 'Kota/Kabupaten Asal', 'required');
      $this->form_validation->set_rules('provinsi', 'Provinsi Asal', 'required');
      $this->form_validation->set_rules('tempatlahir', 'Tempat Kelahiran', 'required');
      $this->form_validation->set_rules('tanggallahir', 'Tanggal Kelahiran', 'required');
      $this->form_validation->set_rules('tanggalkawin', 'Tanggal Kawin', 'required');
      $this->form_validation->set_rules('pendidikan', 'Pendidikan Transmigran', 'required');
      $this->form_validation->set_rules('pekerjaan', 'Pekerjaan/Keahlian', 'required');
      $this->form_validation->set_rules('gaji', 'Pendapatan Transmigran', 'required|numeric');
      $this->form_validation->set_rules('tanah', 'Luas Tanah yang ditinggal', 'required');
      if($this->form_validation->run() == TRUE){
        $nam = $this->input->post("name", TRUE);
        $add = $this->input->post("alamat", TRUE);
        $des = $this->input->post("desa", TRUE);
        $kec = $this->input->post("kecamatan", TRUE);
        $kot = $this->input->post("kota", TRUE);
        $pro = $this->input->post("provinsi", TRUE);
        $tel = $this->input->post("tempatlahir", TRUE);
        $tal = $this->input->post("tanggallahir", TRUE);
        $tak = $this->input->post("tanggalkawin", TRUE);
        $pen = $this->input->post("pendidikan", TRUE);
        $pek = $this->input->post("pekerjaan", TRUE);
        $gaj = $this->input->post("gaji", TRUE);
        $tnh = $this->input->post("tanah", TRUE);

        $arid = $this->session->tempdata('place');

        $id = $this->loginm->getail('tujuan', $arid, 'id');
        
        $array = array('id_tuju' => $id, 'date' => date('Y-m-d H:i:s'), 'namakk' => $nam, 'alamat' => $add, 'desa' => $des, 'kecamatan' => $kec, 'kabupaten' => $kot, 'provinsi' => $pro, 'tmp_lh' => $tel, 'tl' => $tal, 'ttk' => $tak, 'pendidikan' => $pen, 'pekerjaan' => $pek, 'pendapatan' => $gaj, 'luastinggal' => $tnh);

        $this->session->set_tempdata('kk', $array, 3600);
        $msg[] = array('ico' => 'glyphicon glyphicon-floppy-saved', 'tit' => "Done!", 'txt' => "<i>Data Saved.</i>", 'typ' => 'success');

        $this->load->view('register/third');
      }else{
        $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Warning!", 'txt' => '<i>'.preg_replace("/(\n)+/m", '<br>', strip_tags(strip_tags(validation_errors()))).'</i> ', 'typ' => 'warning');
        $this->session->set_flashdata('info', $msg);
        redirect('register/second');
      }
    }

    public function confirm(){
		  $this->load->view('register/first');
    }

}