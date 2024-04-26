<?php
    session_start();

    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST["mail"]) && isset($_POST["psw"])){
        $mail = $_POST["mail"];
        $psw = md5($_POST["psw"]);

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


                <div class="d-flex flex-column justify-content-center align-items-center w-100 mt-5 pt-5 gap-5" id="segnalazioniUtenti">

                    <?php
                        global $conn;
                        $sql = "SELECT utenti.nome_utente AS 'nome', utenti.cognome_utente AS 'cognome', data_segnalazione AS 'data', citta.nome_citta, tipi_di_stato.tipo_stato AS 'stato', via, longitudine, latitudine, link_immagine AS 'linkImg', num_conferme AS 'conferme' FROM `segnalazioni`INNER JOIN citta ON segnalazioni.fk_citta = citta.id_citta INNER JOIN utenti ON segnalazioni.fk_utente = utenti.id_utente INNER JOIN tipi_di_stato ON segnalazioni.stato_segnalazione = tipi_di_stato.id_tipi_stato;";
                        $result = $conn -> query($sql);

                        while($row = $result -> fetch_assoc()){    
                            
                            echo "
                            <div class='card bg-transparent border-0'>

                                <!-- Header card -->
                                <div class='card-header rounded-top'>
                                    <div class='d-flex justify-content-between p-3'>
                                        <a class='navbar-brand'>
                                            <img src='img/varie/user.png' alt='Bootstrap' width='30' height='30'>
                                            ". $row["nome"] . " " . $row["cognome"] ."
                                        </a>
                                        <div class='d-flex justify-content-center flex-row gap-2'>
                                            <div class='d-flex align-items-center'>Stato: ". $row["stato"] ."</div>
                                            <div class='d-flex align-items-center'><div class='bollino ". str_replace(' ', '', $row['stato']) ."'></div></div>
                                        </div>
                                    </div>
                                </div>

                                
                                <!-- immagine segnalazione -->
                                <div class='card-body' style=\"background-image: url('" . str_replace(' ', '', $row['linkImg']) . "'); padding: 30%;\"></div>
                            
                                <!-- Footer card -->
                                <div class='d-flex justify-content-between custom-footer p-2'>
                        
                                    <div class='left-buttons'>
                                        <button class='btn rounded-circle p-2'>✔</button>
                                        <button class='btn rounded-circle p-2'>✘</button>
                                    </div>
                        
                                    <div class='d-flex align-items-center justify-content-center text-center'>". $row["via"] . "<br>" . $row["nome_citta"] ."</div>
                        
                                    <div class='d-flex flex-row align-items-center gap-2 pe-2'>
                                        <div>". $row["conferme"] ."</div>
                                        <a href='https://www.google.com/maps?q=". $row["latitudine"] .",". $row["longitudine"] ."' class='destra rounded-circle p-1' style = 'background-color: #fefae0' target='_blank'>
                                            <svg width='32px' height='32px' viewBox='0 0 24.00 24.00' fill='none' xmlns='http://www.w3.org/2000/svg' stroke='#e4be82'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <path d='M12 21C15.5 17.4 19 14.1764 19 10.2C19 6.22355 15.866 3 12 3C8.13401 3 5 6.22355 5 10.2C5 14.1764 8.5 17.4 12 21Z' stroke='#e4be82' stroke-width='1.2' stroke-linecap='round' stroke-linejoin='round'></path> <path d='M12 12C13.1046 12 14 11.1046 14 10C14 8.89543 13.1046 8 12 8C10.8954 8 10 8.89543 10 10C10 11.1046 10.8954 12 12 12Z' stroke='#e4be82' stroke-width='1.2' stroke-linecap='round' stroke-linejoin='round'></path> </g></svg>
                                        </a>
                                    </div>
                        
                                </div>
                            </div>";
                        }
                    ?>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            </body>

            </html>
        <?php
    }
?>