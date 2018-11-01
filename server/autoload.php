<?php
$prefscontents = file_get_contents("../../server/prefs.json"); // carga de forma plana el contenido de las preferencias
$prefs = json_decode($prefscontents, true); // transforma el contenido plano en json a una array en forma de objeto

include_once("sys/setupDone.php");
include_once("sys/checkDatabase.php");