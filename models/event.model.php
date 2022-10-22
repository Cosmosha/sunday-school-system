<?php

require_once "connection.php";

class ModelEvent{

    //
    // ─── Add Event ───────────────────────────────────────────────────────
    //
    
    static public function mdlAddEvent($table, $data){

        $stmt = Connection::connect()->prepare("INSERT INTO $table(event_name, event_start, event_end, event_color, church_id) 
                    VALUES (:event_name, :event_start, :event_end, :event_color, :church_id)");
        
        $stmt -> bindParam(":event_name", $data["event_name"], PDO::PARAM_STR);
        $stmt -> bindParam(":event_start", $data["event_start"], PDO::PARAM_STR);
        $stmt -> bindParam(":event_end", $data["event_end"], PDO::PARAM_STR);
        $stmt -> bindParam(":event_color", $data["event_color"], PDO::PARAM_STR);
        $stmt -> bindParam(":church_id", $data["church_id"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            # code...
            return "ok";

        }else {
            # code...
            return $stmt ->errorInfo();
        }

        $stmt -> close();
        $stmt -> null;


    }



}