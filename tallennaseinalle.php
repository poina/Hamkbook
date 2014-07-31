<?php

/*
Tämä toimii mutta tuo seuraavan errorin:
Warning: mysql_fetch_array(): supplied argument is not a valid MySQL result resource in /home/paivian/public_html/HamkBook/tallennaseinalle.php on line 33
Toistaiseksi ei ole ilmennyt mistä tämä johtuu
*/
session_start();

//tarkistetaan onko sessio email päällä, jos ei ole ohjataan etusivulle
//tämän session aloituksen ja emailin tarkistuksen voisi pistää omaan tiedostoon ja tuoda includella tähän?
if (!isset($_SESSION['email'])) 
	{
		header('Location: index.php');
	}

$sahkoposti = mysql_real_escape_string($_SESSION['email']); 
$viesti = mysql_real_escape_string($_POST['comments']);
$aikapitka = getdate();
	$aika = "".$aikapitka[year] . "-" . $aikapitka[mon] . "-" . $aikapitka[mday]." " . $aikapitka[hours] . "-" . $aikapitka[minutes] . "-" . $aikapitka[seconds]."";
$virhelkm="0";
 //muodostetaan yhteys tietokantapalvelimeen
	$yhteys = mysql_connect("localhost", "trtknu11a3", "db5ala")
	or die("Yhdistäminen ei onnistunut!");

//valitaan tietokanta
	mysql_select_db("trtknu11a3", $yhteys) or die("Tietokantaa ei löytynyt!");
   
	$sql="select * from HB_Kayttajat where email='$sahkoposti'";

//suoritetaan kysely
   $mysql_haun_tulos = mysql_query($sql, $yhteys);
//Luetaan tulostatiedot.php:ssa olevasta mysql kyselystä sähköpostia vastaavasta rivistä etunimi ja sukunimi ja tallennetaan ne muuttujiin
	while($mysql_tiedot = mysql_fetch_array($mysql_haun_tulos))
	{
	$enimi = mysql_real_escape_string($mysql_tiedot["etunimi"]);
	$snimi = mysql_real_escape_string($mysql_tiedot["sukunimi"]);
	$nimi = "'".$enimi . " " . $snimi . "'";
	
	mysql_free_result($mysql_haun_tulos);
	mysql_close($yhteys);


	if($viesti == '')
		{
			$virhelkm++;
			echo "<p>Viestisi oli tyhjä, sitä ei lähetetty</p>";			
		}
	if(strlen($viesti) > 300)
	{
			$virhelkm++;
			echo "<p>Viestisi oli liian pitkä, sitä ei lähetetty</p>";	
	}
	if($virhelkm >=1)
	{
		echo "<a href=\"http://ao.hamk.fi/~paivian/HamkBook/seina.php\"><p>siirry takaisin seinälle</p></a>";
		header('Location: seina.php');
	}
	if($virhelkm == 0)
		{
			$yhteys = mysql_connect("localhost", "trtknu11a3", "db5ala") or die("Yhdistäminen ei onnistunut!");
		
			mysql_select_db("trtknu11a3", $yhteys) or die("Tietokantaa ei löytynyt!");
						
				$sql="INSERT INTO HB_seina SET 
				Nimi=".$nimi.",
				email='".$sahkoposti."',
				viesti='".$viesti."',
				aika='".$aika."'";

			echo "<p>Tiedot lisätty tietokantaan onnistuneesti</p>";
			echo "<p>".$aika."</p>";
					 
			$mysql_haun_tulos = mysql_query($sql, $yhteys) or die("Kysely ei onnistunut: ". mysql_error());

			mysql_close($yhteys);
			
			
			echo "<p> Viesti lähetetty</p>";
			header("location:seina.php");
		}
	}
?>