<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Service\LoginService;

class LoginController
{
    public function __construct(private LoginService $loginService)
    {
    }

    public function login(): void {
        require __DIR__ . '/../View/login.php';
    }

    public function logout(): void {
        $this->loginService->logout();
        header('Location: /');
    }
    
    public function authenticate(): void {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($this->loginService->authenticate($username, $password)) {
            header('Location: /article');
        } else {
            header('Location: /');
        }
    }
}