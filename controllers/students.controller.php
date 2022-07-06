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

    static public function ctrAddStrudent() {

        if (!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["sgender"]) && !empty($_POST["sdob"]) && !empty($_POST["slevel"]) 
            && !empty($_POST["sclass"]) && !empty($_POST["school"]) && !empty($_POST["sregion"]) && !empty($_POST["gname"]) && !empty($_POST["sphone"]) && !empty($_POST["saddress"] && !empty($_POST["sclassname"])) ) {
        # code...

            $fname = trim($_POST["fname"]);
            $lname = trim($_POST["lname"]);
            $gender = $_POST["sgender"];
            $dob = $_POST["sdob"];
            $level = $_POST["slevel"];
            $class = $_POST["sclass"];
            $school = $_POST["school"];
            $region = $_POST["sregion"];
            $gname = $_POST["gname"];
            $phone = $_POST["sphone"];
            $address = $_POST["saddress"];
            $asignedclass = $_POST["classname"]; 
            $churchid = $_SESSION["churchid"];


            if (preg_match('/^[a-zA-Z ]+$/', $fname) && preg_match('/^[a-zA-Z ]+$/', $lname) && preg_match('/^[0-9]+$/',$class) && preg_match('/^[a-zA-Z ]+$/', $school)
                    && preg_match('/^[a-zA-Z ]+$/', $gname)  && preg_match('/^[0-9]+$/',$phone) && preg_match('/^[a-zA-Z ]+$/', $address)) {

                    $table = "student";
                    $item = "";
                    $value = "";

                    $student = ModelStudents::mdlShowStudents($table, $item, $value);

                    foreach ($student as $key => $value) {
                        # code...

                        if ($value["student_firstname"] == $fname && $value["student_lastname"] == $lname && $value["dob"] == $dob && $value["phone"] == $phone
                            && $value["class_id"]==$asignedclass && $value["church_id"] == $churchid) {
                            # code...

                            SweetAlert::alertDuplicateItem();

                        }else {
                            # code...

                            $photo = "";

                            $dob = date('Y-m-d', strtotime($dob));

                            $firstname = substr($fname, 0, 1);
                            $fname = ucfirst($firstname);
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

                            var_dump($data);

                            // $result = ModelStudents::mdlAddStudent($table, $data);

                            if($result == "ok"){

                                SweetAlert::alertSaved();

                            }else {

                                print_r("Oops! Server Insert Error!");
                            }


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