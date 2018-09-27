<?php

// 1.1. Есть массив Имен и есть текст внутри которого присутсвуют имена
// Найти количество раз, когда имя было ошибочно написано с маленькой буквы

$names = [ Egor, Danil, Viktor, Lera, Elena];
$text ="egor danil  Egor Lera egor egor Viktor";
$words = explode(' ', $text);
$count = 0;

for ($i=0; $i <count($names) ; $i++) { 
	for ($j=0; $j < count($words) ; $j++) { 
		if (lcfirst($names[$i]) == $words[$j]) {
			$count++;
		}
	}
}

// Количество имен с маленькой буквы:
print_r($count);
?>