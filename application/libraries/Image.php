<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image {
    function compress($source){
        $info = getimagesize($source);
        $quality = 70;

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

        return base64_encode($imagedata);
    }

    function show($url = "assets/img/logo/index.png"){
        $img = base64_encode(file_get_contents(base_url($url)));
        if($url != "assets/img/logo/index.png"){

            //Tambah gambar "No Image" jika gak ada berkas gambar yang dituju
            //Tambah agar tidak sensitif dengan huruf Kapital dan kecil

            $img = $this->compress($url);
        }
        return "data:image;base64,$img";
    }
}