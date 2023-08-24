<?php
namespace Classes\Dashboard\Controllers;
use Classes\DatabaseTable;

class Categories{

    private $pageTitle = "Category";

    public function __construct(private DatabaseTable $categoriesTable){

    }


    public function home(){

        $result = $this->categoriesTable->findAll();

        foreach($result as $row){
            $categories[] = array(
                'category_id' => $row['category_id'],
                'category_name'=>$row['category_name'],
                'created_date' =>$row['created_date']
            );
        }

        return ['template'=> '/dashboard/displayCategories.html.php', 'title'=> $this->pageTitle, 'variables'=>[
            'categories'=>$categories
        ]];

    }

    public function createSubmit(){

        $errors= [];

        $category_name = $_POST['name'];

        $date = new \DateTime();

        if(empty($category_name)){
            $errors[] = "Enter Group Name";
        }
        else if (count($this->categoriesTable->find('category_name', $category_name)) > 0) {
            $errors[] = 'Category Already Exists';
        }

        if(empty($errors)){

            $values = [
                'category_name' => $category_name,
                'created_date'=> $date->format('Y-m-d H:i:s')
            ];
            $this->categoriesTable->insert($values);

            header('Location: /dashboard/categories');

        }

    }

    public function edit($id){

        $category = $this->categoriesTable->find('category_id',$id)[0];
        $result = $this->categoriesTable->findAll();

        foreach($result as $row){
            $categories[] = array(
                'category_id' => $row['category_id'],
                'category_name'=>$row['category_name'],
                'created_date' =>$row['created_date']
            );
        }

        return ['template'=> '/dashboard/editCategories.html.php', 'title'=> $this->pageTitle, 'variables'=>[
            'category'=>$category,
            'categories'=>$categories
        ]];
    }

    public function editSubmit($id){

        $values = [
            'category_id'=>$id,
            'category_name' =>$_POST['name'],
        ];
        $this->categoriesTable->update($values);

        header('Location: /dashboard/categories');
    }

    public function delete($id){

        $this->categoriesTable->delete('category_id',$id);
        header('Location: /dashboard/categories');
    }



}