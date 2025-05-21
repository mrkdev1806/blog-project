<?php
namespace App\Core;

class Router {
    private array $routes = [];
    public function get($uri, $action) {
        $this->routes['GET'][$uri] = $action;
    }
    public function dispatch($uri, $method) {
        if (isset($this->routes[$method][$uri])) {
            [$controller, $method] = $this->routes[$method][$uri];
            (new $controller)->$method();
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }
}