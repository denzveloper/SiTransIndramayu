<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image {
    function compress($source){
        $info = getimagesize($source);
        $destination = "cache/".rand(10000,99999)."jpeg";
        $quality = 20;

        if ($info['mime'] == 'image/jpeg') 
            $image = imagecreatefromjpeg($source);
    
        elseif ($info['mime'] == 'image/gif') 
            $image = imagecreatefromgif($source);
    
        elseif ($info['mime'] == 'image/png') 
            $image = imagecreatefrompng($source);
    
        imagejpeg($image, $destination, $quality);
    
        return $destination;
    }

    function show($url = "assets/img/logo/index.png"){
        $img = base64_encode(file_get_contents(base_url($url)));
        if($url != "assets/img/logo/index.png"){
            //$url = "data/img/".$url;
            $imgc = $this->compress($url);
            $img = base64_encode(file_get_contents(base_url($imgc)));
            unlink($imgc);
        }
        return "data:image;base64,$img";
    }
}