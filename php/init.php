<?PHP
    $host = "localhost";
    $user = "dumpfinder";
    $psw = "";
    $db = "my_dumpfinder";

    function connToDB(){
        global $host, $user, $psw, $db;

        $mysqli = new mysqli($host, $user, $psw, $db);
        if (($mysqli)->connect_errno) {
            // Se si è verificato un errore, stampa un messaggio di errore
            echo "Connessione al database fallita: " . $mysqli->connect_error;
            // Interrompi l'esecuzione dello script
            exit();
        }
        echo "conn eseguita";
        return $mysqli;
    }

?>