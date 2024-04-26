<?php
    session_start();

    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST["mail"]) && isset($_POST["psw"])){
        $mail = $_POST["mail"];
        $psw = md5($_POST["psw"]);

        echo "$mail <br> $psw";

        $conn = new mysqli("localhost", "root", "", "my_dumpfinder");
        
        $qry = "SELECT amministratori.id_amministratore FROM `amministratori` WHERE amministratori.email_amministratore = '$mail' AND amministratori.password_amministratore = '$psw'";
        $result = $conn -> query($qry);

        if ($result->num_rows > 0){
            
        } else {
            header("Location: login.html");
        }

        $conn -> close();
    } else {
        ?>
            <!DOCTYPE html>
            <html lang="it">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
                <link rel="stylesheet" href="css/style.css">
                <title>Miss Params</title>
            </head>
                <body>
                    <div class="container d-flex justify-content-center flex-column p-5 my-5">
                        <h1 class="text-center">Miss Params</h1>
                        <h3 class="text-center">Please came back to home</h3>
                        <a href="index.php" class="text-center">
                            <img src="img/logo/logoDF.png" alt="" width="200px">
                        </a>
                    </div>
                </body>
            </html>
        <?php
    }
?>