<?php

/**
 * 不快指数を計算する
 */
$t = -10;   // 気温 T
$h = 70;   // 湿度 H

class Di
{
    private $t;
    private $h;

    /**
     * セッターとして初期値を追加
     *
     * @param mixed $t
     * @param mixed $h
     */
    public function __construct(mixed $t, mixed $h)
    {
        $this->t = $t;
        $this->h = $h;
    }

    /**
     * 温度と湿度を元に不快指数の数値を返す
     *
     * @return float
     */
    function getDiScore(): float
    {
        return 0.81 * $this->t + 0.01 * $this->h * (0.99 * $this->t - 14.3) + 46.3;
    }
    /**
     *  不快指数の演算結果を元に体感を文字列で返す
     *
     * @return string
     */
    function getDiResult(): string
    {
        if ($this->getDiScore() < 55) {
            return '寒い';
        } elseif ($this->getDiScore() < 60) {
            return '肌寒い';
        } elseif ($this->getDiScore() < 65) {
            return '何も感じない';
        } elseif ($this->getDiScore() < 70) {
            return '快い';
        } elseif ($this->getDiScore() < 75) {
            return '暑くない';
        } elseif ($this->getDiScore() < 80) {
            return 'やや暑い';
        } elseif ($this->getDiScore() < 85) {
            return '暑くて汗が出る';
        } else {
            return '暑くてたまらない';
        }
    }
}

$di = new Di($t, $h);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>気温<?= $t ?>℃、湿度<?= $h ?>%の時の不快指数は<?= $di->getDiScore() ?>で「<?= $di->getDiResult() ?>」です。</p>
</body>

</html>
