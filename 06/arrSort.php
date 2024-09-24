<?php
$arr      = [10, 20, 5 => 50];
$arr[3]   = 30;
$arr[]    = '10';
$arr[]    = '20';
$arr[5]   = '30';
unset($arr[7]);
$arr['4'] = 10;
$arr[]    = [...[40]];
?>
0 => 10 <br>
1 => 20 <br>
5 => '30' <br>
3 => 30 <br>
6 => '10' <br>
'4' => 10 <br>
8 => [40] <br>
<?php
echo '<pre>';
print_r($arr);
echo '</pre>';
