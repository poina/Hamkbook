<?php
//t�m�n session aloituksen ja emailin tarkistuksen voisi pist�� omaan tiedostoon ja tuoda includella t�h�n?
session_start();

if (!isset($_SESSION['email'])) 
	{
		header('Location: index.php');
	}
//luetaan t�ytetyt tiedot muuttujiin
$etunimi = $_POST["etunimi"];
$sukunimi = $_POST["sukunimi"];
//syntym�aika
$paiva = $_POST["paiva"];
$kuukausi = $_POST["kk"];
$vuosi = $_POST["vuosi"];
//luodaan tietokantaan lis�tt�v� syntym�aikaformaatti
$syntymaaika = "'".$vuosi . "-" . $kuukausi . "-" . $paiva."'";

$virhelkm = "0";

$sahkoposti = mysql_real_escape_string($_SESSION['email']); 

$yhteys = mysql_connect("localhost", "trtknu11a3", "db5ala") or die("Yhdist�minen ei onnistunut!");
mysql_select_db("trtknu11a3", $yhteys) or die("Tietokantaa ei l�ytynyt!");

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

if($paiva == '0' || $paiva == '' || $paiva == 'P�iv�' || $kk == '0' || $kk == '' || $kk == 'Kuukaudet' || $vuosi == '0' || $vuosi == '' || $vuosi == 'Vuosi' )
	{
		echo "<p>Anna syntym�aika my�s</p>";
		$virhelkm++;
	}
	
	
//jos virheit� l�ytyy, aputekstien lis�ksi tulostetaan linkki takaisin etusivulle	
if($virhelkm >=1)
	{
		echo "<a href=\"http://ao.hamk.fi/~paivian/HamkBook/seina.php\"><p>Palaa sein�lle</p></a>";
	}	

if($virhelkm==0)
	{	
			$sql="UPDATE HB_Kayttajat SET 
				etunimi = '".$etunimi."',
				sukunimi='".$sukunimi."',
				syntymaaika=".$syntymaaika." where email='$sahkoposti'";

		echo "<p>Tiedot lis�tty tietokantaan onnistuneesti</p>";
		 		 
		$mysql_haun_tulos = mysql_query($sql, $yhteys) or die("Kysely ei onnistunut: ". mysql_error());
		
		header("location:seina.php");
		
	} 

	mysql_close($yhteys);


?>