<?php

$kuvaurl = mysql_real_escape_string($_POST['kuvaurl']);
$sivuurl = mysql_real_escape_string($_POST['vanhasalasana']);
$kauppa = mysql_real_escape_string($_POST['vanhasalasana']);
$sulkeutu = mysql_real_escape_string($_POST['vanhasalasana']);
$teksti = mysql_real_escape_string($_POST['vanhasalasana']);
$suosikki = mysql_real_escape_string($_POST['vanhasalasana']);
$hinta = mysql_real_escape_string($_POST['vanhasalasana']);
$myyntihinta = mysql_real_escape_string($_POST['vanhasalasana']);
$aika = mysql_real_escape_string($_POST['vanhasalasana']);
$tieto1 = mysql_real_escape_string($_POST['vanhasalasana']);
$tieto2 = mysql_real_escape_string($_POST['vanhasalasana']);


echo $kuvaurl;


/*
$yhteys = mysql_connect("localhost", "trtknu11a3", "db5ala")
   or die("Yhdistäminen ei onnistunut!");
   
mysql_select_db("trtknu11a3", $yhteys) or
   die("Tietokantaa ei löytynyt!");
   
$sql=mysql_query("UPDATE sisalto SET salasana='$us' where email='$sahkoposti'"); 
	$mysql_haun_tulos = mysql_query($sql, $yhteys);
			mysql_close($yhteys);
   
*/

?>