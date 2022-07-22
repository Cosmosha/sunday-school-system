<?php 


require_once "../controllers/users.controller.php";
require_once "../models/users.model.php";


class ajaxUser {


    //
    // ─── EDIT USER ───────────────────────────────────────────────────────────────
    //

    public $idUser;
    public function ajaxEditUser(){

        $item = "user_id";
        $value = $this->idUser;

        $answer = ControllerUsers::ctrShowUsersList($item, $value);

        echo json_encode($answer);

    }

    
    //
    // ───USER STATUS ACTIVATION──────────────────────────────────────────────────────────────
    //

    public $userId;
    public $userStatus;
    public function ajaxUserStatus(){

        $table = "user";
        $item1 = "user_status";
        $value1= $this->userStatus;

        $item2 = "user_id";
        $value2 = $this->userId;

        $result = ModelUsers::MdlUpdateInfo($table, $item1, $value1, $item2, $value2);

    }


}

//
// ────────────────────────────────────────────── INITIATE EDIT AJAX FUNCTION ─────
//

if (isset($_POST["idUser"])) {
    # code...
    $editUser = new ajaxUser();
    $editUser->idUser = $_POST["idUser"];
    $editUser->ajaxEditUser();
}

//
// ────────────────────────────────────────────── INITIATE USER STATUS AJAX FUNCTION ─────
//

if (isset($_POST["userId"])) {
    # code...
    $activateUser = new ajaxUser();
    $activateUser ->userId = $_POST["userId"];
    $activateUser ->userStatus = $_POST["userStatus"];
    $activateUser ->ajaxUserStatus();
}