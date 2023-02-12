<?php
session_start();
?>
<!doctype html>
<html lang="pl">
<head>
	<title>Zaloguj się</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="styl.css">
</head>
<body style="background-color: #87a9bc; padding-top: 100px">
<div class="srodek">
	<div class="napis">
	<form action="logowanie.php" method="post"><br>
		Podaj login: <input type="text" name="login"><br><br>
		Podaj haslo: <input type="password" name="password"><br><br>
		<input class='button3' type="submit" value="ZALOGUJ"><br><br>
	</form>
	
	<div style="font-size: 12px">Nie masz konta? Zarejestruj się <a href="rejestracja_wlasciwa.php">tutaj</a></div>
	</div>
</div>
</body>
</html>