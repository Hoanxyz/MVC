<?php

define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
define("BASE_URL", str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

require BASE_URL."vendor/autoload.php";

use Config\core;

use URL\router;
use URL\request;
use URL\dispatcher;

$dispatch = new Dispatcher();
$dispatch->dispatch();

?>