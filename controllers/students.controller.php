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

    public static function ctrAddStudent() {


        if (isset($_POST["student_fname"])) {
            # code...

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

                    $students = ModelStudents::mdlShowStudents($table, $item, $value);
                    
                    //var_dump($student);

                    foreach ($students as $key => $student) {
                        # code...

                        if (!empty($student) && $student["student_firstname"] == $fname && $student["student_lastname"] == $lname && $student["dob"] == $dob && $student["phone"] == $phone
                            && $student["church_id"] == $churchid) {
                            # code...

                            $message = "Student Records Already Exist";
                            SweetAlert::alertDuplicateItem($message);
                            break;

                        } elseif (!empty($student) && $student["student_firstname"] == $fname && $student["student_lastname"] == $lname && $student["phone"] == $phone
                                && $student["church_id"] == $churchid) {
                            # code...

                            $message = "Student Records Already Exist";
                            SweetAlert::alertDuplicateItem($message);
                            break;

                        } else {
                            # code...
                            $photo = "";

                            $photoID = $fname.".".$lname."-".$dob;
                    
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
                    
                                $message = "Student Records Saved";
                                SweetAlert::alertSaved($message);
                    
                            }else {
                    
                                $message = "All Fields are Required";
                                SweetAlert::alertErrorFilelds($message);
                                print_r("Oops! Server Insert Error!");
                            }
                            
                            

                        }
                    
                        break;

                    }


                }else {
                    # code...

                    SweetAlert::alertInvalidChar();
                    echo'there is a problem';
                }



            }else {
            # code...
                $message = "All Fields are Required";
                SweetAlert::alertErrorFilelds($message);
            
            }

        }
    
    
    
    
    }


    //
    // ─── EDIT STUDENT DETAIL ─────────────────────────────────────────────────────────
    //

    public static function ctrEditStudent(){

        if (isset($_POST["edit_fname"])) {
            # code...

            if (!empty($_POST["edit_fname"]) && !empty($_POST["edit_lname"]) && !empty($_POST["edit_gender"]) && !empty($_POST["edit_dob"]) && !empty($_POST["edit_level"]) 
			&& !empty($_POST["edit_class"]) && !empty($_POST["edit_school"]) && !empty($_POST["edit_region"]) && !empty($_POST["edit_gname"]) && !empty($_POST["edit_phone"]) && !empty($_POST["edit_address"] 
			&& !empty($_POST["edit_classname"])) ) {
                # code...

                $fname = trim($_POST["edit_fname"]);
                $lname = trim($_POST["edit_lname"]);
                $gender = $_POST["edit_gender"];
                $sdob = $_POST["edit_dob"];
                $level = $_POST["edit_level"];
                $class = $_POST["edit_class"];
                $school =trim($_POST["edit_school"]);
                $region = $_POST["edit_region"];
                $gname = trim($_POST["edit_gname"]);
                $phone = $_POST["edit_phone"];
                $address = trim($_POST["edit_address"]);
                $asignedclass = $_POST["edit_classname"]; 
                $churchid = $_SESSION["churchid"];
                $idStudent = $_POST["student_id"];

                
                if (preg_match('/^[a-zA-Z ]+$/', $fname) && preg_match('/^[a-zA-Z ]+$/', $lname) && preg_match('/^[a-zA-Z ]+$/', $school) && preg_match('/^[a-zA-Z ]+$/', $gname) 
                && preg_match('/^[0-9]+$/', $class) && preg_match('/^[0-9]+$/', $phone) ) {


                    $table = "student";
                    $item = "";
                    $value = "";

                    $dob = date('Y-m-d', strtotime($sdob));

                    $students = ModelStudents::mdlShowStudents($table, $item, $value);
                    

                    foreach ($students as $key => $student) {
                        # code...

                        if (!empty($student) && $student["student_id"] != $idStudent  && $student["student_firstname"] == $fname && $student["student_lastname"] == $lname && $student["phone"] == $phone
                            && $student["church_id"] == $churchid) {
                            # code...
                            $message = "Student Records Already Exit";
                            SweetAlert::alertDuplicateItem($message);
                            break;

                        }else {
                            # code...

                            $photo = $_POST["currentPic"];

                            $photoID = $fname.".".$lname."-".$dob;
                    
                            $newPhoto = $_FILES["newPhoto"];
                            $folderloation = "views/img/students/";
                            $picId = $photoID;

                            $studentImaage = new CreateFile($newPhoto, $folderloation, $picId);
                            $studentImaage->photo = $photo;
                            $edit_photo = $studentImaage->ImageEditFolder();

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
                                'student_photo'=>$edit_photo,
                                'student_id'=> $idStudent
                                
                            );

                            // var_dump($data);

                            $result = ModelStudents::mdlUpdateStudent($table, $data);

                            if ($result == "ok") {
                                # code...
                                $message = "Student Records Modified";
                                SweetAlert::alertUpdate($message);

                            }else {
                                # code...
                                $message = "All Fields are Required";
                                SweetAlert::alertErrorFilelds($message);
                                echo "Something went wrong";
                            }



                        }

                        break;

                    }


                }else {
                    # code...
                    SweetAlert::alertInvalidChar();
                }
                

            }else {
                # code...
                $message = "All Fields are Required";
                SweetAlert::alertErrorFilelds($message);
            }

        }				


    }




    //
    // ─── DELETE STUDENT DETAIL ─────────────────────────────────────────────────────────
    //

    public static function ctrDeleteStudent(){

        if (isset($_GET["deleteStudent"])) {
            # code...
            $table = "student";
            $id = $_GET["deleteStudent"];
            $church_id = $_SESSION["churchid"];
            $data = array('student_id'=>$id,
                         'church_id'=> $church_id);
 
             $photoID = $_GET["deleteFname"].".".$_GET["deleteLname"]."-".$_GET["deleteDOB"];

            if ($_GET["deletePhoto"] != "") {
                # code...
                unlink($_GET["deletePhoto"]);   
                rmdir("views/img/students/".$photoID);
            }

            $result = ModelStudents::mdlDeleteStudent($table, $data);

            if ($result == "ok") {
                # code...
                $message = "Student Records Deleted";
                SweetAlert::alertDelete($message);
            }else {
                # code...
                echo "Something is wrong";
            }
        }

    }

}
