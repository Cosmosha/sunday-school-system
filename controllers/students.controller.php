<?php 


class ControllerStudents {


    //
    // ─── SHOW STUDENT LIST ───────────────────────────────────────────────────────
    //

    public static function ctrShowStudentList($item, $value){

        $table = "student";

        $result = ModelStudents::mdlShowStudents($table,$item,$value);

        return $result;

    }


    //
    // ─── ADD STUDENT DETAIL ─────────────────────────────────────────────────────────
    //

    public static function ctrAddStrudent() {


        if (!empty($_POST["student_fname"]) && !empty($_POST["student_lname"]) && !empty($_POST["sgender"]) && !empty($_POST["sdob"]) && !empty($_POST["slevel"]) 
            && !empty($_POST["sclass"]) && !empty($_POST["school"]) && !empty($_POST["sregion"]) && !empty($_POST["gname"]) && !empty($_POST["sphone"]) && !empty($_POST["saddress"] && !empty($_POST["sclassname"])) ) {
        # code...

            $fname = trim($_POST["student_fname"]);
            $lname = trim($_POST["student_lname"]);
            $gender = $_POST["sgender"];
            $sdob = $_POST["sdob"];
            $level = $_POST["slevel"];
            $class = $_POST["sclass"];
            $school =trim($_POST["school"]);
            $region = $_POST["sregion"];
            $gname = trim($_POST["gname"]);
            $phone = $_POST["sphone"];
            $address = trim($_POST["saddress"]);
            $asignedclass = $_POST["sclassname"]; 
            $churchid = $_SESSION["churchid"];
        
            

            if (preg_match('/^[a-zA-Z ]+$/', $fname) && preg_match('/^[a-zA-Z ]+$/', $lname) && preg_match('/^[a-zA-Z ]+$/', $school) && preg_match('/^[a-zA-Z ]+$/', $gname) 
               && preg_match('/^[0-9]+$/', $class) && preg_match('/^[0-9]+$/', $phone) ) {

                $table = "student";
                $item = "";
                $value = "";

                $dob = date('Y-m-d', strtotime($sdob));

                $student = ModelStudents::mdlShowStudents($table, $item, $value);
                
                //var_dump($student);

                if (!empty($student) && $student["student_firstname"] == $fname && $student["student_lastname"] == $lname && $value["dob"] != $dob && $value["phone"] == $phone
                    && $value["class_id"] == $asignedclass && $student["church_id"] == $churchid) {
                    # code...

                    SweetAlert::alertDuplicateItem();
                    echo 'something is not right';

                }
                else {
                    # code...
                    $photo = "";

                    $firstname = substr($fname, 0, 1);
                    $fstname = ucfirst($firstname);
                    $photoID = $fstname.".".$lname."-".$dob;
            
                    $newPhoto = $_FILES["newPhoto"];
                    $folderloation = "views/img/students/";
                    $picId = $photoID;
            
                    $studentImaage = new CreateFile($newPhoto, $folderloation, $picId);
                    $photo = $studentImaage -> ImageCreateFolder();
            
                    
            
                    $data = array('student_firstname'=>$fname,
                            'student_lastname'=>$lname,
                            'gender'=>$gender,
                            'dob'=>$dob,
                            'student_level'=>$level,
                            'class_form'=>$class,
                            'school_name'=>$school,
                            'region_id'=>$region,
                            'guardian_name'=>$gname,
                            'phone'=>$phone,
                            'home_address'=>$address,
                            'class_id'=>$asignedclass,
                            'church_id'=>$churchid,
                            'student_photo'=>$photo
                    );
            
                    //var_dump($data);
            
                    $result = ModelStudents::mdlAddStudent($table, $data);
            
                    if($result == "ok"){
            
                        SweetAlert::alertSaved();
            
                    }else {
            
                        SweetAlert::alertErrorFilelds();
                        print_r("Oops! Server Insert Error!");
                        var_dump($result);
                    }
                    


                }
                 

            }else {
                # code...

                SweetAlert::alertInvalidChar();
                echo'there is a problem';
            }



        }else {
        # code...

            SweetAlert::alertErrorFilelds();
           
        }
    
    
    
    
    }



    private function insert_student(){

       

    }

}