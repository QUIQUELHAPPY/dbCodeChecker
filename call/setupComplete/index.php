<?php

include_once("../../server/autoload.php"); // carga todas las funciones del sistema

if(setupDone()){
    echo json_encode(array("done"=>true));
} else {
    echo json_encode(array("done"=>false));
}