<?php
namespace Classes\Dashboard\Controllers;
use Classes\Dashboard\Authentication;
use Classes\DatabaseTable;

class Blogs{

    private $pageTitle = "Blog";

    public function __construct(private DatabaseTable $blogsTable, private DatabaseTable $categoriesTable, private DatabaseTable $usersTable,private Authentication $authentication){

    }


    public function home(){

        $result = $this->blogsTable->findAll();
        $blogs = [];

        foreach($result as $row){
            $blogs[] = array(
                'blog_id'=>$row['blog_id'],
                'title'=>$row['title'],
                'author'=> $this->usersTable->find('user_id',$row['author_id'])[0],
                'content'=>$row['content'],
                'publish_date'=>$row['publish_date']
            );
        }

        // var_dump($blogs);

        return ['template'=> '/dashboard/displayBlogs.html.php', 'title'=> $this->pageTitle, 'variables'=>[
            'blogs'=>$blogs
        ]];

    }


    public function create(){
        
        $result = $this->categoriesTable->findAll();

        foreach($result as $row){
            $categories[]=array(
                'category_id'=>$row['category_id'],
                'category_name'=>$row['category_name']
            );
        }
        return ['template'=> '/dashboard/createBlog.html.php', 'title'=> $this->pageTitle, 'variables'=>[
            'categories'=>$categories
        ]];
        
    }

    public function createSubmit(){
        

        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        $author = $this->authentication->findUser();

        $date  = new \DateTime();

        $values = [
            'title'=>$title,
            'content'=>$content,
            'author_id'=>$author['user_id'],
            'category'=>$category,
            'featured_image'=> file_get_contents($_FILES['image']['tmp_name'])?? Null,
            'publish_date'=> $date->format('Y-m-d H:i:s')
        ];

        $this->blogsTable->insert($values);

        header('Location: /dashboard/blogs');


    }

    public function edit($id){

        $blog = $this->blogsTable->find('blog_id',$id)[0];
        $result = $this->categoriesTable->findAll();

        foreach($result as $row){
            $categories[]=array(
                'category_id'=>$row['category_id'],
                'category_name'=>$row['category_name']
            );
        }

        return ['template'=> '/dashboard/editBlog.html.php', 'title'=> $this->pageTitle, 'variables'=>[
            'blog'=>$blog,
            'categories'=>$categories
        ]];
    }

    public function editSubmit($id){

        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['category'];

        $values = [
            'blog_id'=>$id,
            'title'=>$title,
            'content'=>$content,
            'category'=>$category,
            'featured_image'=> file_get_contents($_FILES['image']['tmp_name'])?? Null,
        ];

        $this->blogsTable->update($values);

        header('Location: /dashboard/blogs');

    }

    public function delete($id){

        $this->blogsTable->delete('blog_id',$id);

        header('Location: /dashboard/blogs');

    }



}