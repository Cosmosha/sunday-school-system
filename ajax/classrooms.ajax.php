<?php

require_once "../models/classrooms.model.php";
require_once "../controllers/classrooms.controller.php";

class  ajaxClassroom{


    //
    // ─── EDIT CLASSROOM ─────────────────────────────────────────────────────────────
    //


    public $idClass;
    public function ajaxEditClass(){


        $item = "class_id";
        $value = $this->idClass;

        $answer = ControllerClassRoom::ctrShowClassList($item, $value);

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
