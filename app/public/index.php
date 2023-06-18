<?php 

use Classes\EntryPoint;

require __DIR__ . '/../vendor/autoload.php';
include_once __DIR__ . '/../includes/global.php';


$url = strtok(ltrim($_SERVER['REQUEST_URI'], '/'), '?');

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$entryPoint = new EntryPoint();
$entryPoint->run($url);

