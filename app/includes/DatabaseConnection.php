<?php


// $pdo = new PDO('mysql:host=mysql;dbname=company_site;charset=utf8mb4', 'admin', 'admin');


$pdo = new PDO('mysql:host=' . $_ENV['DB_HOST'] .';dbname='. $_ENV['DB_NAME'] .';charset=utf8mb4', 
                $_ENV['DB_USER'],
                $_ENV['DB_PASS']);


