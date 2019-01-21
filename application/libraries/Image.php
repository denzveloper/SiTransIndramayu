<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image {
    function compress($source){
        $info = getimagesize($source);
        $quality = 75;

        if ($info['mime'] == 'image/jpeg') 
            $image = imagecreatefromjpeg($source);
    
        elseif ($info['mime'] == 'image/gif') 
            $image = imagecreatefromgif($source);
    
        elseif ($info['mime'] == 'image/png') 
            $image = imagecreatefrompng($source);


        ob_start();
        imagejpeg($image, NULL, $quality);
        $imagedata = ob_get_contents();
        ob_end_clean();

        return $imagedata;
    }

    function show($url = "assets/img/logo/index.png"){
        if($url != "assets/img/logo/index.png" && file_exists($url)){
            //Tambah agar tidak sensitif dengan huruf Kapital dan kecil
                $img = $this->compress($url);
        }elseif(!file_exists($url)){
            $img = file_get_contents(base_url("/assets/img/default.png"));
        }else{
            $img = file_get_contents(base_url($url));
        }
        $img = base64_encode($img);
        return "data:image;base64,$img";
    }
}