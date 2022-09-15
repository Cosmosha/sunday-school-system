<?php 

if(!isset($_SESSION)){
    session_start();
}

class ControllerAttendanceRecords{


    public static function ctrShowAttendanceRecords(){

        $table= "student_attendance";

        $data = array('class_id'=> $_SESSION["classid"],
        'church_id'=> $_SESSION["churchid"]);

        $result = ModelClassAttendance::mdlShowStudentClass($table, $data);

        return $result;

    }


}