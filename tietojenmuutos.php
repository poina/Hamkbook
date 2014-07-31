<?php
//tämän session aloituksen ja emailin tarkistuksen voisi pistää omaan tiedostoon ja tuoda includella tähän?
session_start();

if (!isset($_SESSION['email'])) 
	{
		header('Location: index.php');
	}
//luetaan täytetyt tiedot muuttujiin
$etunimi = $_POST["etunimi"];
$sukunimi = $_POST["sukunimi"];
//syntymäaika
$paiva = $_POST["paiva"];
$kuukausi = $_POST["kk"];
$vuosi = $_POST["vuosi"];
//luodaan tietokantaan lisättävä syntymäaikaformaatti
$syntymaaika = "'".$vuosi . "-" . $kuukausi . "-" . $paiva."'";

$virhelkm = "0";

$sahkoposti = mysql_real_escape_string($_SESSION['email']); 

$yhteys = mysql_connect("localhost", "trtknu11a3", "db5ala") or die("Yhdistäminen ei onnistunut!");
mysql_select_db("trtknu11a3", $yhteys) or die("Tietokantaa ei löytynyt!");

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

if($paiva == '0' || $paiva == '' || $paiva == 'Päivä' || $kk == '0' || $kk == '' || $kk == 'Kuukaudet' || $vuosi == '0' || $vuosi == '' || $vuosi == 'Vuosi' )
	{
		echo "<p>Anna syntymäaika myös</p>";
		$virhelkm++;
	}
	
	
//jos virheitä löytyy, aputekstien lisäksi tulostetaan linkki takaisin etusivulle	
if($virhelkm >=1)
	{
		echo "<a href=\"http://ao.hamk.fi/~paivian/HamkBook/seina.php\"><p>Palaa seinälle</p></a>";
	}	

if($virhelkm==0)
	{	
			$sql="UPDATE HB_Kayttajat SET 
				etunimi = '".$etunimi."',
				sukunimi='".$sukunimi."',
				syntymaaika=".$syntymaaika." where email='$sahkoposti'";

		echo "<p>Tiedot lisätty tietokantaan onnistuneesti</p>";
		 		 
		$mysql_haun_tulos = mysql_query($sql, $yhteys) or die("Kysely ei onnistunut: ". mysql_error());
		
		header("location:seina.php");
		
	} 

	mysql_close($yhteys);


?>