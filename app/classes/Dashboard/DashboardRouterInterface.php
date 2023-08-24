<?php
namespace classes\Dashboard;
interface DashboardRouterInterface {
    public function getDefaultRoute(): string;
    public function getDefaultController(): string;
    public function getController(string $controllerName): ?object;
    public function getControllerLayout(string $controller);
    // public function checkLogin(string $uri): ?string;
    // public function getLayoutVariables(): array;
}