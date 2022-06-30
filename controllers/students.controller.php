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

           if (!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["sgender"]) && !empty($_POST["sdob"]) && !empty($_POST["sgender"]) && !empty($_POST["slevel"]) 
                && !empty($_POST["sclass"]) && !empty($_POST["school"]) && !empty($_POST["gname"]) && !empty($_POST["sphone"]) && !empty($_POST["saddress"]) ) {
            # code...

                $fname = trim($_POST["fname"]);
                $lname = trim($_POST["lname"]);
                    

           }
    
    }

}