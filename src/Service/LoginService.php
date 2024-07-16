<?php

namespace App\Service;

use App\Database;
use App\Helpers\FlashMessage;

class LoginService
{
    const WRONG_LOGIN_DATA_MESSAGE = 'Wrong login data!';

    private $db;

    public function __construct() {
        $config = require __DIR__ . '/../../config/database.php';
        $this->db = new Database($config['database']);
    }

    public function logout(): void {
        unset($_SESSION['user_id']);
    }

    public function authenticate(string $username, string $password): bool {
        $user = $this->db->getUser($username);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            return true;
        } else {
            FlashMessage::set(self::WRONG_LOGIN_DATA_MESSAGE, false);
            return false;
        }
    }
}