<?php 

require_once '../../model/conexion.php';

$dni = $_GET['dni'];

$model = new conexion();
$con = $model->conectar();

$producto = $_POST['producto'];
$dniC = $_POST['dniC'];
if ($producto==="Movil") {
    try {
        $plan = $_POST['plan'];
        $equipo = $_POST['equipo'];
        $sec = $_POST['sec'];
        $estado = $_POST['estado'];
        echo "$dni | $dniC | $producto | $plan | $equipo | $sec | $estado";
    
        $sql="UPDATE whatsapp set planR='$plan', equipo='$equipo', sec='$sec', estado='$estado' where dni='$dniC' and producto='Movil'";
    
        $rs=sqlsrv_query($con,$sql);
    
        $con = $model->desconectar();
        
        header("location: ../../index.php?pagina=clientes&dni=$dni");
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }

}else {
    $sec = $_POST['sec'];
    $estado = $_POST['estado'];
    $planFija = $_POST['planFija'];
    echo "$dni | $dniC | $producto | $planFija | $sec | $estado";

    $sql="UPDATE whatsapp set planFija='$planFija', sec='$sec', estado='$estado' where dni='$dniC' and producto='Fija'";

    $rs=sqlsrv_query($con,$sql);

    $con = $model->desconectar();
    
    header("location: ../../index.php?pagina=clientes&dni=$dni");
}

// echo $estado;

// try {

    // $model = new conexion();
    // $con = $model->conectar();

    // $sql="INSERT INTO whatsapp(asesor,nombre,dni,telefono,producto,lineaProcedente,operadorCedente,modalidad,tipo,planR,equipo,formaDePago,sec,tipoFija,planFija,estado) VALUES('$asesor','$nombreC','$dniC','$telefono','$producto','$lineaProce','$operadorCeden','$modalidad','$tipo','$plan','$equipos','$formaPago','$sec','$tipoFija','$planFija','$estado')";

    // $rs=sqlsrv_query($con,$sql);

    // $con = $model->desconectar();
    
    // header("location: ../../index.php?pagina=clientes&dni=$dni");

// } catch (Exception $e) {
//     $html .= "<script>";
//     $html .= "alert('Operacion incorrecta, error: ".$e->getMessage()."')";
//     $html .= "</script>";

//     echo $html; 
//     die();
// } 

?>