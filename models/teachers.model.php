<?php 

require_once "connection.php";

class ModelTeachers{


    //
    // ─── ADD TEACHERS ───────────────────────────────────────────────────────────────
    //

    static public function mdlAddTeachers($table, $data){

        $stmt = Connection::connect()->prepare("INSERT INTO $table(teacher_firstname, teacher_lastname, teacher_gender, teacher_occupation, teacher_email, teacher_phone, teacher_photo, teacher_doj, class_id, profile_id, status_id, church_id)
        VALUES(:teacher_firstname, :teacher_lastname, :teacher_gender, :teacher_occupation, :teacher_email, :teacher_phone, :teacher_photo, :teacher_doj, :class_id, :profile_id, :status_id, :church_id)");

        $stmt->bindParam(":teacher_firstname", $data["teacher_firstname"], PDO::PARAM_STR);
        $stmt->bindParam(":teacher_lastname", $data["teacher_lastname"], PDO::PARAM_STR);
        $stmt->bindParam(":teacher_gender", $data["teacher_gender"], PDO::PARAM_STR);
        $stmt->bindParam(":teacher_occupation", $data["teacher_occupation"], PDO::PARAM_STR);
        $stmt->bindParam(":teacher_email", $data["teacher_email"], PDO::PARAM_STR);
        $stmt->bindParam(":teacher_phone", $data["teacher_phone"], PDO::PARAM_STR);
        $stmt->bindParam(":teacher_photo", $data["teacher_photo"], PDO::PARAM_STR);
        $stmt->bindParam(":teacher_doj", $data["teacher_doj"], PDO::PARAM_STR);
        $stmt->bindParam(":class_id", $data["class_id"], PDO::PARAM_INT);
        $stmt->bindParam(":profile_id", $data["profile_id"], PDO::PARAM_INT);
        $stmt->bindParam(":status_id", $data["status_id"], PDO::PARAM_INT);
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
    

    //
    // ─── SHOW TEACHERS ──────────────────────────────────────────────────────────────
    //

    static public function mdlShowTeacher($table, $data, $teacherid){

       
        if ($teacherid !=null) {
            # code...
            
            $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE teacher_id = :teacher_id AND church_id = :church_id ");

            $stmt -> bindParam(":teacher_id", $data["teacher_id"], PDO::PARAM_INT);
            $stmt -> bindParam(":church_id", $data["church_id"], PDO::PARAM_INT);

            $stmt -> execute();

            return $stmt -> fetch();

        }else {
            # code...

            $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE church_id = :church_id ORDER BY teacher_id desc");
            $stmt -> bindParam(":church_id", $data["church_id"], PDO::PARAM_INT);

            $stmt -> execute();
            
            return $stmt -> fetchAll();
        }


            $stmt = null;

    }


    //
    // ─── EDIT TEACHER ───────────────────────────────────────────────────────────────
    //

    public static function mdlUpdateTeacher($table, $data){

        $stmt = Connection::connect()->prepare("UPDATE $table SET teacher_firstname = :teacher_firstname,  teacher_lastname = :teacher_lastname,
         teacher_gender = :teacher_gender, teacher_occupation = :teacher_occupation, teacher_email = :teacher_email, teacher_phone = :teacher_phone,
         teacher_photo = :teacher_photo, teacher_doj = :teacher_doj, class_id = :class_id, profile_id = :profile_id, status_id = :status_id  WHERE teacher_id = :teacher_id AND church_id = :church_id");

        $stmt -> bindParam(":teacher_id", $data["teacher_id"], PDO::PARAM_INT);
        $stmt->bindParam(":teacher_firstname", $data["teacher_firstname"], PDO::PARAM_STR);
        $stmt->bindParam(":teacher_lastname", $data["teacher_lastname"], PDO::PARAM_STR);
        $stmt->bindParam(":teacher_gender", $data["teacher_gender"], PDO::PARAM_STR);
        $stmt->bindParam(":teacher_occupation", $data["teacher_occupation"], PDO::PARAM_STR);
        $stmt->bindParam(":teacher_email", $data["teacher_email"], PDO::PARAM_STR);
        $stmt->bindParam(":teacher_phone", $data["teacher_phone"], PDO::PARAM_STR);
        $stmt->bindParam(":teacher_photo", $data["teacher_photo"], PDO::PARAM_STR);
        $stmt->bindParam(":teacher_doj", $data["teacher_doj"], PDO::PARAM_STR);
        $stmt->bindParam(":class_id", $data["class_id"], PDO::PARAM_INT);
        $stmt->bindParam(":profile_id", $data["profile_id"], PDO::PARAM_INT);
        $stmt->bindParam(":status_id", $data["status_id"], PDO::PARAM_INT);
        $stmt->bindParam(":church_id", $data["church_id"], PDO::PARAM_INT);

        if ($stmt -> execute()) {
            # code...

            return "ok";

        }else {
            # code...

            return "error";
        }

        $stmt -> close();

        $stmt -> null;

    }



        
    //
    // ─── DELETE  TEACHER ─────────────────────────────────────────────────────
    //

    public static function mdlDeleteTeacher($table, $data){

        $stmt = Connection::connect()->prepare("DELETE FROM $table WHERE teacher_id = :teacher_id AND church_id = :church_id");

        $stmt -> bindParam(":teacher_id", $data["teacher_id"], PDO::PARAM_INT);
        $stmt -> bindParam(":church_id", $data["church_id"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            
            return 'ok';
        
        } else {

            return 'error';
        
        }
        
        $stmt -> close();

        $stmt = null;

    }





    //
    // ─── SHOW NUMBER OF TEACHER TABLE ROWS ──────────────────────────────────────────
    //

    static public function mdlShowTeacherRow($table){

        
        $stmt = Connection::connect()->prepare("SELECT COUNT(*) FROM $table");

        $stmt -> execute();
        
        return $stmt -> fetchColumn();

        $stmt -> close();

        $stmt = null;

    }


}