<?php
// 1.3. Текст произвольной длины, если текст большей, чем 50 символов длины, то обрезать его до 47 символов и в конце поставить "..." Троеточие не должно идти после пробела

$text ="Lorem ipsum                                         ";

if (strlen($text) > 50) {
	$text = substr($text, 0, 47);
	# code...
	if ($text[46] != ' ') {
		$text += "...";	

	} else {
// Учитывает случай множественных пробелов:
		for ($i=strlen($text) - 1; $i >= 0 ; $i--) { 
				if ($text[$i] != ' ') {
					$text = substr($text, 0, $i + 1) . "...";
					break;
				}
			}	
	}
}

echo $text . "<br>";
?>