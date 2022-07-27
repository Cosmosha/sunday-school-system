<?php 


require_once "connection.php";

class ModelClassAttendance{


    //
    // ─── SHOW  CLASS STUDENTS TABLE ────────────────────────────────────────────────────────
    //

    static public function mdlShowStudentClass($table, $data){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE class_id = :class_id AND church_id = :church_id");

        $stmt -> bindParam(":class_id", $data["class_id"], PDO::PARAM_STR);
        $stmt -> bindParam(":church_id", $data["church_id"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            
           return $stmt -> fetchAll();
        
        } else {

            return 'error';
        
        }
        
       // $stmt -> close();

        $stmt = null;

    }


    
    //
    // ─── ADD STUDENTS ATTENDANCE ────────────────────────────────────────────────────────
    //

    static public function mdlAddStudentAttendance($table, $data){

        
        $stmt = Connection::connect()->prepare(" INSERT INTO $table (student_id, attendance_status, teacher_id, church_id)
        VALUES(:student_id, :attendance_status, :teacher_id, :church_id )");

        $stmt -> bindParam(":student_id", $data["student_id"], PDO::PARAM_INT);
        $stmt -> bindParam(":attendance_status", $data["attendance_status"], PDO::PARAM_STR);
        $stmt -> bindParam(":teacher_id", $data["teacher_id"], PDO::PARAM_INT);
        $stmt -> bindParam(":church_id", $data["church_id"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            # code...
            return "ok";

        }else {
            # code...
            return "error";
        }

        $stmt -> close();
        $stmt = null;

    }



}