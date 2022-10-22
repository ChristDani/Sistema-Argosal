<?php 

require_once '../../model/conexion.php';

$dni = $_GET['dni'];

$model = new conexion();
$con = $model->conectar();

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
$sec = is_null($_POST['sec']) ? $_POST['sec'] : "---";
$estado = $_POST['estado'];
$tipoFija = $_POST['tipoFija'];
$planFija = $_POST['planFija'];

try {

    $model = new conexion();
    $con = $model->conectar();

    $sql="INSERT INTO whatsapp(asesor,nombre,dni,telefono,producto,lineaProcedente,operadorCedente,modalidad,tipo,planR,equipo,formaDePago,sec,tipoFija,planFija,estado) VALUES('$asesor','$nombreC','$dniC','$telefono','$producto','$lineaProce','$operadorCeden','$modalidad','$tipo','$plan','$equipos','$formaPago','$sec','$tipoFija','$planFija','$estado')";

    $rs=sqlsrv_query($con,$sql);

    $con = $model->desconectar();
    
    header("location: ../../index.php?pagina=clientes&dni=$dni");

} catch (Exception $e) {
    $html .= "<script>";
    $html .= "alert('Operacion incorrecta, error: ".$e->getMessage()."')";
    $html .= "</script>";

    echo $html; 
    die();
} 

?>