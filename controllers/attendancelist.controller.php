<?php 

class ControllerAttendance{

    public static function ctrShowClassStudent(){

        $table= "student";

        $churchid = 1;

        $class_id = 2;

        $data = array('class_id'=> $class_id,
        'church_id'=>$churchid);

        $result = ModelClassAttendance::mdlShowStudentClass($table, $data);

        return $result;


    }

}