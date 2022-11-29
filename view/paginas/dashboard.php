<?php 
require_once "model/conexion.php";

$cone = new conexion();
$consulta = $cone->conectar();

// ventas totales
$sql = "select * from whatsapp";
$resultado = sqlsrv_query($consulta,$sql, array(), array("Scrollable"=>"buffered"));
$ventasTotales = sqlsrv_num_rows($resultado);
// ventas concretadas
$sql1 = "select * from whatsapp where estado='1'";
$resultado1 = sqlsrv_query($consulta,$sql1, array(), array("Scrollable"=>"buffered"));
$ventasConcretadas = sqlsrv_num_rows($resultado1);
// ventas pendientes
$sql2 = "select * from whatsapp where estado='2'";
$resultado2 = sqlsrv_query($consulta,$sql2, array(), array("Scrollable"=>"buffered"));
$ventasPendientes = sqlsrv_num_rows($resultado2);
// ventas rechazadas
$sql3 = "select * from whatsapp where estado='0'";
$resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
$ventasRechazadas = sqlsrv_num_rows($resultado3);
?>
<?php include_once "componentes/header.php"; ?>
<?php include_once "componentes/contenidoDashboard.php"; ?>
<?php include_once "componentes/footer.php"; ?>