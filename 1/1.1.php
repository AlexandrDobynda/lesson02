<?php

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

print_r($count);
?>