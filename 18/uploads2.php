<?php
const IMGS_PATH = 'images/';
if (!empty($_FILES)) {
    if ($_FILES['userfile']['error'] == UPLOAD_ERR_OK) {
        if (!move_uploaded_file(
            $_FILES['userfile']['tmp_name'],
            IMGS_PATH . mb_convert_encoding(basename($_FILES['userfile']['name']), 'cp932', 'utf8')
        )) {
            $message = 'ファイルの移動に失敗しました';
        }
    } elseif ($_FILES['userfile']['error'] == UPLOAD_ERR_NO_FILE) {
        /* 空送信で何もしない */
    } else {
        /* error_log(); ログ出力を行う */
    }
}
$files = glob('images/*.jpg');
$replace = ['images/', '.jpg'];
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アップロードテスト</title>
    <style>
        ul {
            padding: 0;
            list-style-type: none;
            display: grid;
            grid-template-columns:
                repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
            grid-auto-rows: 200px;
            grid-auto-flow: dense;
        }

        li {
            border: 1px solid #ccc;
            text-align: center;
        }

        li:nth-of-type(4n+2) {
            grid-column: span 2;
            grid-row: span 2;
        }

        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <h1>アップロードテスト</h1>
    <?php if (isset($message)) : ?>
        <p><?= $message ?></p>
    <?php endif; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <p>ファイル：<input type="file" name="userfile" accept="image/*"></p>
        <p><input type="submit" value="送信"></p>
    </form>
    <h2>画像一覧</h2>
    <?php if (count($files) == 0) : ?>
        <p>ファイルをアップロードしてください</p>
    <?php else : ?>
        <ul>
            <?php for ($i = 0; $i < count($files); $i++) : ?>
                <?php
                $file = str_replace($replace, '', $files[$i]);
                $file = mb_convert_encoding($file, 'utf8', 'cp932');
                ?>
                <li><img src="<?= IMGS_PATH . $file ?>.jpg" alt="<?= $file ?>" width="100"></li>
            <?php endfor; ?>
        </ul>
    <?php endif; ?>
</body>

</html>
