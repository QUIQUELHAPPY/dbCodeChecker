<?php
$prefscontents = file_get_contents('prefs.json'); // carga de forma plana el contenido de las preferencias
$prefs = json_decode($prefscontents, true); // transforma el contenido plano en json a una array en forma de objeto

$servername = $prefs["db"]["servername"]; // realiza la conexión usando las credenciales localizadas en las preferencias
$username = $prefs["db"]["username"]; // realiza la conexión usando las credenciales localizadas en las preferencias
$password = $prefs["db"]["password"]; // realiza la conexión usando las credenciales localizadas en las preferencias
$dbname = $prefs["db"]["database"]; // realiza la conexión usando las credenciales localizadas en las preferencias


try { // comprueba la conexión y la registra en $conn
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} // en caso de error, muestra el error obtenido

catch(PDOException $e) {
  echo "<br>" . $e->getMessage();
}
?>
