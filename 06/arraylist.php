<?php
$fruits = ['リンゴ', 'バナナ', 'ぶどう'];

$arrayList = [
    'apple'  => 100,
    'banana' => 200,
    'grape'  => 300
];

$fruits[2] = 'イチゴ';
$fruits[3] = 'メロン';
unset($fruits[1]);

$arrayList['lemon'] = 400;
$arrayList['apple']  = 80;

echo '<pre>';
var_dump($fruits);
echo '</pre>';

echo '<pre>';
print_r($fruits);
echo '</pre>';

echo '<pre>';
print_r($arrayList);
echo '</pre>';
