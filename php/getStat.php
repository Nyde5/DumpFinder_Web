<?php
    session_start();
    if(isset($_POST['value']) && $_POST['value'] === '100'){
        require_once "connToDB.php";
        $qry = "SELECT * FROM `view_num_stat`"; 
        $data = array();
        
        $result = $conn->query($qry);
        
        while($row = $result -> fetch_assoc()){
            $data[] = $row;
        } 
        
        echo json_encode($data);
        $conn -> close();    
    } else die('Impossibile accedere a questa pagine');

