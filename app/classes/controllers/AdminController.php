<?php
namespace Classes\Controllers;
use Classes\DatabaseTable;

class AdminController{

    private $pdo;
    private $portfolioTable;
    private $servicesTable;
    private $blogTable;

    private $usersTable;
    private $authentication;

    public function __construct($pdo,$auth){
        $this->pdo = $pdo;
        $this->authentication = $auth;
        $this->portfolioTable = new DatabaseTable($this->pdo,'portfolio','id');
        $this->servicesTable =  new DatabaseTable($this->pdo,'services','id');
        $this->blogTable =  new DatabaseTable($this->pdo,'blog','id');
        $this->usersTable = new DatabaseTable($this->pdo, 'users', 'id');
    }


    public function home(){
        $title = "Admin";
        return ['template'=> '/admin/home.html.php', 'title'=> $title];

    }

    public function aboutSection(){

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
    
                http_response_code(301);
                header('Location: /dashboard');
    
            }else {
    
                $title = "Edit About Us Section";
                
                $aboutSection = $aboutSectionTable->findAll();
        
                return ['template'=> '/admin/aboutSection.html.php', 'title'=> $title, 'variables'=>[
                    'aboutSection'=> $aboutSection
                ]];
    
            }

    }


    public function aboutTeam($variables = null){

            $aboutTeamTable = new DatabaseTable($this->pdo,'team','id');

            if($_SERVER['REQUEST_METHOD'] === 'POST'){

                $values= [
                    'member_name' => $_POST['name'],
                    'member_position' => $_POST['position'],
                    'profile_image' => file_get_contents($_FILES['image']['tmp_name']),
                    'profile_image_caption' => $_POST['caption'],
                    'id' => $_POST['id']
                ];

                $aboutTeamTable->update($values);
    
                http_response_code(301);
                header('Location: /dashboard/about/team');

            
            }else{

                $id = array_shift($variables);
                if($id){
                    $title = "Edit Member";
                    $member = $aboutTeamTable->find('id',$id);
            
                    return ['template'=> '/admin/editTeam.html.php', 'title'=> $title, 'variables'=>[
                        'member'=> $member
                    ]];
                }

                $title = "View Team Members";
                
                $aboutTeam = $aboutTeamTable->findAll();
        
                return ['template'=> '/admin/viewTeam.html.php', 'title'=> $title, 'variables'=>[
                    'aboutTeam'=> $aboutTeam
                ]];

            }

    }

    public function servicesSection(){

        $serviceSectionTable = new DatabaseTable($this->pdo,'services_section','id');
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $values= [
                'section_title' => $_POST['title'], 
                'section_paragraph' => $_POST['paragraph'],
                'section_image' => file_get_contents($_FILES['image']['tmp_name']),
                'section_image_caption' => $_POST['caption'],
                'vision' => $_POST['vision'],
                'goal' => $_POST['goal'],
                'id'=> 1
            ];

            $serviceSection = $serviceSectionTable->update($values);

            http_response_code(301);
            header('Location: /dashboard');
        }else{
                $title = "Edit Services Section";
                    
                $serviceSection = $serviceSectionTable->findAll();
        
                return ['template'=> '/admin/serviceSection.html.php', 'title'=> $title, 'variables'=>[
                    'serviceSection'=> $serviceSection
                ]];

        }
    }

    private function editService($id){
        $title = "Edit Service";
        $service = $this->servicesTable->find('id',$id);

        return ['template'=> '/admin/editService.html.php', 'title'=> $title, 'variables'=>[
            'service'=> $service
        ]];

    }

    public function servicesList ($variables){

            if($_SERVER['REQUEST_METHOD'] === 'POST'){

                if(isset($_POST['id'])){

                    $date = new \DateTime();
                    $values= [
                        'id' => $_POST['id'],
                        'service_title' => $_POST['name'],
                        'service_description' => $_POST['description'],
                        'service_icon' => file_get_contents($_FILES['image']['tmp_name']),
                        'service_icon_caption' => $_POST['caption'],
                        'date' => $date->format('Y-m-d H:i:s')

                    ];
    
                    $this->servicesTable->update($values);
                    http_response_code(301);
                    header('Location: /dashboard/services/list');
                }else{
                    $date = new \DateTime();
                    $values= [
                        'section_id' => 4,
                        'service_title' => $_POST['name'],
                        'service_description' => $_POST['description'],
                        'service_icon' => file_get_contents($_FILES['image']['tmp_name']),
                        'service_icon_caption' => $_POST['caption'],
                        'date' => $date->format('Y-m-d H:i:s')
                    ];
    
                    $this->servicesTable->insert($values);
                    http_response_code(301);
                    header('Location: /dashboard/services/list');

                }

            }else{

                $route = array_shift($variables);
                if($route === "edit"){

                    $id = array_shift($variables);
                    return $this->editService($id);

                }else if($route === "create"){
                    $title = "Create Service";
                    return ['template'=> '/admin/postService.html.php', 'title'=> $title];
                }

                $title = "View Services";
                
                $services = $this->servicesTable->findAll();
        
                return ['template'=> '/admin/viewServices.html.php', 'title'=> $title, 'variables'=>[
                    'services'=> $services
                ]];

            }
    }

    public function portfolio($variables){

        $title = "View Projects";
            
        $projects = $this->portfolioTable->findAll();

        return ['template'=> '/admin/viewProjects.html.php', 'title'=> $title, 'variables'=>[
            'projects'=> $projects
        ]];

    }

    public function portfolioEdit($variables){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){

                if(isset($_POST['id'])){

                    $values= [
                        'id' => $_POST['id'],
                        'project_name' => $_POST['name'],
                        'project_description' => $_POST['description'],
                        'project_image' => file_get_contents($_FILES['image']['tmp_name']),
                        'project_image_caption' => $_POST['caption'],

                    ];
    
                    $this->portfolioTable->update($values);
                    http_response_code(301);
                    header('Location: /dashboard/portfolio');
                }

            }else{

                    $id = array_shift($variables);

                    echo $id;
                    $title = "Edit Project";
                    $project = $this->portfolioTable->find('id',$id);
            
                    return ['template'=> '/admin/editProject.html.php', 'title'=> $title, 'variables'=>[
                        'project'=> $project
                    ]];
            }
    }

    public function portfolioPost($variables){

            if($_SERVER['REQUEST_METHOD'] === 'POST'){

                    $date = new \DateTime();
                    $values= [
                        'section_id' => 5,
                        'project_name' => $_POST['name'],
                        'project_description' => $_POST['description'],
                        'project_image' => file_get_contents($_FILES['image']['tmp_name']),
                        'project_image_caption' => $_POST['caption'],
                        'project_date' => $date->format('Y-m-d H:i:s')
                    ];
    
                    $this->portfolioTable->insert($values);
                    http_response_code(301);
                    header('Location: /dashboard/portfolio');

                }else{
                    $title = "Create Service";
                    return ['template'=> '/admin/postProject.html.php', 'title'=> $title];
                }
    }

    public function blog($variables){

            $title = "View Article";

            $query = 'SELECT * FROM `blog` INNER JOIN `users` ON `blog`.`author_id` = `users`.`id`';
                
            $articles = $this->blogTable->findAll($query);
    
            return ['template'=> '/admin/viewArticles.html.php', 'title'=> $title, 'variables'=>[
                'articles'=> $articles
            ]];

    }

    public function blogPost(){
  

            if($_SERVER['REQUEST_METHOD'] === 'POST'){

                $author = $this->authentication->findUser($_SESSION['username']);
                $date = new \DateTime();

                var_dump($author);

                    $values= [
                        'section_id' => 6,
                        'author_id' => $author['id'],
                        'post_title' => $_POST['title'],
                        'post_paragraph' => $_POST['paragraph'],
                        'post_image' => file_get_contents($_FILES['image']['tmp_name']),
                        'post_image_caption' => $_POST['caption'],
                        'post_date' => $date->format('Y-m-d H:i:s')
                    ];
    
                    $this->blogTable->insert($values);
                    http_response_code(301);
                    header('Location: /dashboard/blog');

                }else{

                    $title = "Create Service";
                    return ['template'=> '/admin/postArticle.html.php', 'title'=> $title];
 


            }


    }
    public function blogEdit($variables){

            if($_SERVER['REQUEST_METHOD'] === 'POST'){

                    $values= [
                        'id' => $_POST['id'],
                        'post_title' => $_POST['title'],
                        'post_paragraph' => $_POST['paragraph'],
                        'post_image' => file_get_contents($_FILES['image']['tmp_name']),
                        'post_image_caption' => $_POST['caption'],

                    ];
    
                    $this->blogTable->update($values);
                    http_response_code(301);
                    header('Location: /dashboard/blog');
                }else{

                    $id = array_shift($variables);

                    $title = "Edit Article";
                    $article = $this->blogTable->find('id',$id);
            
                    return ['template'=> '/admin/editArticle.html.php', 'title'=> $title, 'variables'=>[
                        'article'=> $article
                    ]];


            }

    }


    public function register(){

        $title = "Register";

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $errors = [];

            $email = $_POST['email'];
            $name = $_POST['name'];
            $password = $_POST['password'];

            if(empty($name)){
                $errors[] = "Enter  Name";
            }
            if(empty($email)){
                $errors[] = "Enter  Password";
            }
                else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                    $errors[] = 'Enter Valid Email';
                }else if ($this->usersTable->find('email', $email) !== false) {
                    $errors[] = 'That email address is already registered';
                }
                    
            if(empty($password)){
                $errors[] = "Enter  Password";
            }

            if(empty($errors)){
                
                $values = [
                    'username' => $_POST['name'],
                    'email' => $_POST['email'],
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
                ];

                $this->usersTable->insert($values);

                header('Location: /dashboard');
            }

            return ['template' => '/admin/register.html.php', 'title' => $title, 'variables'=>[
                'errors' => $errors,
            ]];

        }

        return ['template' => '/admin/register.html.php', 'title' => $title];

    }
    public function registerSuccess(){
    

    }

}