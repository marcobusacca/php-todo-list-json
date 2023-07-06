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

    // CONTROLLO SE è STATO ELIMINATO QUALCHE ELEMENTO
    if(isset($_POST['deletedItem'])){

        // RECUPERO DELETED_ITEM
        $deletedItem = $_POST['deletedItem'];

        // ELIMINO DALL'ARRAY L'ELEMENTO SELEZIONATO DALL'UTENTE
        array_splice($dataDecoded, $deletedItem, 1);

        // AGGIORNO IL FILE "TODOLIST.JSON"
        file_put_contents('data/todolist.json', json_encode($dataDecoded));
    }

    // CONTROLLO SE è STATO CLICCATO QUALCHE ELEMENTO
    if(isset($_POST['clickedItem'])){

        // RECUPERO CLICKED_ITEM_INDEX
        $clickedItem = $_POST['clickedItem'];

        // SETTO LA VARIABILE DONE DELL'ITEM CLICCATO SU TRUE o FALSE
        $dataDecoded[$clickedItem]['done'] = !$dataDecoded[$clickedItem]['done'];

        // AGGIORNO IL FILE "TODOLIST.JSON"
        file_put_contents('data/todolist.json', json_encode($dataDecoded));
    }

// FINE OPERAZIONI DI MODIFICA ARRAY ASSOCIATIVO PHP

    // SPECIFICO CHE LE INFORMAZIONI RESTITUITE SONO DI TIPO JSON
    header('Content-Type: application/json');

    // TRASFORMO L'ARRAY ASSOCIATIVO PHP IN OGGETTO JSON
    echo json_encode($dataDecoded);
?>