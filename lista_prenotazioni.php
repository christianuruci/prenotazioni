<?php

/*include_once("config.php");

$sql = "SELECT codice_fiscale, giorno, codice_prenotazione FROM prenotazioni";
$stmt = $pdo->query($sql);

$valori = ' ';
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $valori.= "<tr><td>" . $row['codice_fiscale'] . "</td><td>" . $row['giorno'] . "</td><td>" . $row['codice_prenotazione'] . "</td></tr>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista Prenotazioni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
<h1 align="center"> Lista delle prenotazioni</h1>
<table class="table table-success table-striped" align="center">
    <thead>
    <tr align="center">
        <th scope="co_fiscale"><u>Codice Fiscale</u></th>
        <th scope="giorno"><u>Giorno</u></th>
        <th scope="codice_prenotazione"><u>Codice Prenotazione</u></th>
    </tr>
    </thead>
    <tbody>
    <?php
    echo $valori;
    ?>
    </tbody>
</table>
</body>
</html>*/

require 'vendor/autoload.php';
include_once 'config.php';

use League\Plates\Engine;

//Viene creato l'oggetto per la gestione dei template
$templates = new Engine('./view', 'tpl');

$sql = "SELECT * FROM prenotazioni";

$stmt = $pdo->query($sql);

$result = $stmt->fetchAll();

//Prendo un template che mi visualizza la tabella
echo $templates->render('lista_prenotazioni', ['result' => $result]);