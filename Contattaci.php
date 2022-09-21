<!doctype html>
<html>
	<head>
		<link rel="icon" href="Logo.ico">
		<link rel="apple-touch-icon" href="apple-icon.png">
		<link href="Contattaci.css" rel="stylesheet" type="text/css">
		<title>Contattaci</title>
	</head>

	<body background="Grafica/dark_wall/dark_wall_@2X.png">
		
	<!-- INDICE -->
	<div class="container">
		<div class="main">
			<?php
				include('Fixed.php');
				#Questa pagina è visualizzabile da qualsiasi utente e serve a fornire informazioni relative al multisala
			 ?>
			
			<!-- NOME PAGINA -->
			
				<div class="titolo">
					<div class="col-md-6 col-md-offset-3">
						<img src="Grafica/CSS/Contattaci.png" width="500" class="img-responsive">
					</div>
				</div>				
				
				<div>
					<div class="info col-sm-4 col-md-4 col-lg-4">
						<p>Per informazioni o essere aggiornati sulle future programmazioni contattaci ai seguenti recapiti</p>
						<br>
					</div>
					<div class="dati col-sm-4 col-md-4 col-lg-4">
						<p>email: multisaladream9395@gmail.com<br>
						Telefono: 342 03 08 797 / 340 95 86 751</p>
						<br>
					</div>
					<div class="dati col-sm-4 col-md-4 col-lg-4">
						<p>ORARI DI APERTURA:<br>Mercoledì,Venerdì - 16:00/01:00<br>Martedì,Giovedì,Sabato - 17:00/01:00</p>
					</div>
				</div>
				
			<div class="col-md-6 col-md-offset-3">
				<h1 class="Map">NOI SIAMO QUI:</h1>
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12543.477281612544!2d15.5549938!3d38.1897095!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x530e8d4872813953!2sMultisala+Apollo!5e0!3m2!1sit!2sit!4v1487093993386" width="853" height="480" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
	<?php
		include('Footer.html');
	?>		
	</body>
</html>
