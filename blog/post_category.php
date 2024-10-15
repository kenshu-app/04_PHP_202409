<?php

declare(strict_types=1);

require_once 'db.inc.php';
require_once 'util.inc.php';

try {
    $pdo = dbConnect();

    $categoryName = '';
    $isValidated  = false;

    if (!empty($_POST)) {
        $categoryName = $_POST['categoryName'];
        $isValidated = true;

        if ($categoryName === '') {
            $categoryNameError = 'カテゴリーを入力してください';
            $isValidated = false;
        } elseif (mb_strlen($categoryName, 'utf8') > 10) {
            $categoryNameError = 'カテゴリーは10文字以内で入力してください';
            $isValidated = false;
        }

        if ($isValidated == true) {
            $sql  = 'INSERT INTO categories (name) VALUES (:name)';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':name', $categoryName, PDO::PARAM_STR);
            $stmt->execute();
        }
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
    <title>Taro's Blog | カテゴリーの投稿</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header class="header">
            <h1>カテゴリーの投稿</h1>
        </header>
        <section class="postform">
            <?php if ($isValidated == true) : ?>
                <p class="right"><a href="articles.php">記事の一覧に戻る</a></p>

                <p>以下の内容で記事を保存しました。</p>
                <table>
                    <tr>
                        <th>カテゴリー名</th>
                        <td>
                            <?= h($categoryName) ?>
                        </td>
                    </tr>
                </table>
                <p><a href="post_category.php">続けて投稿する</a></p>

            <?php else : ?>

                <p>記事を入力し、送信ボタンを押してください。</p>
                <form action="" method="post" novalidate>
                    <table>
                        <tr>
                            <th>カテゴリー</th>
                            <td>
                                <?php if (isset($categoryNameError)) : ?>
                                    <p class="error"><?= h($categoryNameError) ?></p>
                                <?php endif; ?>
                                <input type="text" name="categoryName" size="10" value="<?= h($categoryName) ?>" />
                            </td>
                        </tr>
                    </table>
                    <p><input type="submit" value="送信" /></p>
                </form>
            <?php endif; ?>
        </section>

    </div>
</body>

</html>
