<?php
// Imposta l'header per consentire tutte le origini
header("Access-Control-Allow-Origin: http://dumpfinder.altervista.org/my_dumpfinder/WEB/stat.php");

// URL del server remoto
$remote_url = "http://dumpfinder.altervista.org/my_dumpfinder/WEB/stat.php";

// Effettua una richiesta al server remoto
$response = file_get_contents($remote_url);

// Stampa la risposta ottenuta dal server remoto
echo $response;
?>
