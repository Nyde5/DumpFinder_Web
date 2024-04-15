<?php
    $dbhost="localhost";
    $dbuser="dumpfinder";
    $dbpassword="";
    $dbname="my_dumpfinder";

    function connetti()
    {
        global $dbhost,$dbuser,$dbpassword,$dbname;
        $conn=mysqli_connect($dbhost,$dbuser,$dbpassword) or die("connessione fallita");
        return $conn;
    }

    function joinDB($conn,$dbname){
        mysqli_select_db($conn,$dbname) or die("Db non trovato");
    }
?>
