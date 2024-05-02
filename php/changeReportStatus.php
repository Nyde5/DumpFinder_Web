<?php
    session_start();
    if(isset($_POST["id"]) && isset($_POST["type"])){
        $id = $_POST["id"];
        $type = $_POST["type"];
        require_once "connToDB.php";

        $qry = "UPDATE Segnalazioni SET stato_segnalazione = '$type' WHERE id_segnalazione = '$id'";

        $result = $conn -> query($qry);
    } else die("Non hai accesso a questa pagina");