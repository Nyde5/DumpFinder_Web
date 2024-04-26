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
            htmlCorrect();
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



    function htmlCorrect(){
        ?>
            <html lang="it">

            <head>
                <meta charset="UTF-8">
                <title>Operator Page</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
                <link rel="stylesheet" href="css/operatorStyle.css">
            </head>

            <body>
                <nav class="navbar">
                    <div class="container">
                        <a class="navbar-brand" href="#">
                            <img src="/img/logo/logoDF.png" alt="Bootstrap" width="30" height="24">
                        </a>
                    </div>
                    <button type="button" class="btn btn-outline-secondary">Logout</button>
                </nav>


                <div class="d-flex justify-content-center align-items-center w-100 mt-5 pt-5" id="segnalazioniUtenti">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <a class="navbar-brand">
                                    <img src="/img/logo/logoDF.png" alt="Bootstrap" width="30" height="24">
                                    Giammarco Tocco 
                                </a>
                                <a class="navbar-brand">
                                    <right>Stato:   </right>
                                    <right><img src="/img/Operatore/Stato.png" alt="Bootstrap" width="20" height="20"></right>
                                </a>
                            </div>
                        </div>
                        <div class="card-body" style="background-image: url('/img/varie/img_card.png'); padding: 30%;">
                        </div>
                        <div class="card-footer custom-footer">
                
                        <div class="left-buttons">
                                <button class="btn rounded-circle p-2">✔</button>
                                <button class="btn rounded-circle p-2">✘</button>
                            </div>
                
                            <span class="label">Via: Roma, 33, 95024 Acireale, italia</span>
                
                            <div>Chi</div>
                            <div class="destra">Dove</div>
                
                        </div>
                    </div>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            </body>

            </html>
        <?php
    }
?>