<?php
namespace Classes\Website\Controllers;
use Classes\DatabaseTable;

 class WebsiteController{

    public function __construct(private DatabaseTable $pagesTable, private DatabaseTable $aboutSectionTable, private DatabaseTable $servicesTable, private DatabaseTable $portfolioTable ){

    }

    public function home(){
        $title = 'Homepage';

        $page = $this->pagesTable->find('slug','homepage')[0];
        $content = $page['content'];
        
        return ['title' => $title, 'content'=>$content];
    }
    public function about(){
        $title = 'About Us';


        $query = 'SELECT  * FROM `pages`  AS `page`  INNER JOIN `sections` ON 
        `page`.`content`= `page_id` 
        LEFT JOIN `about_us` ON `sections`.`content_id` = `about_us`.`section_id` 
        LEFT JOIN `team` ON `sections`.`content_id` = `team`.`section_id` WHERE `page`.`page_name` = "about"';

        $result = $this->aboutSectionTable->findAll($query);

        $aboutSection = [];
        $teamSection = [];

        foreach ($result as $row) {
            $aboutSection[] = array(
                'title' => $row['title'], 
                'paragraph' => $row['paragraph'],
                'image' => $row['image'],
                'contact_title' => $row['contact_title'],
                'contact_details' => $row['contact_details']
            );

            $teamSection[] = array(
                'firstname' => $row['firstname'], 
                'lastname' => $row['lastname'], 
                'position' => $row['position'],
                'profile_picture' => $row['profile_picture'],
                'display' => $row['display']
            );
        }

        return ['template' => 'website/about.html.php', 'title' => $title, 'variables'=>[
            'aboutSection' => $aboutSection,
            'teamSection' => $teamSection
        ]];
    }
    public function services(){
        $title = 'Services';


        $query = 'SELECT  * FROM `pages`  AS `page`  INNER JOIN `sections` ON 
        `page`.`content`= `page_id` 
        LEFT JOIN `services_section` ON `sections`.`content_id` = `services_section`.`section_id` 
        LEFT JOIN `services` ON `sections`.`content_id` = `services`.`section_id` WHERE `page`.`page_name` = "services"';

        $result = $this->servicesTable->findAll($query);

        $serviceSection = [];
        $services = [];


        foreach ($result as $row) {
            $serviceSection[] = array(
                'section_title' => $row['section_title'], 
                'section_paragraph' => $row['section_paragraph'],
                'section_image' => $row['section_image'],
                'section_image_caption' => $row['section_image_caption'],
                'vision' => $row['vision'],
                'goal' => $row['goal']
            );

            $services[] = array(
                'service_title' => $row['service_title'], 
                'service_icon' => $row['service_icon'],
                'service_description' => $row['service_description'],
                'service_icon_caption' => $row['service_icon_caption']
            );
        }


        return ['template' => 'website/services.html.php', 'title' => $title, 'variables'=>[
            'serviceSection' => $serviceSection,
            'services' => $services
        ]];
    }
    public function portfolio(...$route){

        $api = array_shift($route[0]);
        if($api === "projects"){
            $works = [];
            $result =$this->portfolioTable->findAll();

            foreach($result as $row){

        
                $works[] = array(
                    'id' => $row['id'],
                    'image'=> array(
                        'src'=>  base64_encode($row['project_image']),
                        'alt'=> $row['project_image_caption']
                    ),
                    'description' => $row['project_description']
                ); 
            }
            header('Content-Type: application/json');

            exit (json_encode($works));
        }

        $title = 'Portfolio';
        return ['template' => 'website/portfolio.html.php', 'title' => $title];
    }
    public function blog(){
        $title = 'Blog';
        return ['template' => 'website/blog.html.php', 'title' => $title];
    }
    public function contact(){

        $title = 'Contact Us';
        return ['template' => 'website/blog.html.php', 'title' => $title];
    }

    
}