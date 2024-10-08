<?php

declare(strict_types=1);
require_once(dirname(__FILE__) . '/vendor/autoload.php');
require_once(dirname(__FILE__) . '/settings2.php');

$query  = '質問';
$name   = '';
$email  = '';
$detail = '';
$result = 0;
$isValidated = false;

if (!empty($_POST)) {
    $query  = $_POST['query'];
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $detail = $_POST['detail'];
    $isValidated = true;

    if ($name === '' || preg_match('/^(\s|　)+$/u', $name)) {
        $nameError = 'お名前を入力してください';
        $isValidated = false;
    }

    if ($email === '' || preg_match('/^(\s|　)+$/u', $email)) {
        $emailError = 'メールアドレスを入力してください';
        $isValidated = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = '正しいメールを入力してください';
        $isValidated = false;
    }

    if ($detail === '' || preg_match('/^(\s|　)+$/u', $detail)) {
        $detailError = 'お問い合わせを入力してください';
        $isValidated = false;
    }

    if ($isValidated === true) {
        $transport = new Swift_SmtpTransport(
            SMTP_HOST,
            SMTP_PORT,
            SMTP_PROTOCOL
        );
        $transport->setUsername(GMAIL_SITE);
        $transport->setPassword(GMAIL_APPPASS);
        $mailer = new Swift_Mailer($transport);

        $message = new Swift_Message(MAIL_TITLE);
        $message->setFrom(MAIL_FROM);
        $message->setTo([
            'arihito.m@gmail.com'  => 'Web担当者様',
            $email => 'お客様'
        ]);

        $mailBody = <<<EOT
        <img src="{$message->embed(Swift_Image::fromPath('logo.png'))}">
        <h2>お問い合わせありがとうございます</h2>
        <p>この度はお問い合わせいただき誠にありがとうございました。<br>送信内容を以下の内容で承りました。</p>
        ----------------------------
        <p>質問内容：{$query}</p>
        <p>お名前：{$name}</p>
        <p>メールアドレス：{$email}</p>
        <p>お問い合わせ：{$detail}</p>
        ----------------------------
        EOT;
        $message->setBody($mailBody, 'text/html');
        $result = $mailer->send($message);
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
    <title>お問い合わせフォーム</title>
    <style>
        th,
        td {
            border-bottom: 1px dotted #ccc;
            padding: 10px;
        }

        th {
            vertical-align: top;
            text-align: left;
        }

        td {
            padding-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="submit"],
        textarea {
            width: 400px;
            padding: 10px;
        }

        .error {
            font-weight: bold;
            color: #f00;
            font-size: 12px;
        }

        .error:before {
            content: "※ ";
        }
    </style>
</head>

<body>
    <h1>お問い合わせフォーム</h1>
    <?php if ($result == 2) : ?>
        <h2>お問い合わせありがとうございました。</h2>
        <p><a href="contactform1.php">フォームに戻る</a></p>
    <?php else : ?>
        <p>質問項目を選択し、送信ボタンを押してください。</p>
        <form action="" method="post" novalidate>
            <table>
                <tr>
                    <th>質問内容</th>
                    <td>
                        <input type="radio" name="query" value="質問" <?= $query == '質問' ? 'checked' : '' ?>>質問
                        <input type="radio" name="query" value="要望" <?= $query == '要望' ? 'checked' : '' ?>>要望
                    </td>
                </tr>
                <tr>
                    <th>お名前</th>
                    <td>
                        <input type="text" name="name" value="<?= h($name) ?>">
                        <?php if (isset($nameError)):?>
                            <span class="error"><?=$nameError?></span>
                        <?php endif;?>
                    </td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>
                        <input type="email" name="email" value="<?= h($email) ?>">
                        <?php if (isset($emailError)):?>
                            <span class="error"><?=$emailError?></span>
                        <?php endif;?>
                    </td>
                </tr>
                <tr>
                    <th>お問い合わせ</th>
                    <td>
                        <textarea name="detail" cols="30" rows="10"><?= h($detail) ?></textarea>
                        <?php if (isset($detailError)):?>
                            <span class="error"><?=$detailError?></span>
                        <?php endif;?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="送信"></td>
                </tr>
            </table>
        </form>
    <?php endif; ?>
</body>

</html>
