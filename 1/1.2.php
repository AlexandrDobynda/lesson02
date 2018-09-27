<?php
// 1.2. Взять свое имя
// Подсчитать, сколько раз в тексте присутсвует каждая буква из вашего имени
$name = "Alexandr";
$text ="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo labore nulla deleniti ea aut ab, vero quod, facilis error mollitia vel, minima iure. Ad repellat laudantium, voluptates, eligendi exercitationem sunt?";
$letters_of_name = str_split(lcfirst($name), 1);
$count = 0;
$text_lc = strtolower($text);

foreach ($letters_of_name as $elem) {
	$count += substr_count($text_lc, $elem);
}

// Количество совпадений:
print_r($count);
?>