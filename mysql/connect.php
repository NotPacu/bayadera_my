<?php
$host = "127.0.0.1";
$user = "root";
$pass = "";
$bd_name = "bayadera_bd";

$debug_mode = true;
$connection = new mysqli();
$path_redirect = "/trabajofinal";

//Inicia conexión
try{
    $connection = new mysqli($host,$user,$pass,$bd_name);
}catch(Exception $e){
    if ($debug_mode == true){
        echo "Error: No se pudo conectar a MySQL." . "<br>";
        echo "errno de depuración: " . mysqli_connect_errno() .  "<br>";
        echo "error de depuración: " . mysqli_connect_error() .  "<br>";
        //echo $e;
        exit;
    }
    echo "Error al connectarse con el servidor";
    exit;
}



if(!isset($connection)){
    if ($debug_mode == true){
        echo "Error: No se pudo conectar a MySQL." . "<br>";
        echo "errno de depuración: " . mysqli_connect_errno() .  "<br>";
        echo "error de depuración: " . mysqli_connect_error() .  "<br>";
        exit;
    }
    echo "Error al connectarse con el servidor";
    exit;
}

//Informacion de debug
if (!$connection) {
    if ($debug_mode == true){
        echo "Error: No se pudo conectar a MySQL." . "<br>";
        echo "errno de depuración: " . mysqli_connect_errno() .  "<br>";
        echo "error de depuración: " . mysqli_connect_error() .  "<br>";
        exit;
    }
    echo "Error al connectarse con el servidor";
    exit;
}







?>