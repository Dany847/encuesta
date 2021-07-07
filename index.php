<?php

/** https://stackoverflow.com/questions/3531703/how-do-i-log-errors-and-warnings-into-a-file */
error_reporting(E_ALL); // Error/Exception engine, always use E_ALL

ini_set('ignore_repeated_errors', TRUE); // always use TRUE

ini_set('display_errors', FALSE); // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment

ini_set('log_errors', TRUE); // Error/Exception file logging engine.
ini_set('error_log', 'errors.log'); // Logging file path
// error_log("Prueba de errores");

require_once "libs/db.php";
require_once "classes/errormessages.php";
require_once "classes/successmessages.php";
require_once "libs/controller.php";
require_once "libs/model.php";
require_once "libs/view.php";
require_once "classes/sessioncontroller.php";
require_once "libs/app.php";
require_once "config/config.php";
require "vendor/autoload.php";
require_once "libs/initIlluminate.php"; //Para usar ILLuminate
$app = new Libs\App();
