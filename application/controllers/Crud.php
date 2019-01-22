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

    }

    public function registers(){

    }

    public function registert(){
        
    }

    public function home(){
        if(!$this->loginm->chksess()){
			redirect("login");
		}else{
            $tod = $this->input->get("todo", TRUE);

            if($tod = "delete"){
                $id = $this->input->get("id", TRUE);
                $name = $this->loginm->getail('home_img', array('id' => $id), 'name');
                //exit;
                if(isset($id) && !empty($name)){
                    if($name != "default.png"){
                        unlink('./data/img/home/'.$name);
                    }
                    $cek = $this->loginm->delete('home_img', array('id' => $id));
                    if($cek != FALSE){
                        $msg[] = array('ico' => 'glyphicon glyphicon-upload', 'tit' => "Done!", 'txt' => "<i>Image $name deleted.</i>", 'typ' => 'sucess');
                    }else{
                        $msg[] = array('ico' => 'glyphicon glyphicon-remove', 'tit' => "Error!", 'txt' => '<i>Image cannot deleted.</i>', 'typ' => 'danger');
                    }
                }else{
                    $msg[] = array('ico' => 'glyphicon glyphicon-remove', 'tit' => "Warning!", 'txt' => '<i>variable not implemented.</i>', 'typ' => 'warning');
                }
            }else{
                $msg[] = array('ico' => 'glyphicon glyphicon-remove', 'tit' => "Warning!", 'txt' => '<i>Unknown Parameter.</i>', 'typ' => 'warning');
            }
        }
        $this->session->set_flashdata('info', $msg);
        redirect('dashboard/conf');
    }
}