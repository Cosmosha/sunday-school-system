<?php 

require_once "../models/event.model.php";
require_once "../controllers/event.controller.php";


$data = array();
$answer = ControllerEvent::ctrShowEvent();


foreach ($answer as $key => $row) {
    # code...
    $data[] = array(
        'id' => $row["event_id"], 
        'title'=>$row["event_name"],
        'start_event'=>$row["event_start"],
        'end_event'=>$row["event_end"], 
        'color_event' => $row["event_color"]
    );

}

echo json_encode($data);
