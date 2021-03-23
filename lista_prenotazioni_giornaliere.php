<?php
/*require 'vendor/autoload.php';
include_once 'config.php';

use League\Plates\Engine;

//Viene creato l'oggetto per la gestione dei template
$templates = new Engine('./view', 'tpl');

$sql = "SELECT codice_fiscale, codice_prenotazione FROM prenotazioni WHERE giorno = CURRENT_DATE ORDER BY codice_fiscale";

$stmt = $pdo->query($sql);

$result = $stmt->fetchAll();

//Prendo un template che mi visualizza la tabella
echo $templates->render('lista_prenotazioni_giornaliere', ['result' => $result]);*/
require 'vendor/autoload.php';
include_once 'config.php';

use League\Plates\Engine;

//Viene creato l'oggetto per la gestione dei template
$templates = new Engine('./view','tpl');

//Query per recuperare tutte le prenotazioni
$sql = "SELECT * FROM prenotazioni WHERE giorno = CURDATE() ORDER BY codice_prenotazione";

//Invio la query al server MySQL
$stmt = $pdo->query($sql);

//Estraggo le righe di risposta che finiranno come vettori in $result
$result = $stmt->fetchAll();



//Rendo un template che mi visualizza la tabella
echo $templates->render('lista_prenotazioni_giornaliere',
    [
        'result' => $result,
        'date' => date('d-m-Y')
    ]);