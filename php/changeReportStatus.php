<?php
    session_start();
    if(isset($_POST["id"]) && isset($_POST["type"])){
        $id = $_POST["id"];
        $type = $_POST["type"];
        $motivation = "";
        require_once "connToDB.php";
        
        if(isset($_POST["motivation"])){
            $motivation = $_POST["motivation"];
            $qry = "UPDATE Segnalazioni SET stato_segnalazione = '$type', motivazione = '$motivation' WHERE id_segnalazione = '$id'";
        } else {
            $qry = "UPDATE Segnalazioni SET stato_segnalazione = '$type' WHERE id_segnalazione = '$id'";
        }

        $result = $conn -> query($qry);

    } else die("Non hai accesso a questa pagina");