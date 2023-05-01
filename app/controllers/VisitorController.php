<?php
namespace controllers;
use classes\DatabaseTable;
 class VisitorController{

    private $pdo;

    public function __construct($pdo){
       $this->pdo = $pdo;
    }

    public function home(){
        $title = 'Homepage';
        return ['template' => '/visitor/home.html.php', 'title' => $title];
    }
    public function about(){
        $title = 'About Us';

        

        $aboutSectionTable = new DatabaseTable($this->pdo,'about_us_section','id');

        $query = 'SELECT  * FROM `pages`  AS `page`  INNER JOIN `sections` ON 
        `page`.`content`= `page_id` 
        LEFT JOIN `about_us` ON `sections`.`content_id` = `about_us`.`section_id` 
        LEFT JOIN `team` ON `sections`.`content_id` = `team`.`section_id` WHERE `page`.`page_name` = "about"';

        $result = $aboutSectionTable->findAll($query);

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
        }

        foreach ($result as $row) {

            $teamSection[] = array(
                'member_name' => $row['member_name'], 
                'member_position' => $row['member_position']
            );
        }

        return ['template' => 'visitor/about.html.php', 'title' => $title, 'variables'=>[
            'aboutSection' => $aboutSection,
            'teamSection' => $teamSection
        ]];
    }
    public function services(){
        $title = 'Services';
        return ['template' => 'services.html.php', 'title' => $title];
    }
    public function portfolio(){
        $title = 'Portfolio';
        return ['template' => 'portfolio.html.php', 'title' => $title];
    }
    public function blog(){
        $title = 'Blog';
        return ['template' => 'blog.html.php', 'title' => $title];
    }
    public function contact(){
        $title = 'Contact Us';
        return ['template' => 'blog.html.php', 'title' => $title];
    }
}