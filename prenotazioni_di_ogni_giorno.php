<?php

require 'vendor/autoload.php';
include_once("config.php");

use League\Plates\Engine;

$templates = new Engine('./view', 'tpl');

$sql = "SELECT giorno, COUNT(*) AS numero_prenotazioni FROM prenotazioni GROUP BY giorno ORDER BY numero_prenotazioni DESC";

$stmt = $pdo->query($sql);

$result =$stmt->fetchAll();

echo $templates ->render('prenotazioni_di_ogni_giorno', ['result' => $result]);