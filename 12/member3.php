<?php
class Member
{
    private $name;
    private $age;
    private $address;

    public function __construct()
    {
        echo '<p>インスタンスが生成されました</p>';
    }

    public function setName($n)
    {
        $this->name = $n;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setAge($a)
    {
        $this->age = $a;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAddress($ad)
    {
        $this->address = $ad;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function showInfo()
    {
        echo '<ul>';
        echo '<li>名前：' . $this->name . '</li>';
        echo '<li>年齢：' . $this->age . '</li>';
        echo '<li>住所：' . $this->address . '</li>';
        echo '</ul>';
    }
}

$m3 = new Member();
$m3->setName('高橋三郎');
$m3->setAge(32);
$m3->setAddress('神奈川県');
$m3->showInfo();

// $m1 = new Member();
// $m1->name    = '山田太郎';
// $m1->age     = 21;
// $m1->address = '東京都';

// $m2 = new Member();
// $m2->name    = '鈴木次郎';
// $m2->age     = 34;
// $m2->address = '大阪府';

// $m1->showInfo();
// $m2->showInfo();
