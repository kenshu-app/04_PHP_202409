<?php

interface Figure {
    public function __construct(string $n, int $d);
    public function getArea();
    public function getSurroundings();
}

class Rect implements Figure
{
    private $name;
    private $dimeter;

    /**
     * セッターとして初期値に追加
     *
     * @param string $n
     * @param integer $d
     */
    public function __construct(string $n, int $d)
    {
        $this->name    = $n;
        $this->dimeter = $d;
    }

    /**
     * 1辺の長さを受け取り正方形の面積を返す
     *
     * @return string
     */
    public function getArea(): string
    {
        return $this->name . 'の面積は' . $this->dimeter ** 2 . 'です。<br>';
    }

    /**
     * 1辺の長さを受け取り正方形の周囲長を返す
     *
     * @return string
     */
    public function getSurroundings(): string
    {
        return $this->name . 'の周囲長は' . $this->dimeter * 4 . 'です。<br>';
    }
}

class Circle implements Figure
{
    private $name;
    private $dimeter;

    /**
     * セッターとして初期値に追加
     *
     * @param string $n
     * @param integer $d
     */
    public function __construct(string $n, int $d)
    {
        $this->name    = $n;
        $this->dimeter = $d;
    }

    /**
     * 1辺の長さを受け取り円の面積を返す
     *
     * @return string
     */
    public function getArea(): string
    {
        return $this->name . 'の面積は' . round(($this->dimeter / 2) ** 2 * pi(), 2) . 'です。<br>';
    }

    /**
     * 1辺の長さを受け取り円の周囲長を返す
     *
     * @return string
     */
    public function getSurroundings(): string
    {
        return $this->name . 'の周囲長は' . round($this->dimeter * pi(), 2) . 'です。<br>';
    }
}

$r = new Rect('正方形', 10);
echo $r->getArea();
// 正方形の面積は100です。
echo $r->getSurroundings();
// 正方形の周囲長は40です。

$c = new Circle('円', 10);
echo $c->getArea();
// 円の面積は78.54です。
echo $c->getSurroundings();
// 円の円周率は31.42です。
