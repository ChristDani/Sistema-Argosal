<?php
require_once "../../model/usuarios.php";

$dni = $_GET['dni'];

$model = new user();
$model->activarEstado($dni);

header("location: ../../index.php?pagina=Dashboard");

?>