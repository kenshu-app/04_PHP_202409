<?php
const SMTP_HOST     = 'smtp.gmail.com';
const SMTP_PORT     = 587;
const SMTP_PROTOCOL = 'tls';
const GMAIL_SITE    = 'arihito.m@gmail.com';
const GMAIL_APPPASS = 'vtbp fehz efvo jqwh';
const MAIL_FROM     = ['arihito.m@gmail.com' => '公式サイト'];
const MAIL_TO_ADMIN = ['arihito.m@gmail.com' => 'Web担当者様'];
const MAIL_TITLE_ADMIN = '問い合わせに通知が来ました';
const MAIL_TITLE_USER  = 'お問い合わせありがとうございます。';

/**
 * メッセージのインスタンスとフォームの値を受けて
 * メール送信テキストを返す
 *
 * @param object $message
 * @param array $messageArr
 * @return string
 */
function setMailBody(object $message, array $messageArr, string $user): string
{
    if ($user == 'admin') {
        return <<<EOT
        <img src="{$message->embed(Swift_Image::fromPath('logo.png'))}">
        <h2>公式サイトからの通知が届きました。</h2>
        <p>{$messageArr['name']}様から{$messageArr['query']}としてメールを承りました。<br>
        送信内容は以下の通りです。</p>
        ----------------------------
        <p>質問内容：{$messageArr['query']}</p>
        <p>お名前：{$messageArr['name']}</p>
        <p>メールアドレス：{$messageArr['email']}</p>
        <p>お問い合わせ：{$messageArr['detail']}</p>
        ----------------------------
        EOT;
    } else {
        return <<<EOT
        <img src="{$message->embed(Swift_Image::fromPath('logo.png'))}">
        <h2>お問い合わせありがとうございます</h2>
        <p>この度はお問い合わせいただき誠にありがとうございました。<br>送信内容を以下の内容で承りました。</p>
        ----------------------------
        <p>質問内容：{$messageArr['query']}</p>
        <p>お名前：{$messageArr['name']}</p>
        <p>メールアドレス：{$messageArr['email']}</p>
        <p>お問い合わせ：{$messageArr['detail']}</p>
        ----------------------------
        EOT;
    }

}

/**
 * 問い合わせたユーザのメールと名前を受け取り
 * 送り先の配列を返す
 *
 * @param string $name
 * @param string $email
 * @return array
 */
function sendUserMail(string $name, string $email): array
{
    return [$email => $name . '様'];
}
