<?php 

if(!isset($_SESSION)){
    session_start();
}

require_once "../controllers/students.controller.php";
require_once "../models/students.model.php";

class studentAjax{

    //
    // ─── EDIT STUDENT ───────────────────────────────────────────────────────────────
    //

    public $idStudent;

    public function ajaxEditStudent(){

        $item = "student_id";
        $studentid = $this->idStudent;

        $answer = ControllerStudents::ctrShowStudentList($studentid);

        echo json_encode($answer);

    }


    //
    // ─── DELETE STUDENT ─────────────────────────────────────────────────────────────
    //

    public $deleteStudent;
    public $churchid;
    public $deletePhoto;
    public $deletePhone;
    public $deleteFname;
    public $deleteLname;
    public function ajaxDeleteStudent(){


        $table = "teacher";
        $student_id = $this->deleteStudent;
        $deletePhoto = $this->deletePhoto;
        $deleteDOB = $this->deleteDOB;
        $deleteFname = $this->deleteFname;
        $deleteLname = $this->deleteLname;
        $church_id = $this->churchid;
        $data = array('student_id' => $student_id, 
                        'church_id' => $church_id);

        
         $photoID = $deleteFname.".".$deleteLname."-".$deleteDOB;

        if ($deletePhoto != "") {
            # code...
            unlink($deletePhoto);   
            rmdir('views/img/students/'.$photoID);
        }

        $result = ModelStudents::mdlDeleteStudent($table, $data);

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

if (isset($_POST["idStudent"])) {
    # code...

    $editStudent = new studentAjax();
    $editStudent->idStudent = $_POST["idStudent"];
    $editStudent->ajaxEditStudent();

}


//
// ──────────────────────────────────────────── INITIATE DELETE AJAX FUNCTION ─────
//

if (isset($_POST["deleteStudent"])) {
    # code...

    $delete = new studentAjax();
    $delete->deleteStudent = $_POST["deleteStudent"];
    $delete->churchid = $_POST["churchid"];
    $delete->deletePhoto =$_POST["deletePhoto"];
    $delete->deleteDOB = $_POST["deleteDOB"];
    $delete->deleteFname =$_POST["deleteFname"];
    $delete->deleteLname = $_POST["deleteLname"];
    $delete->ajaxDeleteStudent();

}