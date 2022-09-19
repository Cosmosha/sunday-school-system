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


                $table1= "student_attendance";

                $data1 = array('class_id'=> $_SESSION["classid"],
                'church_id'=> $_SESSION["churchid"]);
        
                $dateSet = ModelClassAttendance::mdlShowStudentClass($table1, $data1);
                
                for ($i=0; $i < count( $dateSet)  ; $i++) { 
                  # code...
                   $getDate= $dateSet[$i]["date_added"];

                   $dt = date("d-m-Y", strtotime($getDate));
                   
                   if ($dt == date("d-m-Y")) {
                    # code...
                        $atDate = date("d-m-Y", strtotime($getDate));
                       //var_dump($atDate);
                   }
                   
                }

                $sid = $_POST["studentid"];
                $teacherid = $_POST["teacherid"];
                $church_id = $_POST["churchid"];
                $classid = $_POST["classid"];
                $attnd = $_POST["attend"];

                for($c=0; $c < count($sid); $c++){

                    $attend = $attnd[$c] ?? 0;

                    $data = array(
                        'student_id' => $sid[$c], 
                        'attendance_status'=> $attend,
                        'teacher_id' => $teacherid,
                        'class_id' => $classid,
                        'church_id' => $church_id
                    );


                    if ($atDate != date("d-m-Y")) {
                        # code...

                        $table = "student_attendance";

                        $result = ModelClassAttendance::mdlAddStudentAttendance($table, $data);

                        if ($result == "ok") {
                            # code...
                            $message = "Class Attendance Taken";
                            SweetAlert::alertSaved($message);
                        }else{
                            print_r("OOps Server Side Error!");
                        }
                        
                    }else {
                        # code...
                        $message = "Class Attendance Already Taken";
                            SweetAlert::alertDuplicateItem($message);
                    }

                    
                }

            }else {
                
                # code...
                $message ="No Attendance Taken";
                SweetAlert::alertDuplicateItem($message);
            }

            
        }
        

    }


}

