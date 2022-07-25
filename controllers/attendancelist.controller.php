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



    public static function ctrTakeAttendacne(){

        if (isset($_POST["submit"])) {
            # code...


            if (isset($_POST["studentid"])) {
                # code...

                $sid = $_POST["studentid"];
                $attend = $_POST["attend"];
                $teacherid = $_POST["teacherid"];

                for ($count=0; $count < count($sid); $count++) { 
                    # code...

                    $data = array(
                        'student_id' => $sid[$count], 
                        'attendance_status'=> $attend[$count],
                        'teacher_id' => $teacherid
                    );

                    var_dump($data);

                }

                SweetAlert::alertUpdate();

            }else {
                
            # code...

            SweetAlert::alertDuplicateUser();
        }

            
        }

    }

}