<?php
require_once "model/usuarios.php";

$modal = new user();
$listaUsuarios = $modal->listar();
setlocale(LC_TIME, "de_DE");
$hoy = strftime("%A y");  

if ($listaUsuarios != null) 
{
    foreach ($listaUsuarios as $u) 
    {             
            $configFechaUser = $u[5] -> format("F j, Y, g:i a"); 
            echo "$configFechaUser<br>";
            echo $hoy;
    }
} 
?>