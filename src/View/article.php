<!DOCTYPE html>
<html>
<head>
    <title>Articles</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/global.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/article.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="/assets/js/article.js"></script>
</head>
<body>
    <div class="container">
        <?php include __DIR__ . '/Components/header.php'; ?>
        <h3>All News</h3>
        <ul>
            <?php foreach ($articles as $article): ?>
                <li>
                    <div class="article-info">
                        <strong><?php echo htmlspecialchars($article['title']); ?></strong>
                        <p><?php echo htmlspecialchars($article['content']); ?></p>
                    </div>
                    <div class="article-buttons">
                        <span 
                            class="edit-article" 
                            data-id="<?php echo $article['id']; ?>" 
                            data-title="<?php echo $article['title']; ?>" 
                            data-content="<?php echo $article['content']; ?>"
                        >
                            <img class="icon" src="/assets/img/pencil.svg" alt="Pencil">
                        </span>
                        <a href="/article/delete?id=<?php echo $article['id']; ?>"><img class="icon" src="/assets/img/close.svg" alt="Close"></a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="form-title-container">
            <h3 id="create-news-title">Create News</h3>
            <h3 id="edit-news-title" class="hidden">Edit News</h3>
            <span id="cancel-edit-button" class="hidden"><img class="icon" src="/assets/img/close.svg" alt="Close"></span>
        </div>
        <form method="POST" action="/article/save">
            <input id="article-id" type="hidden" name="id">
            <input id="article-title" type="text" name="title" placeholder="Title" value="<?php echo $_GET['title'] ?? ''; ?>" required>
            <textarea id="article-content" name="content" placeholder="Description" required><?php echo $_GET['content'] ?? ''; ?></textarea>
            <button id="submit-form-button" class="button" type="submit">Create</button>
        </form>
        <a class="button" href="/logout">Logout</a>
    </div>
</body>
</html>