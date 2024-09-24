<?php
$alph = 'A-B-C';

/* A | B | C | D | 4個 */

$arr = explode('-', $alph);

// $num = array_push($arr, 'D');
array_push($arr, 'D');

array_push($arr, count($arr) . '個');

echo implode(' | ', $arr);
