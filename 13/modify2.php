<?php
$d1 = new DateTime('last day of February 2025');
$d2 = new DateTime('+10 days');

$interval = $d1->diff($d2);
$invert = $interval->invert;
$days = $interval->days;

if ($days == 0) {
    echo '同じ日付です';
} elseif ($invert == 1) {
    echo getJpDate($d1) . 'の方が「' . $days . '日分」' . getJpDate($d2) . 'より新しいです';
} else {
    echo getJpDate($d2) . 'の方が「' . $days . '日分」' . getJpDate($d1) . 'より新しいです';
}

/**
 * 和製の日付の文字列を返す
 *
 * @param object $date
 * @return string
 */
function getJpDate(object $date): string
{
    $weeks = ['日', '月', '火', '水', '木', '金', '土'];
    return $date->format('Y年m月d日') . '(' . $weeks[$date->format('w')] . ')';
}
