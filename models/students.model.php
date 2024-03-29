<?php 

require_once "connection.php";


class ModelStudents{


 
    // ─── Insert Student ─────────────────────────────────────────────────────────────

    static public function mdlAddStudent($table, $data){

        $stmt = Connection::connect()->prepare("INSERT INTO $table(student_firstname, student_lastname, gender, dob, student_level, class_form, school_name, region_id, guardian_name, phone, home_address, class_id, student_photo, church_id) 
		VALUES (:student_firstname, :student_lastname, :gender, :dob, :student_level, :class_form, :school_name, :region_id, :guardian_name, :phone, :home_address, :class_id, :student_photo, :church_id)");

		$stmt->bindParam(":student_firstname", $data["student_firstname"], PDO::PARAM_STR);
		$stmt->bindParam(":student_lastname", $data["student_lastname"], PDO::PARAM_STR);
		$stmt->bindParam(":gender", $data["gender"], PDO::PARAM_STR);
		$stmt->bindParam(":dob", $data["dob"], PDO::PARAM_STR);
		$stmt->bindParam(":student_level", $data["student_level"], PDO::PARAM_STR);
		$stmt->bindParam(":class_form", $data["class_form"], PDO::PARAM_STR);
		$stmt->bindParam(":school_name", $data["school_name"], PDO::PARAM_STR);

        $stmt->bindParam(":region_id", $data["region_id"], PDO::PARAM_INT);
		$stmt->bindParam(":guardian_name", $data["guardian_name"], PDO::PARAM_STR);
		$stmt->bindParam(":phone", $data["phone"], PDO::PARAM_STR);
        $stmt->bindParam(":home_address", $data["home_address"], PDO::PARAM_STR);
		$stmt->bindParam(":class_id", $data["class_id"], PDO::PARAM_INT);
		$stmt->bindParam(":church_id", $data["church_id"], PDO::PARAM_INT);
		$stmt->bindParam(":student_photo", $data["student_photo"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
            // $act = $stmt->errorInfo();
            // return $act;
		
		}

		$stmt->close();
		$stmt = null;

    }


    //
    // ─── SHOW STUDENTS TABLE ────────────────────────────────────────────────────────
    //

    static public function mdlShowStudents($table, $data, $studentid){

       
        if ($studentid != null) {
            # code...

            
            $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE student_id = :student_id AND church_id = :church_id ");

            $stmt -> bindParam(":student_id", $data["student_id"], PDO::PARAM_INT);
            $stmt -> bindParam(":church_id", $data["church_id"], PDO::PARAM_INT);

            $stmt -> execute();

            return $stmt -> fetch();

        }else {
            # code...

            $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE church_id = :church_id ORDER BY student_id desc");

            $stmt -> bindParam(":church_id", $data["church_id"], PDO::PARAM_INT);

            $stmt -> execute();
            
            return $stmt -> fetchAll();
        }


            $stmt -> close();

            $stmt = null;

    }




    // ─── Edit Student Details ───────────────────────────────────────────────────────

    public static function mdlUpdateStudent($table, $data){

        $stmt = Connection::connect()->prepare("UPDATE $table SET student_firstname = :student_firstname,  student_lastname = :student_lastname, student_photo = :student_photo,
        gender = :gender, dob = :dob, student_level = :student_level, class_form = :class_form, school_name = :school_name, home_address = :home_address, class_id = :class_id, baptism = :baptism, status = :status,
        school_name = :school_name, region_id = :region_id, class_id = :class_id, guardian_name = :guardian_name, phone = :phone  WHERE student_id = :student_id AND church_id = :church_id");

        $stmt->bindParam(":student_id", $data["student_id"], PDO::PARAM_INT);
		$stmt->bindParam(":student_firstname", $data["student_firstname"], PDO::PARAM_STR);
		$stmt->bindParam(":student_lastname", $data["student_lastname"], PDO::PARAM_STR);
		$stmt->bindParam(":gender", $data["gender"], PDO::PARAM_STR);
		$stmt->bindParam(":dob", $data["dob"], PDO::PARAM_STR);
		$stmt->bindParam(":student_level", $data["student_level"], PDO::PARAM_STR);
		$stmt->bindParam(":class_form", $data["class_form"], PDO::PARAM_STR);
		$stmt->bindParam(":school_name", $data["school_name"], PDO::PARAM_STR);
		$stmt->bindParam(":baptism", $data["baptism"], PDO::PARAM_STR);
		$stmt->bindParam(":status", $data["status"], PDO::PARAM_STR);

        $stmt->bindParam(":region_id", $data["region_id"], PDO::PARAM_INT);
		$stmt->bindParam(":guardian_name", $data["guardian_name"], PDO::PARAM_STR);
		$stmt->bindParam(":phone", $data["phone"], PDO::PARAM_STR);
        $stmt->bindParam(":home_address", $data["home_address"], PDO::PARAM_STR);
		$stmt->bindParam(":class_id", $data["class_id"], PDO::PARAM_INT);
		$stmt->bindParam(":church_id", $data["church_id"], PDO::PARAM_INT);
		$stmt->bindParam(":student_photo", $data["student_photo"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
            // $act = $stmt->errorInfo();
            // return $act;
		
		}

		$stmt->close();
		$stmt = null;

    }


    // ─── Delete Student Details ─────────────────────────────────────────────────────

    public static function mdlDeleteStudent($table, $data){

        $stmt = Connection::connect()->prepare("DELETE FROM $table WHERE student_id = :student_id AND church_id = :church_id");

        $stmt -> bindParam(":student_id", $data["student_id"], PDO::PARAM_INT);
        $stmt -> bindParam(":church_id", $data["church_id"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            
            return 'ok';
        
        } else {

            return 'error';
        
        }
        
        $stmt -> close();

        $stmt = null;

    }






    // ─── Get Total Number Of Students ───────────────────────────────────────────────

    
    static public function mdlShowStudentCountRow($table, $item, $value, $churchid){

        if ($item != null) {

            # code...
            $stmt = Connection::connect()->prepare("SELECT COUNT(*) FROM $table WHERE $item = :$item AND church_id = :church_id ");

            $stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
            $stmt -> bindParam(":church_id", $churchid, PDO::PARAM_INT);

            $stmt -> execute();

            return $stmt -> fetchColumn();

        } else {
            # code...
            $stmt = Connection::connect()->prepare("SELECT COUNT(*) FROM $table WHERE church_id = :church_id");

            $stmt -> bindParam(":church_id", $churchid, PDO::PARAM_INT);

            $stmt -> execute();
            
            return $stmt -> fetchColumn();

        }

        $stmt -> close();

        $stmt = null;

    }


    // ─── Get Student Age From Db Using Dob ──────────────────────────────────────────

    public static function mdlShowAge($table, $item, $value){

        $stmt = Connection::connect()->prepare("SELECT TIMESTAMPDIFF(YEAR, $item, CURDATE()) FROM $table WHERE $item = :$item");
      
        $stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
        
        $stmt -> execute();

        return $stmt ->fetchColumn();

         $stmt -> close();

        $stmt = null;

    }
    


}