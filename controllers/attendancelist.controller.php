<?php 

if(!isset($_SESSION)){
    session_start();
}
class ControllerAttendance{

    public static function ctrShowClassStudent(){

        $table= "student";

        $data = array('class_id'=> $_SESSION["classid"],
        'church_id'=> $_SESSION["churchid"]);

        $result = ModelClassAttendance::mdlShowStudentClass($table, $data);

        return $result;

    }


    public static function ctrTakeAttendacne(){

        if (isset($_POST["submit"])) {
            # code...


            if (isset($_POST["attend"])) {
                # code...

                $sid = $_POST["studentid"];
                $teacherid = $_POST["teacherid"];
                $church_id = $_POST["churchid"];
                $classid = $_POST["classid"];
                $attnd = $_POST["attend"];

                for($c=0; $c < count($sid); $c++){
                    if(!isset($attnd[$c])){
                        $attend = "0";
                        $data = array(
                            'student_id' => $sid[$c], 
                            'attendance_status'=> $attend,
                            'teacher_id' => $teacherid,
                            'class_id' => $classid,
                            'church_id' => $church_id
                        );

                    }else{
                        $attend = "1";
                        $data = array(
                            'student_id' => $sid[$c], 
                            'attendance_status'=> $attend,
                            'teacher_id' => $teacherid,
                            'class_id' => $classid,
                            'church_id' => $church_id
                        );
                    }

                   print_r($data);

                    $table = "student_attendance";

                    // $result = ModelClassAttendance::mdlAddStudentAttendance($table, $data);

                    // if ($result == "ok") {
                    //     # code...
                    //     $message = "Class Attendance Taken";
                    //     SweetAlert::alertSaved($message);
                    // }else{
                    //     print_r("OOps Server Side Error!");
                    // }
                }

            }else {
                
                # code...
                $message ="No Attendance Taken";
                SweetAlert::alertDuplicateItem($message);
            }

            
        }
        

    }


}

