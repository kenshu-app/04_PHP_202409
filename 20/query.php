<?php
try {
    $pdo = new PDO('mysql:host=localhost; dbname=mydb; charset=utf8', 'sysuser', 'secret');
    $members = $pdo->query('SELECT * FROM members')->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e->getMessage());
}

// echo '<pre>';
// print_r($members);
// echo '</pre>';

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員一覧</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>会員ID</th>
            <th>名前</th>
            <th>年齢</th>
            <th>住所</th>
            <th>登録日時</th>
        </tr>
        <?php foreach ($members as $member) : ?>
            <tr>
                <td><?= $member['id'] ?></td>
                <td><?= $member['name'] ?></td>
                <td><?= $member['age'] ?></td>
                <td><?= $member['address'] ?></td>
                <td><?= $member['created_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
