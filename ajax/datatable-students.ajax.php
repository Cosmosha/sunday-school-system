<?php 

//
// ──────────────────────────────────────────────────────────────────────────────── I ──────────
//   :::::: S T U D E N T   A J A X     D A T A T A B L E : :  :   :    :     :        :          :
// ──────────────────────────────────────────────────────────────────────────────────────────
//


require_once "../controllers/users.controller.php";
require_once "../models/users.model.php";

class StudentTable {

    //
    // ─── SHOW JSON STUDENT TABLE ──────────────────────────────────────────────────────
    //


    public static function showStudentTable(){
        
        $item = null;
        $value = null;

        $student = ControllerStudents::ctrShowStudentList($item, $value);

        $jsonData = '{

            
            "data": [';

            for ($i=0; $i < count($student); $i++) { 
                # code...


                //
                // ACTION BUTTONS
                //

                $status = "<button class='btn btn-sm btn-rounded btn-success' id='ustatus'>Active</button>";
                $actionBtn = "<i class='fa fa-pencil m-r-20 dark-i btnEditStudent' idUser='".$student[$i]["student_id"]."'  data-toggle='modal' data-target='#editmodal' aria-hidden='true'></i> <i class='ti-trash m-l-10 dark-i btnDeleteStudent' name='btnDeleteUser' deleteStudent='".$student[$i]["student_id"]."' aria-hidden='true'></i>";     

                $jsonData .='[
                    "1",
                    "s",
                    "s",
                    "d",
                    "3",
                    "1"
                ],';

            } 
            $jsonData = substr($jsonData, 0, -1);

            $jsonData .= '] 
        }';   

        echo $jsonData;

    }

}

$getJsonData = new StudentTable();
$getJsonData->showStudentTable();