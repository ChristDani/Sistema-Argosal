<?php
include "../../model/masiva.php";
$numero=$_POST['numero'];

$consultas=new Masiva();
$respuesta = $consultas->listarMasiva($numero,10);

echo json_encode($respuesta);

?>