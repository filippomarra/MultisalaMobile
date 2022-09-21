<?php
	session_start();
	$db = mysqli_connect('localhost','root','','multisala_mobile');
	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
		if(mysqli_num_rows(mysqli_query($db, "SELECT * FROM utenti WHERE email LIKE '$email'")) == 0) {
			echo "<script language=\"JavaScript\">\n"; 
			echo "window.alert(\"Utente non trovato!\");\n";
			echo "window.location.href=\"index.php\";";
			echo "</script>";
		} else {
			if(mysqli_num_rows(mysqli_query($db, "SELECT * FROM utenti WHERE email LIKE '$email' AND password LIKE '$password'")) > 0) {
				$sql = mysqli_fetch_assoc(mysqli_query($db, "SELECT email FROM utenti WHERE email LIKE '$email'"));
				$_SESSION['email'] = $sql['email'];
				echo "<script language=\"JavaScript\">\n"; 
				echo "window.alert(\"Accesso effettuato!\");\n";
				echo "window.location.href=\"index.php\";";
				echo "</script>";
			}
			else {
			echo "<script language=\"JavaScript\">\n"; 
			echo "window.alert(\"Password Errata!\");\n";
			echo "window.location.href=\"index.php\";";
			echo "</script>";
			}
		}
	}
?>
