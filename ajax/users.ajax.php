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