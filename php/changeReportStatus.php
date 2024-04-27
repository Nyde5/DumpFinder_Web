<?php
    session_start();
    if(isset($_POST["id"]) && isset($_POST["type"])){
        $id = $_POST["id"];
        $type = $_POST["type"];

        $conn = new mysqli("localhost", "root", "", "my_dumpfinder");

        $qry = "UPDATE segnalazioni SET stato_segnalazione = '$type' WHERE id_segnalazione = '$id'";

        $result = $conn -> query($qry);
    } else die("Non hai accesso a questa pagina");