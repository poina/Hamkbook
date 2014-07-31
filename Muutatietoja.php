<?php
session_start();
//tämän session aloituksen ja emailin tarkistuksen voisi pistää omaan tiedostoon ja tuoda includella tähän?
//tarkistetaan onko sessio email päällä, jos ei ole ohjataan etusivulle
if (!isset($_SESSION['email'])) 
	{
		header('Location: index.php');
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Hamkbook muuta tietoja</title>
<link href="Ylakerta.css" rel="stylesheet" type="text/css" />
<link href="AlakertaMuuta.css" rel="stylesheet" type="text/css" />
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
//Luetaan tulostatiedot.php:ssa olevasta mysql kyselystä sähköpostia vastaavasta rivistä etunimi ja sukunimi jotka tulostetaan sivulle
	while($mysql_tiedot = mysql_fetch_array($mysql_haun_tulos))
		{
			echo "<p>Hei ".$mysql_tiedot["etunimi"]." ".$mysql_tiedot["sukunimi"]."</p>";
		}
	//vapautetaan hakutulos ja suljetaan yhteys	
	mysql_free_result($mysql_haun_tulos);
	mysql_close($yhteys);
?>			
	</div>

	</div>


	<div class="sisalto">
	
		<div class="ilmoituslayer">
		
			<form action = "tietojenmuutos.php" method="post">
			
				<div class="ilmoitusotsikko">
					<div class="otsikko1">
					<h2>Muuta Tietojasi</h2>
					</div>
				</div>
				
			<div class="valiviiva">
			<img src="valiviiva.gif" alt="some_text"/>
			</div>
			
			<div class="etu">

			<input type="text" style="width:200px; height:30px;" name="etunimi" value="<?php
				//tulostetaan etunimi tähän laatikkoon
				include('tulostatiedot.php');//tietokantaan yhdistämiseen vaadittavat tiedot
				while($mysql_tiedot = mysql_fetch_array($mysql_haun_tulos))
					{
						echo $mysql_tiedot["etunimi"];
					}
				mysql_free_result($mysql_haun_tulos);
				mysql_close($yhteys);
				?>"	/>
				
			</div>
			
				<div class="etuapu">
					<div class="apukentta">
					Etunimi:
					</div>
				</div>
				
			<div class="suku">
			<input type="text" style="width:200px; height:30px;" name="sukunimi" value="<?php
				//Tulostetaan sukunimi tähän laatikkoon
				include('tulostatiedot.php');//tietokantaan yhdistämiseen vaadittavat tiedot
				while($mysql_tiedot = mysql_fetch_array($mysql_haun_tulos))
					{
						echo $mysql_tiedot["sukunimi"];
					}
				mysql_free_result($mysql_haun_tulos);
				mysql_close($yhteys);
				?>" />
			</div>
			
				<div class="sukuapu">
					<div class="apukentta">
					Sukunimi:
					</div>
				</div>

				<div class="syntaika">

					<select name="paiva" >
					<option disabled="disabled">&nbsp; Päivä &nbsp;</option>
					<option value="<?php
					//Luetaan tietokannasta päivä ja asetetaan se lähetysarvoksi tähän valintaan
								include('tulostatiedot.php');
								//Luetaan tulostatiedot.php:ssa olevasta mysql kyselystä sähköpostia vastaavan rivin syntymäaika
									while($mysql_tiedot = mysql_fetch_array($mysql_haun_tulos))
										{
											//luetaan tietokannasta syntymäaika muuttujaan joka on muodossa yyyy-mm-dd
											$i=$mysql_tiedot["syntymaaika"];
											//Puretaan päivämäärä, väliviiva toimii purkuerottimena
											$j=explode("-",$i);
											
											//tulostetaan päivämäärä uudelleen kasattuna
											echo $j[2];
										}
									mysql_free_result($mysql_haun_tulos);
									mysql_close($yhteys);
								?>" selected="selected"><?php
					//Luetaan tietokannasta päivä ja tulostetaan se valintalaatikkoon
								include('tulostatiedot.php');
								//Luetaan tulostatiedot.php:ssa olevasta mysql kyselystä sähköpostia vastaavan rivin syntymäaika
									while($mysql_tiedot = mysql_fetch_array($mysql_haun_tulos))
										{
											//luetaan tietokannasta syntymäaika muuttujaan joka on muodossa yyyy-mm-dd
											$i=$mysql_tiedot["syntymaaika"];
											//Puretaan päivämäärä, väliviiva toimii purkuerottimena
											$j=explode("-",$i);
											
											//tulostetaan päivämäärä uudelleen kasattuna
											echo $j[2];
										}
									mysql_free_result($mysql_haun_tulos);
									mysql_close($yhteys);
								?></option>

					<?php
					for($i = 1; $i <= 31; $i++)
					{
					echo '<option value="'.$i.'">'.$i.'</option>';
					}

					?>
					</select>
					
				<select name="kk">					
					<option disabled="disabled">&nbsp; Kuukausi &nbsp;</option>
					<option value="<?php
					//Luetaan tietokannasta päivä ja asetetaan se lähetysarvoksi tähän valintaan
								include('tulostatiedot.php');
								//Luetaan tulostatiedot.php:ssa olevasta mysql kyselystä sähköpostia vastaavan rivin syntymäaika
									while($mysql_tiedot = mysql_fetch_array($mysql_haun_tulos))
										{
											//luetaan tietokannasta syntymäaika muuttujaan joka on muodossa yyyy-mm-dd
											$i=$mysql_tiedot["syntymaaika"];
											//Puretaan päivämäärä, väliviiva toimii purkuerottimena
											$j=explode("-",$i);
											
											//tulostetaan päivämäärä uudelleen kasattuna
											echo $j[1];
										}
									mysql_free_result($mysql_haun_tulos);
									mysql_close($yhteys);
								?>" selected="selected"><?php
					//Luetaan tietokannasta kuukausi ja tulostetaan se valintalaatikkoon
								include('tulostatiedot.php');
								//Luetaan tulostatiedot.php:ssa olevasta mysql kyselystä sähköpostia vastaavan rivin syntymäaika
									while($mysql_tiedot = mysql_fetch_array($mysql_haun_tulos))
										{
											//luetaan tietokannasta syntymäaika muuttujaan joka on muodossa yyyy-mm-dd
											$i=$mysql_tiedot["syntymaaika"];
											//Puretaan päivämäärä, väliviiva toimii purkuerottimena
											$j=explode("-",$i);
											
											//tulostetaan päivämäärä uudelleen kasattuna
											echo $j[1];
										}
									mysql_free_result($mysql_haun_tulos);
									mysql_close($yhteys);
								?></option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
				</select>

				<select name="vuosi">

					<option disabled="disabled">&nbsp; Vuosi &nbsp;</option>
					<option value="<?php
					//Luetaan tietokannasta vuosi ja asetetaan se lähetysarvoksi tähän valintaan
								include('tulostatiedot.php');
								//Luetaan tulostatiedot.php:ssa olevasta mysql kyselystä sähköpostia vastaavan rivin syntymäaika
									while($mysql_tiedot = mysql_fetch_array($mysql_haun_tulos))
										{
											//luetaan tietokannasta syntymäaika muuttujaan joka on muodossa yyyy-mm-dd
											$i=$mysql_tiedot["syntymaaika"];
											//Puretaan päivämäärä, väliviiva toimii purkuerottimena
											$j=explode("-",$i);
											
											//tulostetaan päivämäärä uudelleen kasattuna
											echo $j[0];
										}
									mysql_free_result($mysql_haun_tulos);
									mysql_close($yhteys);
								?>" selected="selected"><?php
					//Luetaan tietokannasta vuosi ja tulostetaan se valintalaatikkoon
								include('tulostatiedot.php');
								//Luetaan tulostatiedot.php:ssa olevasta mysql kyselystä sähköpostia vastaavan rivin syntymäaika
									while($mysql_tiedot = mysql_fetch_array($mysql_haun_tulos))
										{
											//luetaan tietokannasta syntymäaika muuttujaan joka on muodossa yyyy-mm-dd
											$i=$mysql_tiedot["syntymaaika"];
											//Puretaan päivämäärä, väliviiva toimii purkuerottimena
											$j=explode("-",$i);
											
											//tulostetaan päivämäärä uudelleen kasattuna
											echo $j[0];
										}
									mysql_free_result($mysql_haun_tulos);
									mysql_close($yhteys);
								?></option>
						<?php
						$maksimivuosi = getdate();
						$minimivuosi = $maksimivuosi[year] - 100;

						for($i = $maksimivuosi[year]; $i >= $minimivuosi; $i--)
						{
						echo '<option value="'.$i.'">'.$i.'</option>';
						}
						?>
				</select>
				</div>
				
			<div class="syntaikaapu">
				<div class="apukentta">
				Syntymäaika
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
