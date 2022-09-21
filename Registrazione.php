<!doctype html>
<html>
	<head>
		<link rel="icon" href="Logo.ico">
		<link rel="apple-touch-icon" href="apple-icon.png">
		<link href="Registrazione.css" rel="stylesheet" type="text/css">
		<title>Registrazione</title>
	</head>
	<body background="grafica/dark_wall/dark_wall_@2X.png">
		<div class="container">
			<div class="main">
				<?php
					include('Fixed.php');
					/*Questa pagina è accessibile a tutti i tipi di utenti al fine di effettuare, per utenti non registrati una registrazione sul sito ottenendo un account di tipo cliente, oppure per utenti registrati di modificare il proprio profilo*/
					if(isset($_POST['registrati'])) {
						$nome = $_POST['nome']; 
						$cognome = $_POST['cognome'];
						$email = $_POST['email']; 
						$password = $_POST['password'];
						$conferma = $_POST['conferma'];
						$tipo = 'cliente';
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
							} elseif (isset($_POST['modifica'])) {
								$nome = $_POST['nome']; 
								$cognome = $_POST['cognome'];
								$npassword = $_POST['npassword'];
								$conferma = $_POST['conferma'];
								if($npassword != $conferma) {
									echo "<script language=\"JavaScript\">\n";
									echo "window.alert(\"Le password non corrispondono!\");\n";
									echo "window.location.href=\"Registrazione.php\";";
									echo "</script>";
								} else{
									if(isset($_SESSION['email'])){
										$sql="UPDATE utenti SET nome='$nome', cognome='$cognome', password='$npassword' WHERE email='".$_SESSION['email']."'";
									}
								}
								if(mysqli_query($db, $sql)) {
									echo "<script language=\"JavaScript\">\n";
									echo "window.alert(\"Modifica Effettuata!\");\n";
									echo "window.location.href=\"index.php\";";
									echo "</script>";
								} 
								else {
									echo "<script language=\"JavaScript\">\n";
									echo "alert(\"'Errore nella query: '".mysqli_error($db)."\");\n";
									echo "</script>";
									}
								}
							 else {
				?>
					<div class="col-md-6 col-md-offset-3">
						<div class="register">
							<?php
								if(isset($_SESSION['email'])){
							?>
								<p><b>Modifica Profilo</b></p>
								<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
									<label>Nome: <input type="text" name="nome" placeholder="Nuovo Nome" required maxlength="50"></label><br />
									<label>Cognome: <input type="text" name="cognome" placeholder="Nuovo Cognome" required maxlength="50"></label><br />
									<label>Nuova Password: <input type="password" name="npassword" placeholder="Nuova Password" required minlength="6" maxlength="50" /></label><br/>
									<label>Conferma Password: <input type="password" name="conferma" placeholder="Conferma Password" required minlength="6" maxlength="50" /></label><br/>
									<button type="submit" name="modifica">Modifica Profilo</button>
								</form>
								</div>
								</div>
							<?php
								} else {
							?>
							<p><b>Registrazione Utente</b></p>
							<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
								<label>Nome: <input type="text" name="nome" placeholder="Nome" required maxlength="50"></label><br />
								<label>Cognome: <input type="text" name="cognome" placeholder="Cognome" required maxlength="50"></label><br />
								<label>Email: <input type="email" name="email" placeholder="Email" required maxlength="50" /></label><br />
								<label>Password: <input type="password" name="password" placeholder="Password" required minlegth="6" maxlength="50" /></label><br />
								<label>Conferma Password: <input type="password" name="conferma" placeholder="Conferma Password" required minlength="6" maxlength="50" /></label><br/>
								<button type="submit" name="registrati">Registrati</button>
							</form>
						</div>
					</div>
					<?php
					}
				}
				?>
			</div>
		</div>
		<?php
			include ('Footer.html');
		?>
	</body>
</html>