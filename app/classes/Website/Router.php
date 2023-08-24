<?php
namespace classes\Website;
use \Classes\DatabaseTable;
class Router implements \Classes\Website\RouterInterface {

    private $pagesTable;
    private $aboutSectionTable;
    private $servicesTable;

    private $portfolioTable;
    private $pdo;
    private $authentication;

    public function __construct() {

        include __DIR__ . '/../../includes/DatabaseConnection.php';
        $this->pdo = $pdo;

        $this->pagesTable = new DatabaseTable($pdo,'pages','page_id');
        $this->aboutSectionTable = new DatabaseTable($pdo,'about_us','id');
        $this->servicesTable = new DatabaseTable($pdo,'services','id');
        $this->portfolioTable = new DatabaseTable($pdo,'portfolio','id');


    }

    public function getDefaultRoute(): string {
        return 'home';
    }
    public function getController(): ?object {
        return  new \Classes\Website\Controllers\WebsiteController($this->pagesTable, $this->aboutSectionTable, $this->servicesTable, $this->portfolioTable);
    }


    public function getControllerLayout(): string {
 
      return '/../templates/website/layout.php';

    }



}