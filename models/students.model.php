<?php 

require_once "../models/connection.php";


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


}