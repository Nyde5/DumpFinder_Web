<?php
    session_start();
    // include "init.php";


    $host = "localhost";
        $user = "dumpfinder";
        $psw = "";
        $db = "my_dumpfinder";
    
        $conn = new mysqli($host, $user, $psw, $db);
        if (($conn)->connect_errno) {
            // Se si è verificato un errore, stampa un messaggio di errore
            echo "Connessione al database fallita: " . $conn->connect_error;
            // Interrompi l'esecuzione dello script
            exit();
        }
        echo "conn eseguita";
    // $conn = connToDB();

    $query = "SELECT * FROM Web_text";
    $result = $conn->query($query);

    // Verifica se la query ha avuto successo
    if ($result) {
        // Inizializza un array per contenere i dati
        $data = array();
        
        // Itera attraverso i risultati e aggiungi ogni riga all'array
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        
        // Converti l'array in formato JSON
        $json_result = json_encode($data);

        // Stampa il risultato JSON
        echo $json_result;
    } else {
        // Se la query non ha avuto successo, stampa un messaggio di errore
        echo "Errore nella query: " . $conn->error;
    }
?>
