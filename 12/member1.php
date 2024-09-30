<?php
class Member
{
    public $name;

    public function __construct($string)
    {
        echo '<p>' . $string . 'インスタンスが生成されました</p>';
    }

    public function __destruct()
    {
        echo '<p>' . $this->name . 'が破棄されます</p>';
    }

    public function showInfo($n1, $n2, $n3)
    {
        echo '<ul>';
        echo '<li>' . $n1 . '</li>';
        echo '<li>' . $n2 . '</li>';
        echo '<li>' . $n3 . '</li>';
        echo '</ul>';
    }
}

$m = new Member('あいう');
$m->name = '田中太郎';
echo $m->name;
$m->showInfo('田中', '鈴木', '高橋');
