<?php

if(!isset($_SESSION)){
    session_start();
}


require_once "../models/classrooms.model.php";
require_once "../controllers/classrooms.controller.php";

class  ajaxClassroom{


    //
    // ─── EDIT CLASSROOM ─────────────────────────────────────────────────────────────
    //


    public $idClass;
    public function ajaxEditClass(){


        $classid = $this->idClass;

        $answer = ControllerClassRoom::ctrShowClassList($classid);

        echo json_encode($answer);

    }


    //
    // ─── DELETE CLASSROOM ───────────────────────────────────────────────────────────
    //


}


//
// ──────────────────────────────────────── INITITATE EDIT  CLASSROOM FUNCTION ─────
//

if (isset($_POST["idClass"])) {
    # code...

    $edit = new ajaxClassroom();
    $edit -> idClass = $_POST["idClass"];
    $edit ->ajaxEditClass();

}
