<?php

require_once "connection.php";

class ModelClassRoom{
    
 

    //
    // ─── ADD CLASS ROOM  ─────────────────────────────────────────────────────────────
    //

        public static function mdlAddClassRoom($table, $data){

            $stmt = Connection::connect()->prepare(" INSERT INTO $table (class_name, class_capacity, church_id)
                VALUES(:class_name, :class_capacity, :church_id )");

            $stmt -> bindParam(":class_name", $data["class_name"], PDO::PARAM_STR);
            $stmt -> bindParam(":class_capacity", $data["class_capacity"], PDO::PARAM_STR);
            $stmt -> bindParam(":church_id", $data["church_id"], PDO::PARAM_STR);

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



    //
    // ─── SHOW Status, Profile, and Other Info ─────────────────────────────────────────────────────────────────
    //

        static public function mdlShowInfo($table, $item, $value){

            if ($item !=null) {
                # code...

                
                $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item  ");

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
    // ─── SHOW USERS ─────────────────────────────────────────────────────────────────
    //

        
        static public function mdlShowClassList($table, $item, $value){


            if ($item !=null) {
                # code...

                
                $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item  ");

                $stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

                $stmt -> execute();

                return $stmt -> fetch();

            }else {
                # code...

                $stmt = Connection::connect()->prepare("SELECT * FROM $table ORDER BY class_id desc");

                $stmt -> execute();
                
                return $stmt -> fetchAll();
            }


                $stmt -> close();

                $stmt = null;


        }

    
    //
    // ─── UPDATE CLASSROOMS ────────────────────────────────────────────────────────
    //

        public static function mdlUpdateClassRoom($table, $data){

            $stmt = Connection::connect()->prepare("UPDATE $table SET class_name = :class_name,  class_capacity = :class_capacity WHERE class_id = :class_id AND church_id = :church_id");

            $stmt->bindParam(":class_id", $data["class_id"], PDO::PARAM_INT);
            $stmt->bindParam(":class_name", $data["class_name"], PDO::PARAM_STR);
            $stmt->bindParam(":class_capacity", $data["class_capacity"], PDO::PARAM_INT);
            $stmt->bindParam(":church_id", $data["church_id"], PDO::PARAM_INT);
           
    
            if($stmt->execute()){
    
                return "ok";
    
            }else{
    
                return "error";
            
            }
    
            $stmt->close();
            $stmt = null;

        }

        

    
    //
    // ─── DELETE  CLASSROOM ─────────────────────────────────────────────────────
    //

        public static function  mdlDeleteClassRoom($table, $data, $church_id){

            $stmt = Connection::connect()->prepare("DELETE FROM $table WHERE class_id = :class_id AND church_id = :church_id");

            $stmt -> bindParam(":class_id", $data, PDO::PARAM_STR);
            $stmt -> bindParam(":church_id", $church_id, PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                
                return 'ok';
            
            } else {
    
                return 'error';
            
            }
            
            $stmt -> close();
    
            $stmt = null;

        }


}