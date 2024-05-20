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
            } else echo "Nessun risultato trovato.";
          } else {
            echo "Errore nella query: " . $conn->error;
          }  
          ?>
              <?php

                $qry = "SELECT content_text FROM `web_text` WHERE  name_text = 'risultati'";
                $result = $conn->query($qry);
                
                while($row = $result -> fetch_assoc()){
                  $row = $row["content_text"];
                  echo "$row";
                }

              ?>
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
              <?php 
                echo "$text[1]";
              ?>
