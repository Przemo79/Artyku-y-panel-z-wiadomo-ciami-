<?php
session_start();
?>
<!doctype html>
<html lang="pl">
<head>
	<title>Zarejestruj się</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="styl.css">
</head>
<body style="background-color: #87a9bc; padding-top: 100px">
<div class="srodek">
	<div class="napis">
		<form action="rejestracja.php" method="post"><br>
			Podaj nowy login: <input type="text" name="login"><br><br>
			Podaj nowe haslo: <input type="password" name="password"><br><br>
			<input class="button3" type="submit" value="REJESTRUJ"><br><br>
		</form>
	
		<div style="font-size: 12px">Masz już konto? Zaloguj się <a href="logowanie_wlasciwe.php">tutaj</a></div>
	</div>
</div>
</body>
</html>