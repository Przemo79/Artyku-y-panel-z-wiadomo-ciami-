<?php
session_start();
if (isset($_SESSION["czyZalogowany"])){
	echo "Jestes zalogowany <a href='wylogowanie.php'>Wyloguj sie</a><br>";
	//Ten IF zadziala, gdy klikne zapisz na formularzu
	if (isset($_POST["id"]) && isset($_POST["title"]) && isset($_POST["content"])){
		$id=$_POST["id"];
		$title=$_POST["title"];
		$content=$_POST["content"];
		require_once("conf.php");
		$link=mysqli_connect($dbHost, $dbLogin, $dbPass, $dbName);
		if ($link){
			$res=mysqli_query($link, "UPDATE articles
				SET title='$title',
					content='$content' 
				WHERE id=$id");
			echo "Dane zostaly zachowane<br>";
			echo "Wyswietl newsy <a href='panel.php'>KLIK</a>";
			mysqli_close($link);
		}
		
	}
	
	
	
	//ten IF zadziala, gdy klikne edytuj na stronie glownej
	if (isset($_GET["id"])){
		$id=$_GET["id"];
		require_once("conf.php");
		$link=mysqli_connect($dbHost, $dbLogin, $dbPass, $dbName);
		if ($link){
			$res=mysqli_query($link, "SELECT * FROM articles WHERE id=$id");
			$daneTegoArtykulu=mysqli_fetch_assoc($res);
			
			$id=$daneTegoArtykulu["id"];
			$title=$daneTegoArtykulu["title"];
			$content=$daneTegoArtykulu["content"];
			
			
			echo "<form action='edycja.php' method='post'>
					Nowy tytul: <input type='text' name='title' value='$title'><br>
					Nowa tresc: <textarea type='text' name='content' value='$content'>$content</textarea><br>
					<input type='hidden' name='id' value='$id'>
					<input type='submit' value='Zapisz'>
				</form>
				";
			
			mysqli_close($link);
			
			
	
		}
		
	}
	
	
	
	
	
}else{
	echo "Musisz sie zalogowac <a href='logowanie.php'>Zaloguj sie</a>";
}
?>