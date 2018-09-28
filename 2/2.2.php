<?php
//2.2. Получить массив, состоящий только из четных элементов массива

$arr = [0,1,2,3,4,5,6,7,8,9];
$even = [];

foreach ($arr as $item) {

	if ($item != 0 && $item % 2 ==0) {
		array_push($even, $item);
	}
}

print_r($even);
?>
