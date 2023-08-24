<?php
namespace Classes\Dashboard;
use Classes\DatabaseTable;

class Permissions{

    const EDIT_USERS = 1;
    const DELETE_USER = 2;
    const CREATE_USER = 3;
    const EDIT_USER_ACCESS = 4;

    public function __construct(private DatabaseTable $permissionsTable){
    
    }

    public function hasPermission($user, $permission) {
        // Retrieve the user's permissions from the database
        $userPermissions = $this->getUserPermissionsFromDatabase($user[0]);

        // Check if the given permission is in the user's permissions
        return in_array($permission, $userPermissions);
    }

    private function getUserPermissionsFromDatabase($user) {
        // Retrieve and return the user's permissions from the database
        // You can use your database logic here

       return array_column($this->permissionsTable->find('group_id', $user['group']), 'permission');
    }


}