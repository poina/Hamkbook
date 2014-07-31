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
<title>Hamkbook muuta salasana</title>
<link href="Ylakerta.css" rel="stylesheet" type="text/css" />
<link href="AlakertaMuutaSala.css" rel="stylesheet" type="text/css" />
<link href="Sisalto.css" rel="stylesheet" type="text/css" />
</head>


<body>

	<div class="ylakerta">

		<div class="otsikko">
		<h1>HamkBook</h1>
		</div>
		
		<div class="MuutaSalasana">
	<form action="seina.php"><fieldset><input type="submit" value="Takaisin" /></fieldset></form>
		</div>
		
		<div class="Kirjautumistunnus">
<?php
include('tulostatiedot.php');
//Luetaan tulostatiedot.php:ssa olevasta mysql kyselystä sähköpostia vastaavan rivin sukunimi
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
					<h2>Muuta Salasana</h2>
					</div>
				</div>
				
			<div class="valiviiva">
			<img src="valiviiva.gif" alt="some_text"/>
			</div>
			
				<form action = "vaihdasalasana.php" method="post">
				
					<div class="etu">
					<input type="password" style="width:200px; height:30px;" name="vanhasalasana" />
					</div>
					
					<div class="etuapu">
						<div class="apukentta">
						Vanha Salasana:
						</div>
					</div>
					
					<div class="suku">
					<input type="password" style="width:200px; height:30px;" name="uusisalasana" />
					</div>
					
					<div class="etuapu">
						<div class="apukentta">
						Uusi Salasana:
						</div>
					</div>
					
					<div class="etu">
					<input type="password" style="width:200px; height:30px;" name="uusisalasanauud" />
					</div>
					
					<div class="sukuapu">
						<div class="apukentta">
						Salasana uudelleen:
						</div>
					</div>
					
				<div class="nappilayer">
					<div class="nappi">

					<input type="submit" value ="Tallenna" />

					</div>
				</div>
				
				</form>
				
			<div class="valiviiva">
			<img src="valiviiva.gif" alt="some_text"/>
			</div>
			
		</div>
	</div>
</body>
</html>


