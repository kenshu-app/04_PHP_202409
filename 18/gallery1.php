<?php

const UP_PATH = 'uploads/';

if (!empty($_FILES)) {
    if ($_FILES['upfile']['error'] === UPLOAD_ERR_OK) {
        if (!move_uploaded_file(
            $_FILES['upfile']['tmp_name'],
            UP_PATH . mb_convert_encoding(basename($_FILES['upfile']['name']), 'cp932', 'utf8')
        )) {
            $messageError = 'アップロードに失敗しました';
        }
    } elseif ($_FILES['upfile']['error'] === UPLOAD_ERR_NO_FILE) {
        // 何もしない
    } else {
        $messageError = 'アップロードに失敗しました';
    }
}
$files = glob(UP_PATH . '*.png');
$replace = [UP_PATH, '.png'];
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>画像ギャラリー</title>
    <style>
        .wrapper {
            max-width: 1000px;
            margin: auto;
        }

        table {
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 5px;
            text-align: center;
        }

        th {
            background-color: #eee;
        }

        img {
            display: block;
            padding: 3px;
            border: 1px solid #aaa;
            box-shadow: 0 0 8px #ccc;
        }

        img:hover {
            box-shadow: 0 0 8px #ccc, 0 0 12px #669;
        }

        span {
            font-size: 12px;
            font-weight: bold;
        }

        span::after {
            content: " ]";
        }

        span::before {
            content: "[ ";
        }

        .error {
            color: #990000;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h1>画像ギャラリー</h1>
        <form action="" method="post" enctype="multipart/form-data" novalidate>
            <p>
                <input type="file" name="upfile" accept="image/*">
                <input type="submit" value="送信">
            </p>
        </form>
        <table>
            <tr>
                <th colspan="5">画像一覧</th>
            </tr>
            <?php if (count($files) == 0) : ?>
                <tr>
                    <td colspan="5">アップロードされたファイルはありません</td>
                </tr>
            <?php else : ?>
                <tr>
                    <?php for ($i = 0; $i < count($files); $i++):?>
                        <?php $file = str_replace($replace, '', $files[$i]) ?>
                        <td>
                            <img src="<?=UP_PATH . $file . '.png'?>" alt="<?=$file?>">
                            <span><?=$file?></span>
                        </td>
                        <?= $i % 5 == 4 ? '</tr><tr>' : ''?>
                    <?php endfor;?>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>

</html>
