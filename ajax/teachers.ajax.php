<?php 

if(!isset($_SESSION)){
    session_start();
}

require_once "../models/teachers.model.php";
require_once "../controllers/teachers.controller.php";

class ajaxTeacher{


    //
    // ─── EDIT TEACHER ───────────────────────────────────────────────────────────────
    //

    public $idTeacher;
    public function ajaxEditTeacher(){

        $item = "teacher_id";
        $teacherid = $this->idTeacher;

        $answer = ControllerTeacher::ctrShowTeacherList($teacherid);

        echo json_encode($answer);

    }


    //
    // ─── DELETE TEACHER ─────────────────────────────────────────────────────────────
    //

    public $deleteTeacher;
    public $churchid;
    public $deletePhoto;
    public $deletePhone;
    public function ajaxDeleteTeacher(){


        $table = "teacher";
        $teacher_id = $this->deleteTeacher;
        $deletePhoto = $this->deletePhoto;
        $deletePhone = $this->deletePhone;
        $church_id = $this->churchid;
        $data = array('teacher_id' => $teacher_id, 
                        'church_id' => $church_id);

        if ($deletePhoto != "") {
            # code...
            unlink($deletePhoto);   
            rmdir('views/img/teachers/'.$deletePhone);
        }

        $result = ModelTeachers::mdlDeleteTeacher($table,$data);

        if ($result) {
            # code...
            var_dump($data);

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
    $delete->churchid = $_POST["churchid"];
    $delete->deletePhoto =$_POST["deletePhoto"];
    $delete->deletePhone = $_POST["deletePhone"];
    $delete->ajaxDeleteTeacher();

}