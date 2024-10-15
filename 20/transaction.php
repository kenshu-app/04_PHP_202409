<?php
require_once dirname(__FILE__) . '/db.inc.php';
$pdo = dbConnect();

function getResult($pdo)
{
    $sql = 'SELECT * FROM members 
          ORDER BY id DESC LIMIT 3';
    $result = $pdo->query($sql)->fetchAll();
    echo '<pre>';
    print_r($result);
    echo '</pre>';
}

// 処理の流れの中で問題が発生したと定義したfalse
$isResultFlag = false;

echo '太郎を追加<br>';
$pdo->query('INSERT INTO members (name, created_at) VALUES ("太郎", NOW())');
getResult($pdo);

echo 'トランザクション開始<br>';
$pdo->beginTransaction();

echo '次郎と三郎を追加<br>';
$pdo->query('INSERT INTO members (name, created_at) VALUES ("次郎", NOW())');
$pdo->query('INSERT INTO members (name, created_at) VALUES ("三郎", NOW())');
// この時点でテーブルに追加されているが確定はしていない。
getResult($pdo);

if ($isResultFlag) {
    // 問題が起きなかった場合
    echo 'トランザクション確定<br>';
    $pdo->commit();
    // 太郎/次郎/三郎を表示
} else {
    // 何かしらの問題が起きた場合
    echo 'トランザクション復帰<br>';
    $pdo->rollBack();
    // 太郎のみ表示
}
getResult($pdo);
