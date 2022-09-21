<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="Bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
		<link href="Fixed.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!--Questa pagina PHP è inclusa in tutte le altre e contiene tutto ciò che è fissato all'interno del sito, eccetto il footer -->
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

			<div class="collapse navbar-collapse navbar-ex1-collapse">
			  <ul class="nav navbar-nav">
				<li class="active"><a href="index.php">Home</a></li>
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sale <b class="caret"></b></a>
				  <ul class="dropdown-menu">
					<li><a href="Sale.php?pagina=sala1">Sala 1</a></li>
					<li><a href="Sale.php?pagina=sala2">Sala 2</a></li>
					<li><a href="Sale.php?pagina=sala3">Sala 3</a></li>
					<li><a href="Sale.php?pagina=sala4">Sala 4</a></li>
					<li><a href="Sale.php?pagina=sala5">Sala 5</a></li>
					<li><a href="Sale.php?pagina=sala6">Sala 6</a></li>
				  </ul>
				</li>
			  </ul>
			  <ul class="nav navbar-nav navbar-left">
				<li><a href="Prossimamente.php">Prossimamente</a></li>
			  <ul class="nav navbar-nav navbar-left">
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Social<b class="caret"></b></a>
				  <ul class="dropdown-menu">
					<li><a href="https://www.facebook.com/multisaladream" target="_blank">Facebook</a></li>
					<li><a href="https://twitter.com/MultisalaDREAM6" target="_blank">Twitter</a></li>
					<li><a href="https://www.instagram.com/multisaladream9395/" target=_blank>Instagram</a></li>
				  </ul>
				 </li>       
				<li><a href="Contattaci.php">Contattaci</a></li>
			  </ul>
			  <?php 
			  		session_start();
			  		$db = mysqli_connect('localhost','root','','multisala_mobile');	
				  	if(isset($_SESSION['email'])){
				  		$email=$_SESSION['email'];
				  		$tipo=mysqli_fetch_assoc(mysqli_query($db,"SELECT tipo FROM utenti WHERE email LIKE '$email'"));
				  		if ($tipo['tipo']=="admin"){
				  			echo '<li><a href="Prenota.php">Prenota</a></li>
								  <li><a href="Registrazione Utente.php">Registra Utente</a></li>
								  <li><a href="Scansiona.php">Scansiona</a></li>
				  			</ul>
				  			<div class="nav-login">
				  				<form action="Logout.php" method="POST">				  				
					  				<button type="submit" name="logout">Logout</button>
					  				<label><a href="Profilo.php">Profilo</a></label>
				  				</form>
				  			</div>';
				  		}
				  		elseif ($tipo['tipo']=="cassiere"){
							echo '<li><a href="Prenota.php">Prenota</a></li>
								  <li><a href="Scansiona.php">Scansiona</a></li>
				  			</ul>
				  			<div class="nav-login">
					  			<form action="Logout.php" method="POST">				  				
					  				<button type="submit" name="logout">Logout</button>
					  				<label><a href="Profilo.php">Profilo</a></label>
					  			</form>
					  		</div>';
						}
						elseif ($tipo['tipo']=="cliente") {
							echo '<li><a href="Prenota.php">Prenota</a></li>
				  			</ul>
				  			<div class="nav-login">
					  			<form action="Logout.php" method="POST">
					  				<button type="submit" name="logout">Logout</button>
					  				<label><a href="Profilo.php">Profilo</a></label>
					  			</form>
					  		</div>';
						}
				  	} else {
				  		echo '<li><a href="Registrazione.php">Registrati</a></li>
				  			  </ul>
				  			  <div class="nav-login">
				  				<form method="POST" action="Login.php">
					  				<input type="email" name="email" placeholder="Email" required>
					  				<input type="password" name="password" placeholder="Password" required>
					  				<button type="submit" name="login">Accedi</button>
				  			</form></div>';
				  	}
				  ?>
				</div>
			</nav>

	</body>
	</html>	