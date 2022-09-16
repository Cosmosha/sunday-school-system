<?php 



//
// ──────────────────────────────────────────────────────────────────────────────── I ──────────
//   :::::: S T U D E N T   A J A X     D A T A T A B L E : :  :   :    :     :        :          :
// ──────────────────────────────────────────────────────────────────────────────────────────
//


require_once "../controllers/attendancelist.controller.php";
require_once "../models/students.model.php";
require_once "../models/attendance.model.php";
require_once "../controllers/classrooms.controller.php";
require_once "../models/classrooms.model.php";

class AttendanceTable {

    //
    // ─── SHOW JSON STUDENT TABLE ──────────────────────────────────────────────────────
    //


    static public function showClassStudentTable(){


        $table = "student";
        
        $item = "";
        $value = "";

        $student = ControllerAttendance::ctrShowClassStudent();

        $jsonData = '{

            
            "data": [';

                for ($i=0; $i < count($student); $i++) { 
                    # code...


                    
                    // ACTION BUTTONS
                    $editBtn = "<i class='fa fa-pencil m-r-20 dark-i btnEditstudent' idstudent='".$student[$i]["student_id"]."'  data-toggle='modal' data-target='#editmodal' aria-hidden='true'></i> <i class='ti-trash m-l-10 dark-i btnDeleteStudent' name='btnDeleteStudent' deleteStudent='".$student[$i]["student_id"]."' churchid='".$student[$i]["church_id"]."' deletePhoto='".$student[$i]["student_photo"]."' deleteDOB='".$student[$i]["dob"]."' deleteFname='".$student[$i]["student_firstname"]."' deleteLname='".$student[$i]["student_lastname"]."'  aria-hidden='true'></i>";   

                
                    // student fullname
                    $studentname = $student[$i]["student_firstname"] ." " .$student[$i]["student_lastname"];

                    //student image
                    if ($student[$i]["student_photo"] != "") {
                        # code...

                        $photo = "<img src='".$student[$i]["student_photo"]."' width='40px'>";

                    }elseif ($student[$i]["student_photo"] == "" && $student[$i]["gender"]=="boy") {
                        # code...

                        $photo = "<img src='views/img/students/default/boy.png' width='40px'>";

                    }elseif ($student[$i]["student_photo"] == "" && $student[$i]["gender"]=="girl") {
                        # code...

                        $photo = "<img src='views/img/students/default/girl.png' width='40px'>";

                    }

                    $phone = "0".$student[$i]["phone"];


                    $table = "student";
                    $item1 = "dob";
                    $value1 = $student[$i]["dob"];

                    $sAge = ModelStudents::mdlShowAge($table, $item1, $value1);


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

                    

                    //Get Status Name From DB Using Status Id

                    // $table = "availability";
                    // $stat = $student[$i]["status_id"];
                
                    // $stats = ModelClassRoom::mdlShowInfo($table, $item, $value);

                    // foreach ($stats as $key => $value) {
                    //     # code...
                    //     if ($value["status_id"] == $stat) {
                    //         # code...
                    //         $statusid = $value["status_name"];
                    //     }
                    // }

                    //$status = $statusid;


                    $class = $classid;


                    $stud_ID = $_SESSION["churchcode"]."/CM/00";

                    $age = $sAge;

                    

                    $jsonData .='[
                        "'.($i + 1).'",
                        "'.$stud_ID. $student[$i]["student_id"].'",
                        "'.$studentname.'",
                        "'.$student[$i]["gender"].'",
                        "'.$age.'",
                        "'.$photo.'",
                        "'.$student[$i]["guardian_name"].'",
                        "'.$phone.'",
                        "'.$student[$i]["home_address"].'",
                        "'.$class.'"

                    ],';

                } 

            $jsonData = substr($jsonData, 0, -1);

            $jsonData .= '] 
        }';   
 

        echo $jsonData;

    }

}

$getJsonData = new AttendanceTable();
$getJsonData->showClassStudentTable();