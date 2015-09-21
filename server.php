<?php

error_reporting(E_ALL);
date_default_timezone_set('Asia/Manila');
define('ROOT', dirname(__FILE__));

require_once "vendor/autoload.php";

use Pugs\Application\Core;

$core = new Core;

return $core;