<?php
session_start();
//t�m�n session aloituksen ja emailin tarkistuksen voisi pist�� omaan tiedostoon ja tuoda includella t�h�n?
if (!isset($_SESSION['email'])) 
	{
		header('Location: index.php');
	}
//Onkohan sessio t�ss� tiedostossa edes tarpeellinen, t�m� sivu tulostuu seina.php olevaan laatikkoon


$yhteys = mysql_connect("localhost", "trtknu11a3", "db5ala") or die("Yhdist�minen ei onnistunut!");
mysql_select_db("trtknu11a3", $yhteys) or die("Tietokantaa ei l�ytynyt!");

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

//vapautetaan hakutuloksiin k�ytetty muisti
mysql_free_result($mysql_haun_tulos);

//suljetaan yhteys
   mysql_close($yhteys);

   

?>