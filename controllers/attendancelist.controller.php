<?php 
class ControllerAttendance{



    public static function ctrTakeAttendacne(){

        if (isset($_POST["submit"])) {
            # code...


            if (isset($_POST["attend"])) {
                # code...

                $sid = $_POST["studentid"];
                $teacherid = $_POST["teacherid"];
                $church_id = $_POST["churchid"];
                $attend = $_POST["attend"];

                for($c=0; $c < count($sid); $c++){
                    if($attend[$c]=="on"){
                        $attnd[] = "1";
                    }else{
                        $attnd[] = "0";
                    }
                }
               

                for ($count=0; $count < count($sid); $count++) { 
                    # code...

                    $data = array(
                        'student_id' => $sid[$count], 
                        'attendance_status'=> $attnd[$count],
                        'teacher_id' => $teacherid,
                        'church_id' => $church_id
                    );

                    var_dump($data);

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

                $message = "Class Attendance Taken";
                SweetAlert::alertSaved($message);

            }else {
                
                # code...
                $message ="No Attendance Taken";
                SweetAlert::alertDuplicateItem($message);
            }

            
        }
        

    }


    
    public static function ctrShowClassStudent(){

        $table= "student";

        $churchid = 1;

        $class_id = 1;


        $data = array('class_id'=> $class_id,
        'church_id'=>$churchid);

        $result = ModelClassAttendance::mdlShowStudentClass($table, $data);

        return $result;

    }


}