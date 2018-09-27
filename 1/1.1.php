<?php
// 1.1. Есть массив Имен и есть текст внутри которого присутсвуют имена
// Найти количество раз, когда имя было ошибочно написано с маленькой буквы

$names = [ Egor, Danil, Viktor, Lera, Elena];
$text ="egor danil  Egor Lera egor egor Viktor";
$count = 0;

foreach ($names as $elem) {
	$count += substr_count($text, lcfirst($elem));
}

// Количество имен с маленькой буквы:
print_r($count);
?>