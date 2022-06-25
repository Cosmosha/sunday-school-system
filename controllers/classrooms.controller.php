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

                            SweetAlert::alertSaved();

                        }else {
                            # code...
                            print_r("Save info Server Side Error!");
                        }
                    }else {
                        # code...
                        SweetAlert::alertDuplicateItem();
                    }


                }else{

                    # code...
                    SweetAlert::alertInvalidChar();
                }

                    
            }else {
                # code...
                SweetAlert::alertErrorFilelds();
                
            }
            
        }

    }



    //
    // ─── SHOW CLASSROOM LIST ───────────────────────────────────────────────────────
    //

    public static function ctrShowClassList($item, $value){

        $table = "class";

        $result = ModelClassRoom::mdlShowClassList($table, $item, $value);

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

                        SweetAlert::alertUpdate();

                    }else{
                        var_dump("Info Update Server Side Error!");
                    }


                }else{
                    SweetAlert::alertInvalidChar();
                }


            }else{
                SweetAlert::alertErrorFilelds();
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
            $data =  $_GET["deleteClass"];
            $church_id = $_SESSION["churchid"];

            $result = ModelClassRoom::mdlDeleteClassRoom($table, $data,$church_id);

            if ($result == "ok") {
                # code...

                SweetAlert::alertDelete();
            }else {
                # code...
                echo "Something is wrong";
            }

        }

    }




}
