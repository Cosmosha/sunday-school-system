<?php 

require_once "../controllers/attendancelist.controller.php";
require_once "../models/attendance.model.php";

class ajaxClassAttendance{


    public $Classid;
    public $Churchid;
    public  function ajaxAttendance(){

        $table = "student";

        $data = array('class_id'=> $this->Classid, 
                    'church_id'=>$this->Churchid);

        $result = ModelClassAttendance::mdlShowStudentClass($table, $data);

        echo json_encode($result);

    }


}


//
// ──────────────────────────────────────────── INITIATE ATTENDANCELIST AJAX FUNCTION ─────
//

if (isset($_POST["Churchid"])) {
    # code...

    $attend = new ajaxClassAttendance();
    $attend->Classid = $_POST["Classid"];
    $attend->Churchid = $_POST["Churchid"];
    $attend->ajaxAttendance();

}