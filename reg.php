<?php
session_start();
?>
<html><head><title>Rekister�idy</title></head><body>

<?php

//luetaan t�ytetyt tiedot muuttujiin
$etunimi = $_POST["etunimi"];
$sukunimi = $_POST["sukunimi"];
$sahkoposti = $_POST["sahkoposti"];
//salasana & md5
$salasana = md5($_POST["salasana"]);
$salasanauudestaan = md5($_POST["salasanauud"]);
//syntym�aika
$paiva = $_POST["paiva"];
$kuukausi = $_POST["kk"];
$vuosi = $_POST["vuosi"];


//luodaan tietokantaan lis�tt�v� syntym�aikaformaatti
$syntymaaika = "'".$vuosi . "-" . $kuukausi . "-" . $paiva."'";

$virhelkm = "0";

$yhteys = mysql_connect("localhost", "trtknu11a3", "db5ala") or die("Yhdist�minen ei onnistunut!");
	
		mysql_select_db("trtknu11a3", $yhteys) or die("Tietokantaa ei l�ytynyt!");

/*
Virheiden tarkistus alkaa
*/

//Etunimi tarkistus
if (is_numeric($etunimi) || strlen($etunimi) < 3)
	{
		echo "<p>Annoit etunimen virheellisesti, anna nimi kokonaan ilman numeroita</p>";
		$virhelkm++;
	}
	
	
//sukunimi tarkistus
if (is_numeric($sukunimi) || strlen($sukunimi) < 3)
	{
		echo "<p>Annoit sukunimen virheellisesti, anna nimi kokonaan ilman numeroita</p>";
		$virhelkm++;
	}
	
	
//S�hk�postin tarkistus
if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $sahkoposti))

	{ 
		echo "<p>Et antanut s�hk�postiosoitetta oikein</p>";
		$virhelkm++;
	}
//tarkistetaan onko s�hk�postia jo rekister�ity tietokantaan
$query = "SELECT * FROM HB_Kayttajat WHERE email='$sahkoposti';";
$res = mysql_query($query);
if (mysql_num_rows($res) >= 1)
{
echo "<p>S�hk�posti on jo rekister�ity, kirjaudu sis��n tai rekister�idy uudella s�hkpostiosoitteella</p>";
		$virhelkm++;
}/*
if(mysql_num_rows(mysql_query("SELECT email FROM HB_kayttajat WHERE email = '$sahkoposti'")))
{
		echo "<p>S�hk�posti on jo rekister�ity, kirjaudu sis��n tai rekister�idy uudella s�hkpostiosoitteella</p>";
		$virhelkm++;
}*/
	
	
//salasanan tarkistus
if ($salasana != $salasanauudestaan)
	{
		echo "<p>Annoit salasanan v��rin, kirjoita salasana uudestaan kahteen</p>";
		$virhelkm++;
	}
//tarkistetaan onko salasanakenttiin kirjoitettu mit��n
if($salasana == '' && $salasanauudestaan == '')
	{
		echo "<p>J�tit salasanakent�n tyhj�ksi, anna salasana</p>";
		$virhelkm++;
	}	
if($paiva == '0' || $paiva == '' || $paiva == 'P�iv�' || $kk == '0' || $kk == '' || $kk == 'Kuukaudet' || $vuosi == '0' || $vuosi == '' || $vuosi == 'Vuosi' )
	{
		echo "<p>Anna syntym�aika my�s</p>";
		$virhelkm++;
	}

//jos virheit� l�ytyy, aputekstien lis�ksi tulostetaan linkki takaisin etusivulle	
if($virhelkm >=1)
	{
		echo "<a href=\"http://ao.hamk.fi/~paivian/HamkBook/seina.php\"><p>Palaa etusivulle</p></a>";
	}	
/*
Virheiden tarkistus loppuu
*/	
		
		
//jos virheit� ei ole suoritetaan tietokantaan lis�ys
if($virhelkm==0)
	{	
			$sql="INSERT INTO HB_Kayttajat SET 
				etunimi = '".$etunimi."',
				sukunimi='".$sukunimi."',
				email='".$sahkoposti."',
				syntymaaika=".$syntymaaika.",
				salasana='".$salasana."'";

		echo "<p>Tiedot lis�tty tietokantaan onnistuneesti</p>";
		 		 
		$mysql_haun_tulos = mysql_query($sql, $yhteys) or die("Kysely ei onnistunut: ". mysql_error());
   
		
   
		echo "<a href=\"http://ao.hamk.fi/~paivian/HamkBook/seina.php\"><p>siirry seuraavalle sivulle, t�h�n kun sais automaattisen redirectin...</p></a>";
		$_SESSION['email'];
		mysql_close($yhteys);
		
		header("location:seina.php");
		
	} 

	mysql_close($yhteys);
	
?>

</body></html>