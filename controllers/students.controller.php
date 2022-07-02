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