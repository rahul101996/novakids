<?php

class MiddlewareManager {
    public static function run(array $middlewares) {
        foreach ($middlewares as $middlewareName) {
            $class = ucfirst($middlewareName) . 'Middleware';
            $file = $_SERVER['DOCUMENT_ROOT'] . "/middlewares/$class.php";

            if (!file_exists($file)) {
                throw new Exception("Middleware file $class.php not found");
            }

            require_once $file;

            if (!class_exists($class)) {
                throw new Exception("Middleware class $class not found");
            }

            $instance = new $class();
            if (!method_exists($instance, 'handle')) {
                throw new Exception("Middleware $class missing handle method");
            }

            $instance->handle(); // Perform the middleware check
        }
    }
}
