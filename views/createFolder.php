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
    public $photo;


    public function __construct($newPhoto, $folderloation, $picId)
    {
        $this->newPhoto = $newPhoto;
        $this->folderloation = $folderloation;
        $this->picId = $picId;
    }


    public function ImageCreateFolder(){
        
        if (isset($this->newPhoto["tmp_name"])) {
            # code...
        
            $photo = "";
            
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

                /*We save the image in the folder*/

                $randomNumber = mt_rand(100,999);
                
                $photo = $this->folderloation."".$this->picId."/".$randomNumber.".png";
                
                $srcImage = imagecreatefrompng($this->newPhoto["tmp_name"]);
                
                $destination = imagecreatetruecolor($newWidth, $newHeight);

                imagecopyresized($destination, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                imagepng($destination, $photo);
            }

            return $photo;
        
        }
    }



    public function ImageEditFolder(){

       $photo = $this->photo;

       
        if(isset($this->newPhoto["tmp_name"]) && !empty($this->newPhoto["tmp_name"])){

            list($width, $height) = getimagesize($this->newPhoto["tmp_name"]);
            
            $newWidth = 500;
            $newHeight = 500;

            /*=============================================
            Let's create the folder for each user
            =============================================*/

            $folder = $this->folderloation."".$this->picId;

            /*=============================================
            we ask first if there's an existing image in the database
            =============================================*/

            try {
                //code...
                
                if (!empty($photo)){
                    
                    unlink($photo);

                }else{

                    mkdir($folder, 0755);

                }
            } catch (\Throwable $th) {
                //throw $th;
            }

            /*=============================================
            PHP functions depending on the image
            =============================================*/

            if($this->newPhoto["type"] == "image/jpeg"){

                /*We save the image in the folder*/

                $randomNumber = mt_rand(100,999);
                
                $photo = $this->folderloation."".$this->picId."/".$randomNumber.".jpg";
                
                $srcImage = imagecreatefromjpeg($this->newPhoto["tmp_name"]);
                
                $destination = imagecreatetruecolor($newWidth, $newHeight);

                imagecopyresized($destination, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                imagejpeg($destination, $photo);

            }
            
            if ($this->newPhoto["type"] == "image/png") {

                /*We save the image in the folder*/

                $randomNumber = mt_rand(100,999);
                
                $photo = $this->folderloation."".$this->picId."/".$randomNumber.".png";
                
                $srcImage = imagecreatefrompng($this->newPhoto["tmp_name"]);
                
                $destination = imagecreatetruecolor($newWidth, $newHeight);

                imagecopyresampled($destination, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                imagepng($destination, $photo);
            }

            return $photo;

        }


    }

    

}