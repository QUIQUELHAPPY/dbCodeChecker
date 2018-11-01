<?php

include_once("../../server/autoload.php"); // carga todas las funciones del sistema

$servername=$_REQUEST["servername"];
$username=$_REQUEST["username"];
$password=$_REQUEST["password"];
$database=$_REQUEST["database"];

$adminusername=$_REQUEST["adminusername"];
$adminpassword=$_REQUEST["adminpassword"];

if($adminusername == "" || $adminpassword == ""){
    $adminpassword=null;
    $adminusername=null;
}

function goodCredentials(){
    global $adminpassword,$adminusername
    if($adminusername!= null && $adminpassword!= null){
        return true;
    } else {
        return false;
    }
}

$dbRequest=checkDatabase($servername, $username, $password, $database);
if($dbRequest=="ok"){
    if(goodCredentials()){
        return json_encode(array("done"=>true));
    } else {
        echo json_encode(array("done"=>false,"error"=>"Las credenciales de administración no son suficientes".$adminpassword.",".$adminusername));
    }
} else {
    echo json_encode(array("done"=>false,"error"=>"Error en la conexión con la base de datos: ".$dbRequest));
}