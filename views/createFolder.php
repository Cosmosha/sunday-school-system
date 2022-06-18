<?php

//
// ────────────────────────────────────────────────────────────────────────────── I ──────────
//   :::::: C R E A T E   I M A G E   F O L D E R : :  :   :    :     :        :          :
// ────────────────────────────────────────────────────────────────────────────────────────
//


class CreateFile{

    static public function ImageFolder($newPhoto, $folderloation, $picId){

        if (isset($_FILES[$newPhoto]["tmp_name"])) {
            # code...
        
            list($width, $height) = getimagesize($_FILES[$newPhoto]["tmp_name"]);
        
            $newWidth = 500;
            $newHeight = 500;
        
            /*=============================================
                Create folder for each Image
            =============================================*/
        
            $folder = $folderloation.$picId;
            
            mkdir($folder, 0755);
        
            /*=============================================
            function depending on the image type
            =============================================*/
        
            if ($_FILES[$newPhoto]["type"] == "image/jpeg"){
                # code...
        
                /*=============================================
                Save Image inside a folder
                =============================================*/
        
                $randomNumber = mt_rand(100,999);
        
                $photo = $folderloation.$picId."/".$randomNumber.".jpg";
        
                $Imagesrc = imagecreatefromjpeg($_FILES[$newPhoto]["tmp_name"]);
        
                $destination = imagecreatetruecolor($newWidth, $newHeight);
        
                imagecopyresized($destination, $Imagesrc, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        
                imagejpeg($destination, $photo);
        
            }
        
            if ($_FILES["newPhoto"]["type"] == "image/png") {
                # code...
        
                $randomNumber = mt_rand(100,999);
        
                $photo = $folderloation.$picId."/".$randomNumber.".png";
        
                $Imagesrc = imagecreatefrompng($_FILES[$newPhoto]["tmp_name"]);
        
                $destination = imagecreatetruecolor($newWidth, $newHeight);
        
                imagecopyresized($destination, $Imagesrc, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        
                imagepng($destination, $photo);
        
            }
        
        }
    }

}