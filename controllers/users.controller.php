<?php

class ControllerUsers{



  //
  // ─── USER LOGIN ─────────────────────────────────────────────────────────────────
  //

    static public function ctrUserLogin(){
    
        if (isset($_POST["useremail"])) {
            # code...

            $email = $_POST["useremail"];

            if (filter_var($email, FILTER_VALIDATE_EMAIL) && 
                preg_match('/^[a-zA-Z0-9@#_!]+$/', $_POST["userpassword"] )) {

                                        
                    $table = "user";
                    $item = "user_email";
                    $value = $email;
                    $password =  $_POST["userpassword"];

                    // Fetch Result From USERS TABLE
                    $result = ModelUsers::MdlShowUsers($table, $item, $value);

                    

                    if ($result["user_email"]== $value && $result["password"]== $password ) {
                        # code...

                        
                        $table2 = "teacher";
                        $item2 = "teacher_email";
                        $value = $email;

                        //Fetch Result From TEACHER TABLE WHERE EMAIL EQUAL TEACHER EMAIL
                        $answer = ModelUsers::MdlShowUsers($table2, $item2, $value);


                        $table3 = "church";
                        $item3 = "church_id";
                        $churchid = $result["church_id"];

                        //Fetch Result From CHURCH TABLE WITH CHURCH ID FROM USER TABLE
                        $respond = ModelUsers::MdlShowUsers($table3, $item3, $churchid);
                        

                        if ($result["user_status"]==1) {
                            # code...

                            $_SESSION["verification"] = "ok";
                            
                            $_SESSION["churchid"] = $churchid;
                            $_SESSION["churchname"] = $respond["church_name"];


                            $_SESSION["fname"] = $answer["teacher_firstname"];
                            $_SESSION["lname"] = $answer["teacher_lastname"];
                            $_SESSION["photo"] = $answer["teacher_photo"];
                            $_SESSION["gender"] = $answer["teacher_gender"];


                            $_SESSION["username"] = $result["user_name"];
                            $_SESSION["useremail"] = $result["user_email"];


                            // Register Last Login Date and Time

                            date_default_timezone_set("Africa/Accra");

                            $date = date("Y-m-d");
                            $hour = date("H:i:s");

                            $currentDate = $date.' '.$hour;

                            $item1 = "last_login";
                            $value1 = $currentDate;

                            $item2 = "user_id";
                            $value2 = $result["user_id"];

                            //UPDATE USER LOGIN DATE TIME
                            $last_login = ModelUsers::MdlUpdateInfo($table, $item1, $value1, $item2, $value2);

                            if ($last_login == "ok") {
                                # code...

                                echo'<script>
                                        window.location = "dashboard";
                                    </script>';
                                
                                
                            }


                        }else {
                            # code...
                            echo'<div class="alert alert-danger text-center"> <i class="ti-user"></i> User Status In-Active Detected <br><span class="text-center">Access Denied!</span> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                            </div>';
                        }



                    }else {
                        # code...

                        echo'<div class="tst4 alert alert-danger text-center"> <i class="ti-user"></i>  Incorrect Email or Password.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                            </div>';  
                    }

                }else{
                    
                    echo'<div class="tst4 alert alert-danger text-center"> <i class="ti-user"></i>  Invalid Input. <br><span class="text-center">Special Character not Accepted!</span> 
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                    </div>'; 

                }
            

        }

    }



  //
  // ─── SHOW USER LIST ───────────────────────────────────────────────────────
  //

    public static function ctrShowUsersList($item, $value){

        $table = "user";

        $result = ModelUsers::MdlShowUsers($table, $item, $value);

        return $result;

    }


  //
  // ─── ADD USER ───────────────────────────────────────────────────────────────────
  //
    
 


  
    //
    // ─── Reset Password  ───────────────────────────────────────────────────────────────────────────
    //

    private static function randPassword($len){
        $char = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ@!^#-_';
        return substr(str_shuffle($char), 0, $len);
    }

    static public function ctrRecoveryPassword(){
 
        if (isset($_POST["passRest"])) {
            # code...
            

            $table = "user";
            $item = "user_email";
            $value = $_POST["passRest"];
           
            $result = ModelUsers::MdlShowUsers($table, $item, $value);

            if ($result["user_email"]==$value) {
                # code...

                // $verify =md5(rand());

                $pass = self::randPassword(8);
                
                
                $email = $value;
                $subject = 'RESET PASSWORD REQUEST ';
                $message = 'Dear '.ucwords($result["user_name"]).',<br> <p>A request to RESET your PASSWORD for your User Account was received<p/>
                            <p>Please discard this email if request was not sent by YOU. <p/>';
                $message .= 'Please change your PASSWORD after using the Reset PIN below.<br>
                Your Generated RESET PASSWORD is <strong class="text" style="font-size: 25px; font-weight: 1200;"> '. $pass .' </strong>';

                try {
                    //code...
                    $send = new Mailier();
                    $send -> SendMail($message, $subject, $email);

                } catch (\Throwable $th) {
                    //throw $th;
                    echo "<script> console.log('.$th.')</script>";
                }

                $passRecover = password_hash($pass, PASSWORD_DEFAULT);

 


            }else {
                # code...
                echo' <div class="alert alert-danger text-center"> <i class="ti-user"></i> User <?php $_SESSION["email"] ?> Not Recognized.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                     </div>'; 
            
            }

        }

    }

  




}

