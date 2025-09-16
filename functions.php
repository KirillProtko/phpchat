<?php
// Двойной $ пример
$foo = 'bar';
$bar = 'I am text';
echo $$foo; // I am text
//Функции с массивами

$arr = [
    "key1" => "value1",
    "key2" => "value2",
    "key3" => "value3",
];
array_pop($arr);
array_shift($arr);

array_push($arr, "key4", "value4");
array_unshift($arr, "key5");

var_dump(array_keys($arr));
var_dump(array_values($arr));
var_dump(in_array("key1", $arr));

var_dump(array_key_exists("key1", $arr));

var_dump(array_unique($arr));

//Математические функции

var_dump(abs(-10)); // 10
var_dump(floor(3.5)); // 3
var_dump(ceil(3.5)); // 4
var_dump(round(4.5487, 2)); // 4.55
var_dump(max(1, 2, 3 , 4)); // 4
var_dump(min(1, 2, 3, 4)); // 1
var_dump(rand(0, 10));

//Стороковые функции
$str = "0123456 89";
var_dump(strlen($str));
var_dump(explode(" ", $str)); // ['0123456', '89']
$srr = explode(" ", $str);
var_dump(implode('7', $srr)); // '0123456789'
var_dump(htmlspecialchars("<a href='qsoft.ru'>Qsoft</a>"));
var_dump(trim('   Space    ')); // 'Space'
var_dump(ltrim('       LeftSpace   ')); // 'LeftSpace        '
var_dump(rtrim('    RightSpace     ')); // '           RightSpace'

var_dump(substr("abcdefg", 2)); // cdef
var_dump(substr("abcdefg", 2, 3)); // cde
var_dump(substr("abcdefg", -2)); // fg
var_dump(substr("abcdefg", -2, 1)); // f
var_dump(substr("abcdefg", 2, -2)); // cd

//Время

time();
date('Y-m-d');
