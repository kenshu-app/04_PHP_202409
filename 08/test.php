<?php
$goods1['name']   = '和風柄レターセット';
$goods1['price']  = 980;
$count1          = $_POST['count1'];
$subTotal1       = $goods1['price'] * $count1;

$goods2['name']   = '毛筆ペン(細字)';
$goods2['price']  = 240;
$count2          = $_POST['count2'];
$subTotal2       = $goods2['price'] * $count2;

$total = $subTotal1 + $subTotal2;
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ショッピングカー</title>
    <meta name="description" content="東京で30年、実績に裏付けされた確かなサービスをご提案致します">
    <style>
        table {
            border-collapse: collapse;
            width: 600px;
        }

        th,
        td {
            border: 1px solid #666666;
            padding: 4px;
        }

        th {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <h1>ショッピングカー</h1>
    <form action="" method="post">
        <table>
            <tr>
                <th>商品名</th>
                <th>単価</th>
                <th>数量</th>
                <th>小計</th>
            </tr>
            <tr>
                <td><?=$goods1['name']?></td>
                <td><?=$goods1['price']?></td>
                <td><input type="text" name="count1" value="<?=htmlspecialchars($count1, ENT_QUOTES | ENT_HTML5, 'UTF-8')?>"></td>
                <td><?=$subTotal1?></td>
            </tr>
            <tr>
                <td><?=$goods2['name']?></td>
                <td><?=$goods2['price']?></td>
                <td><input type="text" name="count2" value="<?=htmlspecialchars($count2, ENT_QUOTES | ENT_HTML5, 'UTF-8')?>"></td>
                <td><?=$subTotal2?></td>
            </tr>
            <tr>
                <th colspan="3">合計</th>
                <td><?=$total?></td>
            </tr>
        </table>
        <p><input type="submit" value="更新"></p>
    </form>
</body>

</html>
