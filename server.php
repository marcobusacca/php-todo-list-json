<?php
    // RECUPERO IL CONTENUTO DEL FILE "TODOLIST.JSON"
    $data = file_get_contents('data/todolist.json');

    // TRASFORMO L'OGGETTO JSON IN UN ARRAY ASSOCIATIVO PHP
    $dataDecoded = json_decode($data, true);

/******************************************************************************************************
    OPERAZIONI DI MODIFICA ARRAY ASSOCIATIVO PHP
******************************************************************************************************/

    // SPECIFICO CHE LE INFORMAZIONI RESTITUITE SONO DI TIPO JSON
    header('Content-Type: application/json');

    // TRASFORMO L'ARRAY ASSOCIATIVO PHP IN OGGETTO JSON
    echo json_encode($dataDecoded);
?>