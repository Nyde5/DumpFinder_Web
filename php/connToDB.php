<?php
    // $conn = new mysqli("localhost", "dumpfinder", "", "my_dumpfinder");
    $conn = new mysqli("localhost", "root", "", "my_dumpfinder");
    if(!$conn){
        die("Errore nella connessione al DB");
    } 

