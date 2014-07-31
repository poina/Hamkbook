<?php

//tämän session aloituksen ja emailin tarkistuksen voisi pistää omaan tiedostoon ja tuoda includella tähän?
session_start();

if (!isset($_SESSION['email'])) 
	{
		header('Location: index.php');
	}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Hamkbook seinä</title>
<link href="Ylakerta.css" rel="stylesheet" type="text/css"/>
<link href="Alakerta.css" rel="stylesheet" type="text/css" /> 
<link href="Seinasisalto2.css" rel="stylesheet" type="text/css" />
<link href="alasveto.css" rel="stylesheet" type="text/css" media="screen"/>

</head>

<body>

<div class="ylakerta">

	<div class="otsikko">
	<h1>HamkBook</h1>
	</div>
<!--
		<form action = "MuutaSala.php" method="post">
			<div class="MuutaSalasana">
			<input type="submit" value ="Muuta Salasana" />
			</div>
		</form>
		
		<form action = "Muutatietoja.php" method="post">
			<div class="MuutaTunnus">
			<input type="submit" value ="Muuta Tietoja" />
			</div>
		</form>
		
		<form action = "logout.php" method="post">
			<div class="MuutaTunnus">
			<input type="submit" value ="Kirjaudu ulos" />
			</div>
		</form>

-->



<div class="alasveto">
	<div class="navi">
		<ul>
	
			<li>
				<a><img src="nuoli.png" alt="valikko" /> </a>
				
				<ul>
				<li><a href="Muutatietoja.php">Muuta Tietoja</a></li>
				<li><a href="MuutaSala.php">Muuta Salasana</a></li>
				<li><a href="logout.php">Kirjaudu ulos</a></li>
				</ul>
			</li>
		</ul>
	</div>
</div>



	<div class="Kirjautumistunnus">
	<?php
include('tulostatiedot.php');
//Luetaan tulostatiedot.php:ssa olevasta mysql kyselystä sähköpostia vastaavan rivin etunimi
	while($mysql_tiedot = mysql_fetch_array($mysql_haun_tulos))
		{
			echo "<p>Hei ".$mysql_tiedot["etunimi"]." ".$mysql_tiedot["sukunimi"]."</p>";
		}
	mysql_free_result($mysql_haun_tulos);
	mysql_close($yhteys);
?>
	</div>

</div>


	<div class="sisalto">

	<div class="ilmoituslayer">

		<div class="ilmoitusotsikko">
			<div class="otsikko1">
		<h2> Omat tietosi: </h2>
			</div>
		</div>
		
			<div class="valiviiva">
			<img src="valiviiva.gif" alt="some_text"/>
			</div>
 	
		<div class="tulostusrivi">
			<div class="tulostus"> 

<?php
include('tulostatiedot.php');
//Luetaan tulostatiedot.php:ssa olevasta mysql kyselystä sähköpostia vastaavan rivin etunimi
	while($mysql_tiedot = mysql_fetch_array($mysql_haun_tulos))
		{
			echo "Etunimi: ".$mysql_tiedot["etunimi"];
		}
	mysql_free_result($mysql_haun_tulos);
	mysql_close($yhteys);
?>
			
			</div>
		</div>
		
		<div class="tulostusrivi2">
			<div class="tulostus2">
<?php
include('tulostatiedot.php');
//Luetaan tulostatiedot.php:ssa olevasta mysql kyselystä sähköpostia vastaavan rivin sukunimi
	while($mysql_tiedot = mysql_fetch_array($mysql_haun_tulos))
		{
			echo "Sukunimi: ".$mysql_tiedot["sukunimi"];
		}
	mysql_free_result($mysql_haun_tulos);
	mysql_close($yhteys);
?>			
			</div>
		</div>
		
		<div class="tulostusrivi">
			<div class="tulostus">
<?php
include('tulostatiedot.php');
//Luetaan tulostatiedot.php:ssa olevasta mysql kyselystä sähköpostia vastaavan rivin syntymäaika
	while($mysql_tiedot = mysql_fetch_array($mysql_haun_tulos))
		{
			//luetaan tietokannasta syntymäaika muuttujaan joka on muodossa yyyy-mm-dd
			$i=$mysql_tiedot["syntymaaika"];
			//Puretaan päivämäärä, väliviiva toimii purkuerottimena
			$j=explode("-",$i);
			
			//tulostetaan päivämäärä uudelleen kasattuna
			echo "Syntynyt: ".$j[2].".".$j[1].".".$j[0];
		}
	mysql_free_result($mysql_haun_tulos);
	mysql_close($yhteys); 
?>			
			</div>
		</div>
		
			<div class="valiviiva">
			<img src="valiviiva.gif" alt="some_text"/>
			</div>
	</div>

	<div class="kuvalayer">
		<div class="kuvaotsikko">
		<h2>Seinä:(viestin maksimi pituus on 300 merkkiä)</h2>
		</div>
		
		<div class="Kirjoituspohja">

			<div class="Lisaakirjoitus">

				<form method="post" action="tallennaseinalle.php">
					<fieldset>

						<textarea placeholder="Kirjoita viesti tähän" name="comments" cols="59" rows="2"></textarea>

			</div>

					
				<div class="Tekstinappipohja">
					<div class="Tekstinappi">
						<input type="submit" value ="Julkaise" /></fieldset>
					</div>
				</div>
				</form>
				
					
			
		</div>
		
		<div class="seinakeskustelu">
		<?php include("lueseina.php"); ?>
		</div>
		
	</div>
	</div>

</body>
</html>
