<?php

declare(strict_types=1);
require_once(dirname(__FILE__) . '/Cars.php');

$c1 = new Cars('Toyota', '彼');
echo $c1->rideOnCar(); // 彼はToyotaの車に乗っています。<br>

$c2 = new Cars();
echo $c2->rideOnCar(); // 私はBMWの車に乗っています。<br>
echo $c2->drive();     // ブロロロロ〜<br>
