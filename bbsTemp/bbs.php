<?php

declare(strict_types=1);
require_once(dirname(__FILE__) . '/util.inc.php');
require_once(dirname(__FILE__) . '/db.inc.php');

try {
    $pdo = dbConnect();

    $name    = '';
    $message = '';
    $isValidated = false;

    if (!empty($_POST)) {
        $name    = $_POST['name'];
        $message = $_POST['message'];
        $isValidated = true;

        if ($name === '' || preg_match('/^(\s|　)+$/u', $name)) {
            $nameError = 'なまえを入力してください';
            $isValidated = false;
        } elseif (mb_strlen($name) > 20) {
            $nameError = 'なまえは10文字以内にしてください';
            $isValidated = false;
        }

        if ($message === '' || preg_match('/^(\s|　)+$/u', $message)) {
            $messageError = 'メッセージを入力してください';
            $isValidated = false;
        }

        if ($isValidated === true) {
            $sql = 'INSERT INTO posts (name, message, created_at) 
                    VALUES (:name, :message, NOW())';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':name',    $name, PDO::PARAM_STR);
            $stmt->bindValue(':message', $message, PDO::PARAM_STR);
            $stmt->execute();

            $name    = '';
            $message = '';
        }
    }

    $sql = 'SELECT *
            FROM posts
            ORDER BY created_at DESC
            LIMIT 10';
    $posts = $pdo->query($sql)->fetchAll();
} catch (PDOException $e) {
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e->getMessage());
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8" />
    <title>ひとこと掲示板</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1 class="logo"><span class="fa-stack">
            <i class="fa fa-square fa-stack-2x"></i>
            <i class="fa fa-list-alt fa-stack-1x fa-inverse"></i>
        </span> ひとこと掲示板</h1>
    <h2 class="formtitle">メッセージの投稿</h2>
    <form action="" method="post" novalidate>
        <p>なまえ：<br>
        <?php if (isset($nameError)):?>
            <p class="error"><?=$nameError?></p>
        <?php endif;?>
        <input type="text" name="name" value="<?=h($name)?>">
        </p>
        <p>
            <?php if (isset($messageError)):?>
                <p class="error"><?=$messageError?></p>
            <?php endif;?>
            <textarea name="message" cols="30" rows="10"><?=h($message)?></textarea></p>
        <p><input type="submit" value="送信"></p>
    </form>
    <main class="main">
        <?php foreach ($posts as $post) : ?>
            <article class="post">
                <h2 class="title"><i class="fa fa-user-circle-o"></i> <?= $post['name'] ?> <span class="date">[<i class="fa fa-calendar"></i> <?= getJpDate(new DateTime($post['created_at'])) ?>]</span></h2>
                <p class="message"><?= $post['message'] ?></p>
            </article>
        <?php endforeach; ?>
    </main>
</body>

</html>
