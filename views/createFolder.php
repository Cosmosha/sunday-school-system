<?php

//
// ────────────────────────────────────────────────────────────────────────────── I ──────────
//   :::::: C R E A T E   I M A G E   F O L D E R : :  :   :    :     :        :          :
// ────────────────────────────────────────────────────────────────────────────────────────
//


class CreateFile{

    public $newPhoto;
    public $folderloation;
    public $picId;

    public function __construct($newPhoto, $folderloation, $picId)
    {
        $this->newPhoto = $newPhoto;
        $this->folderloation = $folderloation;
        $this->picId = $picId;
    }


    public function ImageFolder(){

        
        if (isset($_FILES[$this->newPhoto]["tmp_name"])) {
            # code...
        
            list($width, $height) = getimagesize($_FILES[$this->newPhoto]["tmp_name"]);
        
            $newWidth = 500;
            $newHeight = 500;
        
            /*=============================================
                Create folder for each Image
            =============================================*/
        
            $folder = $this->folderloation."".$this->picId;
            
            mkdir($folder, 0755);
        
            /*=============================================
            function depending on the image type
            =============================================*/
        
            if ($_FILES[$this->newPhoto]["type"] == "image/jpeg"){
                # code...
        
                /*=============================================
                Save Image inside a folder
                =============================================*/
        
                $randomNumber = mt_rand(100,999);
        
                $photo = $this->folderloation."".$this->picId."/".$randomNumber.".jpg";
        
                $Imagesrc = imagecreatefromjpeg($_FILES[$this->newPhoto]["tmp_name"]);
        
                $destination = imagecreatetruecolor($newWidth, $newHeight);
        
                imagecopyresized($destination, $Imagesrc, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        
                imagejpeg($destination, $photo);
        
            }
        
            if ($_FILES[$this->newPhoto]["type"] == "image/png") {
                # code...
        
                $randomNumber = mt_rand(100,999);
        
                $photo = $this->folderloation."".$this->picId."/".$randomNumber.".png";
        
                $Imagesrc = imagecreatefrompng($_FILES[$this->newPhoto]["tmp_name"]);
        
                $destination = imagecreatetruecolor($newWidth, $newHeight);
        
                imagecopyresized($destination, $Imagesrc, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        
                imagepng($destination, $photo);
        
            }
        
        }
    }

}