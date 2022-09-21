<!doctype html>
<html>
	<head>
		<link rel="icon" href="Logo.ico">
		<link rel="apple-touch-icon" href="apple-icon.png">
		<link href="Prossimamente.css" rel="stylesheet" type="text/css">
		<title>Prossimamente</title>
	</head>

	<body background="grafica/dark_wall/dark_wall_@2X.png">
		
	<!-- INDICE -->
	<div class="container">
		<div class="main">
			<?php 
				include('Fixed.php');
				#Questa pagina è accessibile a tutti gli utenti, registrati e non, che rappresenta i film che usciranno in date future
				$oggi = date("Y-m-d");
				$pros = mysqli_query($db,"SELECT locandina,titolo,data_uscita FROM film WHERE data_uscita>'$oggi'");
			?>
			
			<!-- NOME PAGINA -->
			
			<div class="titolo">
				<div class="col-md-6 col-md-offset-3">
					<img src="grafica/CSS/Prossimamente.png" width="500" class="img-responsive">
				</div>
			</div>		
				
			<!-- PROSSIMAMENTE IN PROGRAMMAZIONE -->
				
			<div class="col-md-10 col-md-offset-2">
				<?php
				while($p=mysqli_fetch_array($pros,MYSQLI_BOTH)){
					$data=date("d-m-Y", strtotime($p['data_uscita']));
					echo '<div class="col-sm-4 col-md-4 col-lg-4">
						<img src="Copertine/'.$p['locandina'].'" width="35%" class="img-responsive">
						<div class="info">
						<p>Titolo: '.$p['titolo'].'<br>
						Data Uscita: '.$data.'</p>
						</div></div>';
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
