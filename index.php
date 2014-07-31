<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Hamkbook etusivu</title>
<link href="Ylakerta.css" rel="stylesheet" type="text/css" />
<link href="Alakerta.css" rel="stylesheet" type="text/css" />
<link href="Sisalto.css" rel="stylesheet" type="text/css" />
</head>


<body>

<!--  Seuraavassa yläotsikko, johon kuuluu tunnus, salasana ja kirjaudu nappi.
taittaminen sijaitsee Ylakerta.css -->

<div class="ylakerta">
	<form action = "login.php" method="post">
	
		<div class="otsikko">
		<h1>HamkBook</h1>
		</div>

		<div class="kirjaudunappi">
		<input type="submit" value ="Kirjaudu" />
		</div>

		<div class="kirjaudu">

			<div class="kirjaudusalasana">
			<input type="password" name="kirjaudu_salasana" />
			</div>

			<div class="kirjaudutunnus">
			<input type="text" name="kirjaudu_tunnus" />
			</div>

			<div class="salasanateksti">
			<p>Salasana</p>
			</div>

			<div class="tunnusteksti">
			<p>Sähköposti</p>
			</div>

		</div>
	</form>
</div>

<!--Seuraavassa sisaltöosuus, joka käsittää alakerran vasemman (kuvalayer) ja oikean (ilmoituslayer) puolen. taitaminen on sisalto.css sekä alakerta.css -->
<div class="sisalto">

<!-- Kuvalayer käsittää h2- otsikon, sekä koulunpohjasta kuvan-->
<div class="kuvalayer">
	<div class="kuvaotsikko">
	<h2>Avullamme pidät yhteyttä opiskelijatovereihisi</h2>
	</div>
		<div class="kuva">
		<img src="kuva.gif" alt="some_text"/> 
		</div>
</div>

<!--Seuraavassa ilmoituslayer, joka käsittää useita divejä, jotta saadaan kirjoitusruudut
sekä niiden aputekstit kohdistettua siistiksi. -->
<div class="ilmoituslayer">

<form action = "reg.php" method="post">

	<div class="ilmoitusotsikko">
	<div class="otsikko1">
	<h2>Kannattaa rekisteröityä</h2>
	</div>
	</div>
	
<div class="valiviiva">
<img src="valiviiva.gif" alt="some_text"/> 
</div>

		<div class="etu">
		 <input type="text" style="width:200px; height:30px;" name="etunimi" /> 
		</div>
		
	<div class="etuapu">
		<div class="apukentta">
		Etunimi:
		</div>
	</div>
	
	<div class="suku">
		<input type="text" style="width:200px; height:30px;" name="sukunimi" />
	</div>
	<div class="sukuapu">
			<div class="apukentta">
			Sukunimi:
			</div>
	</div>
	
	<div class="sahkop">
	<input type="text" style="width:200px; height:30px;" name="sahkoposti" />
	</div>
	
	<div class="sahkopapu">
		<div class="apukentta">
		Sähköposti:
		</div>
	</div>
	
	<div class="sala">
	<input type="password" style="width:200px; height:30px;" name="salasana" />
	</div>
	
	<div class="salaapu">
		<div class="apukentta">
		Salasana
		</div>
	</div>
	
	<div class="salauud">
	<input type="password" style="width:200px; height:30px;" name="salasanauud" />
	</div>
	
	<div class="salauudapu">
		<div class="apukentta">
		Salasan uud:
		</div>
	</div>
	<!--syntymäaika on tehty kahdella tavalla. php- koodilla (for), jolla saadaan määriteltyä alasevtovalikkoon
		kuukausiin päivät, joita on maksimissaan 31. Kuukaudet laitettiin suoraan käsin, kun taas vuodet 
		taas php- koodilla (for)-->
	<div class="syntaika">

		<select name="paiva" >
		<option value="0" selected="selected">Päivä</option>

		<?php
		for($i = 1; $i <= 31; $i++)
		{
		echo '<option value="'.$i.'">'.$i.'</option>';
		}

		?>
		</select>
		
	<select name="kk">


	<option value="0" selected="selected">Kuukausi</option>
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

	<option value="0" selected="selected">Vuosi</option>
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
		<div id="apukentta">
		Syntymäaika
		</div>
	</div>
	
	<!-- nappi toteutettiin kopioimalla kuva ja laittamalla se napiksi-->
	<div class="nappilayer">
		<div class="nappi">

		<input type="image" src="rekisteroidu.gif" alt="Rekisteröidy"/>

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
