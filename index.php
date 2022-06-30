<?php


require_once "controllers/template.controller.php";
require_once "controllers/users.controller.php";
require_once "controllers/teachers.controller.php";
require_once "controllers/classrooms.controller.php";
require_once "controllers/students.controller.php";

//
// ─── LOADING DATABASE MODEL ─────────────────────────────────────────────────────
//

require_once "models/users.model.php";
require_once "models/teachers.model.php";
require_once "models/classrooms.model.php";
require_once "models/students.model.php";


//
// ─── LOADING METHODS ────────────────────────────────────────────────────────────
//

require_once "views/alert.php";
// require_once "views/createFolder.php";

$template = new ControllerTemplate();
$template -> ctrTemplate();