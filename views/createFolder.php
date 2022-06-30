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


    public function ImageCreateFolder(){
        
        if (isset($this->newPhoto["tmp_name"])) {
            # code...
        
            list($width, $height) = getimagesize($this->newPhoto["tmp_name"]);
        
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
        
            if ($this->newPhoto["type"] == "image/jpeg"){
                # code...
        
                /*=============================================
                Save Image inside a folder
                =============================================*/
        
                $randomNumber = mt_rand(100,999);
        
                $photo = $this->folderloation."".$this->picId."/".$randomNumber.".jpg";
        
                $Imagesrc = imagecreatefromjpeg($this->newPhoto["tmp_name"]);
        
                $destination = imagecreatetruecolor($newWidth, $newHeight);
        
                imagecopyresized($destination, $Imagesrc, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        
                imagejpeg($destination, $photo);
        
            }
        
            if ($this->newPhoto["type"] == "image/png") {
                # code...
        
                $randomNumber = mt_rand(100,999);
        
                $photo = $this->folderloation."".$this->picId."/".$randomNumber.".png";
        
                $Imagesrc = imagecreatefrompng($this->newPhoto["tmp_name"]);

                $dsting = imagecreate($newWidth, $newHeight);
    
                $destination = imagecreatetruecolor($newWidth, $newHeight);
    
                imagecopyresized($destination, $Imagesrc, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                imagepng($destination, $photo, 0);
        
            }

            return $photo;
        
        }
    }

    

}