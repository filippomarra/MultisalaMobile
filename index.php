<!doctype html>
<html>
	<head>
		<style>
		  	.carousel-inner > .item > img,
		  	.carousel-inner > .item > a > img {
			width: 70%;
			margin: auto;
		}
		</style>
		<link rel="icon" href="Logo.ico">
		<link rel="apple-touch-icon" href="apple-icon.png">
		<link href="index.css" rel="stylesheet" type="text/css">
		<link href="Animazione.css" rel="stylesheet" type="text/css">
		<title>Multisala Dream</title>
	</head>

	<body background="grafica/dark_wall/dark_wall_@2X.png">
	<!-- Questa è la HOME del sito -->

	<div class="container">
		<div class="main">
			<?php
				include('Fixed.php'); #Importiamo in questa pagina tutte le informazioni contenute nella pagina 'Fixed.php'
				/*Effettuo una SELECT per estrarre il codice, il titolo e la locandina dei film da proiettare nella varie sale
				(di cui estraggo il numero), tenendo conto esclusivamente delle proiezioni odierne (mediante il metodo SQL 'CURRENT_DATE()'
				che restituisce appunto la data odierna). Con il DISTINCT evitiamo di visualizzare duplicati dello stesso film */
				$s = mysqli_query($db, "SELECT DISTINCT F.codfilm,titolo,locandina,S.numsala FROM film F, sala S, proiezione P
					WHERE F.codfilm=P.codfilm AND P.numsala=S.numsala AND P.data=CURRENT_DATE()");
			?>

			<!-- NOME PAGINA -->
			<div class="titolo">
				<div class="col-md-6 col-md-offset-3">
					<img src="grafica/CSS/Multisala_Dream.png" width="500" class="img-responsive">
				</div>
			</div>

			<!-- CAROSELLO -->
			<div id = "carosello-multisala" class = "carousel slide"   data-ride = "carousel">
				<ol class = "carousel-indicators">
					<li data-target = "#carosello-multisala" data-slide-to="0" class = "active"></li>
					<li data-target = "#carosello-multisala" data-slide-to="1"></li>
					<li data-target = "#carosello-multisala" data-slide-to="2"></li>
				</ol>
				<div class = "carousel-inner" role = "listbox">
					<div class = "item active">
						<img src="grafica/Annunci/principe_libero.jpg" alt="Annuncio">
					</div>
					<div class = "item">
						<img src="grafica/Annunci/infinity_war.jpg" alt="Annuncio"></div>
					<div class = "item">
						<img src="grafica/Annunci/listino.jpg" alt="Annuncio">
					</div>
					<a class = "left carousel-control" href="#carosello-multisala" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class = "right carousel-control" href="#carosello-multisala" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>

			<!-- PROGRAMMAZIONE -->
				<div class=programmazione>
					<br>
					<div>
						<style type="text/css">
							.programmazione{
								font-family: 'Open Sans Condensed', sans-serif;
								font-size: 30px;
								font-style: normal;
								color: antiquewhite;
								text-align: center;
							}
						</style>
						<p>FILM IN PROGRAMMAZIONE</p>
					</div>
				</div>

				<div class="col-md-9 col-md-offset-2">
						<?php
						#Tramite un ciclo while rappresentiamo le locandine e gli orari dei relativi film proiettati nella data odierna in ciascuna sala
							while($sala=mysqli_fetch_array($s, MYSQLI_BOTH)){
								$codfilm = $sala['codfilm'];
								$orario = mysqli_query($db, "SELECT DISTINCT orario FROM proiezione P WHERE P.codfilm='$codfilm' AND P.data=CURRENT_DATE ORDER BY orario ");
							?>
							<div class="col-xs-12 col-sm-4">
								<div class="SALA">
									<p>SALA <?php echo $sala['numsala'] ?></p>
								</div>
								<div class=wrapper>
									<a href=Sale.php?pagina=sala<?php echo $sala['numsala'] ?> > 
									<!-- Qui si viene a creare un collegamento alla pagina dinamica "Sala.php"
						            che, a seconda del 'numsala' memorizzato nell'URL, e contenuto poi nell'array superglobale "$_GET", 
						            conterrà tutte le informazioni sul fim attualmente proiettato in quella sala -->
									<img src=Copertine/<?php echo $sala['locandina'] ?> class=img-responsive alt=Sala <?php echo $sala['numsala'] ?> ></a>
									<div class=content>
										<div class=text_area>
											<p> <?php echo $sala['titolo'] ?> </p>
											<?php
												while ($ora=mysqli_fetch_array($orario, MYSQLI_BOTH)){
													echo '<i>'.$ora['orario'].'</i>&ensp;';
												}
											?>
										</div>
									</div>
								</div>
							</div>
							<?php
									}
								?>
					</div>

		</div>
	</div>
	<?php
		include('Footer.html');
	?>
</body>
</html>
