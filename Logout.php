<?php

if (isset($_POST['logout'])) {
	session_start();  #Avviamo una sessione
	session_unset();	#Svuotiamo l'array $_SESSION
	session_destroy();   #Terminiamo la sessione
	header("Location: index.php");   #Reindirizzamento alla home
	exit();
}
?>