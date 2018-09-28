<?php
// 2.1. Найти произведение всех чисел через reduce

$arr = [6,8,10];
echo array_reduce($arr, function($a, $b) {
	$a +=$b;
	return $a;
});

?>
