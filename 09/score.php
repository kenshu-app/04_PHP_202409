<?php
$score = 100;

if (!is_numeric($score)) {
    echo '数値を入力してください';
} elseif ($score >= 101 || $score < 0) {
    echo '不正な点数です';
} elseif ($score == 100) {
    echo '満点おめでとう！';
} elseif ($score >= 80) {
    echo '素晴らしいです！';
} elseif ($score >= 60) {
    echo '合格です';
} else {
    echo '不合格です';
}
