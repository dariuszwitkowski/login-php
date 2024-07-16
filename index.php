<?php

declare(strict_types = 1);


session_start();

require __DIR__ . '/vendor/autoload.php';

use App\Controller\ArticleController;
use App\Controller\LoginController;
use App\Service\ArticleService;
use App\Service\LoginService;

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($request) {
    case '/' :
        $controller = new LoginController(new LoginService());
        $controller->login();
        break;
    case '/authenticate':
        $controller = new LoginController(new LoginService());
        $controller->authenticate();
        break;
    case '/article' :
        if (isset($_SESSION['user_id'])) {
            $controller = new ArticleController(new ArticleService());
            $controller->list();
        } else {
            header('Location: /');
        }
        break;
    case '/article/save' :
        if (isset($_SESSION['user_id'])) {
            $controller = new ArticleController(new ArticleService());
            $controller->save();
        } else {
            header('Location: /article');
        }
        break;
    case '/article/delete' :
        if (isset($_SESSION['user_id'])) {
            $controller = new ArticleController(new ArticleService());
            $controller->delete();
        } else {
            header('Location: /article');
        }
        break;
    case '/logout' :
        $controller = new LoginController(new LoginService());
        $controller->logout();
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/src/View/404.php';
        break;
}