<?php
$sahkoposti = mysql_real_escape_string($_SESSION['email']); 

 //muodostetaan yhteys tietokantapalvelimeen
   $yhteys = mysql_connect("localhost", "trtknu11a3", "db5ala")
   or die("Yhdistäminen ei onnistunut!");

//valitaan tietokanta
   mysql_select_db("trtknu11a3", $yhteys) or
   die("Tietokantaa ei löytynyt!");

// SQL-kysely - haetaan kaikki tiedot ja lajitellaan ne hinnan mukaan
   $sql="select * from HB_Kayttajat where email='$sahkoposti'";

//suoritetaan kysely
   $mysql_haun_tulos = mysql_query($sql, $yhteys);
?>