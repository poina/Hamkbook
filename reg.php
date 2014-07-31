<?php
session_start();
?>
<html><head><title>Rekisteröidy</title></head><body>

<?php

//luetaan täytetyt tiedot muuttujiin
$etunimi = $_POST["etunimi"];
$sukunimi = $_POST["sukunimi"];
$sahkoposti = $_POST["sahkoposti"];
//salasana & md5
$salasana = md5($_POST["salasana"]);
$salasanauudestaan = md5($_POST["salasanauud"]);
//syntymäaika
$paiva = $_POST["paiva"];
$kuukausi = $_POST["kk"];
$vuosi = $_POST["vuosi"];


//luodaan tietokantaan lisättävä syntymäaikaformaatti
$syntymaaika = "'".$vuosi . "-" . $kuukausi . "-" . $paiva."'";

$virhelkm = "0";

$yhteys = mysql_connect("localhost", "trtknu11a3", "db5ala") or die("Yhdistäminen ei onnistunut!");
	
		mysql_select_db("trtknu11a3", $yhteys) or die("Tietokantaa ei löytynyt!");

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
	
	
//Sähköpostin tarkistus
if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $sahkoposti))

	{ 
		echo "<p>Et antanut sähköpostiosoitetta oikein</p>";
		$virhelkm++;
	}
//tarkistetaan onko sähköpostia jo rekisteröity tietokantaan
$query = "SELECT * FROM HB_Kayttajat WHERE email='$sahkoposti';";
$res = mysql_query($query);
if (mysql_num_rows($res) >= 1)
{
echo "<p>Sähköposti on jo rekisteröity, kirjaudu sisään tai rekisteröidy uudella sähkpostiosoitteella</p>";
		$virhelkm++;
}/*
if(mysql_num_rows(mysql_query("SELECT email FROM HB_kayttajat WHERE email = '$sahkoposti'")))
{
		echo "<p>Sähköposti on jo rekisteröity, kirjaudu sisään tai rekisteröidy uudella sähkpostiosoitteella</p>";
		$virhelkm++;
}*/
	
	
//salasanan tarkistus
if ($salasana != $salasanauudestaan)
	{
		echo "<p>Annoit salasanan väärin, kirjoita salasana uudestaan kahteen</p>";
		$virhelkm++;
	}
//tarkistetaan onko salasanakenttiin kirjoitettu mitään
if($salasana == '' && $salasanauudestaan == '')
	{
		echo "<p>Jätit salasanakentän tyhjäksi, anna salasana</p>";
		$virhelkm++;
	}	
if($paiva == '0' || $paiva == '' || $paiva == 'Päivä' || $kk == '0' || $kk == '' || $kk == 'Kuukaudet' || $vuosi == '0' || $vuosi == '' || $vuosi == 'Vuosi' )
	{
		echo "<p>Anna syntymäaika myös</p>";
		$virhelkm++;
	}

//jos virheitä löytyy, aputekstien lisäksi tulostetaan linkki takaisin etusivulle	
if($virhelkm >=1)
	{
		echo "<a href=\"http://ao.hamk.fi/~paivian/HamkBook/seina.php\"><p>Palaa etusivulle</p></a>";
	}	
/*
Virheiden tarkistus loppuu
*/	
		
		
//jos virheitä ei ole suoritetaan tietokantaan lisäys
if($virhelkm==0)
	{	
			$sql="INSERT INTO HB_Kayttajat SET 
				etunimi = '".$etunimi."',
				sukunimi='".$sukunimi."',
				email='".$sahkoposti."',
				syntymaaika=".$syntymaaika.",
				salasana='".$salasana."'";

		echo "<p>Tiedot lisätty tietokantaan onnistuneesti</p>";
		 		 
		$mysql_haun_tulos = mysql_query($sql, $yhteys) or die("Kysely ei onnistunut: ". mysql_error());
   
		
   
		echo "<a href=\"http://ao.hamk.fi/~paivian/HamkBook/seina.php\"><p>siirry seuraavalle sivulle, tähän kun sais automaattisen redirectin...</p></a>";
		$_SESSION['email'];
		mysql_close($yhteys);
		
		header("location:seina.php");
		
	} 

	mysql_close($yhteys);
	
?>

</body></html>