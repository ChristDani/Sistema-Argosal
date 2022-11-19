<?php 
require_once "model/conexion.php";
require_once "model/usuarios.php";

$model = new user();
$listar = $model->listar();

$cone = new conexion();
$consulta = $cone->conectar();

// progreso ventas totales
$sql = "select * from whatsapp where estado='Concretado'";
$resultado = sqlsrv_query($consulta,$sql, array(), array("Scrollable"=>"buffered"));
$ventasTotalesPr = sqlsrv_num_rows($resultado);
// progreso portabilidades menores a 69
$sql1 = "select * from whatsapp where producto='movil' and tipo='Portabilidad' and(planR='S/ 29.90 MAX' or planR='S/ 39.90' or planR='S/ 49.90' or planR='S/ 55.90') and estado='Concretado'";
$resultado1 = sqlsrv_query($consulta,$sql1, array(), array("Scrollable"=>"buffered"));
$ventasMen69 = sqlsrv_num_rows($resultado1);
// progreso portabilidades mayores a 69
$sql2 = "select * from whatsapp where producto='movil' and tipo='Portabilidad' and(planR!='S/ 29.90 MAX' and planR!='S/ 39.90' and planR!='S/ 49.90' and planR!='S/ 55.90') and estado='Concretado'";
$resultado2 = sqlsrv_query($consulta,$sql2, array(), array("Scrollable"=>"buffered"));
$ventasMay69 = sqlsrv_num_rows($resultado2);
// progreso altas postpago
$sql3 = "select * from whatsapp where producto='movil' and tipo='Linea Nueva' and modalidad='Postpago' and estado='Concretado'";
$resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
$ventasAltPost = sqlsrv_num_rows($resultado3);
// progreso altas prepago
$sql3 = "select * from whatsapp where producto='movil' and tipo='Linea Nueva' and modalidad='prepago' and estado='Concretado'";
$resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
$ventasAltPre = sqlsrv_num_rows($resultado3);
// progreso portabilidad prepago
$sql3 = "select * from whatsapp where producto='movil' and tipo='Portabilidad' and modalidad='Prepago' and estado='Concretado'";
$resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
$ventasPortPre = sqlsrv_num_rows($resultado3);
// progreso renovaciones
$sql3 = "select * from whatsapp where producto='movil' and tipo='Renovacion' and estado='Concretado'";
$resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
$ventasReno = sqlsrv_num_rows($resultado3);
// progreso fija ftth
$sql3 = "select * from whatsapp where producto='Fija' and planFija='HFC(FTH)' and estado='Concretado'";
$resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
$ventasFijaFtth = sqlsrv_num_rows($resultado3);
// progreso fija ifi
$sql3 = "select * from whatsapp where producto='Fija' and estado='Concretado'";
$resultado3 = sqlsrv_query($consulta,$sql3, array(), array("Scrollable"=>"buffered"));
$ventasFijaIfi = sqlsrv_num_rows($resultado3);

include_once "componentes/header.php"; ?>
<div class="contenPage">
    <?php include_once "componentes/metas/contenidoMetas.php"; ?>
</div>