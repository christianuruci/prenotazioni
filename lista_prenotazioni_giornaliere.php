<?php
require 'vendor/autoload.php';
include_once 'config.php';

use League\Plates\Engine;

//Viene creato l'oggetto per la gestione dei template
$templates = new Engine('./view', 'tpl');

$sql = "SELECT * FROM prenotazioni WHERE giorno = CURRENT_DATE";

$stmt = $pdo->query($sql);

$result = $stmt->fetchAll();

//Prendo un template che mi visualizza la tabella
echo $templates->render('lista_prenotazioni_giornaliere', ['result' => $result]);