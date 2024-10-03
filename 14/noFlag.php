<?php declare(strict_types=1);
require_once(dirname(__FILE__) . '/Validation.php');
$name  = '';
$kana  = '';
$phone = '';
$error = [
    'name'  => '',
    'kana'  => '',
    'phone' => ''
];

if (!empty($_POST)) {
    $name  = $_POST['name'];
    $kana  = $_POST['kana'] ;
    $phone = $_POST['phone'];

    $v = new Validation();
    $error['name']  = $v->validName($name);
    $error['kana']  = $v->validKana($kana);
    $error['phone'] = $v->validPhone($phone);
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
    <title>ユーザ情報入力</title>
    <style>
        table {
            border: 1px solid #666;
            border-collapse: collapse;
            width: 450px;
        }

        th {
            border: 1px solid #666;
            background-color: #ddd;
            padding: 4px;
            width: 100px;
        }

        td {
            border: 1px solid #666;
            padding: 4px;
        }

        .error {
            font-weight: bold;
            color: #f00;
            font-size: 11px;
        }
    </style>
</head>

<body>
    <h1>ユーザ情報入力</h1>
    <?php if (!isset($error['name']) || !isset($error['kana']) || !isset($error['phone'])):?>
        <table>
            <tr>
                <th>氏名</th>
                <td><?=h($name)?></td>
            </tr>
            <tr>
                <th>フリガナ</th>
                <td><?=h($kana)?></td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td><?=h($phone)?></td>
            </tr>
        </table>
        <p>入力ありがとうございました。</p>
        <p><a href="noFlag.php">戻る</a></p>
    <?php else:?>
    <p>下のフォームに記入して「送信」ボタンを押してください。</p>
    <form action="" method="post" novalidate>
        <table>
            <tr>
                <th>氏名</th>
                <td>
                    <input type="text" name="name" size="15" value="<?=h($name)?>">
                    <?php if (isset($error['name'])):?>
                        <span class="error"><?=$error['name']?></span>
                    <?php endif;?>
            </td>
            </tr>
            <tr>
                <th>フリガナ</th>
                <td>
                    <input type="text" name="kana" size="15" value="<?=h($kana)?>">
                    <?php if (isset($error['kana'])):?>
                        <span class="error"><?=$error['kana']?></span>
                    <?php endif;?>
            </td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>
                    <input type="text" name="phone" size="15" value="<?=h($phone)?>">
                    <?php if (isset($error['phone'])):?>
                        <span class="error"><?=$error['phone']?></span>
                    <?php endif;?>
            </td>
            </tr>
        </table>
        <p><input type="submit" value="送信"></p>
    </form>
    <?php endif;?>
</body>

</html>
