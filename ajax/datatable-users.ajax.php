<?php 

//
// ──────────────────────────────────────────────────────────────────────────────── I ──────────
//   :::::: C L A S S R O O M   A J A X     D A T A T A B L E : :  :   :    :     :        :          :
// ──────────────────────────────────────────────────────────────────────────────────────────
//


require_once "../controllers/users.controller.php";
require_once "../models/users.model.php";

class Users {

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

                $status = " <input type='checkbox' checked='' data-on-color='success' data-off-color='danger' data-on-text='Active' data-off-text='In-active'>";
                $actionBtn = "<i class='fa fa-pencil m-r-20 dark-i btnEditUser' idUser='".$user[$i]["user_id"]."'  data-toggle='modal' data-target='#editmodal' aria-hidden='true'></i> <i class='ti-trash m-l-10 dark-i btnDeleteUser' name='btnDeleteUser' deleteUser='".$user[$i]["user_id"]."' aria-hidden='true'></i>";     

                $jsonData .='[
                    "'.($i + 1).'",
                    "'.$user[$i]["user_name"].'",
                    "'.$user[$i]["user_email"].'",
                    "'.$user[$i]["Password"].'",
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
