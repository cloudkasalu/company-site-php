<?php
namespace classes\Dashboard;
use \Classes\DatabaseTable;
class DashboardRouter implements \Classes\Dashboard\DashboardRouterInterface {

    private $usersTable;
    private $blogsTable;
    private $groupsTable;
    private $categoriesTable;
    private $pagesTable;
    private $aboutSectionTable;
    private $servicesTable;

    private $portfolioTable;
    private $pdo;
    private $authentication;
    private $permissions;
    private $permissionsTable;

    public function __construct() {

        include __DIR__ . '/../../includes/DatabaseConnection.php';
        $this->pdo = $pdo;

        $this->pagesTable = new DatabaseTable($pdo,'pages','page_id');
        $this->usersTable = new DatabaseTable($pdo,'users','user_id');
        $this->groupsTable = new DatabaseTable($pdo,'groups','group_id');
        $this->categoriesTable = new DatabaseTable($pdo,'categories','category_id');
        $this->blogsTable = new DatabaseTable($pdo,'blogs','blog_id');
        $this->aboutSectionTable = new DatabaseTable($pdo,'about_us','id');
        $this->servicesTable = new DatabaseTable($pdo,'services','id');
        $this->portfolioTable = new DatabaseTable($pdo,'portfolio','id');
        $this->authentication = new \Classes\Dashboard\Authentication($this->usersTable,'email','password');
        $this->permissionsTable = new DatabaseTable($pdo,'permissions','permissions_id');
        $this->permissions = new \Classes\Dashboard\Permissions($this->permissionsTable);

    }

    // public function getLayoutVariables(): array {
    //     return [
    //         'loggedIn' => $this->authentication->isLoggedIn()
    //     ];
    // }

    public function getDefaultRoute(): string {
        return 'home';
    }
    public function getDefaultController(): string {
        return 'dashboard';
    }

    public function getController(string $controllerName): ?object {

      $controllers = [
        'dashboard' => new \Classes\Dashboard\Controllers\Dashboard(),
        'pages' => new \Classes\Dashboard\Controllers\Pages($this->pagesTable),
        'users' => new \Classes\Dashboard\Controllers\Users($this->usersTable, $this->groupsTable),
        'groups' => new \Classes\Dashboard\Controllers\Groups($this->groupsTable, $this->permissionsTable),
        'blogs' => new \Classes\Dashboard\Controllers\Blogs($this->blogsTable, $this->categoriesTable,$this->usersTable, $this->authentication),
        'categories' => new \Classes\Dashboard\Controllers\Categories($this->categoriesTable),
        'login' => new \Classes\Dashboard\Controllers\Login($this->usersTable, $this->authentication ),
      ];
      
      return $controllers[$controllerName] ?? null;

    }
    public function getControllerLayout(string $controllerName) {

      if($controllerName == "login"){
        return '/../templates/blank_layout.php';
      }else{
        return '/../templates/dashboard/layout.php';
      }

    }

    // public function checkLogin(string $uri): ?string {

    //     $restrictedPages = [
    //         'category/list' => \Ijdb\Entity\Author::LIST_CATEGORIES,
    //         'category/delete' => \Ijdb\Entity\Author::DELETE_CATEGORY,
    //         'category/edit' => \Ijdb\Entity\Author::EDIT_CATEGORY,
    //         'author/permissions' => \Ijdb\Entity\Author::EDIT_USER_ACCESS,
    //         'author/list' => \Ijdb\Entity\Author::EDIT_USER_ACCESS
    //     ];

    //     if (isset($restrictedPages[$uri])) {
    //       if (!$this->authentication->isLoggedIn()
    //          || !$this->authentication->getUser()->hasPermission($restrictedPages[$uri])) {
    //         header('location: /login/login');
    //         exit();
    //       }
    //     }
    //     return $uri;
    // }
    public function checkLogin(string $uri, string $route): ?string {

        $restrictedPages = [
            'users/register' => \Classes\Dashboard\Permissions::CREATE_USER,
        ];

        if (!$this->authentication->isLoggedIn() && $route !== "login") {
          header('location: /dashboard/login');
          exit();
        }else if (isset($restrictedPages[$uri])) {
        if (!$this->permissions->hasPermission($this->authentication->findUser(),$restrictedPages[$uri])) {
          header('location: /dashboard');
          exit();
        }
      }

         return $uri;
    }

}