<?php
session_start();
?>
<!doctype html>
<html lang="pl">
<head>
	<title>Panel artykułów</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="styl.css">
</head>
<body style="background-color: #87a9bc; margin: 0">

<?php
if (isset($_SESSION["czyZalogowany"])){

	require_once("conf.php");
	$link=mysqli_connect($dbHost, $dbLogin, $dbPass, $dbName);
	if ($link)
	{
		$result=mysqli_query($link, "SELECT * FROM articles");
		$liczbaZwroconychWynikow=mysqli_num_rows($result);
		echo "<div class='kto'>
				$_SESSION[zalogowanyLogin]
				<div class='floatleft'><form action='wylogowanie.php' method='post'>
					<input class='button4' type='submit' value='WYLOGUJ SIĘ'>
				</form></div>
			  </div>
			  <div class='panelbg'>
				<div class='tytul'><div class='articles'>Artykuły </div>
			    <div class='allarticles'> Wszystkie artykuły w bazie danych.</div></div>
				<div class='tabeleczka'>
					<form action='artykuł.php' method='post'>
						<input class='button5' type='submit' value='+ DODAJ ARTYKUŁ'>
					</form>
					<div class='rekordy'>Ilość artykułów: $liczbaZwroconychWynikow</div><br><br>";
		
		mysqli_free_result($result);
		
		echo "<table class='tabelunia'>";
		echo "<tr>
					<td class='mainTD'>ID artykułu</td><td class='mainTD'>Status</td><td class='mainTD'>Tytuł</td><td class='mainTD'>Kontent</td><td class='mainTD'>Kategoria</td><td class='mainTD'>IP czytającego</td><td class='mainTD'>Planowana data publikacji</td><td class='mainTD'>Planowana data zakonczenia publikacji</td><td class='akcjeTD'>Akcje</td>
				</tr>";
		$result=mysqli_query($link, "SELECT * FROM articles ORDER BY id");
		while ($row= mysqli_fetch_assoc($result))
		{
			$id=$row["id"];
			$status_temp=$row["status"];
			if ($status_temp == 1) {
				$status="Opublikowany"; 
			}
			else {
				$status="Nieopublikowany";
			}
			$title=$row["title"];
			$content=$row["content"];
			$idCategory=$row["idCategory"];
			$statID=$row["statID"];
			$endID=$row["endID"];
			$IPczyt=$row["ipCzytajacego"];
		
			echo "<tr>
					<td class='liczbyTD'>$id</td><td class='statusTD'>$status</td><td class='basicTD'>$title</td><td class='basicTD'>$content</td><td class='liczbyTD'>$idCategory</td><td class='liczbyTD'>$IPczyt</td><td class='liczbyTD'>$statID</td><td class='liczbyTD'>$endID</td>
					<td>
						<form action='/edycja.php?id=$id' method='post'>
							<input class='button6' type='submit' value='EDYTUJ'>
						</form>
						<form action='/kasuj.php?id=$id' method='post'>
							<input class='button7' type='submit' value='USUŃ'>
						</form>
					</td>
				</tr>";
		}
		mysqli_free_result($result);
		mysqli_close($link);
	}
}
else{
	echo "<div class='srodek_panel'><br><div class='napis'>Najpierw musisz się zalogować.</div><br><br><br><br>
			<div class='napis'>
				<form action='logowanie_wlasciwe.php' method='post'><br>
					<input class='button3' type='submit' value='ZALOGUJ SIĘ'>
				</form>
			</div>
		  </div></div>";
}
?>

</table>
</div></div>

</body>
</html>