<?php

if(!session_id()) session_start();

require_once("App/App.php");
require_once("App/Controller.php");
require_once("App/Model.php");
require_once("App/Session.php");
require_once("App/Config.php");
require_once("vendor/autoload.php");

$app = new App();