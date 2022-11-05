<?php
if(!isset($_SESSION)){
    session_start();
}


//
// ──────────────────────────────────────────────────────────────────────────────── I ──────────
//   :::::: C L A S S R O O M   A J A X     D A T A T A B L E : :  :   :    :     :        :          :
// ──────────────────────────────────────────────────────────────────────────────────────────
//


require_once "../controllers/classrooms.controller.php";
require_once "../models/classrooms.model.php";

class ClassRoomTable{

    //
    // ─── SHOW JSON CLASSROOM TABLE ───────────────────────────────────────────────────
    //

    public static function showClassTable(){

        $classid = null;

        $classroom = ControllerClassRoom::ctrShowClassList($classid);

        $jsonData = '{

            
            "data": [';

            for ($i=0; $i < count($classroom); $i++) { 
                # code...


                //
                // ACTION BUTTONS
                //

                $editBtn = "<i class='fa fa-pencil m-r-20 dark-i btnEditClass' idClass='".$classroom[$i]["class_id"]."'  data-toggle='modal' data-target='#editmodal' aria-hidden='true'></i> <i class='ti-trash m-l-10 dark-i btnDeleteClass' name='btnDeleteClass' deleteClass='".$classroom[$i]["class_id"]."' aria-hidden='true'></i>";     

                $jsonData .='[
                    "'.($i + 1).'",
                    "'.$classroom[$i]["class_name"].'",
                    "'.$classroom[$i]["class_capacity"].'",
                    "'.$editBtn.'"
                ],';

            } 
            $jsonData = substr($jsonData, 0, -1);

            $jsonData .= '] 
        }';   

        echo $jsonData;


    }


    

}

//
// ─────────────────────────────────────────────────── INITIATE CLASS TABLE FUNCTION ─────
//

    $getJsonData = new ClassRoomTable();
    $getJsonData -> showClassTable();






