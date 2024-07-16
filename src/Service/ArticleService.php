<?php

declare(strict_types = 1);

namespace App\Service;

use App\Database;
use App\Helpers\FlashMessage;

class ArticleService
{
    const CHANGE_SUCCESS_MESSAGE = 'News was successfully changed!';
    const CREATE_SUCCESS_MESSAGE = 'News was successfully created!';
    const DELETE_SUCCESS_MESSAGE = 'News was deleted!';

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
            FlashMessage::set(self::CHANGE_SUCCESS_MESSAGE);
        } else {
            $this->db->createArticle($title, $content);
            FlashMessage::set(self::CREATE_SUCCESS_MESSAGE);
        }
    }

    public function delete(int $id): void {
        $this->db->deleteArticle($id);
        FlashMessage::set(self::DELETE_SUCCESS_MESSAGE);
    }
}