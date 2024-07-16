<?php

declare(strict_types = 1);

namespace App\Service;

use App\Database;

class ArticleService
{
    private $db;

    public function __construct()
    {
        $config = require __DIR__ . '/../../config/database.php';
        $this->db = new Database($config['database']);
    }

    public function getArticles(): array {
        return $this->db->getArticles();
    }
    
    public function save(string $title, string $content, ?int $id = null): void {
        if ($id) {
            $this->db->updateArticle($id, $title, $content);
            $_SESSION['message']['content'] = 'News was successfully changed!';
            $_SESSION['message']['type'] = 'success';
        } else {
            $this->db->createArticle($title, $content);
            $_SESSION['message']['content'] = 'News was successfully created!';
            $_SESSION['message']['type'] = 'success';
        }
    }

    public function delete(int $id): void {
        $this->db->deleteArticle($id);
        $_SESSION['message']['content'] = 'News was deleted!';
        $_SESSION['message']['type'] = 'success';
    }
}