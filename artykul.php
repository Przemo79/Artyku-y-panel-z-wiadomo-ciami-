<!doctype html>
<html>
<head>
	<title>Dodawanie artykułu</title>
	<link rel="stylesheet" href="styl.css">
</head>
<body>

<h2>Dodaj artykuł:</h2>

<form action="artykuł.php" method="post">
	Podaj tytuł: <input type="text" name="title"><br>
	Podaj treść: <textarea name="content"></textarea><br>
	Wybierz kategorię: <select name="category">
		<option value="1">Motoryzacja</option>
		<option value="2">Newsy</option>
		<option value="3">Ciekawostki</option>
		<option value="4">Zdrowie</option>
		<option value="5">Polityka</option></select><br>
	Artykuł dnia <input type="checkbox" name="topart"><br>
	Opublikować od razu?: <input type="checkbox" name="publikacja"><br>
	Data rozpoczęcia publikacji: <input type="date" name="pub_start"><br>
	Data zakończenia publikacji: <input type="date" name="pub_end"><br>
	
	<input type="submit" value="Dodaj">

</form>

<?php
if (isset($_POST["title"]) && isset($_POST["content"]) && isset($_POST["category"])&& isset($_POST["pub_start"]) && isset($_POST["pub_end"]))
{
	$tytulArtykulu=$_POST["title"];
	$trescArtykulu=$_POST["content"];
	$czyArtykulDnia=0;
	$czyOpublikowany=0;
	$kategoria=$_POST["category"];
	if (!isset($_POST["topart"])){
		//brak;
	}else{
		$czyArtykulDnia=1;
	}
	if (!isset($_POST["publikacja"])){
	}else{
		$czyOpublikowany=1;
	}
	$poczatekPub=$_POST["pub_start"];
	$koniecPub=$_POST["pub_end"];
	
	require_once("conf.php");
	$link=mysqli_connect($dbHost, $dbLogin, $dbPass, $dbName);
	if ($link)
	{
		mysqli_query($link, "INSERT INTO articles
				VALUES('', '$czyOpublikowany','$tytulArtykulu', '$trescArtykulu', '$kategoria', '-', '$poczatekPub', '$koniecPub')");

		if ($czyArtykulDnia == 1) {
			mysqli_query($link, "update toparticle set idArticle=(select id from articles order by id desc limit 1);");
			mysqli_close($link);
		}
		echo "Artykul dodany do bazy danych<br>";
		echo "<br>przejdź do <a href='panel.php'>artykułów</a>";
		
	}else{
		echo "Blad polaczenia z baza danych";
	}
}
?>