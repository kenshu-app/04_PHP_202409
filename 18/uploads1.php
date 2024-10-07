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
<html>
<!-- 省略 -->
<title>アップロードテスト</title>

<body>
    <h1>アップロードテスト</h1>
    <?php if (isset($message)) : ?>
        <p><?= $message ?></p>
    <?php endif; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <p>ファイル：<input type="file" name="userfile" accept="image/*"></p>
        <p><input type="submit" value="送信"></p>
    </form>
    <table>
        <tr>
            <th colspan="4">画像一覧</th>
        </tr>
        <!-- もし画像が1件も登録されていなければ -->
        <?php if (0 == count($files)) : ?>
            <!--<?php /* if (file_exists('images/')): */ ?> -->
            <tr>
                <td>ファイルをアップロードしてください</td>
            </tr>
        <?php else : ?>
            <tr>
                <!-- 取得した配列(画像数)分だけ繰り替えし(foreachも可) -->
                <?php for ($i = 0; $i < count($files); $i++) : ?>
                    <?php
                    // ファイル名だけに置換
                    $file = str_replace($replace, '', $files[$i]);
                    // ブラウザ用に文字コードを変換
                    $file = mb_convert_encoding($file, 'utf8', 'cp932');
                    ?>
                    <td><img src="<?= IMGS_PATH . $file ?>.jpg" alt="<?= $file ?>" width="100"></td>
                    <!-- 4つ目の画像(余りが3)のときだけ改行 -->
                    <?= $i % 4 == 3 ? '</tr><tr>' : '' ?>
                <?php endfor; ?>
            </tr>
        <?php endif; ?>
    </table>
</body>

</html>
