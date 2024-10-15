<?php
$name = '';
$age  = '';
$mail = '';
if (!empty($_POST)) {
    $name = $_POST['name'];
    $age  = $_POST['age'];
    $mail = $_POST['mail'];
}
/**
 * XSS対策の参照名省略
 *
 * @param string | null $string
 * @return string | null
 *
 */
function h(?string $string): ?string
{
    if (empty($string)) return null;
    return htmlspecialchars($string, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フォーム</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>フォーム</h1>
    <form action="" method="post" novalidate>
        <p>名前：<input type="text" name="name" size="10" value="<?=h($name)?>"></p>
        <p>年齢：<input type="text" name="age" size="3" maxlength="3" value="<?=h($age)?>"></p>
        <p>メール：<input type="email" name="mail" value="<?=h($mail)?>"></p>
        <p><input type="submit" value="送信"></p>
    </form>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <table>
            <tr>
                <th>名前</th>
                <th>年齢</th>
                <th>メール</th>
            </tr>
            <tr>
                <td><?=h($name)?></td>
                <td><?=h($age)?></td>
                <td><?=h($mail)?></td>
            </tr>
        </table>
    <?php endif; ?>
</body>

</html>
