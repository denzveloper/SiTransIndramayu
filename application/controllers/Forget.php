<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forget extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //Must to Load!
        $this->load->library('session');
        //load model loginm
        $this->load->model('loginm');
        $this->load->library('safe');
        $this->load->model('forgot');
    }

    public function index(){
		$this->load->view('homes/forgot');
    }
    
    public function recovery(){
        $this->load->view('forget/ask');
    }

    public function redeem(){
        $tod = $this->input->get('kode', TRUE);
        if(!isset($tod)||!isset($id)){
            $this->form_validation->set_rules('mail', 'Alamat Surel', 'required');
            if($this->form_validation->run() == TRUE){
                $mail = $this->input->post("mail", TRUE);
                $cek = $this->loginm->chkean('pengguna', array('surel' => $mail));
                if($cek){
                    $this->forgot->pass($mail);
                    $msg[] = array('ico' => 'glyphicon glyphicon-floppy-saved', 'tit' => "Done!", 'txt' => "<i>Jika Email terdaftar maka akan dikirimkan segera pemuihan akun anda.</i>", 'typ' => 'success');
                }else{
                    $msg[] = array('ico' => 'glyphicon glyphicon-floppy-saved', 'tit' => "Done!", 'txt' => "<i>Jika Email terdaftar maka akan dikirimkan segera pemuihan akun anda.</i>", 'typ' => 'success');
                }
            }else{
                $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Warning!", 'txt' => '<i>'.preg_replace("/(\n)+/m", '<br>', strip_tags(strip_tags(validation_errors()))).'</i>', 'typ' => 'warning');
            }
            $this->session->set_flashdata('info', $msg);
            redirect('login');
        }else{
            $this->form_validation->set_rules('kode', 'Kode Verifikasi', 'required');
            $this->form_validation->set_rules('pas', 'Sandi', 'required');
            $this->form_validation->set_rules('pas', 'Konfirmasi Sandi', 'required');
            if($this->form_validation->run() == TRUE){
                $kde = $this->input->get("kode", TRUE);
                $kod = $this->input->post("kode", TRUE);
                $san = $this->input->post("pas", TRUE);
                $sak = $this->input->post("pass", TRUE);

                if($san == $sak){
                    $email = $this->safe->dencrypt($kde, $kod);
                    $snd = $this->safe->dencrypt($san);
                    $cek = $this->loginm->updt('pengguna', array('surel' => $email), array('sandi' => $snd));
                    if($cek!=FALSE){
                        $msg[] = array('ico' => 'glyphicon glyphicon-floppy-saved', 'tit' => "Done!", 'txt' => "<i>You can login with new password.</i>", 'typ' => 'success');
                    }else{
                        $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>Something Wrong.</i>', 'typ' => 'danger');
                    }
                }else{
                    $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>Password Different.</i>', 'typ' => 'danger');
                }
            }else{
                $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Warning!", 'txt' => '<i>'.preg_replace("/(\n)+/m", '<br>', strip_tags(strip_tags(validation_errors()))).'</i>', 'typ' => 'warning');
            }
            header("Location: {$_SERVER['HTTP_PREFER']}");
            exit;
        }
    }
}