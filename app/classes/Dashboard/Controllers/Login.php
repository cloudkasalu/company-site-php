<?php
namespace Classes\Dashboard\Controllers;
use Classes\DatabaseTable;

class Login{
    public function __construct(private DatabaseTable $usersTable, private  \classes\Dashboard\Authentication $authentication){

                    
    }

    public function home(){

        $title = "login";
        return ['template' => 'login.html.php', 'title' => $title];

    }


    public function loginSubmit(){

        $title = "login";
        $errors = [];
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!isset($username)){
            $errors[] = "Enter Email Or Name";
            
        }else if(!$this->authentication->getUser($username)){
            $errors[] = "Invalid Email or Username";

        }
        if(!isset($password)){
            $errors[] = "Enter  Password";
        }

        if(empty($errors)){

            $success = $this->authentication->login($username,$password);

            if($success){
                header('Location: /dashboard');
            }else{
                return ['template' => 'login.html.php', 'title' => $title];
            }

        }

        return ['template' => 'login.html.php', 'title' => $title, 'variables'=>[
            'errors' => $errors,
        ]];


    }


    public function logout() {
        $this->authentication->logout();
        header('location: /');
        }
        
}