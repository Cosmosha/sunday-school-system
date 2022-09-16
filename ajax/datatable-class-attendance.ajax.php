<?php 



//
// ──────────────────────────────────────────────────────────────────────────────── I ──────────
//   :::::: S T U D E N T   A J A X     D A T A T A B L E : :  :   :    :     :        :          :
// ──────────────────────────────────────────────────────────────────────────────────────────
//


require_once "../controllers/attendancelist.controller.php";
require_once "../controllers/attendanceRecords.controller.php";
require_once "../models/students.model.php";
require_once "../controllers/students.controller.php";
require_once "../models/attendance.model.php";
require_once "../controllers/classrooms.controller.php";
require_once "../models/classrooms.model.php";

class ClassAttendanceTable {

    //
    // ─── SHOW JSON STUDENT TABLE ──────────────────────────────────────────────────────
    //


    static public function showClassAttendanceTable(){


        $table = "student";
        
        $item = "";
        $value = "";

        $student = ControllerAttendanceRecords::ctrShowAttendanceRecords();

        $jsonData = '{

            
            "data": [';

                for ($i=0; $i < count($student); $i++) { 
                    # code...


                    
                    // ACTION BUTTONS
                    $editBtn = "<i class='fa fa-pencil m-r-20 dark-i btnEditstudent' idstudent='".$student[$i]["student_id"]."'  data-toggle='modal' data-target='#editmodal' aria-hidden='true'></i> ";   


                    if ($student[$i]["attendance_status"]=="1") {
                        # code...
                        $status = "<h4><span class='label label-success'>Present</span></h4>";
                    }elseif($student[$i]["attendance_status"]=="0"){
                        $status = "<h4><span class='label label-danger'>Absent</span></h4>";
                    }

                    //Get class name using class id
                    $classrm = $student[$i]["class_id"];
                
                    $class = ControllerClassRoom::ctrShowClassList($item, $value);

                    foreach ($class as $key => $value) {
                        # code...
                        if ($value["class_id"] == $classrm) {
                            # code...
                            $classid = $value["class_name"];
                        }
                    }


                    $stud_id = $student[$i]["student_id"];
                
                    $stud = ControllerStudents::ctrShowStudentList($item, $value);

                    foreach ($stud as $key => $value) {
                        # code...
                        if ($value["student_id"] == $stud_id) {
                            # code...
                            $stud_fname = $value["student_firstname"];
                            $stud_lname = $value["student_lastname"];
                            $gender = $value["gender"];
                        }
                    }

                    $studentname = $stud_fname." ".$stud_lname;




                    $stud_ID = $_SESSION["churchcode"]."/CM/00";

                    $da = $student[$i]["date_added"];
                    $attDate = date("d-m-Y", strtotime($da));

                    $jsonData .='[
                        "'.($i + 1).'",
                        "'.$stud_ID. $student[$i]["student_id"].'",
                        "'.$studentname.'",
                        "'.$gender.'",
                        "'.$status.'",
                        "'.$attDate.'",
                        "'.$editBtn.'"

                    ],';

                } 

            $jsonData = substr($jsonData, 0, -1);

            $jsonData .= '] 
        }';   
 

        echo $jsonData;

    }

}

$getJsonData = new ClassAttendanceTable();
$getJsonData->showClassAttendanceTable();