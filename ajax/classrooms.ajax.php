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

    public $deleteClass;
    public function ajaxDeleteClass(){

        $table = "class";
        $church_id = $_SESSION["churchid"];
        $data = $this->deleteClass;

        $result = ModelClassRoom::mdlDeleteClassRoom($table, $data,$church_id);

        if ($result) {
            # code...
                var_dump($result);
        }else {
            # code...
            echo 'something is wrong';
        }
        echo json_encode($result);
    }


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



//
// ─── INITITATE DELETE CLASSROOM FUNCTION ────────────────────────────────────────
//


if (isset($_POST["deleteClass"])) {
    # code...

    $delete = new ajaxClassroom();
    $delete-> deleteClass = $_POST["deleteClass"];
    $delete->ajaxDeleteClass();
}