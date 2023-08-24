<?php
namespace Classes\Dashboard;

class Authentication{
    

    public function __construct( private \Classes\DatabaseTable $usersTable, private string $userColumn, private string $passwordColumn ){          
        session_start();
    }

    
    public function getUser($method){
        if(filter_var($method, FILTER_VALIDATE_EMAIL)){
            $user = $this->usersTable->find('email', strtolower($method));

        }else{
            $user = $this->usersTable->find('username', strtolower($method));
        }

        return $user;
    }

    public function findUser(){
        $user = $this->usersTable->find('email', strtolower($_SESSION['username']))[0];
        return $user;
    }


    public function login (string $username, string $password) : bool {

    $user = $this->getUser($username)[0];

    if(!empty($user) && password_verify($password, $user['password']) ){

        session_regenerate_id();

        $_SESSION['username'] = $user['email'];
        $_SESSION['password'] = $user['password'];

            return true;
    }else{
        return false;
    }

    }

    public function isLoggedIn(): bool {
        if (empty($_SESSION['username'])) {
        return false;
        }
        $user = $this->usersTable->find($this->userColumn,$_SESSION['username']);
        if (!empty($user) && $user[0][$this->passwordColumn] === $_SESSION['password']) {
        return true;
        } else {
        return false;
        }
    }

    public function logout(){

        unset($_SESSION['username']);
        unset($_SESSION['password']);
        session_regenerate_id();
    }

}