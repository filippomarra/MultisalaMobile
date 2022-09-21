<!DOCTYPE html>
	<html>
		<head>
			<link rel="icon" href="Logo.ico">
			<link rel="apple-touch-icon" href="apple-icon.png">
			<link href="Profilo.css" rel=stylesheet type="text/css">
			<title>Profilo</title>
		</head>

		<body background="grafica/dark_wall/dark_wall.png">
			<div class="container">
				<div class="main">
					<!-- Questa pagina è visualizzabile solo dagli utenti registrati, e contiene tutte le informazioni dell'utente connesso -->
					<?php
						include('Fixed.php');
						if (isset($_SESSION['email'])) {
					?>
					<div class="profilo">
						<h1>PROFILO UTENTE</h1>
					</div>
					
					<div class="description col-md-10 col-md-offset-2">
					<?php
						$email = $_SESSION["email"];
						$sql = mysqli_fetch_assoc(mysqli_query($db,"SELECT nome FROM utenti WHERE email = '$email'"));
						$_SESSION["nome"]=$sql["nome"];
						$sql = mysqli_fetch_assoc(mysqli_query($db,"SELECT cognome FROM utenti WHERE email = '$email'"));
						$_SESSION["cognome"]=$sql["cognome"];
						$sql = mysqli_fetch_assoc(mysqli_query($db,"SELECT matricola FROM utenti WHERE email = '$email'"));
						$_SESSION["matricola"]=$sql["matricola"];
						$matricola = $_SESSION["matricola"];
						echo '<p>Nome: '.$_SESSION["nome"].'</p>';
						echo '<p>Cognome: '.$_SESSION["cognome"].'</p>';
						echo '<p>Email: '.$_SESSION["email"].'</p>';
						echo '<hr>';
						echo '<p>Ordinazioni effettuate</p>';
					?>
					<script type="text/javascript">
						window.onload = prenShow;	//All'apertura della pagina, viene eseguita la funzione "prenShow", con lo scopo di visualizzare le prenotazioni effettuate dall'utente collegato

					    function prenShow(){
					    	var matricola=<?php echo $matricola; ?>;
					    	var oReq = new XMLHttpRequest(); //Creo un oggetto XMLHttpRequest, per poter effettuare richieste HTTP per la connessione al server
					        oReq.onload = function(){
					          document.getElementById("prenotazione").innerHTML = oReq.responseText;
					        }
					        oReq.open("get", "api.php?matricola="+matricola , true);
					        oReq.send();
					        //Trasmetto la richiesta HTTP, con il metodo get, sul file api.php, dichiarando nell'URL del file il numero di matricola dell'utente attualmente collegato
					    }

					    function prenDelete(matricola,data_prenotazione){  //Funzione che prende come argomento il numero di matricola e la data di una certa prenotazione, ed elimina dal database le prenotazioni corrispondenti a questi parametri
					        var oReq = new XMLHttpRequest(); 
					        oReq.onload = function(){
					        	alert(this.innerHTML = oReq.responseText);  //Stampo l'esito dell'eliminazione della prenotazione tramite un alert di Javascript
					        	window.location.href="Profilo.php"; //Dopo aver effettuato l'eliminazione della prenotazione, si viene reindirizzati sulla pagina del profilo dell'utente
					        };
					        oReq.open("delete", "api.php?matricola="+matricola+"&data_prenotazione="+data_prenotazione , true);
					        oReq.send();
					      }
					</script>
					<p id="prenotazione"></p>
					<div class="mod">
						<button><a href="Registrazione.php">Modifica Profilo</a></button><br><br>
						<button><a href="biglietto.png" download>Scarica QRCode</a></button>
						<!-- Quest'ultimo pulsante, consente di scaricare, sotto forma di immagine, il QRCode dell'ultima prenotazione effettuata -->

					</div>
					</div>
					<?php 
					} else {
					?> <p style="font-family: 'Open Sans Condensed', sans-serif; font-style: normal; font-size: 20px; color: antiquewhite;">Accedi per visualizzare questa pagina!</p>
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