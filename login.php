<?php

//aloittaa session
session_start();

$tunnus=$_POST[kirjaudu_tunnus];
$salasana=md5($_POST[kirjaudu_salasana]);

$yhteys = mysql_connect("localhost", "trtknu11a3", "db5ala") or die("Yhdist�minen ei onnistunut!");
mysql_select_db("trtknu11a3", $yhteys) or die("Tietokantaa ei l�ytynyt!");

//hakee tietokannasta s�hk�postiosoitteen jota k�ytet��n k�ytt�j�tunnuksena ja sit� vastaava salasana
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
