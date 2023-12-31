<?php
    // RECUPERO IL CONTENUTO DEL FILE "TODOLIST.JSON"
    $data = file_get_contents('data/todolist.json');

    // TRASFORMO L'OGGETTO JSON IN UN ARRAY ASSOCIATIVO PHP
    $dataDecoded = json_decode($data, true);

// OPERAZIONI DI MODIFICA ARRAY ASSOCIATIVO PHP

    // CONTROLLO SE ESISTE NEW_ITEM
    if(isset($_POST['newItem'])){

        // RECUPERO NEW_ITEM
        $newItem = $_POST['newItem'];

        // SISTEMO LA VARIABILE DONE DI NEW_ITEM
        $newItem['done'] = false;

        // INSERISCO DENTRO L'ARRAY IL CONTENUTO DI NEW_ITEM
        array_push($dataDecoded, $newItem);

        // AGGIORNO IL FILE "TODOLIST.JSON"
        file_put_contents('data/todolist.json', json_encode($dataDecoded));
    }

// FINE OPERAZIONI DI MODIFICA ARRAY ASSOCIATIVO PHP

    // SPECIFICO CHE LE INFORMAZIONI RESTITUITE SONO DI TIPO JSON
    header('Content-Type: application/json');

    // TRASFORMO L'ARRAY ASSOCIATIVO PHP IN OGGETTO JSON
    echo json_encode($dataDecoded);
?>