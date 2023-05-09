<?php
namespace classes;

class Authentication{

    private $pdo;
    private $usersTable;



    public function __construct(DatabaseTable $userTable, private string $userColumn, private string $passwordColumn ){
        $this->usersTable = $userTable;            
        session_start();
    }

    

    private function getUser($method){
        if(filter_var($method, FILTER_VALIDATE_EMAIL)){
            $user = $this->usersTable->find('email', strtolower($method));

        }else{
            $user = $this->usersTable->find('username', strtolower($method));
        }

        return $user;
    }

    public function findUser($method){
        $user = $this->usersTable->find('username', strtolower($method));
        return $user;
    }


    public function login (string $username, string $password) : bool {

    $user = $this->getUser($username);

    if(!empty($user) && password_verify($password, $user['password']) ){

        session_regenerate_id();

        $_SESSION['username'] = $user['username'];
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
        if (!empty($user) && $user[$this->passwordColumn] === $_SESSION['password']) {
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