<?php

declare(strict_types=1);

require_once 'db.inc.php';
require_once 'util.inc.php';

try {
    $pdo = dbConnect();

    $categoryName = '';
    $isValidated  = false;

    if (isset($_GET['d'])) {
        $d = $_GET['d'];
        $sql = 'SELECT * FROM articles JOIN categories
                ON articles.category_id = categories.id
                WHERE articles.id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', (int) $d, PDO::PARAM_INT);
        $stmt->execute();
        $articles = $stmt->fetch();
    } elseif (isset($_POST['delete'])) {
        $d = $_POST['d'];
        $sql  = 'DELETE FROM articles WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', (int) $d, PDO::PARAM_INT);
        $stmt->execute();
        $isValidated = true;
    } else {
        header('Location: articles.php');
        exit;
    }
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
    <title>Taro's Blog | 記事の削除</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header class="header">
            <h1>記事の削除</h1>
        </header>
        <section class="postform">
            <?php if ($isValidated == true) : ?>
                <p class="right"><a href="articles.php">記事の一覧に戻る</a></p>

                <p>記事を完了しました。</p>

            <?php else : ?>

                <p>内容に問題なければ削除ボタンを押してください。</p>
                <table>
                    <tr>
                        <th>カテゴリー</th>
                        <td>
                            <?= h($articles['name']) ?>
                        </td>
                    </tr>
                    <tr>
                        <th>タイトル</th>
                        <td>
                            <?= h($articles['title']) ?>
                        </td>
                    </tr>
                    <tr>
                        <th>記事</th>
                        <td>
                            <?= h(nl2br($articles['article'])) ?>
                        </td>
                    </tr>
                </table>
                <form action="" method="post">
                    <input type="hidden" name="d" value="<?= $d ?>">
                    <p><input type="submit" name="delete" value="削除" /></p>
                </form>
            <?php endif; ?>
        </section>

    </div>
</body>

</html>
