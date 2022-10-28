<?php 

require_once '../../model/conexion.php';

$dni = $_GET['dni'];

$model = new conexion();
$con = $model->conectar();

$producto = $_POST['producto'];
if ($producto==="Movil") {
    $plan = $_POST['plan'];
    $sec = $_POST['sec'];
    $estado = $_POST['estado'];
    echo "$dni | $producto | $plan | $sec | $estado";
}else {
    $sec = $_POST['sec'];
    $estado = $_POST['estado'];
    $planFija = $_POST['planFija'];
    echo "$dni | $producto | $planFija | $sec | $estado";
}

// echo $estado;

try {

    // $model = new conexion();
    // $con = $model->conectar();

    // $sql="INSERT INTO whatsapp(asesor,nombre,dni,telefono,producto,lineaProcedente,operadorCedente,modalidad,tipo,planR,equipo,formaDePago,sec,tipoFija,planFija,estado) VALUES('$asesor','$nombreC','$dniC','$telefono','$producto','$lineaProce','$operadorCeden','$modalidad','$tipo','$plan','$equipos','$formaPago','$sec','$tipoFija','$planFija','$estado')";

    // $rs=sqlsrv_query($con,$sql);

    // $con = $model->desconectar();
    
    // header("location: ../../index.php?pagina=clientes&dni=$dni");

} catch (Exception $e) {
    $html .= "<script>";
    $html .= "alert('Operacion incorrecta, error: ".$e->getMessage()."')";
    $html .= "</script>";

    echo $html; 
    die();
} 

?>