<?php
session_start();
?>
<!doctype html>
<html lang="pl">
<head>
	<title>Rejestracja</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="styl.css">
</head>

<body style="background-color: #87a9bc; padding-top: 100px">
	<div class="srodek">

<?php
//kontrola czy dane zostaly tutaj wyslane
require_once("conf.php");
if (isset($_POST["login"]) && isset($_POST["password"]))
{
	$loginUzytkownika=$_POST["login"];
	$hasloUzytkownika=sha1(sha1($_POST["password"]));
	
	$link=mysqli_connect($dbHost, $dbLogin, $dbPass, $dbName);
	if ($link) {
		
		if (!empty($loginUzytkownika) && !empty($hasloUzytkownika))
		{
			mysqli_query($link, "INSERT INTO users VALUES('', '$loginUzytkownika','$hasloUzytkownika', '')");
			mysqli_close($link);
			echo "<br><div class='napis'>Użytkownik dodany do bazy danych.</div><br><br><br><br><br><br>
					<div class='napis'>
						<form action='logowanie_wlasciwe.php' method='post'>
							<input class='button3' type='submit' value='ZALOGUJ SIĘ'><br><br>
						</form>
					</div>";
		}
		else{
			echo "<br><div class='napis'>Proszę podać login użytkownika.</div><br><br><br><br><br>
					<div class='napis'>
						<form action='rejestracja_wlasciwa.php' method='post'>
							<input class='button3' type='submit' value='ZAREJESTRUJ'><br><br>
						</form>
					</div>";
		}
		
	}else{
		echo "<div class='napis'>Wystąpił błąd.</div><br><br><br><br><br><br><br></div>";
	}
	
}
else{
		echo "<br><div class='napis'>Pola nie mogą być puste.</div><br><br><br><br><br>
		<div class='napis'>
					<form action='rejestracja_wlasciwa.php' method='post'>
						<input class='button3' type='submit' value='ZAREJESTRUJ'><br><br>
					</form>
			</div>";
}


?>
</div>

<!-- <h2>Zarejestrowani uzytkownicy</h2> -->


<?php
/*require_once("conf.php");
$link=mysqli_connect($dbHost, $dbLogin, $dbPass, $dbName);
if ($link)
{
	$result=mysqli_query($link, "SELECT * FROM users");
	$liczbaZwroconychWynikow=mysqli_num_rows($result);
	echo "Liczba rekordow w bazie: $liczbaZwroconychWynikow<br>";
	mysqli_free_result($result);
	/////////////////////////////////////
	
	echo "<table border='1'>";
	$result=mysqli_query($link, "SELECT * FROM users ORDER BY id");
	while ($row= mysqli_fetch_assoc($result))
	{
		$nazwa=$row["login"];//w bazie danych w kolumnie jest login
		$haslo=$row["password"];
		$id=$row["id"];
		$rola=$row["rola"];
		
		echo "<tr>
				<td>$id</td><td>$nazwa</td><td>$haslo</td>
			</tr>";
	}
	echo "</table>";
	mysqli_free_result($result);
	mysqli_close($link);
}*/
?>


</body>
</html>