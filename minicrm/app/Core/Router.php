<?php 

class Router {

    private $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function get($pattern, $callback) {
        $this->routes['GET'][$pattern] = $callback;
    }

    public function post($pattern, $callback) {
        $this->routes['POST'][$pattern] = $callback;
    }

    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri    = $_SERVER['PATH_INFO'] ?? '/';


        foreach($this->routes[$method] as $pattern => $callback) {
            
            $regex = preg_replace('#\{([a-zA-Z_]+)\}#', '([0-9a-zA-Z-_]+)', $pattern);
            $regex = "#^". $regex . "$#";

            if (preg_match($regex, $uri, $matches)) {

                array_shift($matches);

                $controllerName = $callback[0];
                $method = $callback[1];

                $controller = new $controllerName;

                return $controller->$method(...$matches);
            }
        }

        echo "Erreur 404";
    }
}