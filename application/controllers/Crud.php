<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //Must to Load!
        $this->load->library('session');
        //load model loginm
        $this->load->model('loginm');
    }
    
    public function registerf(){
        $tod = $this->input->get("todo", TRUE);

            if($tod == "update"){
                $gto = $this->input->get("is", TRUE);

                if($gto == "gloc"){
                    $gto1 = $this->input->get("loc", TRUE);

                    echo "<option selected=\"selected\" disabled>--Select Data First!--</option>";
                    if($gto1 == "gpro"){
                        $tah = $this->input->post("th",TRUE);
                        $list = $this->loginm->area(array('tahun' => $tah),'prov');
                        
                        if($list != FALSE){

                            foreach($list as $lst){
                                echo $lst;
                            }
                        }
                    }
                    if($gto1 == "gkab"){
                        $tah = $this->input->post("th",TRUE);
                        $pro = $this->input->post("pr",TRUE);
                        $list = $this->loginm->area(array('tahun' => $tah, 'prov' => $pro), 'kab');
                        
                        if($list != FALSE){

                            foreach($list as $lst){
                                echo $lst;
                            }
                        }
                    }
                    if($gto1 == "gloc"){
                        $tah = $this->input->post("th",TRUE);
                        $pro = $this->input->post("pr",TRUE);
                        $kab = $this->input->post("ka",TRUE);
                        $list = $this->loginm->area(array('tahun' => $tah, 'prov' => $pro, 'kab' => $kab), 'lok');
                        
                        if($list != FALSE){

                            foreach($list as $lst){
                                echo $lst;
                            }
                        }
                    }
                }else{
                    echo "ERROR GETTING DATA";
                }
            }
            else{
                $msg[] = array('ico' => 'glyphicon glyphicon-remove', 'tit' => "Warning!", 'txt' => '<i>Unknown Parameter.</i>', 'typ' => 'warning');
                $this->session->set_flashdata('info', $msg);
                redirect('register/first');
            }
    }

    public function registers(){

    }

    public function registert(){
        
    }

    public function profil(){
        if(!$this->loginm->chksess()){
			redirect("login");
		}else{
            $tod = $this->input->get("todo", TRUE);

            if($tod == "update"){
                $gto = $this->input->get("is", TRUE);

                if($gto == "user"){
                    $this->form_validation->set_rules('surel', 'Email', 'required|valid_email|max_length[128]');
                    $this->form_validation->set_rules('fnam', 'First Name', 'required|min_length[1]|max_length[32]');
                    $this->form_validation->set_rules('nip', 'NIP', 'required|is_natural');
                    $this->form_validation->set_rules('pkg', 'Pangkat/Golongan', 'required');
                    $this->form_validation->set_rules('jbt', 'Jabatan', 'required');
                    $this->form_validation->set_rules('pass', 'Password', 'required');

                    if($this->form_validation->run() == TRUE){
                        $mil = $this->input->post("surel", TRUE);
                        $fnm = $this->input->post("fnam", TRUE);
                        $lnm = $this->input->post("lnam", TRUE);
                        $nip = $this->input->post("nip", TRUE);
                        $pkg = $this->input->post("pkg", TRUE);
                        $jbt = $this->input->post("jbt", TRUE);
                        $pss = $this->input->post("pass", TRUE);

                        $data = array('namadepan' => $fnm, 'namabelakang' => $lnm, 'surel' => $mil, 'nip' => $nip, 'pangkatgol' => $pkg, 'jabatan' => $jbt);

                        $mail = $_SESSION['mail'];
                        $cek = $this->loginm->login($mail, $pss);
                        
                        if($cek != FALSE){
                            $cek1 = $this->loginm->updpro($pss, $data);

                            if($cek1){
                                $msg[] = array('ico' => 'glyphicon glyphicon-floppy-saved', 'tit' => "Done!", 'txt' => "<i>Profile has been Update.</i>", 'typ' => 'success');
                            }else{
                                $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>Profile not saved.</i>', 'typ' => 'danger');
                            }
                        }else{
                            $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>Wrong Password.</i>', 'typ' => 'danger');
                        }

                    }else{
                        $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Warning!", 'txt' => '<i>'.preg_replace("/(\n)+/m", '<br>', strip_tags(strip_tags(validation_errors()))).'</i>', 'typ' => 'warning');
                    }
                    $this->session->set_flashdata('info', $msg);
                    redirect('dashboard/profil');
                }elseif($gto == "pass"){
                    $this->form_validation->set_rules('pasf', 'Password', 'required|min_length[4]');
                    $this->form_validation->set_rules('pass', 'Password', 'required|min_length[4]');
                    $this->form_validation->set_rules('pasl', 'Password', 'required');
                    if($this->form_validation->run() == TRUE){
                        $paf = $this->input->post("pasf", TRUE);
                        $pas = $this->input->post("pass", TRUE);
                        $psl = $this->input->post("pasl", TRUE);
                        
                        $mail = $_SESSION['mail'];
                        $cek = $this->loginm->login($mail, $psl);
                        if($cek != FALSE && $paf == $pas){
                        
                            $cek1 = $this->loginm->updsan($psl, $paf);
                            
                            if($cek1 != FALSE){
                                $msg[] = array('ico' => 'glyphicon glyphicon-floppy-saved', 'tit' => "Done!", 'txt' => "<i>Password has been Update.</i>", 'typ' => 'success');
                            }else{
                                $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>Password failed saved.</i>', 'typ' => 'danger');
                            }
                        }else{
                            $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>Wrong Password.</i>', 'typ' => 'danger');
                        }
                    }else{
                        $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Warning!", 'txt' => '<i>'.preg_replace("/(\n)+/m", '<br>', strip_tags(strip_tags(validation_errors()))).'</i>', 'typ' => 'warning');
                    }
                    $this->session->set_flashdata('info', $msg);
                    redirect('dashboard/sandi');
                }else{
                    $msg[] = array('ico' => 'glyphicon glyphicon-remove', 'tit' => "Warning!", 'txt' => '<i>Wrong Parameter.</i>', 'typ' => 'warning');
                }
            }else{
                $msg[] = array('ico' => 'glyphicon glyphicon-remove', 'tit' => "Warning!", 'txt' => '<i>Unknown Parameter.</i>', 'typ' => 'warning');
            }
            $this->session->set_flashdata('info', $msg);
            redirect('dashboard');
        }
    }

    public function usrtodo(){
        if(!$this->loginm->chksess()||$_SESSION['lvl'] != 0){
			redirect("login");
		}else{
            $this->load->library("safe");
            $mail = $_SESSION['mail'];
            $tod = $this->input->get("todo", TRUE);
            $usr = $this->input->get("usr", TRUE);
            if(isset($usr)){
                $tus = $this->safe->dencrypt($usr, $mail);
                $name = $this->loginm->getail('pengguna', array('surel' => $tus), 'namadepan')." ".$this->loginm->getail('pengguna', array('surel' => $tus), 'namabelakang');
                $nama = $this->loginm->singkat($name);
                $dis = $this->loginm->getail('pengguna', array('surel' => $tus), 'block');
                if($tod == "block"){
                    $cek = $this->loginm->blockus($tus);
                    
                    if($cek != FALSE){
                        if($dis == 0){
                            $msg[] = array('ico' => 'ti-lock', 'tit' => "Done!", 'txt' => "<i>User $nama Blocked.</i>", 'typ' => 'success');
                        }else{
                            $msg[] = array('ico' => 'ti-unlock', 'tit' => "Done!", 'txt' => "<i>User $nama Unblocked.</i>", 'typ' => 'success');
                        }
                    }else{
                        if($dis == 0){
                            $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => "<i>Cant Blocking user $nama.</i>", 'typ' => 'danger');
                        }else{
                            $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => "<i>Cant Unblocking user $nama.</i>", 'typ' => 'danger');
                        }
                    }
                }elseif($tod == "delete"){
                    if($dis){
                        $cek = $this->loginm->delete('user', array('surel' => $tus));
                        if($cek != FALSE){
                            $msg[] = array('ico' => 'ti-trash', 'tit' => "Done!", 'txt' => "<i>User $nama Deleted.</i>", 'typ' => 'success');
                        }else{
                            $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => "<i>Cant Delete $nama.</i>", 'typ' => 'danger');
                        }
                    }else{
                        $msg[] = array('ico' => 'ti-na', 'tit' => "Error!", 'txt' => "<i>Cant Delete $nama. Block first!</i>", 'typ' => 'danger');
                    }
                }else{
                    $msg[] = array('ico' => 'glyphicon glyphicon-remove', 'tit' => "Warning!", 'txt' => '<i>Unknown Parameter.</i>', 'typ' => 'warning');
                }
            }else{
                $msg[] = array('ico' => 'glyphicon glyphicon-remove', 'tit' => "Warning!", 'txt' => '<i>Unknown Parameter.</i>', 'typ' => 'warning');
            }
            $this->session->set_flashdata('info', $msg);
            redirect('dashboard/user');
        }
    }

    public function home(){
        if(!$this->loginm->chksess()){
			redirect("login");
		}else{
            $tod = $this->input->get("todo", TRUE);

            if($tod == "delete"){
                $id = $this->input->get("id", TRUE);
                $name = $this->loginm->getail('home_img', array('id' => $id), 'name');
                //exit;
                if(isset($id) && !empty($name)){
                    if($name != "default.png"){
                        unlink('./data/img/home/'.$name);
                    }
                    $cek = $this->loginm->delete('home_img', array('id' => $id));
                    if($cek != FALSE){
                        $msg[] = array('ico' => 'glyphicon glyphicon-trash', 'tit' => "Done!", 'txt' => "<i>Image $name deleted.</i>", 'typ' => 'success');
                    }else{
                        $msg[] = array('ico' => 'glyphicon glyphicon-remove', 'tit' => "Error!", 'txt' => '<i>Image cannot deleted.</i>', 'typ' => 'danger');
                    }
                }else{
                    $msg[] = array('ico' => 'glyphicon glyphicon-remove', 'tit' => "Warning!", 'txt' => '<i>Variable not implemented.</i>', 'typ' => 'warning');
                }
            }elseif($tod == "home"){
                $this->form_validation->set_rules('title', 'Page Title', 'required|alpha_dash|xss_clean');
                $this->form_validation->set_rules('artikel', 'Content', 'required');
                if($this->form_validation->run() == TRUE){
                    $ttl = $this->input->post("title", TRUE);
                    $cnt = $this->input->post("artikel", FALSE);

                    $array = array('title' => $ttl, 'text' => $cnt);
                    $cek = $this->loginm->updt('homepage', array('id' => '0'), $array);
                    if($cek){
                        $msg[] = array('ico' => 'glyphicon glyphicon-floppy-saved', 'tit' => "Done!", 'txt' => "<i>Homepage has been Update.</i>", 'typ' => 'success');
                    }else{
                        $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>Homepage failed saved.</i>', 'typ' => 'danger');
                    }

                    if(!empty($_FILES['images'])){
                        //Configuration Updoad Photos
                        $config['upload_path'] = './data/img/home/'; //On "userpic" upload
                        $config['allowed_types'] = 'jpe|jpg|jpeg|png|webp|gif';
                        $config['max_size'] = '2048';
                        $config['encrypt_name'] = TRUE;
                            
                        $files = $_FILES;

                        $cpt = count($_FILES['images']['name']);

                        for($i=0; $i<$cpt; $i++){           
                            $_FILES['userfile']['name']= $files['images']['name'][$i];
                            $_FILES['userfile']['type']= $files['images']['type'][$i];
                            $name = $files['images']['name'][$i];
                            $_FILES['userfile']['tmp_name']= $files['images']['tmp_name'][$i];
                            $_FILES['userfile']['error']= $files['images']['error'][$i];
                            $_FILES['userfile']['size']= $files['images']['size'][$i];    

                            $this->load->library('upload', $config);


                            if($cek1 = $this->upload->do_upload('userfile')){
                                $fnm = $this->upload->data('file_name');
                                chmod($config['upload_path'].$fnm, 0777);

                                $cek2 = $this->loginm->addsm('home_img', array('name' => $fnm));

                                if($cek1 && $cek2){
                                    $msg[] = array('ico' => 'glyphicon glyphicon-upload', 'tit' => "Done!", 'txt' => "<i>Image $name uploaded.</i>", 'typ' => 'success');
                                }else{
                                    $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Warning!", 'txt' => '<i>Image Can not Saved.</i>', 'typ' => 'warning');
                                }
                            }else{
                                $msg[] = array('ico' => 'glyphicon glyphicon-remove', 'tit' => "Error!", 'txt' => '<i>'.$this->upload->display_errors()."</i>", 'typ' => 'warning');
                            }
                        }
                    }
                }else{
                    $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Warning!", 'txt' => '<i>'.preg_replace("/(\n)+/m", '<br>', strip_tags(strip_tags(validation_errors()))).'</i>', 'typ' => 'warning');
                }
            }elseif($tod == "sign"){
                $this->form_validation->set_rules('namf', 'Nama Kepala', 'required');
                $this->form_validation->set_rules('nik', 'NIK Kepala', 'required|numeric');

                if($this->form_validation->run() == TRUE){
                    $nam = $this->input->post("namf", TRUE);
                    $nik = $this->input->post("nik", FALSE);
                    $array = array('nama_kepala' => $nam, 'nik' => $nik);
                    $cek = $this->loginm->updt('kepaladinas', array('id' => '0'), $array);
                    if($cek){
                        $msg[] = array('ico' => 'glyphicon glyphicon-floppy-saved', 'tit' => "Done!", 'txt' => "<i>Sign has been Update.</i>", 'typ' => 'success');
                    }else{
                        $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>Sign failed saved.</i>', 'typ' => 'danger');
                    }
                }else{
                    $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Warning!", 'txt' => '<i>'.preg_replace("/(\n)+/m", '<br>', strip_tags(strip_tags(validation_errors()))).'</i>', 'typ' => 'warning');
                }
            }else{
                $msg[] = array('ico' => 'glyphicon glyphicon-remove', 'tit' => "Warning!", 'txt' => '<i>Unknown Parameter.</i>', 'typ' => 'warning');
            }
        }
        $this->session->set_flashdata('info', $msg);
        redirect('dashboard/conf');
    }
}