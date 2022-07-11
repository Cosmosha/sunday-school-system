<?php 

require_once "../controllers/students.controller.php";
require_once "../models/students.model.php";

class studentAjax{

    //
    // ─── EDIT STUDENT ───────────────────────────────────────────────────────────────
    //

    public $idStudent;

    public function ajaxEditStudent(){

        $item = "student_id";
        $value = $this->idStudent;

        $answer = ControllerStudents::ctrShowStudentList($item, $value);

        echo json_encode($answer);

    }
}

//
// ────────────────────────────────────────────── INITIATE EDIT AJAX FUNCTION ─────
//

if (isset($_POST["idStudent"])) {
    # code...

    $editStudent = new studentAjax();
    $editStudent->idStudent = $_POST["idStudent"];
    $editStudent->ajaxEditStudent();

}