<?php

require 'vendor/autoload.php';
include_once 'config.php';

use League\Plates\Engine;
//Distrugge il file con le info di sessione
session_destroy();
//Distrugge eventuali info in memoria RAM
$_SESSION = array();

//Viene creato l'oggetto per la gestione dei template
$templates = new Engine('./view','tpl');

echo $templates->render('logout');



