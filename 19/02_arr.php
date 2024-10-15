<?php

$recipe = [
    [
        'code'  => 'A0001',
        'name'  => '豚ロース薄切り(50g)',
        'price' => 128
    ],
    [
        'code'  => 'K0001',
        'name'  => '白菜(3枚)',
        'price' => 240
    ],
    [
        'code'  => 'A0002',
        'name'  => 'にんじん(1/5本)',
        'price' => 258
    ],
    [
        'code'  => 'A0003',
        'name'  => '水菜(1株)',
        'price' => 265
    ],
    [
        'code'  => 'K0002',
        'name'  => 'しめじ(1/2株)',
        'price' => 139
    ],
    [
        'code'  => 'A0004',
        'name'  => '九条ネギ(1本)',
        'price' => 378
    ]
];
echo '<pre>';
print_r($recipe);
echo '</pre>';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <table>
        <tr>
            <?php foreach ($recipe[0] as $key => $value):?>
                <th><?=$key?></th>
            <?php endforeach;?>
        </tr>
        <?php foreach ($recipe as $item):?>
        <tr>
            <td><?=$item['code']?></td>
            <td><?=$item['name']?></td>
            <td><?=$item['price']?></td>
        </tr>
        <?php endforeach;?>
    </table>
</body>
</html>
