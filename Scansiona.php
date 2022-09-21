<!doctype html>
	<html>
		<head>
		<link rel="icon" href="Logo.ico">
		<link href="Scansiona.css" rel="stylesheet" type="text/css">
		<script src="js/admin.js"></script>
		<!-- Qui si includono tutte le librerie Javascript, associate alla scansione dei QRCode, memorizzate nella cartella "js" -->
		<script type="text/javascript" src="js/grid.js"></script>
		<script type="text/javascript" src="js/version.js"></script>
		<script type="text/javascript" src="js/detector.js"></script>
		<script type="text/javascript" src="js/formatinf.js"></script>
		<script type="text/javascript" src="js/errorlevel.js"></script>
		<script type="text/javascript" src="js/bitmat.js"></script>
		<script type="text/javascript" src="js/datablock.js"></script>
		<script type="text/javascript" src="js/bmparser.js"></script>
		<script type="text/javascript" src="js/datamask.js"></script>
		<script type="text/javascript" src="js/rsdecoder.js"></script>
		<script type="text/javascript" src="js/gf256poly.js"></script>
		<script type="text/javascript" src="js/gf256.js"></script>
		<script type="text/javascript" src="js/decoder.js"></script>
		<script type="text/javascript" src="js/qrcode.js"></script>
		<script type="text/javascript" src="js/findpat.js"></script>
		<script type="text/javascript" src="js/alignpat.js"></script>
		<script type="text/javascript" src="js/databr.js"></script>
		<script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js"></script>
		<title>Scansiona</title>
		</head>
		
		<body background="grafica/dark_wall/dark_wall_@2X.png">
			<div class="container">
				<div class="main">
					<?php
						#Questa pagina è visualizzabile sia da cassieri che da admin e consente di scansionare i QRCode generati in fase di prenotazione
						include('Fixed.php');
						if (isset($_SESSION['email'])) {
				            $email=$_SESSION['email'];
				            $tipo=mysqli_fetch_assoc(mysqli_query($db,"SELECT tipo FROM utenti WHERE email LIKE '$email'"));
				            if ($tipo['tipo']=="admin" || $tipo['tipo']=="cassiere") {	
					?>
					<div class="titolopagina">
						<h1 style="text-align: center; font-family: 'Open Sans Condensed', sans-serif; font-style: normal; color:antiquewhite;">SCANSIONA</h1>
					</div>
					<h3 style="font-family: 'Open Sans Condensed', sans-serif; font-style: normal; color:antiquewhite;">QRCode</h3>
					<button id="realButton" type="button" class="btn btn-default">  <!-- Creo il bottone che bisogna cliccare per iniziare la scansione -->
						<input id="hiddenUpload" type="file" id="files" visbility="hidden" accept="image/*" capture=environment onchange="openQRCamera(this);" tabindex=-1/>  <!-- Tramite il CSS, evitiamo che l'input di tipo file appaia nel modo predefinito di HTML e mediante la funzione "openQRCamera", effettuo una connessione con la fotocamera, se il pulsante viene cliccato da smartphone, e, se viene cliccato dal computer, si apre una finestra di selezione di file -->
						<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> <!-- Inserisco l'icona di una cartella aperta al centro del pulsante-->
					</button>
					
					<?php
			          } else {  
			          ?>
			          <p style="font-family: 'Open Sans Condensed', sans-serif; font-style: normal; font-size: 20px; color: antiquewhite;">Accedi con un account admin o cassiere per visualizzare questa pagina!</p>
			          <?php
				            }
				          } else {
			          ?>
			          <p style="font-family: 'Open Sans Condensed', sans-serif; font-style: normal; font-size: 20px; color: antiquewhite;">Accedi per visualizzare questa pagina!</p>
			          <?php
			          	}
			          ?>
				</div>
			</div>	
		</body>
		<?php
			include('Footer.html');
		?>
	</html>