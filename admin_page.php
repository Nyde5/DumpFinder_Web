<?php
    session_start();
    require_once "php/connToDB.php";

    if(($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST["mail"]) && isset($_POST["psw"])) || (isset($_SESSION['log']) && $_SESSION["log"] == 1 )){
        $mail = $_POST["mail"];
        $psw = md5($_POST["psw"]);
        
        $qry = "SELECT Amministratori.id_amministratore FROM `Amministratori` WHERE Amministratori.email_amministratore = 'a@a.com' AND Amministratori.password_amministratore = '0cc175b9c0f1b6a831c399e269772661';";
        $result = $conn -> query($qry);

        if ($result->num_rows > 0){
            $_SESSION['log'] = 1;
            $row = $result->fetch_assoc();
            $id = $row["id_amministratore"];
            htmlCorrect($id);
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
                            <img src="img/logo/dumpfinder.png" alt="" width="200px">
                        </a>
                    </div>
                </body>
            </html>
        <?php
    }



    function htmlCorrect($id){
        global $conn;
        $sql = "SELECT Amministratori.username_amministratore FROM Amministratori WHERE id_amministratore = '$id'";
        $result = $conn -> query($sql);
        $row = $result->fetch_assoc();
        $username = $row["username_amministratore"];
        
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
                    <div class="row-cols-3 d-flex flex-row w-100">
                        <div class="col-4 d-flex align-items-center justify-content-center">
                            <h1 class="d-flex align-items-center justify-content-center">Ciao <?php echo"$username"; ?> </h1>
                        </div>
                        <div class="col-4 d-flex justify-content-center">
                            <a class="navbar-brand" href="index.php?logout=-1">
                                <img src="img/logo/dumpfinder.png" alt="Bootstrap" width="100" height="100">
                            </a>
                        </div>
                        <div class="col-4 d-flex justify-content-end align-items-center pe-5">
                            <button id="btn-logout" type="button" class="btn btn-outline-secondary w-25">Logout</button>
                        </div>
                    </div>
                </nav>


                <div class="d-flex flex-column justify-content-center align-items-center w-100 mt-5 pt-5 gap-5" id="segnalazioniUtenti">

                    <?php
                        global $conn;
                        $sql = "SELECT DISTINCT Segnalazioni.id_segnalazione AS 'id', Utenti.nome_utente AS 'nome', Utenti.cognome_utente AS 'cognome', Data_Segnalazione AS 'data', Citta.nome_citta, Tipi_Di_Stato.tipo_stato AS 'stato', via, longitudine, latitudine, Segnalazioni.link_immagine AS 'linkImg', num_conferme AS 'conferme', Utenti.link_immagine AS 'userImg' FROM `Segnalazioni`INNER JOIN Citta ON Segnalazioni.fk_citta = Citta.id_citta INNER JOIN Utenti ON Segnalazioni.fk_utente = Utenti.id_utente INNER JOIN Tipi_Di_Stato ON Segnalazioni.stato_segnalazione = Tipi_Di_Stato.id_tipi_stato ORDER BY conferme DESC;";
                        $result = $conn -> query($sql);

                        $cont = 0;
                        while($row = $result -> fetch_assoc()){    

                            $imgUser = trim($row["userImg"]);
                            if (strlen($imgUser) > 2){
                                $imgUser = $row["userImg"];
                            } 
                            else{
                                $imgUser = "img/varie/user.png";
                            } 

                            echo "
                            <div class='card bg-transparent border-0'>

                                <!-- Header card -->
                                <div class='card-header rounded-top border-bottom-primary'>
                                    <div class='d-flex justify-content-between p-3'>
                                        <a class='navbar-brand'>
                                            <img class='rounded-circle' src='$imgUser' alt='Bootstrap' width='30' height='30'>
                                            ". $row["nome"] . " " . $row["cognome"] ."
                                        </a>
                                        <div class='d-flex justify-content-center flex-row gap-2'>
                                            <div class='d-flex align-items-center' id='statusText". $cont ."'>Stato: ". $row["stato"] ."</div>
                                            <div class='d-flex align-items-center'><div id='statusDiv". $cont ."' class='bollino ". str_replace(' ', '', $row['stato']) ."'></div></div>
                                        </div>
                                    </div>
                                </div>

                                
                                <!-- immagine segnalazione -->
                                <div class='card-body image-container p-3' onclick='openFullscreen(this)' data-src=". $row['linkImg'].">
                                    <img src='". $row['linkImg'] ."' alt='Immagine'>
                                </div>
                                <!--<div onclick='openFullscreen(this)' class='card-body image-container' data-src=". $row['linkImg'] ." style=\"background-image: url('" . str_replace(' ', '', $row['linkImg']) . "'); padding: 30%;\"></div> -->
                            
                                <!-- Footer card -->
                                <div class='d-flex justify-content-between custom-footer p-2 border-top-primary'>
                        
                                <div class='left-buttons'>
                                    <button class='btn rounded-circle p-2' title='Approva'    onclick='changeStatus(".$row['id'].", 2, \"statusDiv".$cont."\")'><img src='img/varie/agree.png' width = '16' height = '16'></img></button>
                                    <button class='btn rounded-circle p-2' title='Rifiuta'    onclick='changeStatus(".$row['id'].", 3, \"statusDiv".$cont."\")'><img src='img/varie/desagree.png' width = '16' height = '16'></img></button>
                                    <button class='btn rounded-circle p-2' title='Bonificata' onclick='changeStatus(".$row['id'].", 4, \"statusDiv".$cont."\")'><img src='img/varie/clean.png' width = '16' height = '16'></img></button>
                                   
                                    </div>
                            
                        
                                    <div class='d-flex align-items-center justify-content-center text-center'>". $row["via"] . "<br>" . $row["nome_citta"] ."</div>
                        
                                    <div class='d-flex flex-row align-items-center gap-2 pe-2'>
                                        <div class='rounded-circle p-2 text-center conferme' title='conferme'>". $row["conferme"] ."</div>
                                        <a href='https://www.google.com/maps?q=". $row["latitudine"] .",". $row["longitudine"] ."' class='destra rounded-circle p-1' style = 'background-color: #fefae0' target='_blank'>
                                            <svg width='32px' height='32px' viewBox='0 0 24.00 24.00' fill='none' xmlns='http://www.w3.org/2000/svg' stroke='#e4be82'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <path d='M12 21C15.5 17.4 19 14.1764 19 10.2C19 6.22355 15.866 3 12 3C8.13401 3 5 6.22355 5 10.2C5 14.1764 8.5 17.4 12 21Z' stroke='#e4be82' stroke-width='1.2' stroke-linecap='round' stroke-linejoin='round'></path> <path d='M12 12C13.1046 12 14 11.1046 14 10C14 8.89543 13.1046 8 12 8C10.8954 8 10 8.89543 10 10C10 11.1046 10.8954 12 12 12Z' stroke='#e4be82' stroke-width='1.2' stroke-linecap='round' stroke-linejoin='round'></path> </g></svg>
                                        </a>
                                    </div>
                        
                                </div>
                            </div>";
                            $cont++;
                        }
                    ?>
                </div>

                <div id="motivationDiv" class="denyDivFixed">
                    <div class="row d-flex flex-column card card-header rounded-3 gap-3 px-4 w-25 h-50">
                        <div class="col-3 w-100">
                            <h1 class="text-end position-absolute start-100" style="top: -8%;">X</h1>
                        </div>
                        <div class="col-3 w-100">
                            <h2 class="text-center">Inserire Motivazione:</h2>
                        </div>
                        <div class="col-3 d-flex flex-column justify-content-center w-100 h-50">
                            <textarea class="w-100 input-text" maxlength="250" minlength="10" name="" id="motivation" cols="30" rows="5" spellcheck=true></textarea>
                            <label id="showNumLetter" for="motivation">Max 250 words</label>
                        </div>
                        <div class="col-3 w-100 d-flex justify-content-center pt-3">
                            <input class="w-75 h-100 btn" type="button" value="Invia">
                        </div>
                    </div>
                </div>

                <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-countdown/2.2.14/jquery.countdown.min.js"></script> -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                <script src="js/operator.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
                <?php echo "<script>setIdAdmin($id);</script> "?>
            </body>
            </html>
        <?php
    }
?>