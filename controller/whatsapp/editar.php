<?php 

require_once '../../model/whatsapp.php';

$dni = $_GET['dni'];

$model = new Whatsapp();

$codigo = $_POST['codigoC'];
$producto = $_POST['productoEdit'];
// edit comun
$telRef = $_POST['telref'];
$sec = $_POST['sec'];
$estado = $_POST['estado'];

if ($producto==="Movil") {
    
    $plan = $_POST['plan'];
    $equipo = $_POST['equipo'];
    $formaPago = $_POST['formaPago'];
    
    $model->actualizarWhatsappMovil($codigo,$plan,$equipo,$formaPago,$telRef,$sec,$estado);
    
    header("location: ../../index.php?pagina=Clientes");
    
}else {
    
    $planFija = $_POST['planFija'];
    
    $model->actualizarWhatsappFija($codigo,$planFija,$telRef,$sec,$estado);

    header("location: ../../index.php?pagina=Clientes");

}
?>