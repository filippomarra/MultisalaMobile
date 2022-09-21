<!doctype html>
<html>
	<head>
		<link rel="icon" href="Logo.ico">
		<link rel="apple-touch-icon" href="apple-icon.png">
		<link href="Prenotazione.css" rel="stylesheet" type="text/css">
		<title>Prenotazione</title>
	</head>
	<body background="grafica/dark_wall/dark_wall_@2X.png">
		<div class="container">
			<div class="main">
				<!-- Questa pagina consente agli utenti registrati di effettuare delle prenotazioni relative alle diverse proiezioni -->
				<?php
					/* Questa pagina è accessibile agli utenti registrati, al fine di portare a termine una prenotazione per una determinata proiezione, inserendo in un form il numero di posti da prenotare e il metodo di pagamento che desidera utilizzare */
					include('Fixed.php');	
					include ('phpqrcode/qrlib.php'); #Includo la libreria "phpqrcode", che consente di generare dei QRCode e convertirli in immagini
					if(isset($_SESSION['email'])){
						if(empty($_GET['id'])){
							#Effettuo un controllo sull'URL di questa pagina, per verificare se è stato impostato un id alla prenotazione o meno
							$id = 1;	#Imposto il valore di default dell'id a 1
						} else {
							$id = $_GET['id'];	#Il valore dell'id corrisponde al valore dell'id impostato sull'URL, ricavato dall'array $_GET	
						}

						$row = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM proiezione WHERE codproiezione='$id'")); 
						$film = mysqli_fetch_assoc(mysqli_query($db,"SELECT titolo FROM film F, proiezione P WHERE P.codfilm=F.codfilm AND codproiezione='$id'"));

						$email = $_SESSION['email'];
						$user = mysqli_fetch_assoc(mysqli_query($db,"SELECT matricola FROM utenti WHERE email='$email'"));
						$matricola = $user['matricola'];	#Estraggo la componente matricola, poichè all'interno della tabella prenotazione, è presente un riferimento alla tabella utente, mediante una chiave esterna "matricola" 
						$prezzo = $row['prezzo']; 
						$d=date("d-m-Y", strtotime($row['data']));

						$tot = mysqli_fetch_assoc(mysqli_query($db, "SELECT posti FROM sala S, proiezione P WHERE S.numsala=P.numsala AND P.codproiezione='$id'"));
						$totali = $tot['posti'];
						$ord = mysqli_fetch_assoc(mysqli_query($db, "SELECT sum(numero_biglietti) AS somma FROM prenotazione WHERE codproiezione='$id'"));
						$ordinati = $ord['somma'];
						$disponibili = $totali - $ordinati;

						$num_sala = mysqli_fetch_assoc(mysqli_query($db, "SELECT DISTINCT S.numsala AS numsala FROM sala S, proiezione P WHERE S.numsala=P.numsala AND P.codproiezione='$id'"));
						$numero = $num_sala['numsala'];
					
						$titolo=$film['titolo'];
						$orario=$row['orario'];
						$dimensione=$row['2D_3D'];
						$posti=$_POST['posti'];
						$tot=$prezzo*$posti;
						$biglietto = "Titolo: $titolo | Sala: $numero | Data Proiezione: $d | Orario: $orario ($dimensione) | Prezzo: $tot euro"; #Stringa da codificare con il QRCode
						$file="biglietto.png";	#Nome del file risultante	
						$size = 10;   #Dimensione del file risultante (può andare da 1 a 10)	
						$level = QR_ECLEVEL_H;	#Definisce il livello di correttezza del QRCode	
					?>
					<script type="text/javascript">
						function prenInsert(){		/* Funzione che si avvia alla pressione del pulsante con l'id uguale a "post",
						che sfrutta i servizi di Restful per inserire una prenotazione sul database */
							<?php 
								QRcode::png($biglietto, $file, $level, $size); 	
								//Codice PHP eseguito per la generazione del QRCode associato alla corrispondente prenotazione
							?>
					        var codproiezione = <?php echo $id; ?>;
					        var matricola = <?php echo $matricola; ?>;
					        var posti = document.getElementById("posti").value;
					        var oReq = new XMLHttpRequest();	//Creo un oggetto XMLHttpRequest, per poter effettuare richieste HTTP per la connessione al server
					        oReq.onload = function(){
					        	alert(this.innerHTML = oReq.responseText);	//Stampo l'esito della prenotazione tramite un alert di Javascript
					        	window.location.href="Profilo.php";	  //Dopo aver effettuato la prenotazione, si viene reindirizzati sulla pagina del profilo dell'utente
					        }
					        oReq.open("post", "api.php?matricola="+matricola+"&codproiezione="+codproiezione+"&posti="+posti , true); 
					        oReq.send();
					        //Trasmetto la richiesta HTTP, con il metodo post, sul file api.php, dichiarando nell'URL del file le informazioni da memorizzare sul database 
					    }
					</script>
					<div class="descrizione" style="font-size: 16px">
						<h1 style="text-align: center">PRENOTAZIONE</h1>
						<p>Titolo Film: <?php echo $film['titolo'] ?></p><br>
						<p>Sala: <?php echo $numero ?></p><br>
						<p>Data Proiezione: <?php echo $d ?></p><br> <!-- '$d' è la formattazione g-m-A della data -->
						<p>Orario: <?php echo $row['orario']." (".$row['2D_3D'].")" ?></p><br>
						<p>Prezzo: <?php echo $prezzo." €"?></p><br>
						<p>Posti Disponibili: <?php echo $disponibili ?></p><br>

						<form action="<?php echo $_SERVER["PHP_SELF"] . '?'.http_build_query($_GET); ?>" method="POST">
						<!-- Il campo action presente in questo form, contiene del codice PHP, che consente di effettuare un submit sulla pagina attuale.
						Quindi si include l'id corretto effettivamente memorizzato nell'array $_GET -->
							<label>Posti: <input type="number" min="1" max=<?php echo $disponibili ?>  name="posti" id="posti" placeholder="Scegli il numero di posti" required></label><br><br>
							<button type="submit" name="conferma" id="post" onclick="prenInsert()">PRENOTA</button> 	
						</form>
					</div>
				<?php
				} else {
				?>
				<p style="font-family: 'Open Sans Condensed', sans-serif; font-style: normal; font-size: 20px; color: antiquewhite;">Accedi per visualizzare questa pagina!</p>
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
