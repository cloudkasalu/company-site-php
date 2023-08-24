<?php
namespace Classes\Dashboard\Controllers;
use Classes\DatabaseTable;

class Dashboard{

    public function __construct(){

    }


    public function home(){
        $title = "dashboard";
        return ['template'=> '/dashboard/home.html.php', 'title'=> $title];

    }



}