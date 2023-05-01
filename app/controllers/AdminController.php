<?php
namespace controllers;
use classes\DatabaseTable;

class AdminController{

    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }


    public function home(){
        $title = "Admin";

        return ['template'=> '/admin/home.html.php', 'title'=> $title];

    }

    public function about(){

        $aboutSectionTable = new DatabaseTable($this->pdo,'about_us','id');

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $values= [
                'title' => $_POST['title'],
                'paragraph' => $_POST['paragraph'],
                'image' => file_get_contents($_FILES['image']['tmp_name']),
                'contact_title' => $_POST['contactTitle'],
                'contact_details' => $_POST['contactNumber'],
                'id' => 1
            ];

            $aboutSection = $aboutSectionTable->update($values);

            header('Location: /dashboard');

        }else{

            $title = "Edit About Us Section";

            $aboutSection = $aboutSectionTable->findAll();
    
            return ['template'=> '/admin/about_us.html.php', 'title'=> $title, 'variables'=>[
                'aboutSection'=> $aboutSection
            ]];

        }
    }

}