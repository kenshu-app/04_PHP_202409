<?php

/**
 * XSS対策のサニタイジングと参照名省略
 *
 * @param string | null string
 * @return string | null
 *
 */
function h(?string $string): ?string
{
    if (empty($string)) return null;
    return htmlspecialchars($string, ENT_QUOTES | ENT_HTML5, 'UTF-8');
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
