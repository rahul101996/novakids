<?php

class RouteController {
    private $routes = [];
    private $currentGroupPrefix = '';
    private $currentGroupController = '';
    private $currentMiddleware = [];

    public function group(array $config, callable $callback) {
        $previousPrefix = $this->currentGroupPrefix;
        $previousController = $this->currentGroupController;
        $previousMiddleware = $this->currentMiddleware;

        [$prefix, $controller, $middleware] = array_pad($config, 3, null);
        $this->currentGroupPrefix = trim($prefix, '/');
        $this->currentGroupController = $controller;
        $this->currentMiddleware = is_array($middleware) ? $middleware : ($middleware ? [$middleware] : []);

        $callback($this);

        // Restore previous state
        $this->currentGroupPrefix = $previousPrefix;
        $this->currentGroupController = $previousController;
        $this->currentMiddleware = $previousMiddleware;
    }

    public function route(string $uri, string $method) {
        $fullPath = trim("{$this->currentGroupPrefix}/$uri", '/');

        $this->routes[] = [
            'path' => "/" . $fullPath,
            'controller' => "{$this->currentGroupController}@$method",
            'middleware' => $this->currentMiddleware,
        ];
    }

    public function getRoutes() {
        return $this->routes;
    }
}
