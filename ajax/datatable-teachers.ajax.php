<?php

//
// ──────────────────────────────────────────────────────────────────────────────────── I ──────────
//   :::::: T E A C H E R S   A J A X   D A T A T A B L E : :  :   :    :     :        :          :
// ──────────────────────────────────────────────────────────────────────────────────────────────
//

require_once  "../controllers/teachers.controller.php";
require_once "../models/teachers.model.php";
require_once "../controllers/classrooms.controller.php";
require_once "../models/classrooms.model.php";

class Teachers{

    //
    // ─── SHOW JSON CLASSROOM TABLE ───────────────────────────────────────────────────
    //

    public static function ajaxTeachersTable(){

        $item = null;
        $value = null;

        $teacher = ControllerTeacher::ctrShowTeacherList($item,$value);

        $jsonData = '{

            
            "data": [';

                for ($i=0; $i < count($teacher); $i++) { 
                    # code...


                    
                    // ACTION BUTTONS
                    $editBtn = "<i class='fa fa-pencil m-r-20 dark-i btnEditTeacher' idTeacher='".$teacher[$i]["teacher_id"]."'  data-toggle='modal' data-target='#editmodal' aria-hidden='true'></i> <i class='ti-trash m-l-10 dark-i btnDeleteTeacher' name='btnDeleteTeacher' deleteTeacher='".$teacher[$i]["teacher_id"]."' churchid='".$teacher[$i]["church_id"]."' deletePhoto='".$teacher[$i]["teacher_photo"]."' deletePhone='".$teacher[$i]["teacher_phone"]."'  aria-hidden='true'></i>";   

                
                    // Teacher fullname
                    $teachername = $teacher[$i]["teacher_firstname"] ." " .$teacher[$i]["teacher_lastname"];

                    //Teacher image
                    if ($teacher[$i]["teacher_photo"] != "") {
                        # code...

                        $photo = "<img src='".$teacher[$i]["teacher_photo"]."' width='40px'>";

                    }elseif ($teacher[$i]["teacher_photo"] == "" && $teacher[$i]["teacher_gender"]=="male") {
                        # code...

                        $photo = "<img src='views/img/teachers/default/male.png' width='40px'>";

                    }elseif ($teacher[$i]["teacher_photo"] == "" && $teacher[$i]["teacher_gender"]=="female") {
                        # code...

                        $photo = "<img src='views/img/teachers/default/female.png' width='40px'>";

                    }

                    $phone = "0".$teacher[$i]["teacher_phone"];


                    //Get class name using class id
                    $classrm = $teacher[$i]["class_class_id"];
                
                    $class = ControllerClassRoom::ctrShowClassList($item, $value);

                    foreach ($class as $key => $value) {
                        # code...
                        if ($value["class_id"] == $classrm) {
                            # code...
                            $classid = $value["class_name"];
                        }
                    }

                    // Get Profile Name From DB Using profle id

                    $table = "profile";
                    $profiles = $teacher[$i]["profile_id"];
                
                    $pro = ModelClassRoom::mdlShowInfo($table, $item, $value);

                    foreach ($pro as $key => $value) {
                        # code...
                        if ($value["profile_id"] == $profiles) {
                            # code...
                            $profileid = $value["profile_name"];
                        }
                    }

                    //Get Status Name From DB Using Status Id

                    $table = "availability";
                    $stat = $teacher[$i]["status_id"];
                
                    $stats = ModelClassRoom::mdlShowInfo($table, $item, $value);

                    foreach ($stats as $key => $value) {
                        # code...
                        if ($value["status_id"] == $stat) {
                            # code...
                            $statusid = $value["status_name"];
                        }
                    }

                    $status = $statusid;

                    $profile = $profileid;

                    $class = $classid;




                    

                    $jsonData .='[
                        "'.($i + 1).'",
                        "'.$teachername.'",
                        "'.$teacher[$i]["teacher_gender"].'",
                        "'.$profile.'",
                        "'.$photo.'",
                        "'.$teacher[$i]["teacher_occupation"].'",
                        "'.$phone.'",
                        "'.$class.'",
                        "'.$status.'",
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
// ─────────────────────────────────────────────────── INITIATE TEACHERS TABLE FUNCTION ─────
//

    $getJsonData = new Teachers();
    $getJsonData -> ajaxTeachersTable();




    



