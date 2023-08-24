<?php
namespace Classes\Dashboard\Controllers;
use Classes\DatabaseTable;

class Users{

    private $pageTitle = "Users";

    public function __construct(private DatabaseTable $usersTable,private DatabaseTable $groupsTable){

    }

    public function home(){

        $result = $this->usersTable->findAll();
        foreach ($result as $row) {

            $users[] = array(
                'user_id' => $row['user_id'],
                'firstname'=> $row['firstname'],
                'lastname'=> $row['lastname'],
                'email'=> $row['email'],
                'gender'=> $row['gender'],
            );
        }

        return ['template' => '/dashboard/displayUsers.html.php', 'title' => $this->pageTitle, 'variables'=>[
            'users'=>$users
            
        ]];

    }

    public function register(){

        $result = $this->groupsTable->findAll();
        foreach ($result as $row) {

            $groups[] = array(
                'group_id' => $row['group_id'],
                'group_name'=> $row['group_name']
            );
        }

        return ['template' => '/dashboard/createUser.html.php', 'title' => $this->pageTitle, 'variables'=>[
            'groups'=>$groups,
            ]];

    }

    public function registerSubmit(){

        $errors = [];

        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $group = $_POST['role'];
        $gender = $_POST['gender'];
        $birthday = $_POST['birthday'];
        $bio = $_POST['bio'];
        $password = $_POST['password'];


        if(empty($username)){
            $errors[] = "Enter  Username";
        }
        else if (count($this->usersTable->find('username', $username)) > 0) {
            $errors[] = 'This Username is taken';
        }
        if(empty($firstname)){
            $errors[] = "Enter  Firstname";
        }
        if(empty($lastname)){
            $errors[] = "Enter  Lastname";
        }
        if(empty($email)){
            $errors[] = "Enter  Email";
        }
        else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $errors[] = 'Enter Valid Email';
        }else if (count($this->usersTable->find('email', $email)) > 0) {
            $errors[] = 'That email address is already registered';
        }
        if(empty($password)){
            $errors[] = "Enter  Password";
        }
                

        if(empty($errors)){
            
            $values = [
                'picture' => file_get_contents($_FILES['image']['tmp_name'])?? Null,
                'username' => $username,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'phone' => $phone,
                'group' => $group,
                'gender' => $gender,
                'birthday' => $birthday,
                'bio' => $bio,
                'password' => password_hash($password, PASSWORD_DEFAULT),
            ];

            $this->usersTable->insert($values);

            header('Location: /dashboard/users');
        }else{
            $values = [
                'username' => $username,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'phone' => $phone,
                'group' => $group,
                'gender' => $gender,
                'birthday' => $birthday,
                'bio' => $bio,
            ];
            return ['template' => '/dashboard/createUser.html.php', 'title' => $this->pageTitle, 'variables'=>[
                'errors' => $errors,
                'values' => $values
            ]];
        }

    }


    public function edit($id){

        $result = $this->usersTable->find('user_id',$id);
        foreach ($result as $row) {

            $values[] = array(
                'user_id' => $row['user_id'],
                'firstname'=> $row['firstname'],
                'lastname'=> $row['lastname'],
                'email'=> $row['email'],
                'gender'=> $row['gender'],
            );
        }

        
        return ['template' => '/dashboard/editUser.html.php', 'title' => $this->pageTitle, 'variables'=>[
            'values' => $values
        ]];

    }

    public function editSubmit(){
        
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $group = $_POST['role'];
        $gender = $_POST['gender'];
        $birthday = $_POST['birthday'];
        $bio = $_POST['bio'];
        $password = $_POST['password'];

        $values = [
            'picture' => file_get_contents($_FILES['image']['tmp_name'])?? Null,
            'username' => $username,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'phone' => $phone,
            'group' => $group,
            'gender' => $gender,
            'birthday' => $birthday,
            'bio' => $bio,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];

        $this->usersTable->insert($values);

        header('Location: /dashboard/users');
    }
    public function delete($id){

        $this->usersTable->delete('user_id',$id);

        header('Location: /dashboard/users');

    }





}