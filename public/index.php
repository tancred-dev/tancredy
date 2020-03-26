<?php
ini_set("display_errors",1);
error_reporting(E_ALL);

require "../vendor/autoload.php";

$kernel = new Tancredy\Kernel();
$kernel->run();