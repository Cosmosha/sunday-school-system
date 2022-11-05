<?php 

if(!isset($_SESSION)){
    session_start();
}



//
// ──────────────────────────────────────────────────────────────────────────────── I ──────────
//   :::::: C L A S S R O O M   A J A X     D A T A T A B L E : :  :   :    :     :        :          :
// ──────────────────────────────────────────────────────────────────────────────────────────
//


require_once "../controllers/users.controller.php";
require_once "../models/users.model.php";

class UsersTable {

    //
    // ─── SHOW JSON USERS TABLE ──────────────────────────────────────────────────────
    //


    public static function showUsersTable(){
        
        $item = null;
        $value = null;

        $user = ControllerUsers::ctrShowUsersList($item, $value);

        $jsonData = '{

            
            "data": [';

            for ($i=0; $i < count($user); $i++) { 
                # code...


                //
                // ACTION BUTTONS
                //

                if ($user[$i]["user_status"] != 0) {
                    # code...
                    $status = "<button class='btn btn-sm btn-rounded btn-success btnActivate' userId='".$user[$i]["user_id"]."' userStatus='0'>Activated</button>";
                }else {
                    # code...
                    $status = "<button class='btn btn-sm btn-rounded btn-danger btnActivate' userId='".$user[$i]["user_id"]."' userStatus='1'>Deactivated</button>";
                }

                
                $actionBtn = "<i class='fa fa-pencil m-r-20 dark-i btnEditUser' idUser='".$user[$i]["user_id"]."'  data-toggle='modal' data-target='#editmodal' aria-hidden='true'></i> <i class='ti-trash m-l-10 dark-i btnDeleteUser' name='btnDeleteUser' deleteUser='".$user[$i]["user_id"]."' aria-hidden='true'></i>";     

                $jsonData .='[
                    "'.($i + 1).'",
                    "'.$user[$i]["user_name"].'",
                    "'.$user[$i]["user_email"].'",
                    "'.$status.'",
                    "'.$user[$i]["last_login"].'",
                    "'.$actionBtn.'"
                ],';

            } 
            $jsonData = substr($jsonData, 0, -1);

            $jsonData .= '] 
        }';   

        echo $jsonData;

    }

}

$getJsonData = new UsersTable();
$getJsonData -> showUsersTable();