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
        $conn = new mysqli("localhost", "root", "", "my_dumpfinder");
      ?>

    </head>
    <body class="d-flex justify-content-center flex-column g-5">
      <!-- LOGIN DIV -->
      <div class="container-fluid d-flex justify-content-end flex-row w-100 px-5 py-3">
        <div class="">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16">
            <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"/>
            <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117M11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5M4 1.934V15h6V1.077z"/>
          </svg>
        </div>
          <a href="login.html" id="login">Login</a>
      </div>

      <!-- NAVBAR -->
      <div id="navbar" class="container-fluid nav w-100 d-flex justify-content-between align-items-center">
        <div id="logo"> </div>
        <div class="nav-item"><a href="#us"><h3>Chi Siamo</h3></a></div>
        <div class="nav-item"><a href="#idea"><h3>Idea</h3></a></div>
        <div class="nav-item"><a href="#stat"><h3>Statistiche</h3></a></div>
        <div class="nav-item"><a href="#ris"><h3>Risultati</h3></a></div>
        <div class="nav-item"><a href="#contact"><h3>Contatti</h3></a></div>
      </div>

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
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque dolorum minus, in nihil aut, ad provident quod rem incidunt doloremque modi molestias, accusantium necessitatibus! Perspiciatis et inventore eligendi enim earum.
              Nisi optio natus inventore, non nesciunt corrupti deserunt nemo sit aut? Eaque voluptatum tempora, maiores natus minus aliquid modi nostrum dignissimos nesciunt, animi, ipsa voluptatem aspernatur consequatur. Facere, earum ad?
              Soluta officia itaque officiis vel. Esse, nemo, quam hic a numquam facilis fuga quibusdam aperiam tempora quod accusantium explicabo omnis nam ipsum. Dolorem, exercitationem consectetur. Voluptates eaque delectus necessitatibus hic?
            </p>
          </div>


            <div class="position-relative w-50" style="top: 10vh; right: 0vw;">
            <img class="rounded-5" src="img/varie/bg-title.jpg" alt="" width="600vw">
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
            
            while($row = $result -> fetch_assoc()){
              $row = $row['Category'];
              $nameStat = str_replace('_', ' ', $row);
              $nameStat = ucwords($nameStat);
              echo "
              <div class='item'>
                <img src='img/varie/netturbino.jpg' alt='netturbino' class='img'>
                <div class='text d-flex justify-content-center flex-column w-100 pt-3'>
                    <h2>$nameStat</h2>
                    <h1 class='text-center' id='$row'></h1>
                </div>
              </div>
              ";
            } 
          ?>
          <button id="next">></button>
          <button id="prev"><</button>
        </div>
      </div>


      <!-- RISULTATI DIV -->
      <div id="ris" class="container-md d-flex flex-row my-5 py-5">
        <div class="position-relative w-50" style="top: -10vh; right: -4vw;">
          <img class="rounded-5" src="img/varie/bg-title.jpg" alt="" width="600vw">
        </div> 
        
        <div class="rounded-5 p-5 w-50 position-relative" style="background-color: #8da24cff; left: 0vw;">
          <div class="d-flex justify-content-end">
            <h1>RISULTATI</h1>
          </div>
          <!-- CONTENUTO RISULTATI -->
          <div class="d-flex justify-content-center align-items-center flex-row flex-wrap">
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque dolorum minus, in nihil aut, ad provident quod rem incidunt doloremque modi molestias, accusantium necessitatibus! Perspiciatis et inventore eligendi enim earum.
              Nisi optio natus inventore, non nesciunt corrupti deserunt nemo sit aut? Eaque voluptatum tempora, maiores natus minus aliquid modi nostrum dignissimos nesciunt, animi, ipsa voluptatem aspernatur consequatur. Facere, earum ad?
              Soluta officia itaque officiis vel. Esse, nemo, quam hic a numquam facilis fuga quibusdam aperiam tempora quod accusantium explicabo omnis nam ipsum. Dolorem, exercitationem consectetur. Voluptates eaque delectus necessitatibus hic?
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
            <p class="primary-color">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur autem consequatur nesciunt veritatis facere itaque doloribus perspiciatis vitae? Ad veritatis atque iste voluptates dolor fuga tenetur, quaerat provident doloribus modi.
              Magni est sint perspiciatis totam consequatur harum qui eaque animi unde velit, alias, vero optio. Facilis error vitae nam tempora incidunt deleniti, placeat sunt, quia esse voluptates, minus quis quaerat.
              Enim neque accusantium doloremque consectetur a expedita aliquid magnam sed, officiis placeat similique ipsam modi quia impedit et amet quibusdam dolorem ratione saepe, dolorum dicta quasi aperiam! Consectetur, mollitia facilis?
            </p>
          </div>
          <div class="col-6">
            <p class="primary-color">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur autem consequatur nesciunt veritatis facere itaque doloribus perspiciatis vitae? Ad veritatis atque iste voluptates dolor fuga tenetur, quaerat provident doloribus modi.
              Magni est sint perspiciatis totam consequatur harum qui eaque animi unde velit, alias, vero optio. Facilis error vitae nam tempora incidunt deleniti, placeat sunt, quia esse voluptates, minus quis quaerat.
              Enim neque accusantium doloremque consectetur a expedita aliquid magnam sed, officiis placeat similique ipsam modi quia impedit et amet quibusdam dolorem ratione saepe, dolorum dicta quasi aperiam! Consectetur, mollitia facilis?
            </p>
          </div>
        </div>
      </div>


      <!-- LA NOSTRA SQUADRA -->
      <div class="container mb-5 p-5">
          <h1 class="text-center">LA NOSTRA SQUADRA</h1>
          <!-- CONTENUTO -->
          <div class="d-flex justify-content-between flex-row pt-5">
            <div>
              <!-- TITOLO CARD -->
              <h3 class="text-center team">Database</h3>
              <!-- DIV IMG CARD -->
              <div class="position-relative" style="bottom: 1.25vw;">
                <img class="img-team" src="img/varie/netturbino.jpg" alt="" width="300vw" height="300vh">
              </div>
            </div>
            <div>
              <!-- TITOLO CARD -->
              <h3 class="text-center team">WEB</h3>
              <!-- DIV IMG CARD -->
              <div class="position-relative" style="bottom: 1.25vw;">
                <img class="img-team" src="img/varie/netturbino.jpg" alt="" width="300vw" height="300vh">
              </div>
            </div>
            <div>
              <!-- TITOLO CARD -->
              <h3 class="text-center team">Mobile</h3>
              <!-- DIV IMG CARD -->
              <div class="position-relative" style="bottom: 1.25vw;">
                <img class="img-team" src="img/varie/netturbino.jpg" alt="" width="300vw" height="300vh">
              </div>
            </div>
          </div>
      </div>
      <div class="container mb-5 p-5 bg-light border-primary  d-flex justify-content-center rounded align-items-center w-25 h-25 ">

        <!-- <div class="position-relative bg-white img-qr-code" style="bottom: 1.25vw;"></div> -->
        <img class="img-qr-code" src="img/varie/qrcode.png" alt="">

      </div>


      <div id="contact">

      </div>

      <footer class="footer" >
        <div class="waves">
          <div class="wave" id="wave1"></div>
          <div class="wave" id="wave2"></div>
          <div class="wave" id="wave3"></div>
          <div class="wave" id="wave4"></div>
        </div>
      
        <h1 style="color: #fefae0ff;">CONTATTACI</h1>
        <ul class="menu">
          <li class="menu__item"><a class="menu__link" href="#"><img class="social_logo" src="img/logo/instagram_logo.svg" alt="instagram_logo"></a></li>
          <li class="menu__item"><a class="menu__link" href="#"><img class="social_logo" src="img/logo/facebook_logo.svg" alt="facebook_logo"></a></li>
        </ul>
        <p style="opacity: 0.75;">info@dumpfinder.it</p>
      
      </footer>
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-countdown/2.2.14/jquery.countdown.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      <script src="js/carousel_logic.js"></script>
      <script src="js/navbar.js"></script>
      <script src="js/stat.js"></script>
    </body>
  </html>