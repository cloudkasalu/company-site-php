<?php 


// include_once '../classes/EntryPoint.php';
include __DIR__ . '/../includes/autoload.php';

$url = strtok(ltrim($_SERVER['REQUEST_URI'], '/'), '?');

$entryPoint = new \classes\EntryPoint();
$entryPoint->run($url);

