<?php
// 1.3. Текст произвольной длины, если текст большей, чем 50 символов длины, то обрезать его до 47 символов и в конце поставить "..." Троеточие не должно идти после пробела
$text ="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae, quae fugit iusto exercitationem excepturi laborum sed inventore amet a fugiat.";
if (strlen($text) > 50) {
	$text = substr($text, 0, 47);
	if ($text[46] != ' ') {
		$text = $text . "...";	
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