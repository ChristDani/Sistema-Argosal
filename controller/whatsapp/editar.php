<?php 

require_once '../../model/whatsapp.php';

$model = new Whatsapp();

$codigo = $_POST['codigoC'];
$producto = $_POST['productoEdit'];
// edit comun
$telRef = $_POST['telref'];
$sec = $_POST['sec'];
$estado = $_POST['estado'];

if ($producto==="Movil") 
{    
    $plan = $_POST['plan'];
    $equipo = $_POST['equipo'];
    $formaPago = $_POST['formaPago'];
    
    $model->actualizarWhatsappMovil($codigo,$plan,$equipo,$formaPago,$telRef,$sec,$estado);    
}
else 
{
    $planFija = $_POST['planFija'];
    
    $model->actualizarWhatsappFija($codigo,$planFija,$telRef,$sec,$estado);
}
?>
<script>
    window.history.back();
</script>