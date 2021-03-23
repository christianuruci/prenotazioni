<?php

include_once "config.php";
require 'vendor/autoload.php';

use League\Plates\Engine;

//Viene creato l'oggetto per la gestione dei template
$templates = new Engine('./view', 'tpl');

//Variabili valorizzate tramite POST
$codice_fiscale = $_POST['codice'];
$giorno = $_POST['giorno'];
$codice_prenotazione = bin2hex(openssl_random_pseudo_bytes(6));
$PERSONE_MASSIME_PER_GIORNO = 2;

//CONTROLLO sul numero di persone per giorno
$sql ="SELECT COUNT(*) AS persone FROM prenotazioni WHERE giorno = :giorno_scelto";
$stmt = $pdo-> prepare($sql);
$stmt -> execute(
    [

        'giorno_scelto' => $giorno

    ]
);
$riga = $stmt->fetch();

$numero_persone = $riga['persone'];


if ($numero_persone >= $PERSONE_MASSIME_PER_GIORNO)
{
    echo $templates->render('data_non_disponibile', ['giorno' => $giorno]);
}
else
{
    //Query di inserimento preparata
    $sql = "INSERT INTO prenotazioni VALUES(null, :codice_fiscale, :giorno, 
                                :codice_prenotazione)";

    //Inviamo la query al database che la tiene in pancia
    $stmt = $pdo->prepare($sql);

    //Inviamo i dati concreti che verranno messi al posto dei segnaposto
    $stmt->execute(
        [
            'codice_fiscale' => $codice_fiscale,
            'giorno' => $giorno,
            'codice_prenotazione' => $codice_prenotazione
        ]
    );

    echo $templates->render('mostra_codice', ['codice_prenotazione' => $codice_prenotazione]);
}



