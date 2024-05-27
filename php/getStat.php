<?php
    session_start();
    if(isset($_POST['value']) && $_POST['value'] === '100'){
        require_once "connToDB.php";
        $qry = "SELECT * FROM `view_num_stat`"; 
        $qry = "select 'utenti_attivi' AS `Category`,count(0) AS `Count` from `my_dumpfinder`.`Utenti` union all select 'Segnalazioni' AS `Category`,count(0) AS `Count` from `my_dumpfinder`.`Segnalazioni` union all select 'Operatori' AS `Category`,count(0) AS `Count` from `my_dumpfinder`.`Amministratori` union all select 'Citta' AS `Category`,count(0) AS `Count` from `my_dumpfinder`.`Citta` union all select 'bonifiche' AS `Category`,count(0) AS `Count` from `my_dumpfinder`.`Segnalazioni` where `my_dumpfinder`.`Segnalazioni`.`stato_segnalazione` = 4;";
        $data = array();
        
        $result = $conn->query($qry);
        
        while($row = $result -> fetch_assoc()){
            $data[] = $row;
        } 
        
        echo json_encode($data);
        $conn -> close();    
    } else die('Impossibile accedere a questa pagine');

