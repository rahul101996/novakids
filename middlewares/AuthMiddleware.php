<?php

class AuthMiddleware {
    public function handle() {
        if (empty($_SESSION) || !isset($_SESSION['id'])) {
            header("Location: /"); // redirect to login
            exit;
        }
    }
}
