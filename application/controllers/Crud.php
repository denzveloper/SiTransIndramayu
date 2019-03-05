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
        if(!isset($tod))redirect("login");
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
            if(!isset($tod))redirect("login");
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
                            $cek1 = $this->loginm->chkean('pengguna', array('surel' => $mil));
                            if(!$cek1){
                                $cek2 = $this->loginm->updpro($pss, $data);

                                if($cek2){
                                    $msg[] = array('ico' => 'glyphicon glyphicon-floppy-saved', 'tit' => "Done!", 'txt' => "<i>Profile has been Update.</i>", 'typ' => 'success');
                                }else{
                                    $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>Profile not saved.</i>', 'typ' => 'danger');
                                }
                            }else{
                                $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>Email reserved.</i>', 'typ' => 'danger');
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
            if(!isset($tod))redirect("login");
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
                        $cek = $this->loginm->delete('pengguna', array('surel' => $tus));
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
            if(!isset($tod))redirect("login");
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

    public function artikel(){
        if(!$this->loginm->chksess()){
			redirect("login");
		}else{
            $tod = $this->input->get("todo", TRUE);
            $id = $this->input->get("id", TRUE);
            $mail = $_SESSION['mail'];
            if($tod == "new"){
                $this->form_validation->set_rules('title', 'Judul Artikel', 'required|max_length[60]');
                $this->form_validation->set_rules('artikel', 'Isi Artikel', 'required');
                
                if($this->form_validation->run() == TRUE){
                    $tit = $this->input->post('title', TRUE);
                    $art = $this->input->post('artikel');

                    //Configuration Updoad Photos
                    $config['upload_path'] = './data/img/kabar/';
                    $config['allowed_types'] = 'jpeg|png|gif'; //Pitcure Only
                    $config['max_size'] = '2048'; //2MB
                    $config['encrypt_name'] = TRUE;
                    $inm = null;
                    $this->load->library('upload', $config); //load library upload
                    if ($this->upload->do_upload('foto')){
                        $inm = $this->upload->data('file_name');
                    }
                    $date = date('Y-m-d H:i:s');
                    $data = array('judul' => $tit, 'timedate' => $date, 'pengguna' => $mail, 'konten' => $art, 'sampul' => $inm);

                    $cek1 = $this->loginm->addsm('kabar', $data);

                    if($cek1 != FALSE){
                        $msg[] = array('ico' => 'glyphicon glyphicon-floppy-saved', 'tit' => "Done!", 'txt' => "<i>News added.</i>", 'typ' => 'success');
                    }else{
                        $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>News not add.</i>', 'typ' => 'danger');
                    }
                }else{
                    $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Warning!", 'txt' => '<i>'.preg_replace("/(\n)+/m", '<br>', strip_tags(strip_tags(validation_errors()))).'</i>', 'typ' => 'warning');
                }
                
            }elseif($tod == "edit" && isset($id)){
                $this->form_validation->set_rules('title', 'Judul Artikel', 'required|max_length[60]');
                $this->form_validation->set_rules('artikel', 'Isi Artikel', 'required');
                
                if($this->form_validation->run() == TRUE){
                    $tit = $this->input->post('title', TRUE);
                    $art = $this->input->post('artikel');

                    //Configuration Updoad Photos
                    $config['upload_path'] = './data/img/kabar/';
                    $config['allowed_types'] = 'jpeg|png|gif';
                    $config['max_size'] = '2048'; //2MB
                    $config['encrypt_name'] = TRUE;
                    $inm = null;
                    $this->load->library('upload', $config); //load library upload
                    if ($this->upload->do_upload('foto')){
                        $tmp = $this->loginm->getail('kabar', array('id' => $id, 'pengguna' => $mail), 'sampul');
                        $inm = $this->upload->data('file_name');
                        if($tmp != 'default.png'){
                            unlink('./data/img/kabar/'.$tmp);
                        }
                        $data = array('judul' => $tit, 'konten' => $art, 'sampul' => $inm);
                    }else{
                        $data = array('judul' => $tit, 'konten' => $art);
                    }

                    $cek1 = $this->loginm->updt('kabar', array('id' => $id, 'pengguna' => $mail) ,$data);

                    if($cek1 != FALSE){
                        $msg[] = array('ico' => 'glyphicon glyphicon-floppy-saved', 'tit' => "Done!", 'txt' => "<i>News Updated.</i>", 'typ' => 'success');
                    }else{
                        $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>News cant update.</i>', 'typ' => 'danger');
                    }
                }else{
                    $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Warning!", 'txt' => '<i>'.preg_replace("/(\n)+/m", '<br>', strip_tags(strip_tags(validation_errors()))).'</i>', 'typ' => 'warning');
                }
                
            }elseif($tod == "delete" && isset($id)){
                $tmp = $this->loginm->getail('kabar', array('id' => $id, 'pengguna' => $mail), 'sampul');
                if($tmp != 'default.png'){
                    unlink('./data/img/kabar/'.$tmp);
                }
                $cek1 = $this->loginm->delete('kabar', array('id' => $id, 'pengguna' => $mail), TRUE);

                if($cek1 != FALSE){
                    $msg[] = array('ico' => 'glyphicon glyphicon-trash', 'tit' => "Done!", 'txt' => "<i>News Delete.</i>", 'typ' => 'warning');
                }else{
                    $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>News cant delete.</i>', 'typ' => 'danger');
                }
            }else{
                $msg[] = array('ico' => 'glyphicon glyphicon-remove', 'tit' => "Warning!", 'txt' => '<i>Unknown Parameter.</i>', 'typ' => 'warning');
            }
            $this->session->set_flashdata('info', $msg);
            redirect('dashboard/artikel');
        }
    }

    public function data(){
        if(!$this->loginm->chksess()){
			redirect("login");
		}else{
            $this->load->library('safe');
            $mail = $_SESSION['mail'];
            $tod = $this->input->get("todo", TRUE);
            $idk = $this->input->get("id", TRUE);
            $id = $this->safe->dencrypt($idk, $mail);
            if(!isset($tod))redirect("view/user");
            if($tod == "acpt"){
                $cek = $this->loginm->updt('data_kk', array('id' => $id), array('surel_petugas' => $mail));
                if($cek != FALSE){
                    $msg[] = array('ico' => 'glyphicon glyphicon-ok', 'tit' => "Done!", 'txt' => "<i>Keluarga telah tertandai dicek.</i>", 'typ' => 'success');
                }else{
                    $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>Keluarga Gagal ditandai dicek.</i>', 'typ' => 'danger');
                }
            }elseif($tod == "del"){
                $cek = $this->loginm->delete('data_kk', array('id' => $id));
                if($cek != FALSE){
                    $msg[] = array('ico' => 'glyphicon glyphicon-trash', 'tit' => "Done!", 'txt' => "<i>Place Added.</i>", 'typ' => 'success');
                }else{
                    $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>Place cannot insert.</i>', 'typ' => 'danger');
                }
            }elseif($tod == "go"){
                $cek = $this->loginm->updt('data_kk', array('id' => $id), array('berangkat' => 1));
                if($cek != FALSE){
                    $msg[] = array('ico' => 'glyphicon glyphicon-ok', 'tit' => "Done!", 'txt' => "<i>Keluarga telah ditandai berangkat.</i>", 'typ' => 'success');
                }else{
                    $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>Keluarga Gagal ditandai berangkat.</i>', 'typ' => 'danger');
                }
            }elseif($tod == "edit"){
                $who = $this->input->get("who", TRUE);
                if(!isset($who))redirect("view/user");
                if($who == "tk"){
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
                        $ceka = $this->loginm->chkean('data_kk', array('id' => $id, 'surel_petugas' => null, 'berangkat' => 0));

                        if($cek&&$ceka){
                            $idt = $this->loginm->getail('tujuan', $array, 'id');

                            $cek1 = $this->loginm->updt('data_kk', array('id' => $id), array('id_tuju' => $idt));
                            if($cek1 != FALSE){
                                $msg[] = array('ico' => 'glyphicon glyphicon-ok', 'tit' => "Done!", 'txt' => "<i>KK Update.</i>", 'typ' => 'success');
                            }else{
                                $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>KK failed update.</i>', 'typ' => 'danger');
                            }
                        }else{
                            $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>Place not registered or Mark as Final.</i>', 'typ' => 'danger');
                        }
                    }else{
                        $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Warning!", 'txt' => '<i>'.preg_replace("/(\n)+/m", '<br>', strip_tags(strip_tags(validation_errors()))).'</i>', 'typ' => 'warning');
                    }
                }elseif($who == "kk"){
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

                        $array = array('id_tuju' => $id, 'namakk' => $nam, 'alamat' => $add, 'desa' => $des, 'kecamatan' => $kec, 'kabupaten' => $kot, 'provinsi' => $pro, 'tmp_lh' => $tel, 'tl' => $tal, 'ttk' => $tak, 'pendidikan' => $pen, 'pekerjaan' => $pek, 'pendapatan' => $gaj, 'luastinggal' => $tnh);

                        //$cek = $this->loginm->chkean('data_kk', array('id' => $id));
                        $cek = $this->loginm->chkean('data_kk', array('id' => $id, 'surel_petugas' => null, 'berangkat' => 0));

                        if($cek){
                            $cek1 = $this->loginm->updt('data_kk', array('id' => $id), $array);
                            if($cek1 != FALSE){
                                $msg[] = array('ico' => 'glyphicon glyphicon-ok', 'tit' => "Done!", 'txt' => "<i>KK Update.</i>", 'typ' => 'success');
                            }else{
                                $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>KK failed update.</i>', 'typ' => 'danger');
                            }
                        }else{
                            $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>Tidak Diketahui.</i>', 'typ' => 'danger');
                        }
                    }else{
                        $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Warning!", 'txt' => '<i>'.preg_replace("/(\n)+/m", '<br>', strip_tags(strip_tags(validation_errors()))).'</i>', 'typ' => 'warning');
                    }
                }elseif($who == "ak"){
                    $this->form_validation->set_rules('name', 'Nama', 'required');
                    $this->form_validation->set_rules('umur', 'Usia', 'required');
                    $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
                    $this->form_validation->set_rules('hub', 'Hubungan Keluarga', 'required');
                    $this->form_validation->set_rules('agama', 'Agama', 'required');
                    $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
                    $this->form_validation->set_rules('kerja', 'Kerja', 'required');
                    if($this->form_validation->run() == TRUE){
                        $nam = $this->input->post("name", TRUE);
                        $umu = $this->input->post("umur", TRUE);
                        $jek = $this->input->post("jk", TRUE);
                        $hub = $this->input->post("hub", TRUE);
                        $ama = $this->input->post("agama", TRUE);
                        $pen = $this->input->post("pendidikan", TRUE);
                        $kja = $this->input->post("kerja", TRUE);
                        $ket = $this->input->post("ket", TRUE);

                        $array = array('nama' => $nam, 'umur' => $umu, 'jk' => $jek, 'hubungan' => $hub, 'agama' => $ama, 'pendidikan' => $pen, 'pekerjaan' => $kja, 'keterangan' => $ket);

                        $cek = $this->loginm->chkean('data_kk', array('id' => $id, 'surel_petugas' => null, 'berangkat' => 0));
                        $ceka = $this->loginm->chkean('data_tanggung', array('id' => $_GET['ida']));
                        if($cek&&$ceka){
                            $cek1 = $this->loginm->updt('data_tanggung', array('id' => $_GET['ida'], 'id_kk' => $id), $array);
                            if($cek1 != FALSE){
                                $msg[] = array('ico' => 'glyphicon glyphicon-ok', 'tit' => "Done!", 'txt' => "<i>Anggota keluarga diUpdate.</i>", 'typ' => 'success');
                            }else{
                                $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>Anggota keluarga gagal diUpdate.</i>', 'typ' => 'danger');
                            }
                        }else{
                            $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>Tidak Diketahui.</i>', 'typ' => 'danger');
                        }
                    }else{
                        $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Warning!", 'txt' => '<i>'.preg_replace("/(\n)+/m", '<br>', strip_tags(strip_tags(validation_errors()))).'</i>', 'typ' => 'warning');
                    }
                }else{
                    $msg[] = array('ico' => 'glyphicon glyphicon-remove', 'tit' => "Warning!", 'txt' => '<i>Unknown Parameter.</i>', 'typ' => 'warning');
                }
            }else{
                $msg[] = array('ico' => 'glyphicon glyphicon-remove', 'tit' => "Warning!", 'txt' => '<i>Unknown Parameter.</i>', 'typ' => 'warning');
            }
            $this->session->set_flashdata('info', $msg);
            redirect('dashboard/data');
        }
    }

    public function tuju(){
        if(!$this->loginm->chksess()){
			redirect("login");
		}else{
            $tod = $this->input->get("todo", TRUE);
            $id = $this->input->get('id', TRUE);
            if(!isset($tod))redirect("view/tuju");
            if($tod == "new"){
                $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|min_length[1]|max_length[127]');
                $this->form_validation->set_rules('kota', 'Kabupaten/Kota', 'required|min_length[1]|max_length[127]');
                $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|min_length[1]|max_length[127]');
                $this->form_validation->set_rules('tahun', 'Tahun berangkat', 'required|is_natural|exact_length[4]');
                if($this->form_validation->run() == TRUE){
                    $lok = $this->input->post('lokasi', TRUE);
                    $kab = $this->input->post('kota', TRUE);
                    $prov = $this->input->post('provinsi', TRUE);
                    $tahun = $this->input->post('tahun', TRUE);

                    $data = array('lok' => $lok, 'kab' => $kab, 'prov' => $prov, 'tahun' => $tahun);

                    $cek1 = $this->loginm->addsm('tujuan', $data);

                    if($cek1 != FALSE){
                        $msg[] = array('ico' => 'glyphicon glyphicon-floppy-saved', 'tit' => "Done!", 'txt' => "<i>Place Added.</i>", 'typ' => 'success');
                    }else{
                        $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>Place cannot insert.</i>', 'typ' => 'danger');
                    }
                }else{
                    $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Warning!", 'txt' => '<i>'.preg_replace("/(\n)+/m", '<br>', strip_tags(strip_tags(validation_errors()))).'</i>', 'typ' => 'warning');
                }
            }elseif($tod == "edit" && isset($id)){
                $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|min_length[1]|max_length[127]');
                $this->form_validation->set_rules('kota', 'Kabupaten/Kota', 'required|min_length[1]|max_length[127]');
                $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|min_length[1]|max_length[127]');
                $this->form_validation->set_rules('tahun', 'Tahun berangkat', 'required|is_natural|exact_length[4]');
                if($this->form_validation->run() == TRUE){
                    $lok = $this->input->post('lokasi', TRUE);
                    $kab = $this->input->post('kota', TRUE);
                    $prov = $this->input->post('provinsi', TRUE);
                    $tahun = $this->input->post('tahun', TRUE);

                    $data = array('lok' => $lok, 'kab' => $kab, 'prov' => $prov, 'tahun' => $tahun);
                    $cek = $this->loginm->chkean('tujuan', array('id' => $id));
                    if($cek){
                        $cek1 = $this->loginm->updt('tujuan', array('id' => $id) ,$data);

                        if($cek1 != FALSE){
                            $msg[] = array('ico' => 'glyphicon glyphicon-floppy-saved', 'tit' => "Done!", 'txt' => "<i>Place Update.</i>", 'typ' => 'success');
                        }else{
                            $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>Place cannot Update.</i>', 'typ' => 'danger');
                        }
                    }else{
                        $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>Parameter is unknown.</i>', 'typ' => 'danger');
                    }
                }else{
                    $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Warning!", 'txt' => '<i>'.preg_replace("/(\n)+/m", '<br>', strip_tags(strip_tags(validation_errors()))).'</i>', 'typ' => 'warning');
                }
            }else{
                $msg[] = array('ico' => 'glyphicon glyphicon-remove', 'tit' => "Warning!", 'txt' => '<i>Unknown Parameter.</i>', 'typ' => 'warning');
            }
            $this->session->set_flashdata('info', $msg);
            redirect('dashboard/tuju');
        }
    }

    public function user(){
        if(!$this->loginm->chksess()){
			redirect("login");
		}else{
            $tod = $this->input->get("todo", TRUE);
            if(!isset($tod))redirect("view/user");
            if($tod == "new"){
                $this->form_validation->set_rules('surel', 'Email', 'required|valid_email|max_length[128]');
                $this->form_validation->set_rules('fnam', 'First Name', 'required|min_length[1]|max_length[32]');
                $this->form_validation->set_rules('nip', 'NIP', 'required|is_natural');
                $this->form_validation->set_rules('pkg', 'Pangkat/Golongan', 'required');
                $this->form_validation->set_rules('jbt', 'Jabatan', 'required');
                if($this->form_validation->run() == TRUE){
                    $sur = $this->input->post('surel', TRUE);
                    $nip = $this->input->post('nip', TRUE);
                    $pkg = $this->input->post('pkg', TRUE);
                    $jbt = $this->input->post('jbt', TRUE);
                    $fnm = $this->input->post('fnam', TRUE);
                    $lnm = $this->input->post('lnam', TRUE);

                    $this->load->library('safe');
                    $snd = $this->safe->encrypt('12345');
                    $data = array('namadepan' => $fnm, 'namabelakang' => $lnm, 'surel' => $sur, 'nip' => $nip, 'pangkatgol' => $pkg, 'jabatan' => $jbt, 'sandi' => $snd);

                    $cek = $this->loginm->chkean('pengguna', array('surel' => $mil));
                    if(!$cek){
                        $cek1 = $this->loginm->addsm('pengguna', $data);

                        if($cek1 != FALSE){
                            $msg[] = array('ico' => 'glyphicon glyphicon-floppy-saved', 'tit' => "Done!", 'txt' => "<i>User added.</i>", 'typ' => 'success');
                        }else{
                            $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>User not add.</i>', 'typ' => 'danger');
                        }
                    }else{
                        $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Error!", 'txt' => '<i>Email reserved.</i>', 'typ' => 'danger');
                    }
                }else{
                    $msg[] = array('ico' => 'glyphicon glyphicon-info-sign', 'tit' => "Warning!", 'txt' => '<i>'.preg_replace("/(\n)+/m", '<br>', strip_tags(strip_tags(validation_errors()))).'</i>', 'typ' => 'warning');
                }
                
            }else{
                $msg[] = array('ico' => 'glyphicon glyphicon-remove', 'tit' => "Warning!", 'txt' => '<i>Unknown Parameter.</i>', 'typ' => 'warning');
            }
            $this->session->set_flashdata('info', $msg);
            redirect('dashboard/user');
        }
    }
}