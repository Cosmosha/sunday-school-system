<?php


class ControllerTeacher{


    
    //
    // ─── SHOW TEACHER LIST ───────────────────────────────────────────────────────
    //

    public static function ctrShowTeacherList($item, $value){

        $table = "teacher";

        $result = ModelTeachers::mdlShowTeacher($table,$item,$value);

        return $result;

    }


    //
    // ─── ADD TEACHERS ───────────────────────────────────────────────────────────────
    //

    static public function ctrAddTeacher(){

        if (isset($_POST["fname"])) {
            # code...

            if (!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["tgender"]) && !empty($_POST["temail"]) && !empty($_POST["tphone"]) 
                && !empty($_POST["toccupation"]) && !empty($_POST["tdoj"]) && !empty($_POST["tclassname"]) && !empty($_POST["tprofile"])  && !empty($_POST["tstatus"])) {
                # code...

                $fname = trim($_POST["fname"]);
                $lname = trim($_POST["lname"]);
                $temail = trim($_POST["temail"]);
                $tphone = $_POST["tphone"];
                $tgender = $_POST["tgender"];
                $toccupation = $_POST["toccupation"];
                $tclass = $_POST["tclassname"];
                $tdoj = $_POST["tdoj"];
                $tprofile = $_POST["tprofile"];
                $tstatus = $_POST["tstatus"];
                
                
                if (filter_var($temail, FILTER_VALIDATE_EMAIL)  && preg_match('/^[a-zA-Z ]+$/', $fname) && preg_match('/^[a-zA-Z ]+$/', $lname) 
                     && preg_match('/^[0-9]+$/', $tphone)) {
                    # code...

                    $table = "teacher";
                    $item = "";
                    $value = "";

                    //GET Teacher Data from DATABASE
                    $teacher = ModelTeachers::mdlShowTeacher($table, $item, $value);

                    for ($r=0; $r <count($teacher) ; $r++) { 
                        # code...

                       //Check if Teacher Email or Phone Provider by User Alredy Exit
                        if ($teacher[$r]["teacher_email"]== $temail) {
                            # code...

                            $email = $teacher[$r]["teacher_email"];

                        }elseif ($teacher[$r]["teacher_phone"]== $tphone) {
                            # code...
                            $phone = $teacher[$r]["teacher_phone"];

                        }
                    }
                    

                    if ($tphone != $phone && $temail != $email) {
                        # code...

                         $tphoto = "";

                        //
                        // CREATE FOLDER FOR IMAGE FILES
                        //
    
                        if (isset($_FILES["newPhoto"]["tmp_name"])) {
                            # code...
    
                            list($width, $height) = getimagesize($_FILES["newPhoto"]["tmp_name"]);
    
                            $newWidth = 500;
                            $newHeight = 500;
    
                             /*=============================================
                                 Create folder for each Image
                             =============================================*/
    
                             $folder = "views/img/teachers/".$tphone;
                             
                             mkdir($folder, 0755);
    
                            /*=============================================
                              function depending on the image type
                             =============================================*/
    
                            if ($_FILES["newPhoto"]["type"] == "image/jpeg"){
                                # code...
    
                                /*=============================================
                                 Save Image inside a folder
                                 =============================================*/
    
                                $randomNumber = mt_rand(100,999);
    
                                $tphoto = "views/img/teachers/".$tphone."/".$randomNumber.".jpg";
    
                                $Imagesrc = imagecreatefromjpeg($_FILES["newPhoto"]["tmp_name"]);
    
                                $destination = imagecreatetruecolor($newWidth, $newHeight);
    
                                imagecopyresized($destination, $Imagesrc, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    
                                imagejpeg($destination, $tphoto);
    
                            }
    
                            if ($_FILES["newPhoto"]["type"] == "image/png") {
                                # code...
    
                                $randomNumber = mt_rand(100,999);
    
                                $tphoto = "views/img/teachers/".$tphone."/".$randomNumber.".png";
    
                                $Imagesrc = imagecreatefrompng($_FILES["newPhoto"]["tmp_name"]);
    
                                $destination = imagecreatetruecolor($newWidth, $newHeight);
    
                                imagecopyresized($destination, $Imagesrc, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    
                                imagepng($destination, $tphoto);
    
                            }
    
                        }

                        $doj = date('Y-m-d', strtotime($tdoj));
                   
                        $data = array('teacher_firstname' => $fname, 
                        'teacher_lastname' => $lname,
                        'teacher_gender' => $tgender,
                        'teacher_email' => $temail,
                        'teacher_phone' => $tphone,
                        'teacher_occupation' => $toccupation,
                        'class_id' => $tclass,
                        'teacher_doj' => $doj,
                        'teacher_photo' => $tphoto,
                        'status_id'=>$tstatus,
                        'profile_id'=>$tprofile,
                        'church_id' => $_SESSION["churchid"]);

                         var_dump($data);

                         $result = ModelTeachers::mdlAddTeachers($table, $data);

                        if ($result == "ok") {
                            # code...

                            SweetAlert::alertSaved();

                        }else {
                            # code...

                            print_r("Oops! Server Insert Error!");
                        }

                    }else {
                        # code...

                        SweetAlert::alertDuplicateItem();
                    }

                }else {
                    # code...

                    SweetAlert::alertInvalidChar();
                }

           }else {
               # code...

               SweetAlert::alertErrorFilelds();
           }

        }


    }



    //
    // ─── EDIT TEACHER ───────────────────────────────────────────────────────────────
    //

    static public function ctrEditTeacher(){


        if (isset($_POST["editfname"])) {
            # code...

            if (!empty($_POST["editfname"]) && !empty($_POST["editlname"]) && !empty($_POST["editgender"]) && !empty($_POST["editemail"]) 
                 && !empty($_POST["editoccupation"]) && !empty($_POST["editphone"]) && !empty($_POST["editclassroom"]) && !empty($_POST["editdoj"]) && !empty($_POST["editprofile"]) && !empty($_POST["editstatus"]) ) {
                # code...

                // var_dump($_POST);

                $editfname = trim($_POST["editfname"]);
                $editlname = trim($_POST["editlname"]);
                $editemail = trim($_POST["editemail"]);
                $editphone = $_POST["editphone"];
                $editgender = $_POST["editgender"];
                $editoccupation = $_POST["editoccupation"];
                $editclassroom = $_POST["editclassroom"];
                $editdoj = $_POST["editdoj"];
                $editprofile = $_POST["editprofile"];
                $editstatus = $_POST["editstatus"];


                if (filter_var($editemail, FILTER_VALIDATE_EMAIL)  && preg_match('/^[a-zA-Z ]+$/', $editfname) && preg_match('/^[a-zA-Z ]+$/', $editlname) 
                     && preg_match('/^[0-9]+$/', $editphone)) {

                    $church_id = $_SESSION["churchid"];
                    $table = "teacher";
                    $item = "";
                    $value = "";


                    //GET All Teacher Data from DATABASE
                    $teacher = ModelTeachers::mdlShowTeacher($table, $item, $value);


                    for ($r=0; $r <count($teacher) ; $r++) { 
                        # code...
                        if ($teacher[$r]["teacher_phone"] == $editphone) {
                            # code...
                            $phone = $teacher[$r]["teacher_phone"];

                            $value1 = $phone;
                            $item1 = "teacher_phone";

                            //GET input Teacher Data From Database
                            $result = ModelTeachers::mdlShowTeacher($table, $item1, $value1);

                         } 
                    }
                   

                    if (!empty($phone) && $result["teacher_id"] != $_POST["idTeacher"]) {
                        # code...
                        SweetAlert::alertDuplicateItem();

                    }else {
                        # code...

                           /*=============================================
                                 VALIDATE PHOTO IMAGES
                             =============================================*/

                         $photo = $_POST["currentPic"];
                        
                        if (isset($_FILES["editPhoto"]["tmp_name"]) && !empty($_FILES["editPhoto"] ["tmp_name"])) {
                            # code...
                            
                            list($width, $height) = getimagesize($_FILES["editPhoto"]["tmp_name"]);

                            $newWidth = 500;
                            $newHeight = 500;

                           
                            /*=============================================
                                Create folder for each Image
                            =============================================*/

                                $folder = "views/img/teachers/".$editphone;

                            /*=============================================
                             Check If there's an existing image from database
                             =============================================*/

                             if (!empty($_POST["currentPic"])) {
                                 # code...

                                unlink($_POST["currentPic"]);

                             }else {
                                 # code...
                                
                                mkdir($folder, 0755);

                             }

                              /*=============================================
                              function depending on the image type
                             =============================================*/
    
                            if ($_FILES["editPhoto"]["type"] == "image/jpeg"){
                                # code...
    
                                /*=============================================
                                 Save Image inside a folder
                                 =============================================*/
    
                                $randomNumber = mt_rand(100,999);
    
                                $photo = "views/img/teachers/".$editphone."/".$randomNumber.".jpg";
    
                                $Imagesrc = imagecreatefromjpeg($_FILES["editPhoto"]["tmp_name"]);
    
                                $destination = imagecreatetruecolor($newWidth, $newHeight);
    
                                imagecopyresized($destination, $Imagesrc, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    
                                imagejpeg($destination, $photo);
    
                            }
    
                            if ($_FILES["newPhoto"]["type"] == "image/png") {
                                # code...
    
                                $randomNumber = mt_rand(100,999);
    
                                $photo = "views/img/teachers/".$editphone."/".$randomNumber.".png";
    
                                $Imagesrc = imagecreatefrompng($_FILES["editPhoto"]["tmp_name"]);
    
                                $destination = imagecreatetruecolor($newWidth, $newHeight);
    
                                imagecopyresized($destination, $Imagesrc, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    
                                imagepng($destination, $photo);
    
                            }

                        }

                        $doj = date('Y-m-d', strtotime($editdoj));

                        $data = array('teacher_firstname' => $editfname, 
                                     'teacher_lastname'=> $editlname,
                                    'teacher_gender'=> $editgender,
                                    'teacher_email'=> $editemail,
                                    'teacher_phone'=>$editphone,
                                    'teacher_occupation'=>$editoccupation,
                                    'teacher_doj'=>$doj,
                                    'class_id'=> $editclassroom,
                                    'teacher_photo'=> $photo,
                                    'teacher_id'=> $_POST["idTeacher"],
                                    'profile_id'=>$editprofile,
                                    'status_id'=>$editstatus,
                                    'church_id'=>$church_id);
                        
                        //var_dump($data);

                        $answer = ModelTeachers::mdlUpdateTeacher($table, $data);


                        if ($answer == "ok") {
                            # code...

                            SweetAlert::alertUpdate();
                            
                        }else {
                            # code...
                            print_r("Server Side Update Error!");
                        }
                        
                       
                    }

                }else {
                    # code...
                    SweetAlert::alertInvalidChar();
                }

                
            }else {
                # code...
                SweetAlert::alertErrorFilelds();
            }

        }

    }

    
    //
    // ─── DELETE TEACHER ─────────────────────────────────────────────────────────────
    //

    static public function ctrDeleteTeacher(){

        if  (isset($_GET["deleteTeacher"])) {
            # code...
            
            $table = "teacher";
            $teacher_id = $_GET["deleteTeacher"];
            $church_id = $_SESSION["churchid"];

            $data = array('teacher_id' => $teacher_id, 
                            'church_id'=>$church_id);

            if (!empty($_GET["deletePhoto"])) {
                # code...s
                unlink($_GET["deletePhoto"]);   
                rmdir('views/img/teachers/'.$_GET["deletePhone"]);
            }

            $result = ModelTeachers::mdlDeleteTeacher($table, $data);

            if ($result == "ok") {
                # code...

                SweetAlert::alertDelete();
            }else {
                # code...
                echo "Something is wrong";
            }

        }

    }



}




