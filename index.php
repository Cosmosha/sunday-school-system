<?php

//
// ─── LOADING CONTROLLERS ─────────────────────────────────────────────────────
//

require_once "controllers/template.controller.php";
require_once "controllers/users.controller.php";
require_once "controllers/teachers.controller.php";
require_once "controllers/classrooms.controller.php";
require_once "controllers/students.controller.php";
require_once "controllers/attendancelist.controller.php";
require_once "controllers/attendanceRecords.controller.php";
require_once "controllers/event.controller.php";

require_once "controllers/mailscript.php";

//
// ─── LOADING DATABASE MODEL ─────────────────────────────────────────────────────
//

require_once "models/users.model.php";
require_once "models/teachers.model.php";
require_once "models/classrooms.model.php";
require_once "models/students.model.php";
require_once "models/attendance.model.php";
require_once "models/event.model.php";


//
// ─── LOADING FUNCTIONS ────────────────────────────────────────────────────────────
//

require_once "views/alert.php";
require_once "views/createFolder.php";


//
// ─── INITIATE TEMPLATE CONTROLLER CLASS ─────────────────────────────────────────────────────
//

$template = new ControllerTemplate();
$template -> ctrTemplate();