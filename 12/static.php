<?php
class Member
{
    public static $name;
    public static $age;
    public static $address;

    public static function showInfo()
    {
        echo '<ul>';
        echo '<li>名前：' . self::$name . '</li>';
        echo '<li>年齢：' . self::$age . '</li>';
        echo '<li>住所：' . self::$address . '</li>';
        echo '</ul>';
    }
}

Member::$name    = '山田太郎';
Member::$age     = 21;
Member::$address = '東京都';
Member::showInfo();

Member::$name    = '鈴木次郎';
Member::$age     = 34;
Member::$address = '大阪府';
Member::showInfo();
