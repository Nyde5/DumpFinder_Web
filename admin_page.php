<?php
    session_start();

    if(isset($_POST["mail"]) && isset($_POST["psw"])){
        $mail = $_POST["mail"];
        $psw = md5($_POST["psw"]);

        echo "$mail <br> $psw";
    }
?>