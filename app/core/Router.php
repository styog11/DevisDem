<?php

class Router 
{
    private $routes = [];
    
    public function get($uri, $action) 
    {
        $this->addRoute('GET', $uri, $action);
    }
    
    public function post($uri, $action) 
    {
        $this->addRoute('POST', $uri, $action);
    }
    
    public function put($uri, $action) 
    {
        $this->addRoute('PUT', $uri, $action);
    }
    
    public function delete($uri, $action) 
    {
        $this->addRoute('DELETE', $uri, $action);
    }
    
    private function addRoute($method, $uri, $action) 
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'action' => $action
        ];
    }
    
    public function resolve($uri, $method) 
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                return $this->callAction($route['action']);
            }
        }
        
        http_response_code(404);
        echo "404 - Page not found";
    }
    
    private function callAction($action) 
    {
        if (is_array($action)) {
            [$class, $method] = $action;
            
            if (class_exists($class)) {
                $controller = new $class();
                
                if (method_exists($controller, $method)) {
                    return $controller->$method();
                }
            }
        }
        
        if (is_callable($action)) {
            return $action();
        }
        
        throw new Exception("Invalid route action");
    }
}
?>