<!doctype html>
<html>
	<head>
		<link rel="icon" href="Logo.ico">
		<link rel="apple-touch-icon" href="apple-icon.png">
		<link href="Prenota.css" rel="stylesheet" type="text/css">
		<title>Prenota</title>
	</head>

	<?php
		$db = mysqli_connect('localhost','root', '', 'multisala_mobile');
		$sql="SELECT DISTINCT F.codfilm,titolo,locandina,nome,cognome,orario,2D_3D FROM film F, cast C, proiezione P, dirige D WHERE D.codcast=C.codcast AND D.codfilm=F.codfilm AND P.codfilm=F.codfilm AND P.data=CURRENT_DATE()";
		$f=mysqli_query($db,$sql);
	?>

	<body background="grafica/dark_wall/dark_wall.png">

	<div class="container">
		<div class="main">
			<?php
				include('fixed.php');
				#Questa pagina è accessibile solo agli utenti registrati, al fine di effettuare prenotazioni alle varie proiezioni
				if(isset($_SESSION['email'])){
			?>

			<!--NOME PAGINA-->
			<div class="titolo">
				<div class="col-md-6 col-md-offset-3">
					<img src="grafica/CSS/Prenota.png" width="500" class="img-responsive">
				</div>
			</div>

			<!--LOCANDINE E PRENOTAZIONI-->
			<div class="col-md-10 col-md-offset-2">
						<?php
						while($film=mysqli_fetch_array($f,MYSQLI_BOTH)){
							echo '<div class="locandina col-sm-4 col-md-4 col-lg-4">';
							echo '<p><b>'.$film['titolo'].'</b></p>';
							echo '<img src="Copertine/'.$film['locandina'].'" class="img-responsive" width="30%">';
							echo '<p>REGIA: ';
							echo '<br>'.$film['nome']." ".$film['cognome']."<br> ";
							echo $film['orario']." (".$film['2D_3D'].")&ensp;&ensp;";
							echo "<div class='dropdown'>";
							echo "Prenota: &ensp;";
							echo "<a href='' class='dropdown-toggle' data-toggle='dropdown'>Date<b class='caret'></b></a>";
					  		echo "<ul class='dropdown-menu'>";
							$codfilm=$film['codfilm'];
					  	$orario=$film['orario'];
					  	$dat="SELECT codproiezione, data FROM proiezione P WHERE P.codfilm='$codfilm' AND P.orario='$orario' ORDER BY data";
							$data=mysqli_query($db,$dat);
					  	while($date=mysqli_fetch_array($data,MYSQLI_BOTH)){
						  	$d=date("Y-m-d", strtotime($date['data']));
						  	$time=$d." ".$orario;
						  	if($time>date("Y-m-d H:i")){
						  		echo "<li><a href='Prenotazione.php?id={$date['codproiezione']}'>".$d."</a></li>";
									/*Si creano tanti elementi di un menu a tendina, per quante sono le date delle proiezioni attualmente inserite sul database per i vari film, che non sono ancora passate. 
									Una volta cliccati questi elementi, l'utente verrà reindirizzato sulla pagina dinamica "Prenotazione.php"
									relativa alla proiezione scelta */
							  }
							}
							echo "</ul></div><br></div>";
						}
						} else {
							?>
							<p style="font-family: 'Open Sans Condensed', sans-serif;	font-style: normal;	font-size: 20px; color: antiquewhite;">Accedi per visualizzare questa pagina!</p>
							<?php
						}
						?>
				</div>
		</div>
	</div>
	<?php
		include ('Footer.html');
	?>
</body>
</html>
