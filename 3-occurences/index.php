<?php

const LANDING_PAGE = "
<!DOCTYPE html>
<html>
<head>
	<title>Occurences</title>
</head>
<body>
<form method='POST'>
<textarea name='text' id='' cols=30 rows=10>sampel: satu hari dua hari tiga hari</textarea>
<br/>
<button>Kirim!</button>
</form>
</body>
</html>
";

if ($_POST == []) {
	echo (LANDING_PAGE);
} else {
	$text = $_POST["text"];

	echo "<pre>";
	print_r(array_count_values(str_word_count($text, 1)));
	echo "</pre>";
}
