<?php
session_start();

if (!empty($_SESSION) && $_SESSION['authenticated'] == true) {
    header('Location: member.php');
    exit;
}

$user = '';
$pass = '';
if (!empty($_POST)) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if ($user === 'taro' && $pass === 'abcd') {
        $_SESSION['authenticated'] = true;
        $_SESSION['userId'] = $user;

        header('Location: member.php');
        exit;
    } else {
        $loginError = 'ユーザIDかパスワードが正しくありません';
    }
}

/**
 * XSS対策のサニタイジングと参照名省略
 *
 * @param string | null string
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <style>
        .error {
            color: #f00;
        }
    </style>
</head>

<body>
    <h1>ログイン</h1>
    <?php if (isset($loginError)):?>
        <p class="error"><?=$loginError?></p>
    <?php endif;?>
    <form action="" method="post" novalidate>
        <table>
            <tr>
                <td>ユーザID</td>
                <td><input type="text" name="user" value="<?= h($user) ?>"></td>
            </tr>
            <tr>
                <td>パスワード</td>
                <td><input type="password" name="pass" value="<?= h($pass) ?>"></td>
            </tr>
        </table>
        <p><input type="submit" value="ログイン"></p>
    </form>
</body>

</html>
