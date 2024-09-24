<?php

/**
 * 不快指数を計算する
 */
$t = 29;   // 気温 T
$h = 70;   // 湿度 H

$di = 0.81 * $t + 0.01 * $h * (0.99 * $t - 14.3) + 46.3;
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>気温<?=$t?>℃、湿度<?=$h?>%の時の不快指数は<?=$di?>です。</p>
</body>

</html>
