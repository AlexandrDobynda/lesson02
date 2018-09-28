<?php
// 1.4. То же самое, что и в предыдущем примере, но поставить, чтобы обрезание происходило по концу слова, а не посредине (для простоты по пробелу определяем конец слова)
$text ="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae, quae fugit iusto exercitationem excepturi laborum sed inventore amet a fugiat.";
if (strlen($text) > 50) {
	$text = substr($text, 0, 47);
	$after_last_spase = strlen(strrchr($text, ' '));
	$text = substr($text, 0, -$after_last_spase) . '...';

}
echo $text . "<br>";

?>