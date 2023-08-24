<?php 

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../includes/global.php';

$url = strtok(ltrim($_SERVER['REQUEST_URI'], '/'), '?');

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$entryPoint = new \Classes\EntryPoint( new \Classes\Website\Router(), new \Classes\Dashboard\DashboardRouter());
$entryPoint->run($url);

