<!doctype html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>DumpFinder</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/footer.css">

      <?php
        session_start();
        require_once "php/connToDB.php";

        if(isset($_GET['logout']) && $_GET['logout'] == "-1"){
          $_SESSION['log'] = -1;
        }

        if (!$conn) {
            die("Connessione al database fallita: " . mysqli_connect_error());
        }
      ?>

    </head>
    <body class="d-flex justify-content-center flex-column g-5">
      <!-- LOGIN DIV -->
      <div class="container-fluid d-flex justify-content-end flex-row w-100 px-5 py-3">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16">
            <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"/>
            <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117M11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5M4 1.934V15h6V1.077z"/>
          </svg>
        </div>
          <a href="login.html" id="login">Login</a>
      </div>

      <!-- NAVBAR -->
      <nav class="navbar navbar-expand-md navbar-custom">
        <div class="container">
          <div id="logo"> </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse justify-content-md-center" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <div class="row">
                <li class="nav-item active col-md-6">
                  <a class="nav-link" href="#us">Chi Siamo</a>
                </li>
                <li class="nav-item col-md-6">
                  <a class="nav-link" href="#idea">Idea</a>
                </li>
              </div>
              <div class="row">
                <li class="nav-item col-md-6">
                  <a class="nav-link" href="#stat">Statistiche</a>
                </li>
                <li class="nav-item col-md-6">
                  <a class="nav-link" href="#ris">Risultati</a>
                </li>
              </div>
              <div class="row">
                <li class="nav-item col-md-6">
                  <a class="nav-link" href="#contact">Contatti</a>
                </li>
              </div>
            </ul>
          </div>
        </div>
      </nav>

      <!-- TITLE E FOTO -->
      <div id="bg-titolo" class="container-md bg-body-secondary text-center mt-5 py-5 mb-5">
          <h1>Dump Finder</h1>
          <h4>Segnala Non Essere Segnalato</h4>
      </div>

      <!-- VETRINA -->
      <div class="container-fluid mt-5 p-5">
        <!-- IDEA DIV -->
        <div id="idea" class="container-md d-flex flex-row">
          <div class="rounded-5 p-5 w-50 position-relative" style="background-color: #8da24cff; left: 2vw;">
            <h1>IDEA</h1>
            <p class="me-4">
              <?php

                $qry = "SELECT content_text FROM `web_text` WHERE  name_text = 'idea'";
                $result = $conn->query($qry);

                if ($result) {
                    // Controlla se ci sono risultati
                    if ($result->num_rows > 0) {
                        // Ottieni i risultati della query
                        while ($row = $result->fetch_assoc()) {
                            $content_text = $row["content_text"];
                            echo $content_text;
                        }
                    } else {
                        echo "Nessun risultato trovato.";
                    }
                } else {
                    echo "Errore nella query: " . $conn->error;
                }

              ?>
            </p>
          </div>


            <div class="position-relative w-50" style="top: 10vh; right: 0vw;">
              <img class="rounded-5" src="http://dumpfinder.altervista.org/indexImg/idea.png" alt="" width="650vw" height="550vh">
            </div>
        </div>
      </div>

      <!-- STATISTICHE DIV -->
      <div id="stat" class="d-flex justify-content-center flex-column text-center w-100 my-5 py-5">
        <h1>STATISTICHE</h1>
          <div class="slider w-100 p-5">

          <?php
            $qry = "SELECT view_num_stat.Category FROM `view_num_stat`";
            $result = $conn->query($qry);
            
          if ($result) {
            // Controlla se ci sono risultati
            if ($result->num_rows > 0) {
              // Ottieni i risultati della query
              while($row = $result -> fetch_assoc()){
                $row = $row['Category'];
                $nameStat = str_replace('_', ' ', $row);
                $nameStat = ucwords($nameStat);

                if (strcmp($nameStat, "Citta") == 0) {
                  echo "
                  <div class='item d-flex flex-column pb-5 justify-content-center'>
                      <div class='img w-100 position-relative start-0' style='background-image: url(\"http://dumpfinder.altervista.org/img/varie/icon_citta.png\"); height: 200px; background-size: cover;'></div>
                      <div class='text d-flex justify-content-center flex-column w-100 pt-3 bg-gradient text-center'>
                          <h2>Città</h2>
                          <h1 class='text-center' id='citta'></h1>
                      </div>
                  </div>
                  ";
                } else {
                  $sanitizedRow = htmlspecialchars($row, ENT_QUOTES, 'UTF-8');
                  $sanitizedNameStat = htmlspecialchars($nameStat, ENT_QUOTES, 'UTF-8');
                  echo "
                  <div class='item d-flex flex-column pb-5 justify-content-center'>
                      <div class='img w-100 position-relative start-0' style='background-image: url(\"http://dumpfinder.altervista.org/img/varie/icona_$sanitizedRow.png\"); height: 200px; background-size: cover;'></div>
                      <div class='text d-flex justify-content-center flex-column w-100 pt-3 bg-gradient text-center'>
                          <h2>{$sanitizedNameStat}</h2>
                          <h1 class='text-center' id='{$sanitizedRow}'></h1>
                      </div>
                  </div>
                  ";

                }
              
              } 
            } else echo "Nessun risultato trovato.";
          } else {
            echo "Errore nella query: " . $conn->error;
          }  
          ?>
          <button id="next">></button>
          <button id="prev"><</button>
        </div>
      </div>


      <!-- RISULTATI DIV -->
      <div id="ris" class="container-md d-flex flex-row my-5 py-5">
        <div class="position-relative w-50" style="top: -10vh; right: -4vw;">
          <img class="rounded-5" src="http://dumpfinder.altervista.org/indexImg/risultati.jpg" alt="" width="650vw" height="550vh">
        </div> 
        
        <div class="rounded-5 p-5 w-50 position-relative" style="background-color: #8da24cff; left: 0vw;">
          <div class="d-flex justify-content-end">
            <h1>RISULTATI</h1>
          </div>
          <!-- CONTENUTO RISULTATI -->
          <div class="d-flex justify-content-center align-items-center flex-row flex-wrap">
            <p>
              <?php

                $qry = "SELECT content_text FROM `web_text` WHERE  name_text = 'risultati'";
                $result = $conn->query($qry);
                
                while($row = $result -> fetch_assoc()){
                  $row = $row["content_text"];
                  echo "$row";
                }

              ?>
            </p>
            <img src="img/" alt="">
          </div>
        </div>
      </div>

      <!-- CHI SIAMO -->
      <div id="us" class="container mb-5 py-5">
        <h1 class="text-center">CHI SIAMO</h1>
        <!-- CONTENUTO -->
        <div class="row d-flex g-5">
          <div class="col-6">
            <?php

              $qry = "SELECT content_text FROM `web_text` WHERE  name_text = 'chi_siamo'";
              $result = $conn->query($qry);

              $text = array("", "");
              while($row = $result -> fetch_assoc()){
                $test = explode("|", $row['content_text']);
        
                // Assegna i valori dell'array $test all'array $text
                $text[0] = $test[0];
                $text[1] = $test[1];
            } 

            ?>
            <p class="primary-color">
              <?php 
                echo "$text[0]";
              ?>
            </p>
          </div>
          <div class="col-6">
            <p class="primary-color">
              <?php 
                echo "$text[1]";
              ?>
            </p>
          </div>
        </div>
      </div>


      <!-- LA NOSTRA SQUADRA -->
      <div class="container mb-5 p-5">
        <h1 class="text-center">LA NOSTRA SQUADRA</h1>
        <!-- CONTENUTO -->
        <div id="squadra" class="d-flex justify-content-between flex-row pt-5">

          <div class="div-sq">
            <!-- TITOLO CARD -->
            <h3 class="text-center team">Database</h3>
            <!-- DIV IMG CARD -->
            <div class="position-relative" style="bottom: 1.25vw;">
              <img class="img-team" src="http://dumpfinder.altervista.org/indexImg/dbGroup.jpg" alt="" width="300vw"
                height="300vh">
            </div>
          </div>

          <div class="div-sq">
            <!-- TITOLO CARD -->
            <h3 class="text-center team">WEB</h3>
            <!-- DIV IMG CARD -->
            <div class="position-relative" style="bottom: 1.25vw;">
              <img class="img-team" src="http://dumpfinder.altervista.org/indexImg/webGroup.jpg" alt="" width="300vw"
                height="300vh">
            </div>
          </div>

          <div class="div-sq">
            <!-- TITOLO CARD -->
            <h3 class="text-center team">Mobile</h3>
            <!-- DIV IMG CARD -->
            <div class="position-relative" style="bottom: 1.25vw;">
              <img class="img-team" src="http://dumpfinder.altervista.org/indexImg/mobileGroup.jpg" alt="" width="300vw"
                height="300vh">
            </div>
          </div>

        </div>
      </div>

      <div class="container p-5 bg-light border-primary d-flex justify-content-center rounded align-items-center w-25 h-25 mb-5">
        <!-- <div class="position-relative bg-white img-qr-code" style="bottom: 1.25vw;"></div> -->
        <img class="img-qr-code" src="img/varie/qrcode.png" alt="">
      </div>

      <div id="contact" class="mt-5"></div>

      <footer class="footer mt-5 d-flex" >
        <div class="waves">
          <div class="wave" id="wave1"></div>
          <div class="wave" id="wave2"></div>
          <div class="wave" id="wave3"></div>
          <div class="wave" id="wave4"></div>
        </div>
      
        <h1 style="color: #fefae0ff;">CONTATTACI</h1>
        <div class="menu row p-2 z-3">
          <div class="col menu__item"><a class="menu__link" href="#"><img class="social_logo" src="img/logo/instagram_logo.svg" alt="instagram_logo"></a></div>
          <div class="col menu__item"><a class="menu__link" href="#"><img class="social_logo" src="img/logo/facebook_logo.svg" alt="facebook_logo"></a></div>
        </div>
        <h6 class="w-100 text-center" style="opacity: 0.75;">info@dumpfinder.it</h6>
      
      </footer>
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-countdown/2.2.14/jquery.countdown.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      <script src="js/carousel_logic.js"></script>
      <script src="js/navbar.js"></script>
      <script src="js/stat.js"></script>
    </body>
  </html>