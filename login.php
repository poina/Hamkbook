<?php

//aloittaa session
session_start();

$tunnus=$_POST[kirjaudu_tunnus];
$salasana=md5($_POST[kirjaudu_salasana]);

$yhteys = mysql_connect("localhost", "trtknu11a3", "db5ala") or die("Yhdistäminen ei onnistunut!");
mysql_select_db("trtknu11a3", $yhteys) or die("Tietokantaa ei löytynyt!");

//hakee tietokannasta sähköpostiosoitteen jota käytetään käyttäjätunnuksena ja sitä vastaava salasana
$login = mysql_query("SELECT * FROM HB_Kayttajat WHERE (email = '" . mysql_real_escape_string($tunnus) . "') and (salasana = '" . mysql_real_escape_string($salasana) . "')");


if (mysql_num_rows($login) == 1) 
	{
        $_SESSION['email'] = $tunnus;
        header('Location: seina.php');
		mysql_close($yhteys);
	}
else
	{
	header("Location:salasanavaarin.html");
	mysql_close($yhteys);
	}

?>
