<?php 

require_once '../../model/whatsapp.php';

$model = new Whatsapp();

$asesor = $_POST['asesor'];
$nombreC = $_POST['nombre'];
$dniC = $_POST['dni'];
$telefono = !empty($_POST['telefono']) ? $_POST['telefono'] : "---";
$producto = $_POST['producto'];
$lineaProce = $_POST['lineaProce'];
$operadorCeden = $_POST['operadorCeden'];
$modalidad = $_POST['modalidad'];
$tipo = $_POST['tipo'];
$plan = $_POST['plan'];
$equipos = $_POST['equipos'];
$formaPago = $_POST['formaPago'];
$telefonoRef = $_POST['telefonoRef'];
$sec = !empty($_POST['sec']) ? $_POST['sec'] : "---";
$estado = $_POST['estado'];
$observacion = $_POST['observaciones'];
$promocion = $_POST['promocion'];
$ubicacion = $_POST['ubicacion'];
$distrito = $_POST['distrito'];
$tipoFija = $_POST['tipoFija'];
$planFija = $_POST['planFija'];


$model->agregarWhatsapp($asesor,$nombreC,$dniC,$telefono,$producto,$lineaProce,$operadorCeden,$modalidad,$tipo,$plan,$equipos,$formaPago,$telefonoRef,$sec,$tipoFija,$planFija,$estado,$observacion,$promocion,$ubicacion,$distrito);

header("location: ../../index.php?pagina=Clientes");

?>
