<?php

namespace App;

class Database
{
    private $pdo;

    public function __construct($config)
    {
        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['name'];
        $this->pdo = new \PDO($dsn, $config['user'], $config['password']);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getUser($username)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM user WHERE username = :username');
        $stmt->execute(['username' => $username]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    
    public function getArticles()
    {
        $stmt = $this->pdo->query('SELECT * FROM articles');
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function createArticle($title, $content)
    {
        $stmt = $this->pdo->prepare('INSERT INTO articles (title, content) VALUES (:title, :content)');
        $stmt->execute(['title' => $title, 'content' => $content]);
    }

    public function updateArticle($id, $title, $content)
    {
        $stmt = $this->pdo->prepare('UPDATE articles SET title = :title, content = :content WHERE id = :id');
        $stmt->execute(['id' => $id, 'title' => $title, 'content' => $content]);
    }

    public function deleteArticle($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM articles WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }
}