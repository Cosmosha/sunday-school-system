<?php 

require_once "connection.php";


class ModelStudents{


    //
    // ─── SHOW STUDENTS TABLE ────────────────────────────────────────────────────────
    //

    static public function mdlShowStudents($table, $item, $value){

       
        if ($item !=null) {
            # code...

            
            $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item  ");

            $stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();

        }else {
            # code...

            $stmt = Connection::connect()->prepare("SELECT * FROM $table ORDER BY student_id desc");

            $stmt -> execute();
            
            return $stmt -> fetchAll();
        }


            $stmt -> close();

            $stmt = null;

    }


    static public function mdlAddStudent($table, $data){

        $stmt = Connection::connect()->prepare("INSERT INTO $table(student_firstname, student_lastname, gender, dob, student_photo, student_level, class_form, school_name, guardian_name, home_address, class_id, region_id, phone, church_id)
        VALUES(:student_firstname, :student_lastname, :gender, :dob, :student_photo, :student_level, :class_form, :school_name, :guardian_name, :home_address, :class_id, :region_id, :phone, :church_id)");

        $stmt->bindParam(":student_firstname", $data["student_firstname"], PDO::PARAM_STR);
        $stmt->bindParam(":student_lastname", $data["student_lastname"], PDO::PARAM_STR);
        $stmt->bindParam(":gender", $data["gender"], PDO::PARAM_STR);
        $stmt->bindParam(":dob", $data["dob"], PDO::PARAM_STR);
        $stmt->bindParam(":student_photo", $data["student_photo"], PDO::PARAM_STR);
        $stmt->bindParam(":student_level", $data["student_level"], PDO::PARAM_STR);
        $stmt->bindParam(":class_form", $data["class_form"], PDO::PARAM_STR);
        $stmt->bindParam(":school_name", $data["school_name"], PDO::PARAM_STR);
        $stmt->bindParam(":guardian_name", $data["guardian_name"], PDO::PARAM_STR);
        $stmt->bindParam(":class_id", $data["class_id"], PDO::PARAM_INT);
        $stmt->bindParam(":region_id", $data["region_id"], PDO::PARAM_INT);
        $stmt->bindParam(":home_address", $data["home_address"], PDO::PARAM_STR);
        $stmt->bindParam(":phone", $data["phone"], PDO::PARAM_STR);
        $stmt->bindParam(":church_id", $data["church_id"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            # code...
            return "ok";
        }else {
            # code...
            return "error";
        }

        $stmt ->close();
        $stmt->null;

    }


    


}