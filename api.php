<?php

// All'interno di questa pagina, si effettua il collegamento tra client e server, utilizzando delle query SQL associate ai vari metodi HTTP
// Estraggo il metodo HTTP corrispondente alla richiesta effettuata
$method = $_SERVER['REQUEST_METHOD'];

// Connessione al database
$link = mysqli_connect('localhost', 'root', '', 'multisala_mobile');

// Creo le query SQL in base ai metodi HTTP che si utilizzano 
switch ($method) {
  case 'GET':
    $matricola=$_GET['matricola'];
    $sql = mysqli_query($link,"SELECT DISTINCT titolo, S.numsala, data, orario, 2D_3D, numero_biglietti, data_prenotazione FROM prenotazione P, proiezione PR, film F, sala S WHERE P.codproiezione=PR.codproiezione AND P.matricola=$matricola AND F.codfilm=PR.codfilm AND PR.numsala=S.numsala"); break;
  case 'POST':
    $id=$_GET['codproiezione'];
    $matricola=$_GET['matricola'];
    $posti=$_GET['posti'];
    $sql = mysqli_query($link,"INSERT INTO prenotazione (codproiezione, matricola, data_prenotazione, numero_biglietti) VALUES ($id, $matricola, CURRENT_TIMESTAMP, $posti)"); break;
  case 'DELETE':
    $matricola=$_GET['matricola'];
    $data_prenotazione=$_GET['data_prenotazione'];
    $sql = mysqli_query($link,"DELETE FROM prenotazione WHERE matricola=$matricola AND data_prenotazione='".$data_prenotazione."'"); break;
}

// Qui vengono indicati i comportamenti lato client da visualizzare sulla pagina chiamante
if ($method == 'GET') {   // Qui vengono stampate ciclicamente le ordinazioni effettuate dall'utente attualmente collegato
  $matricola=$_GET['matricola'];
  while($pren=mysqli_fetch_array($sql,MYSQLI_BOTH)){
    $data=date("Y-m-d", strtotime($pren['data']));
    if(($data==date('Y-m-d') && $pren['orario']>date('H:i'))||($data>date('Y-m-d'))){
      echo "Data Prenotazione: ".$pren['data_prenotazione']."</br>
            Titolo Film: ".$pren['titolo']."</br>
            Sala: ".$pren['numsala']."</br>
            Data Proiezione: ".$pren['data']."</br>
            Orario: ".$pren['orario']." (".$pren['2D_3D'].") </br>
            Posti: ".$pren['numero_biglietti']."</br>
            <button id='delete' onclick='prenDelete($matricola,\"".$pren['data_prenotazione']."\")'>ELIMINA</button>
            </br></br>";
      }
    }
} elseif ($method == 'POST') {  
  if($sql===TRUE){
    echo "Prenotazione Effettuata!";
  }
  else{
    echo "Prenotazione Fallita! ".mysqli_error($link);
  }
} elseif ($method == 'DELETE') {
  if($sql===TRUE){
  echo "Rimozione Effettuata!";
}
  else{
    echo "Rimozione Fallita! ".mysqli_error($link);
  }
}

?>
