<?php

if(!isset($_SESSION)){
    session_start();
}

class ControllerEvent{

    static public function ctrAddEvent(){

        if (isset($_POST["eventname"])) {
            # code...
            $eventname = $_POST["eventname"];
            $eventcolor = $_POST["eventcolor"];
            $eventstart = $_POST["eventstart"];
            $eventend = $_POST["eventend"];

            if (!empty($eventname) && !empty($eventcolor) && !empty($eventstart) && !empty($eventend)) {
                # code...
                $table = "event_calendar";

                if (preg_match('/^[a-zA-Z0-9- ]+$/', $eventname)) {
                    # code...
                    $data = array('event_name' => $eventname, 
                    'event_start' => $eventstart,
                    'event_end' => $eventend,
                    'event_color' => $eventcolor,
                    'church_id'=> $_SESSION["churchid"]);

                   // var_dump($data);

                    $result = ModelEvent::mdlAddEvent($table, $data);

                    //var_dump($result);

                    if ($result=="ok") {
                        # code...
                        $message = "Calendar Event Saved";
                        SweetAlert::alertSaved($message);
                    }else {
                        # code...
                        print_r("Save event Server Side Error!");
                    }


                }else {
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
    // ─── SHOW EVENTS LIST ───────────────────────────────────────────────────────
    //

    public static function ctrShowEvent(){
       
        $table = "event_calendar";
        $data = array('church_id'=> $_SESSION["churchid"]);

        $result = ModelEvent::mdlShowEvent($table, $data);

        return $result;

    }

    

}

