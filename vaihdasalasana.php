<?php
//t‰m‰n session aloituksen ja emailin tarkistuksen voisi pist‰‰ omaan tiedostoon ja tuoda includella t‰h‰n?
session_start();

if (!isset($_SESSION['email'])) 
	{
		header('Location: index.php');
	}
	
$vanhasalasana = mysql_real_escape_string($_POST['vanhasalasana']);
$uusisalasana = mysql_real_escape_string($_POST['uusisalasana']);
$uusisalasanauudestaan = mysql_real_escape_string($_POST['uusisalasanauud']);

$sahkoposti = mysql_real_escape_string($_SESSION['email']); 

$vs = md5($vanhasalasana);
$us = md5($uusisalasanauudestaan);
$virhelkm = "0";


 //muodostetaan yhteys tietokantapalvelimeen
   $yhteys = mysql_connect("localhost", "trtknu11a3", "db5ala")
   or die("Yhdist‰minen ei onnistunut!");

//valitaan tietokanta
   mysql_select_db("trtknu11a3", $yhteys) or
   die("Tietokantaa ei lˆytynyt!");

// SQL-kysely - haetaan kaikki tiedot ja lajitellaan ne hinnan mukaan
   $result = mysql_query("SELECT salasana FROM HB_Kayttajat WHERE email='$sahkoposti' and salasana = '$vs'");
   
   if(!mysql_num_rows($result))
   {
		//vanha salasana ei t‰sm‰‰
	echo "<p>Vanha salasana oli v‰‰rin</p>";
	$virhelkm++;
	$mysql_haun_tulos = mysql_query($sql, $yhteys);
			mysql_close($yhteys);
   }

if(strlen($uusisalasanauudestaan) < 5 || strlen($uusisalasana) < 5 )
{
	$virhelkm++;
	echo "<p>Salasanojen t‰ytyy olla v‰hint‰‰n viisi merkki‰ pitki‰</p>";
}
if($uusisalasana != $uusisalasanauudestaan)
{
	echo "<p>salasanat eiv‰t t‰sm‰‰</p>";
	$virhelkm++;
}
if($virhelkm >=1)
	{
		echo "<a href=\"http://ao.hamk.fi/~paivian/HamkBook/seina.php\"><p>Palaa etusivulle</p></a>";
	}	
if($virhelkm == 0)
{
	$sql=mysql_query("UPDATE HB_Kayttajat SET salasana='$us' where email='$sahkoposti'"); 
	$mysql_haun_tulos = mysql_query($sql, $yhteys);
			mysql_close($yhteys);
	header("location:seina.php");
}

   
		
			
?>
