<?php
namespace Classes\Dashboard\Controllers;
use Classes\Dashboard\Authentication;
use Classes\DatabaseTable;

class Pages{

    private $pageTitle = "Pages";

    public function __construct(private DatabaseTable $pagesTable){

    }


    public function home(){

        $result = $this->pagesTable->findAll();

        foreach($result as $row){
            $pages[] = array(
                'page_id'=>$row['page_id'],
                'title'=>$row['title'],
                'url'=>$row['url'],
                'publish_date'=>$row['publish_date'],
                'update_date'=>$row['update_date'],
            );
        }

        return ['template'=> '/dashboard/displayPages.html.php', 'title'=> $this->pageTitle, 'variables'=>[
            'pages'=>$pages ?? []
        ]];

    }


    public function create(){

        return ['template'=> '/dashboard/createPage.html.php', 'title'=> $this->pageTitle, 'variables'=>[
            
        ]];
        
    }

    public function createSubmit(){
        

        $title = $_POST['title'];
        $content = $_POST['content'];
        // $url = $_POST['url'];
        $slug = $_POST['slug'];
        $meta_keywords = $_POST['meta-keywords'];
        $meta_description = $_POST['meta-description'];
        $visibility = $_POST['visibility'];
        // $author = $this->authentication->findUser($_SESSION['username']);
        $date  = new \DateTime();

        $values = [
            'title'=>$title,
            'content'=>$content,
            'slug'=>$slug,
            'url'=>'/'.$slug,
            'meta_keywords'=>$meta_keywords,
            'meta_description'=>$meta_description,
            'update_date'=> $date->format('Y-m-d H:i:s'),
            'publish_date'=> $date->format('Y-m-d H:i:s'),
            'visibility'=>$visibility
        ];

        $this->pagesTable->insert($values);

        header('Location: /dashboard/pages');


    }

    public function edit($id){

        $page = $this->pagesTable->find('page_id',$id[0])[0];
        return ['template'=> '/dashboard/editPage.html.php', 'title'=> $this->pageTitle, 'variables'=>[
            'page'=>$page
        ]];
    }

    public function editSubmit(){

        $title = $_POST['title'];
        $content = $_POST['content'];
        // $url = $_POST['url'];
        $slug = $_POST['slug'];
        $meta_keywords = $_POST['meta-keywords'];
        $meta_description = $_POST['meta-description'];
        $visibility = $_POST['visibility'];
        $date  = new \DateTime();

        $values = [
            'title'=>$title,
            'content'=>$content,
            'url'=>'/'.$slug,
            'slug'=>$slug,
            'meta_keywords'=>$meta_keywords,
            'meta_description'=>$meta_description,
            'update_date'=> $date->format('Y-m-d H:i:s'),
            'visibility'=>$visibility
        ];

        $this->pagesTable->update($values);

        header('Location: /dashboard/pages');

    }

    public function delete($id){
  
        $this->pagesTable->delete('page_id',$id);

        header('Location: /dashboard/pages');

    }


}