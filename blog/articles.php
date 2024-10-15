<?php

declare(strict_types=1);

require_once 'util.inc.php';
require_once 'db.inc.php';

try {
    $pdo = dbConnect();

    if (isset($_GET['c'])) {
        $category = $_GET['c'];
        $sql = 'SELECT 
                    *,
                    a.id AS a_id 
                FROM articles a
                JOIN categories c
                ON a.category_id = c.id
                WHERE c.id = :category
                ORDER BY a.created_at DESC';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':category', (int) $category, PDO::PARAM_INT);
        $stmt->execute();
    } else {
        $sql = 'SELECT 
                    *, 
                    a.id AS a_id 
                FROM articles a
                JOIN categories c
                ON a.category_id = c.id
                ORDER BY a.created_at DESC';
        $articles = $pdo->query($sql);
    }
    $articles = $stmt->fetchAll();

    $sql = 'SELECT * FROM categories';
    $categories = $pdo->query($sql)->fetchAll();
} catch (PDOException $e) {
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e->getMessage());
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taro's Blog</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header class="header">
            <h1><a href="articles.php">Taro's Blog</a></h1>
        </header>
        <main class="main">
            <?php foreach ($articles as $article) : ?>
                <article class="article">
                    <section class="title">
                        <h2><?= h($article['title']) ?></h2>
                        <h3><?= h($article['created_at']) ?> | <?= h($article['name']) ?> | <a href="delete_article.php?d=<?= h($article['a_id']) ?>">削除</a></h3>
                    </section>
                    <div class="body">
                        <?= h($article['article']) ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </main>
        <aside class="side">
            <nav class="sidebox">
                <h2>カテゴリ</h2>
                <ul>
                    <li><a href="articles.php">全件表示</a></li>
                    <?php foreach ($categories as $category) : ?>
                        <li><a href="?c=<?= h($category['id']) ?>"><?= h($category['name']) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>
            <p class="right">
                <a href="post_article.php">記事の投稿</a><br>
                <a href="post_category.php">カテゴリーの投稿</a>
            </p>
        </aside>
    </div>
</body>

</html>
