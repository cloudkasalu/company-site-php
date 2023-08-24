<?php
namespace Classes;

class EntryPoint{
    public function __construct(private \Classes\Website\Router $websiteRouter, private \Classes\Dashboard\DashboardRouter $dashboardRouter){

    }

    private function loadTemplate($templateFileName, $variables = []) {
        extract($variables);
        ob_start();
        include __DIR__ . '/../templates/' . $templateFileName;
        return ob_get_clean();

    }

    private function checkUri($url) {
        if ($url != strtolower($url)) {
        http_response_code(301);
        header('location: ' . strtolower($url));
        }
    }
        

    public function run($uri){

        try {


            include __DIR__ . '/../includes/DatabaseConnection.php';

            if ($uri == '') {
                $uri = $this->websiteRouter->getDefaultRoute();
            }

            $route = explode('/', $uri);
            $routeName = array_shift($route);

            if ($routeName !== 'dashboard') {
                $router = $this->websiteRouter;
                $action = $routeName;
                $controller = $router->getController();

                if(is_callable([$controller, $action])){
                    $page = $controller->$action($route);
                    $title = $page['title'];
                    // $variables = $page['variables'] ?? [];
                    $output = $page['content'];
                }else{
                    http_response_code(404);

                    $route = "error";
                    $title = 'Not found';

                    ob_start();
                    include __DIR__ . '/../templates/404.html.php';
                    $output = ob_get_clean();
            
                }

            }else{

                $router = $this->dashboardRouter;
                $controllerName = array_shift($route) ?? $router->getDefaultController();
                $action = array_shift($route)?? $router->getDefaultRoute();
                $_SERVER['REQUEST_METHOD'] === 'POST'? $action = $action . "Submit": $action;
                $controller = $this->dashboardRouter->getController($controllerName);

                $router->checkLogin($controllerName . '/' . $action, $controllerName);

                if(is_callable([$controller, $action])){
                    $page = $controller->$action($route[0]?? $route);
                    $title = $page['title'];
                    $variables = $page['variables'] ?? [];
                    $output = $this->loadTemplate($page['template'], $variables);
                }else{
                    http_response_code(404);

                    $route = "error";
                    $title = 'Not found';

                    ob_start();
                    include __DIR__ . '/../templates/404.html.php';
                    $output = ob_get_clean();
            
                }
            }

            


        
            
        } catch (\PDOException $e) {
            $title = 'An error has occurred';
            $output = 'Database error: ' . $e->getMessage() . ' in ' .
            $e->getFile() . ':' . $e->getLine();
        }

        if($routeName == "dashboard"){
           include __DIR__ .  $this->dashboardRouter->getControllerLayout($controllerName) ?? '/../templates/blank_layout.php';

        }else{
           include __DIR__ .  $this->websiteRouter->getControllerLayout() ?? '/../templates/blank_layout.php';

        }



    }
}