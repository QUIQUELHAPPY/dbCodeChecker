<?php
error_reporting(E_ERROR | E_PARSE);
function checkDatabase($servername, $username, $password, $database){
    $conn=mysqli_connect($servername, $username, $password, $database);
    if (mysqli_connect_errno($conn)){
        return mysqli_connect_error();
    } else {
        return "ok";
    }
    mysqli_close($conn);
}