<?php

require 'vendor/autoload.php';
include_once "config.php";

use League\Plates\Engine;

//Viene creato l'oggetto per la gestione dei template
$templates = new Engine('./view','tpl');

//Variabili valorizzate tramite POST
$codice_prenotazione = $_POST['codice'];
$note = $_POST['note'];

//Controllo sul numero di persone per giorno
$sql = 'UPDATE prenotazioni SET eseguito = true, note = :note WHERE codice_prenotazione = :codice_prenotazione';

//Inviamo la query al database che la tiene in pancia
$stmt = $pdo->prepare($sql);

$stmt->execute(
    [
        'codice_prenotazione' => $codice_prenotazione,
        'note' => $note
    ]
);

echo $templates->render('esegui',
    [
        'codice_prenotazione' => codice_prenotazione,
        'note' => $note
    ]);



