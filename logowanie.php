<?php
session_start();
?>
<!doctype html>
<html lang="pl">
<head>
	<title>Logowanie</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="styl.css">
</head>
<body style="background-color: #87a9bc; padding-top: 100px">
<div class="srodek">

<?php
if (isset($_POST["login"]) && isset($_POST["password"])){
	$login=$_POST["login"];
	$password=sha1(sha1($_POST["password"]));
	
	require_once("conf.php");//dodaje tylko i zwraca blad, gdy plik nieistnieje, blokujac skrypt
	//include_once("conf.php");//dodaje raz ale zwraca tylko ostrzezenie
	//include("conf.php");//pozwala dodawac ale wielokrotnie
	//require("conf.php");//jak wyzej
	$link=mysqli_connect($dbHost, $dbLogin, $dbPass, $dbName);
	if ($link){
		$res=mysqli_query($link, "SELECT login, password FROM users 
			WHERE login='$login' AND password='$password'");
		if (mysqli_num_rows($res)){
			echo "<br><div class='napis'>Zalogowano poprawnie.</div><br><br><br><br><br><br>
					<div class='napis'>
						<form action='wylogowanie.php' method='post'>
							<input class='button1' type='submit' value='WYLOGUJ SIĘ'>
						</form>
						<form action='panel.php' method='post'>
							<input class='button2' type='submit' value='PRZEJDŹ DO PANELU'>
						</form>
					</div>
				  </div>";
			$_SESSION["zalogowanyLogin"]=$login;
			$_SESSION["czyZalogowany"]=1;
		}else{
			echo "<br><div class='napis'>Niepoprawne dane logowania.</div><br><br><br><br><br><br>
			<div class='napis'>
				<form action='logowanie_wlasciwe.php' method='post'>
					<input class='button3' type='submit' value='ZALOGUJ SIĘ'><br><br>
				</form>
			</div>
		  </div>";
		}
			
	}else{
		echo "<div class='napis'>Niepoprawne dane logowania.</div><br><br><br><br><br><br><br>
			
		  </div>";
	}
}
/*else{
	echo "<div class='napis'>
	<form action='logowanie.php' method='post'><br>
		Podaj login: <input type='text' name='login'><br><br>
		Podaj haslo: <input type='password' name='password'><br><br>
	</form>

	<div class='button3'><a href='logowanie.php' style='text-decoration: none'>ZALOGUJ</a></div><br><br>
	
	<div style='font-size: 12px'>Nie masz konta? Zarejestruj się <a href='rejestracja.php'>tutaj</a></div>
	</div>";
}*/


?>
	

</div>
</body>
</html>

<!--
Dodawanie artykulow i ich wyswietlenie oraz rejestracja
pliki PHP, HTML, CSS
	l.nozdrzykowski@gmail.com
-->