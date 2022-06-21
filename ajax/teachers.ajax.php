<?php 

require_once "../controllers/teachers.controller.php";
require_once "../models/teachers.model.php";

class ajaxTeacher{


    //
    // ─── EDIT TEACHER ───────────────────────────────────────────────────────────────
    //

    public $idTeacher;
    public function ajaxEditTeacher(){

        $item = "teacher_id";
        $value = $this->idTeacher;

        $answer = ControllerTeacher::ctrShowTeacherList($item,$value);

        echo json_encode($answer);

    }


    //
    // ─── DELETE TEACHER ─────────────────────────────────────────────────────────────
    //

    public $deleteTeacher;
    public function ajaxDeleteTeacher(){


        $table = "teacher";
        $data = $this->deleteTeacher;
        $church_id = $_SESSION["churchid"];

        $result = ModelTeachers::mdlDeleteTeacher($table,$data,$church_id);

        if ($result) {
            # code...
                var_dump($result);
                echo'
                    <script>
                    window.location = "index.php?root="";

                    </script>
                ';
        }else {
            # code...
            echo 'something is wrong';
        }

        echo json_encode($result);

    }


}



//
// ────────────────────────────────────────────── INITIATE EDIT AJAX FUNCTION ─────
//

if (isset($_POST["idTeacher"])) {
    # code...

    $editTeacher = new ajaxTeacher();
    $editTeacher->idTeacher = $_POST["idTeacher"];
    $editTeacher->ajaxEditTeacher();

}



//
// ──────────────────────────────────────────── INITIATE DELETE AJAX FUNCTION ─────
//

if (isset($_POST["deleteTeacher"])) {
    # code...

    $delete = new ajaxTeacher();
    $delete->deleteTeacher = $_POST["deleteTeacher"];
    $delete->ajaxDeleteTeacher();

}