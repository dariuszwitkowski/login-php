<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Service\ArticleService;

class ArticleController
{
    public function __construct(private ArticleService $articleService)
    {
    }

    public function list(): void {
        $articles = $this->articleService->getArticles();
        require __DIR__ . '/../View/article.php';
    }

    public function save(): void {
        $id = $_POST['id'] ?? null;
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';

        $this->articleService->save($title, $content, (int)$id);

        header('Location: /article');
    }

    public function delete(): void {
        $id = $_GET['id'] ?? null;

        if ($id) {
            $this->articleService->delete((int)$id);
        }

        header('Location: /article');
    }
}