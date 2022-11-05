<?php


class ControllerClassRoom{

    //
    // ─── ADD CLASSROOM ─────────────────────────────────────────────────────────────
    //

    static public function ctrAddClass(){


        if (isset($_POST["class_name"])) {
            # code...

            $classname = $_POST["class_name"];
            $class_capacity = $_POST["class_capacity"];

            if (!empty($classname) && !empty($class_capacity)) {
                # code...
                $table = "class";
                

                if (preg_match('/^[a-zA-Z0-9- ]+$/', $classname) && preg_match('/^[0-9]+$/', $class_capacity)) {
                    # code...

                    $item = "class_name";
                    $value = $classname;

                    //Fetch Class Name From Class TAble To Check if Class Name Exit
                    $answer = ModelClassRoom::mdlShowClassList($table, $item, $value);
                    
                    if ($answer["class_name"] != $classname) {
                        # code...

                        $data = array('class_name' => $classname,
                        'class_capacity' => $class_capacity,
                        'church_id'=> $_SESSION["churchid"]);

                        $result = ModelClassRoom::mdlAddClassRoom($table, $data);

                        if ($result == "ok" ) {
                            # code...

                            $message = "Classroom Recoreds Saved";
                            SweetAlert::alertSaved($message);

                        }else {
                            # code...
                            print_r("Save info Server Side Error!");
                        }
                    }else {
                        # code...
                        $message = "Records Already Exist";
                        SweetAlert::alertDuplicateItem($message);
                    }


                }else{

                    # code...
                    SweetAlert::alertInvalidChar();
                }

                    
            }else {
                # code...
                $message = "All Fields are Required";
                SweetAlert::alertErrorFilelds($message);
                
            }
            
        }

    }



    //
    // ─── SHOW CLASSROOM LIST ───────────────────────────────────────────────────────
    //

    public static function ctrShowClassList($classid){

        $table = "class";


        $data = array('class_id'=>$classid,
                      'church_id'=> $_SESSION["churchid"]);

        $result = ModelClassRoom::mdlShowClassList($table, $data, $classid);

        return $result;

    }




    //
    // ─── EDIT CLASSROOM ─────────────────────────────────────────────────────────────
    //

    static public function ctrEditCLass(){

        if (isset($_POST["idClass"])) {
            # code...

            $editname = $_POST["editname"];
            $editcapacity = $_POST["editcapacity"];

            if (!empty($editname) && !empty($editcapacity)) {
                # code...

                $table = "class";

                if (preg_match('/^[a-zA-Z0-9 ]+$/', $editname) && preg_match('/^[0-9]+$/', $editcapacity)) {
                    # code...

                    $table = "class";
                    $church_id = $_SESSION["churchid"];

                    $data = array('class_name' => $editname,
                            'class_capacity' => $editcapacity,
                            'church_id' => $church_id,
                            'class_id'=> $_POST["idClass"]);


                   $result = ModelClassRoom::mdlUpdateClassRoom($table, $data);


                    if ($result == "ok") {
                        # code...

                        $message = "Classroom Records Modified";
                        SweetAlert::alertUpdate($message);

                    }else{
                        print_r("Info Update Server Side Error!");
                    }


                }else{
                    SweetAlert::alertInvalidChar();
                }


            }else{
                $message= "All Fields are Required";
                SweetAlert::alertErrorFilelds($message);
            }

        }

    }




    //
    // ─── DELETE CLASSROOM ───────────────────────────────────────────────────────────
    //

    static public function ctrDeleteClass(){


        if (isset($_GET["deleteClass"])) {
            # code...

            $table = "class";
            $classid =  $_GET["deleteClass"];
            $church_id = $_SESSION["churchid"];

            $data = array('user_id'=>$classid,
                'church_id'=>$church_id);

            $result = ModelClassRoom::mdlDeleteClassRoom($table, $data);

            if ($result == "ok") {
                # code...

                $message = "Classroom Records Deleted";
                SweetAlert::alertDelete($message);
            }else {
                # code...
                echo "Something is wrong";
            }

        }

    }




}
