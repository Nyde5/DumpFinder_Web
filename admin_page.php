<?php
    session_start();

    if(isset($_POST["mail"]) && isset($_POST["psw"])){
        $mail = $_POST["mail"];
        $psw = md5($_POST["psw"]);

        echo "$mail <br> $psw";


        include('connessione.php');
        $conn = connetti();
        joinDB($conn, "my_dumpfinder");
        
        if($_SERVER['REQUEST_METHOD']=='POST'){
        
            $stmt = $conn->prepare("SELECT * FROM `Amministratori` WHERE password_amministratore = '$psw' && email_amministratore = '$mail'");
            $stmt->bind_param("ss", $user, $passwordMD5);
            $stmt->execute();
            $result = $stmt->get_result();
        
            // if ($result->num_rows > 0) {
            //     $row=$result->fetch_assoc();
            //     if($row['modifica_pass']==1){
            //         echo json_encode(array("success" => 2, "message" => "Ricordati di impostare la tua password...", "user" => $row));
            //     }else{
            //         //rimuovo la password prima dell'invio
            //         unset($row['password_utente']);
            //         echo json_encode(array("success" => 1, "message" => "Login effettuato con successo", "user" => $row));
            //     }
            // } else {
            //     echo json_encode(array("success" => 0, "message" => "Controlla le credenziali"));
            // }
        } else {
            echo json_encode(array("success" => 0, "message" => "Request Method Post"));
        }
        $conn->close();
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
                        <a href="index.html" class="text-center">
                            <img src="img/logo/logoDF.png" alt="" width="200px">
                        </a>
                    </div>
                </body>
            </html>
        <?php
    }
?>