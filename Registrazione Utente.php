<!doctype html>
<html>
	<head>
		<link rel="icon" href="Logo.ico">
		<link rel="apple-touch-icon" href="apple-icon.png">
		<link href="Registrazione.css" rel="stylesheet" type="text/css">
		<title>Registrazione Utente</title>
	</head>
	<body background="grafica/dark_wall/dark_wall_@2X.png">
		<div class="container">
			<div class="main">
				<?php
					include('Fixed.php');
					#Questa pagina è utilizzata unicamente dagli amministratore, al fine di creare gli account per i cassieri del cinema e per i clienti inesperti 
					if (isset($_SESSION['email'])) {
						$email=$_SESSION['email'];
				  		$tipo=mysqli_fetch_assoc(mysqli_query($db,"SELECT tipo FROM utenti WHERE email LIKE '$email'"));
				  		if ($tipo['tipo']=="admin") {	
							if(isset($_POST['registrati'])) {
								$nome = $_POST['nome']; 
								$cognome = $_POST['cognome'];
								$email = $_POST['email']; 
								$password = $_POST['password'];
								$conferma = $_POST['conferma'];
								$tipo = $_POST['tipo'];
								if($password != $conferma) {
									echo "<script language=\"JavaScript\">\n";
									echo "window.alert(\"Le password non corrispondono!\");\n";
									echo "window.location.href=\"Registrazione.php\";";
									echo "</script>";
								} elseif(mysqli_num_rows(mysqli_query($db,"SELECT * FROM utenti WHERE email LIKE '$email'")) > 0) {
									echo "<script language=\"JavaScript\">\n";
									echo "window.alert(\"Indirizzo email già in uso. Sei pregato di sceglierne un altro\");\n";
									echo "window.location.href=\"Registrazione.php\";";
									echo "</script>";
								} else {
									$sql="INSERT INTO utenti (nome, cognome, email, password, tipo) VALUES ('$nome', '$cognome', '$email', '$password', '$tipo')";


									 // messaggio di conferma
									echo "Conferma l'iscrizione tramite la mail che ti abbiamo inviato.";
									// email per la conferma
									// intestazioni
									$headers = "From: multisaladream9395@gmail.com\nreply-To: noreply\r\n";
									$subject = "Conferma la tua iscrizione.";
									//corpo del messaggio
									$messaggio = "Ti ringraziamo per la tua iscrizione.\n";
									$messaggio .= "La tua email è: ".$email."\n";
									$messaggio .= "La tua password è: ".$password."\n";
									$messaggio .= "Benvenuto in Multisala Dream "; 
									// invio dell'email
									@mail($email, stripslashes($subject),stripslashes($messaggio),$headers);

						    

									if(mysqli_query($db, $sql)) {
										echo "<script language=\"JavaScript\">\n";
										echo "window.alert(\"Registrazione Effettuata!\");\n";
										echo "window.location.href=\"index.php\";";
										echo "</script>";
									} 
									else {
										echo "<script language=\"JavaScript\">\n";
										echo "alert(\"'Errore nella query: '".mysqli_error($db)."\");\n";
										echo "</script>";
										}
									}
								} else {
					?>
						<div class="col-md-6 col-md-offset-3">
							<div class="register">
								<p><b>Registrazione Utente</b></p>
								<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
									<label>Nome: <input type="text" name="nome" placeholder="Nome" required maxlength="50"></label><br/>
									<label>Cognome: <input type="text" name="cognome" placeholder="Cognome" required maxlength="50"></label><br/>
									<label>Tipo Utente: <select name="tipo" required>
										<option disabled selected value>Seleziona un tipo di utente:</option>
										<option name="tipo" onclick="">cliente</option>
										<option name="tipo" onclick="">cassiere</option>
									</select></label><br/>
									<label>Email: <input type="email" name="email" placeholder="Email" required maxlength="50" /></label><br />
									<label>Password: <input type="password" name="password" placeholder="Password" required minlength="6" maxlength="50" /></label><br />
									<label>Conferma Password: <input type="password" name="conferma" placeholder="Conferma Password" required maxlength="50" /></label><br/>
								<button type="submit" name="registrati">Registra</button>
							</form>
						</div>
					</div>
					<?php
						}
					} else {
					?>
					<p style="font-family: 'Open Sans Condensed', sans-serif;	font-style: normal;	font-size: 20px; color: antiquewhite;">Accedi con un account admin per visualizzare questa pagina!</p>
					<?php
						}
					} else {
					?>
					<p style="font-family: 'Open Sans Condensed', sans-serif;	font-style: normal;	font-size: 20px; color: antiquewhite;">Accedi per visualizzare questa pagina!</p>
					<?php
					}
					?>
				</div>
			</div>
			<?php
			include ('Footer.html');
			?>
		</body>
	</html>
