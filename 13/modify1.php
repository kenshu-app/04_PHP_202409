<?php
$weeks = ['日', '月', '火', '水', '木', '金', '土'];

$d1 = new DateTime('last day of February 2025');
$d2 = new DateTime('+10 days');

$interval = $d1->diff($d2);
$invert = $interval->invert;
$days = $interval->days;

if ($days == 0) {
    echo '同じ日付です';
} elseif ($invert == 1) {
    echo $d1->format('Y年m月d日') . '(' . $weeks[$d1->format('w')] . ')の方が「' . $days . '日分」' . $d2->format('Y年m月d日') . '(' . $weeks[$d2->format('w')] . ')より新しいです';
} else {
    echo $d2->format('Y年m月d日') . '(' . $weeks[$d2->format('w')] . ')の方が「' . $days . '日分」' . $d1->format('Y年m月d日') . '(' . $weeks[$d1->format('w')] . ')より新しいです';
}
