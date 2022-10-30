<?php 

$vacio = ' ';

require_once '../../model/whatsapp.php';

$dni = $_GET['dni'];

$model = new Whatsapp();

$asesor = $_POST['asesor'];
$nombreC = $_POST['nombre'];
$dniC = $_POST['dni'];
$telefono = $_POST['telefono'];
$producto = $_POST['producto'];
$lineaProce = $_POST['lineaProce'];
$operadorCeden = $_POST['operadorCeden'];
$modalidad = $_POST['modalidad'];
$tipo = $_POST['tipo'];
$plan = $_POST['plan'];
$equipos = $_POST['equipos'];
$formaPago = $_POST['formaPago'];
$telefonoRef = isset($_POST['telefonoRef']) ? $_POST['telefonoRef'] : '---';
$sec = isset($_POST['sec']) ? $_POST['sec'] : "Sin Sec";
$estado = $_POST['estado'];
$tipoFija = $_POST['tipoFija'];
$planFija = $_POST['planFija'];


$model->agregarWhatsapp($asesor,$nombreC,$dniC,$telefono,$producto,$lineaProce,$operadorCeden,$modalidad,$tipo,$plan,$equipos,$formaPago,$telefonoRef,$sec,$tipoFija,$planFija,$estado);

header("location: ../../index.php?pagina=clientes&dni=$dni");

?>
