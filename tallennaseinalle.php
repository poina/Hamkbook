<?php

/*
T�m� toimii mutta tuo seuraavan errorin:
Warning: mysql_fetch_array(): supplied argument is not a valid MySQL result resource in /home/paivian/public_html/HamkBook/tallennaseinalle.php on line 33
Toistaiseksi ei ole ilmennyt mist� t�m� johtuu
*/
session_start();

//tarkistetaan onko sessio email p��ll�, jos ei ole ohjataan etusivulle
//t�m�n session aloituksen ja emailin tarkistuksen voisi pist�� omaan tiedostoon ja tuoda includella t�h�n?
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
	or die("Yhdist�minen ei onnistunut!");

//valitaan tietokanta
	mysql_select_db("trtknu11a3", $yhteys) or die("Tietokantaa ei l�ytynyt!");
   
	$sql="select * from HB_Kayttajat where email='$sahkoposti'";

//suoritetaan kysely
   $mysql_haun_tulos = mysql_query($sql, $yhteys);
//Luetaan tulostatiedot.php:ssa olevasta mysql kyselyst� s�hk�postia vastaavasta rivist� etunimi ja sukunimi ja tallennetaan ne muuttujiin
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
			echo "<p>Viestisi oli tyhj�, sit� ei l�hetetty</p>";			
		}
	if(strlen($viesti) > 300)
	{
			$virhelkm++;
			echo "<p>Viestisi oli liian pitk�, sit� ei l�hetetty</p>";	
	}
	if($virhelkm >=1)
	{
		echo "<a href=\"http://ao.hamk.fi/~paivian/HamkBook/seina.php\"><p>siirry takaisin sein�lle</p></a>";
		header('Location: seina.php');
	}
	if($virhelkm == 0)
		{
			$yhteys = mysql_connect("localhost", "trtknu11a3", "db5ala") or die("Yhdist�minen ei onnistunut!");
		
			mysql_select_db("trtknu11a3", $yhteys) or die("Tietokantaa ei l�ytynyt!");
						
				$sql="INSERT INTO HB_seina SET 
				Nimi=".$nimi.",
				email='".$sahkoposti."',
				viesti='".$viesti."',
				aika='".$aika."'";

			echo "<p>Tiedot lis�tty tietokantaan onnistuneesti</p>";
			echo "<p>".$aika."</p>";
					 
			$mysql_haun_tulos = mysql_query($sql, $yhteys) or die("Kysely ei onnistunut: ". mysql_error());

			mysql_close($yhteys);
			
			
			echo "<p> Viesti l�hetetty</p>";
			header("location:seina.php");
		}
	}
?>