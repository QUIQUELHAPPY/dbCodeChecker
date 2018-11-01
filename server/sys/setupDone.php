<?php

function setupDone(){
    global $prefs;
    if($prefs["setup"]["done"]){ // comprueba si se ha completado la configuración
        return true;
    } else {
        return false;
    }
}