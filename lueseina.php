<?php
session_start();
//tämän session aloituksen ja emailin tarkistuksen voisi pistää omaan tiedostoon ja tuoda includella tähän?
if (!isset($_SESSION['email'])) 
	{
		header('Location: index.php');
	}
//Onkohan sessio tässä tiedostossa edes tarpeellinen, tämä sivu tulostuu seina.php olevaan laatikkoon


$yhteys = mysql_connect("localhost", "trtknu11a3", "db5ala") or die("Yhdistäminen ei onnistunut!");
mysql_select_db("trtknu11a3", $yhteys) or die("Tietokantaa ei löytynyt!");

 $sql="select * from HB_seina order by id DESC LIMIT 10";
 
 $mysql_haun_tulos = mysql_query($sql, $yhteys);
 
 echo "<table border=\"0\" width=\"497\"><tr><td width=\"150\">Nimi</td><td>Viesti</td></tr>";
 while($mysql_tiedot = mysql_fetch_array($mysql_haun_tulos)){
     echo "<tr>
           <td valign=\"top\">". $mysql_tiedot["Nimi"]." sanoi: "."</td>
           <td>"." ". $mysql_tiedot["viesti"]."</td>
           </tr>
		   <tr>
			<td>&nbsp;</td>
			</tr>";
   }
echo "</table>";

//vapautetaan hakutuloksiin käytetty muisti
mysql_free_result($mysql_haun_tulos);

//suljetaan yhteys
   mysql_close($yhteys);

   

?>