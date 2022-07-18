<?php

require_once "connection.php";

class ModelUsers{
    

    //
    // ─── ADD USER ───────────────────────────────────────────────────────────────────
    //

    public static function mdlAddUsers($table, $data){

        $stmt = Connection::connect()->prepare("INSERT INTO $table(teacher_id, user_name, user_email, password, permission_id, user_status, church_id)
        VALUES(:teacher_id, :user_name, :user_email, :password, :permission_id, :user_status, :church_id)");

        $stmt->bindParam(":teacher_id", $data["teacher_id"], PDO::PARAM_INT);
        $stmt->bindParam(":user_name", $data["user_name"], PDO::PARAM_STR);
        $stmt->bindParam(":user_email", $data["user_email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
        $stmt->bindParam(":permission_id", $data["permission_id"], PDO::PARAM_INT);
        $stmt->bindParam(":user_status", $data["user_status"], PDO::PARAM_INT);
        $stmt->bindParam(":church_id", $data["church_id"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            # code...
            return "ok";
        }else {
            # code...
            return "error";
        }

        $stmt->close();
        $stmt->null;

    }


    //
    // ─── SHOW USERS ─────────────────────────────────────────────────────────────────
    //

        
        static public function MdlShowUsers($table, $item, $value){

            if ($item !=null) {
                # code...

                
                $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

                $stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

                $stmt -> execute();

                return $stmt -> fetch();

            }else {
                # code...

                $stmt = Connection::connect()->prepare("SELECT * FROM $table");
                $stmt -> execute();
                return $stmt -> fetchAll();
            }


            $stmt -> close();

            $stmt = null;


        }


    //
    // ─── UPDATE USER & STATUS INFO ───────────────────────────────────────────────────────────
    //

        static public function MdlUpdateInfo($table, $item1, $value1, $item2, $value2){

            $stmt = Connection::connect()->prepare("UPDATE $table SET $item1 = :$item1 WHERE $item2 = :$item2");
            $stmt -> bindParam(":$item1", $value1, PDO::PARAM_STR);
            $stmt -> bindParam(":$item2", $value2, PDO::PARAM_STR);

            if ($stmt -> execute()) {
                # code...
                return "ok";
            }else{
                return "error";
            }

            $stmt -> close();
            $stmt -> null;

        }


    
 
        


}