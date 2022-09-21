<?php
	$db = mysqli_connect('localhost','root','','multisala_mobile');
	if(empty($_GET['pagina'])){	 /* Qui si verifica se l'array $_GET contiene un'informazione corrispondente alla componente "pagina", impostata da un tag <a> indicato nella pagina "index.php"  */
		$pg='sala1';	# Si utilizza la variabile "$pg", per creare un riferimento alla componente "pagina"
	}
	else{
		$pg=$_GET['pagina'];
	}
?>
<!doctype html>
<html>
	<div class="contenuto">
		<?php
			$d="SELECT * FROM sala WHERE nome='$pg' LIMIT 1";   # Si estraggono tutte le informazioni sulla sala corrispondente a "$pg"
			$r=mysqli_query($db,$d);
			$pagina=mysqli_fetch_assoc($r);

			$f="SELECT * FROM film F, proiezione PR WHERE PR.codfilm=F.codfilm AND PR.data=CURRENT_DATE() AND PR.numsala= '".$pagina['numsala']."'";
			# Si estraggono tutte le informazioni sul film associato alla sala selezionata e sulle sue proiezioni della data odierna  
			$t=mysqli_query($db,$f);
			$film=mysqli_fetch_assoc($t);

			# Si estraggono tutte le informazioni sul cast (regista, attore) relativo al film proiettato nella sala selezionata
			$reg="SELECT DISTINCT nome,cognome FROM cast C, dirige D WHERE C.codcast=D.codcast AND D.codfilm='".$film['codfilm']."'";
			$dirige=mysqli_query($db,$reg);

			$att="SELECT DISTINCT nome,cognome FROM cast C, partecipazione P WHERE C.codcast=P.codcast AND P.codfilm='".$film['codfilm']."'";
			$recita=mysqli_query($db,$att);

			# Si estraggono tutte le informazioni sulle proiezioni, associate al film nella sala selezionata, ordinate per orario
			$codfilm=$film['codfilm'];
			$or="SELECT * FROM proiezione P WHERE P.codfilm='$codfilm' ORDER BY P.orario";
			$orario=mysqli_query($db,$or);
		?>
	</div>
	<head>
		<link rel="icon" href="Logo.ico">
		<link href="Sale.css" rel="stylesheet" type="text/css">
		<?php
			echo '<title>Sala'.$pagina['numsala'].'</title>';	
			# Si cambia dinamicamente il titolo della pagina sul browser, concatenando alla stringa "Sala", il numero della sala selezionata
		?>
	</head>

	<body background="grafica/dark_wall/dark_wall_@2X.png">

	<div class="container">
		<div class="main">
			<?php
				include('Fixed.php');
				/*Questa pagina dinamica rappresenta le informazioni sui vari film e le relative proiezioni nelle diverse sale ad essi associati.*/
			?>

				<!-- NOME PAGINA -->
				<div class="titolo">
						<div class="col-md-6 col-md-offset-3">
							<?php
								echo '<img src="grafica/CSS/'.$pagina['header'].'" width="500" class="img-responsive">';
								# Si cambia dinamicamente l'intestazione della pagina, a seconda della sala selezionata (l'attributo header della tabella sala, corrisponde all'intestazione delle varie sale)
							?>
						</div>
				</div>


				<div class="col-md-12">
					<div class="locandina col-sm-4 col-md-4 col-lg-4">
					<?php
						echo '<img src="Copertine/'.$film['locandina'].'" class="img-responsive" width="100%">';
					?>
					</div>
					<div class="description col-md-6">
						<?php
							echo '<h1>'.$film['titolo'].'</h1>';
							echo '<p>REGIA: ';
							while($regista=mysqli_fetch_array($dirige,MYSQLI_BOTH)){
								echo $regista['nome']." ".$regista['cognome'];
								echo "<br/>";
							}
							echo '<br>CAST: ';
							while($attore=mysqli_fetch_array($recita,MYSQLI_BOTH)){
								echo $attore['nome']." ".$attore['cognome'];
								echo "<br/>";
							}
							echo '<br>GENERE: '.$film['genere'].'<br><br>DURATA: '.$film['durata'].'<br><br>PRODUZIONE: '.$film['produzione'].'<br><br>ORARI: <br>';
							while($orari=mysqli_fetch_array($orario,MYSQLI_BOTH)){
								$data=date("d-m-Y", strtotime($orari['data']));
								# Se la data di proiezione e l'orario non sono ancora passati, sarà possibile effettuare una prenotazione mediante gli appositi pulsanti
								if(($data==date("d-m-Y")) && ($orari['orario']>date("H:i"))){
									echo $orari['orario']." (".$orari['2D_3D'].") &ensp;&ensp;";
									echo "Prenota: ";
									echo "<button type='submit' name='prenota'><a href='Prenotazione.php?id={$orari['codproiezione']}'>".$data."</a></button>";
									echo "&ensp;<br/>";
								}
								# In caso contrario, al posto dei pulsanti, comparirà un messaggio che indicherà l'impossibilità di prenotazione per quella proiezione
								elseif($data==date("d-m-Y") && $orari['orario']<date("H:i")){
									echo "Non ci sono proiezioni disponibili <br>";
								}
							}
							echo '<br><br>TRAMA: <br>'.$film['trama'].'</p>';
						?>
						</p><br><br>
					</div>
				</div>

				<!-- TRAILER -->
				<div class="col-md-6 col-md-offset-3">
					<div class="video-container embed-responsive embed-responsive-16by9">
						<?php
							echo '<iframe class="embed-responsive-item" width="853" height="480" src="'.$film['trailer'].'" frameborder="0" allowfullscreen></iframe>';
						?>
					</div></br>
				</div>
		</div>
	</div>
	<?php
		include ('Footer.html');
	?>

	</body>
</html>
