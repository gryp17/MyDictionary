<?php

#mbstring encoding
mb_internal_encoding("UTF-8");

require_once "config/Config.php";
require_once "core/ErrorCodes.php";
require_once "core/App.php";
require_once "core/Validator.php";
require_once "core/Controller.php";
require_once "core/DB.php";
require_once "core/Utils.php";

session_start();

$app = new App();


