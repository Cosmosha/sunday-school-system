<?php 

class ModelClassAttendance{


    //
    // ─── SHOW  CLASS STUDENTS TABLE ────────────────────────────────────────────────────────
    //

    static public function mdlShowStudentClass($table, $data){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE class_id = :class_id AND church_id = : church_id");

        $stmt -> bindParam(":class_id", $data["class_id"], PDO::PARAM_INT);
        $stmt -> bindParam(":church_id", $data["church_id"], PDO::PARAM_INT);

        $stmt -> execute();
        
        return $stmt -> fetchAll();

        
        $stmt -> close();

        $stmt = null;

    }



}