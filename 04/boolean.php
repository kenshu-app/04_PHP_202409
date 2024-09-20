<?php
var_dump((bool) -2); // 負の整数 true
var_dump((bool) 'foo'); // 文字列 true
var_dump((bool) [1]); // 配列内の整数 true

var_dump((bool) 'false'); // 文字列の真偽値 true
var_dump((bool) 0); // 値の無い整数 false
var_dump((bool) null); // 型や値無し false
var_dump((bool) false); // 真偽値 false
var_dump((bool) ''); // 空文字 false
var_dump((bool) 0.0); // 浮動小数点 false
var_dump((bool) []); // 空の配列 false
var_dump((bool) '0'); // 文字列型の整数 false

var_dump((bool) undefined); // 未定義 error
