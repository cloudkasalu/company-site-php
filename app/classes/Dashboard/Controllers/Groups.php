<?php
namespace Classes\Dashboard\Controllers;
use Classes\Dashboard\Permissions;
use Classes\DatabaseTable;

class Groups{

    private $pageTitle = "Groups";

    public function __construct(private DatabaseTable $groupsTable, private DatabaseTable $permissionsTable){

    }


    public function home(){

        $result = $this->groupsTable->findAll();

        foreach($result as $row){
            $groups[] = array(
                'group_id' => $row['group_id'],
                'group_name' => $row['group_name'],
                'created_date'=> $row['created_date']

            );
        }

        return ['template'=> '/dashboard/displayGroups.html.php', 'title'=> $this->pageTitle, 'variables'=>[
            'groups'=>$groups,
        ]];

    }

    public function create(){
        return ['template'=> '/dashboard/createGroup.html.php', 'title'=> $this->pageTitle];


    }

    public function createSubmit(){

        $errors = [];
        $group_name = ucfirst(strtolower($_POST['name']));
        $date = new \DateTime();

        if(empty($group_name)){
            $errors[] = "Enter Group Name";
        }
        else if (count($this->groupsTable->find('group_name', $group_name)) > 0) {
            $errors[] = 'Group Already Exists';
        }

        if(empty($errors)){

            $values = [
                'group_name' => $group_name,
                'created_date'=> $date->format('Y-m-d H:i:s')
            ];
            $this->groupsTable->insert($values);

            header('Location: /dashboard/groups');

        }

        return ['template'=> '/dashboard/createGroup.html.php', 'title'=> $this->pageTitle, 'variables'=>[
            'errors'=> $errors,
        ]];


    }

    public function edit($id){
        $group = $this->groupsTable->find('group_id',$id)[0];

        return ['template'=> '/dashboard/editGroup.html.php', 'title'=> $this->pageTitle, 'variables'=>[
            'group'=> $group,
        ]];
    }

    public function editSubmit($id){

        $values = [
            'group_id'=>$id,
            'group_name' => $_POST['name'],
        ];
        $this->groupsTable->update($values);

        header('Location: /dashboard/groups');
    }

    public function delete($id){
        $this->groupsTable->delete('group_id',$id);
        header('Location: /dashboard/groups');

    }

    public function permissions($id = null) {

        $result = $this->groupsTable->find('group_id', $id[0])[0];

        $group = [
            'group_id' => $result['group_id'],
            'group_name' => $result['group_name'],
            'permissions' => array_column($this->permissionsTable->find('group_id', $id[0]), 'permission'),
        ];

        $reflected = new \ReflectionClass('\Classes\Dashboard\Permissions');
        $constants = $reflected->getConstants();

        return ['template' => '/dashboard/permissions.html.php',
            'title' => 'Edit Permissions',
            'variables' => [
            'group' => $group,
            'permissions' => $constants
            ]
        ];
    }

    public function permissionsSubmit($id = null) {

        $group_id = $_POST['id'];
        $permissions = $_POST['permissions'];

        $this->permissionsTable->delete('group_id',$group_id);
        foreach($permissions as $permission){
            $values = [
                'group_id' => $group_id,
                'permission' => $permission
            ];
            
        $this->permissionsTable->insert($values);
        }

        header('location: /dashboard/groups');
    }





}