<?php 

class ControllerAttendance{


    //
    // ─── SHOW CLASS STUDENT LIST ───────────────────────────────────────────────────────
    //
    
    public static function ctrShowClassStudent($data){

        $table = "student";

        $result = ModelClassAttendance::mdlShowStudentClass($table, $data);

        return $result;

    }

}