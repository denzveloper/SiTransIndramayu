<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //Must to Load!
        $this->load->library('session');
        //load model loginm
        $this->load->model('loginm');
    }

    public function artikel(){
        if(!$this->loginm->chksess()){
			redirect("login");
		}else{
            $tod = $this->input->get('todo', TRUE);
            if(!isset($tod))redirect("dashboard/artikel");
            if($tod == "edit"){
                $id = $this->input->get('id', TRUE);
                $mail = $_SESSION['mail'];
                $mils = $this->loginm->getail('kabar', array('id' => $id), 'pengguna');
                if($mail == $mils){
                    $data['edit'] = TRUE;
                    $data['user'] = $this->loginm->getean('kabar', array('id' => $id, 'pengguna' => $mail))[0];
                    //$data['user'] = $datas[0];
                    $this->load->view('login/artikel_en', $data);
                }else{
                    redirect("dashboard/artikel");
                }
            }elseif($tod = "new"){
                $data['edit'] = FALSE;
                $this->load->view('login/artikel_en', $data);
            }else{
                redirect("dashboard/artikel");
            }
		}
    }

    public function data(){
        if(!$this->loginm->chksess()){
			redirect("login");
		}else{
            $this->load->library("safe");
            $tod = $this->input->get('todo', TRUE);
            $id = $this->input->get('id', TRUE);
            $id = $this->safe->dencrypt($id, $_SESSION['mail']);
            if(!isset($tod)||!isset($id))redirect("dashboard/data");
            if($tod == "view"){
                $data['t'] = $this->loginm->getean('data_kk', array('id' => $id))[0];
                $data['k'] = $this->loginm->getean('tujuan', array('id' => $data['t']['id_tuju']))[0];
                $data['a'] = $this->loginm->getean('data_tanggung', array('id_kk' => $data['t']['id']));

                if($data['t']['berangkat']) $data['t']['brkt'] = "Sudah Berangkat";
                elseif(isset($data['t']['surel_petugas'])) $data['t']['brkt'] = "Terperiksa";
                else $data['t']['brkt'] = "Belum Ada Tindakan";
                if(isset($data['t']['surel_petugas'])) $data['t']['periksa'] = $data['t']['surel_petugas'];
                else $data['t']['periksa'] = "-";
                $data['t']['tle'] = date("d M Y", strtotime($data['t']['tl']));
                if(isset($data['t']['surel_petugas'])) $data['t']['hid'] = FALSE;
                else $data['t']['hid'] = TRUE;

                $this->load->view('login/data_v', $data);

            }elseif($tod == "edit"){
                $who = $this->input->get('who', TRUE);
                if(!isset($who))redirect("dashboard/data");
                if($who == "kk"){
                    $data['user'] = $this->loginm->getean('data_kk', array('id' => $id))[0];
                    $this->load->view('login/data_ek', $data);
                }elseif($who == "ak"){
                    $ida = $this->input->get('ida', TRUE);
                    $data['user'] = $this->loginm->getean('data_tanggung', array('id' => $ida, 'id_kk' => $id))[0];
                    if(!isset($ida))redirect("dashboard/data");
                    $this->load->view('login/data_ea', $data);
                }elseif($who == "tk"){
                    $idt = $this->loginm->getail('data_kk', array('id' => $id), 'id_tuju');
                    $data['user'] = $this->loginm->getean('tujuan', array('id' => $idt))[0];
                    $data['reg'] = $this->loginm->year('tujuan');
                    $this->load->view('login/data_et', $data);
                }else{
                    redirect("dashboard/data");
                }
            }else{
                redirect("dashboard/data");
            }
		}
    }

    public function tuju(){
        if(!$this->loginm->chksess()){
			redirect("login");
		}else{
            $tod = $this->input->get('todo', TRUE);
            if(!isset($tod))redirect("dashboard/tuju");
            if($tod == "edit"){
                $id = $this->input->get('id', TRUE);
                if(isset($id)){
                    $data['edit'] = TRUE;
                    $datas = $this->loginm->getean('tujuan', array('id' => $id));
                    $data['user'] = $datas[0];
                    $this->load->view('login/tuju_en', $data);
                }else{
                    redirect("dashboard/tuju");
                }
            }elseif($tod == "new"){
                $data['edit'] = FALSE;
                $this->load->view('login/tuju_en', $data);
            }else{
                redirect("dashboard/tuju");
            }
		}
    }

    public function user(){
        if(!$this->loginm->chksess()){
			redirect("login");
		}else{
            $tod = $this->input->get('todo', TRUE);
            if(!isset($tod))redirect("dashboard/user");
            if($tod == "view"){
                $sur = $this->input->get('usr', TRUE);
                $mail = $_SESSION['mail'];
                $this->load->library("safe");
                $id = $this->safe->dencrypt($sur, $mail);
                if(isset($id)){
                    $data['edit'] = TRUE;
                    $datas = $this->loginm->getean('pengguna', array('surel' => $id));
                    $data['user'] = $datas[0];
                    $this->load->view('login/user_n', $data);
                }else{
                    redirect("dashboard/user");
                }
            }elseif($tod == "new"){
                $data['edit'] = FALSE;
                $this->load->view('login/user_n', $data);
            }else{
                redirect("dashboard/user");
            }
		}
    }

}