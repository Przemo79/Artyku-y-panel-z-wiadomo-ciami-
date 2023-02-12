<?php
session_start();
session_unset();
session_destroy();
echo "<!doctype html>
<html lang='pl'>
<head>
	<title>Logowanie</title>
	<meta charset='utf-8'>
	<link rel='stylesheet' href='styl.css'>
</head>
<body style='background-color: #87a9bc; padding-top: 100px'>
<div class='srodek'><br>
<div class='napis'>Wylogowano poprawnie.</div><br><br><br><br><br><br>
			<div class='napis'>
				<form action='logowanie_wlasciwe.php' method='post'>
					<input class='button3' type='submit' value='ZALOGUJ SIĘ'><br><br>
				</form>
			</div>
		  </div>
</div>
</body>
</html>;"
?>
	