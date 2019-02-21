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
        $jet = $this->input->post("jt", TRUE);
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
        $this->session->set_tempdata('place', $array, 7200);
        $this->session->set_tempdata('jet', $jet, 7200);
        $msg[] = array('ico' => 'glyphicon glyphicon-floppy-saved', 'tit' => "Done!", 'txt' => "<i>$lok Selected.</i>", 'typ' => 'success');
        $this->session->set_flashdata('info', $msg);
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

        $this->session->set_tempdata('kepala', $array, 7200);
        $msg[] = array('ico' => 'glyphicon glyphicon-floppy-saved', 'tit' => "Done!", 'txt' => "<i>Data Saved.</i>", 'typ' => 'success');
        $this->session->set_flashdata('info', $msg);

        $this->load->view('register/third');
      }else{
        $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Warning!", 'txt' => '<i>'.preg_replace("/(\n)+/m", '<br>', strip_tags(strip_tags(validation_errors()))).'</i> ', 'typ' => 'warning');
        $this->session->set_flashdata('info', $msg);
        redirect('register/second');
      }
    }

    public function confirm(){
		  $this->form_validation->set_rules('name[]', 'Nama', 'required');
      $this->form_validation->set_rules('umur[]', 'Usia', 'required');
      $this->form_validation->set_rules('jk[]', 'Jenis Kelamin', 'required');
      $this->form_validation->set_rules('hub[]', 'Hubungan Keluarga', 'required');
      $this->form_validation->set_rules('agama[]', 'Agama', 'required');
      $this->form_validation->set_rules('pendidikan[]', 'Pendidikan', 'required');
      $this->form_validation->set_rules('kerja[]', 'Kerja', 'required');
      if($this->form_validation->run() == TRUE){
        $nam = $this->input->post("name", TRUE);
        $umu = $this->input->post("umur", TRUE);
        $jek = $this->input->post("jk", TRUE);
        $hub = $this->input->post("hub", TRUE);
        $ama = $this->input->post("agama", TRUE);
        $pen = $this->input->post("pendidikan", TRUE);
        $kja = $this->input->post("kerja", TRUE);
        $ket = $this->input->post("ket", TRUE);
        for($x=0; $x<sizeof($nam); $x++){
          $array[] = array('nama' => $nam[$x], 'umur' => $umu[$x], 'jk' => $jek[$x], 'hubungan' => $hub[$x], 'agama' => $ama[$x], 'pendidikan' => $pen[$x], 'pekerjaan' => $kja[$x], 'keterangan' => $ket[$x]);
        }
        $this->session->set_tempdata('tanggungan', $array, 7200);
        $msg[] = array('ico' => 'glyphicon glyphicon-floppy-saved', 'tit' => "Done!", 'txt' => "<i>Data Saved.</i>", 'typ' => 'success');
        $this->session->set_flashdata('info', $msg);
        $this->load->view('register/confirm');
        
      }else{
        $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Warning!", 'txt' => '<i>'.preg_replace("/(\n)+/m", '<br>', strip_tags(strip_tags(validation_errors()))).'</i> ', 'typ' => 'warning');
        $this->session->set_flashdata('info', $msg);
        redirect('register/third');
      }
    }

    public function save(){
      $u = $this->session->tempdata('place');
      $j = $this->session->tempdata('jet');
      $k = $this->session->tempdata('kepala');
      $t = $this->session->tempdata('tanggungan');

      //Save to database
      $date = date("Y-m-d H:i:s");
      $array = array_merge($k, array('jenis' => $j, 'date' => $date));
      $cek = $this->loginm->addsm('data_kk', $array);

      $kk = $this->loginm->getail('data_kk', $array, 'id');

      if(!empty($kk)  && $cek!=FALSE){
        foreach($t as $tg){
          $this->loginm->addsm('data_tanggung', array_merge($tg, array('id_kk' => $kk)));
        }
      }else{
        echo 'error';
        exit;
      }
      $this->session->unset_tempdata('place');
      $this->session->unset_tempdata('jet');
      $this->session->unset_tempdata('kepala');
      $this->session->unset_tempdata('tanggungan');
      
      redirect('register');
    }
}