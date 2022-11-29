<?php 

require_once '../../model/whatsapp.php';

$model = new Whatsapp();

$codigo = $_POST['codigo'];
$asesor = $_POST['asesor'];
$nombre = $_POST['nombre'];
$dni = $_POST['dni'];
$telefonoRef = $_POST['telefonoRef'];
$producto = $_POST['producto'];
$promocion = $_POST['promocion'];
if (isset($_POST['tipo'])) 
{
    $tipo = $_POST['tipo'];
}
if (isset($_POST['tipoFija'])) 
{
    $tipoFija = $_POST['tipoFija'];
}
if (isset($_POST['telefono'])) 
{
    $telefono = $_POST['telefono'];
}
if (isset($_POST['lineaProce'])) 
{
    $lineaProce = $_POST['lineaProce'];
}
if (isset($_POST['operadorCeden'])) 
{
    $operadorCeden = $_POST['operadorCeden'];
}
if (isset($_POST['modalidad'])) 
{
    $modalidad = $_POST['modalidad'];
}
if (isset($_POST['plan'])) 
{
    $plan = $_POST['plan'];
}
if (isset($_POST['equipos'])) 
{
    $equipos = $_POST['equipos'];
}
if (isset($_POST['planFija'])) 
{
    $planFija = $_POST['planFija'];
}
if (isset($_POST['modoFija'])) 
{
    $modoFija = $_POST['modoFija'];
}
$formaPago = $_POST['formaPago'];
$sec = $_POST['sec'];
$estado = $_POST['estado'];
$observacion = $_POST['observaciones'];
$ubicacion = $_POST['ubicacion'];
$distrito = $_POST['distrito'];

if ($producto === "Fija ") 
{
    if ($tipoFija === "Alta           ") 
    {
        $model->editarFijaAlta($codigo,$asesor,$nombre,$dni,$telefonoRef,$producto,$promocion,$tipoFija,$planFija,$modoFija,$formaPago,$sec,$estado,$observacion,$ubicacion,$distrito);
    }
    elseif ($tipoFija === "Portabilidad   ") 
    {
        $model->editarFijaPortabilidad($codigo,$asesor,$nombre,$dni,$telefonoRef,$producto,$promocion,$tipoFija,$telefono,$planFija,$modoFija,$formaPago,$sec,$estado,$observacion,$ubicacion,$distrito);
    }
}
elseif ($producto === "Movil") 
{
    if ($tipo === "Linea Nueva    ") 
    {
        if ($modalidad === "Prepago ") 
        {
            $model->editarMovilNewPre($codigo,$asesor,$nombre,$dni,$telefonoRef,$producto,$promocion,$tipo,$modalidad,$equipos,$formaPago,$sec,$estado,$observacion,$ubicacion,$distrito);
        }
        elseif ($modalidad === "Postpago") 
        {
            $model->editarMovilNewPost($codigo,$asesor,$nombre,$dni,$telefonoRef,$producto,$promocion,$tipo,$modalidad,$plan,$equipos,$formaPago,$sec,$estado,$observacion,$ubicacion,$distrito);
        }
    }
    elseif ($tipo === "Portabilidad   ") 
    {
        if ($modalidad === "Prepago ") 
        {
            $model->editarMovilPortaPre($codigo,$asesor,$nombre,$dni,$telefonoRef,$producto,$promocion,$tipo,$telefono,$lineaProce,$operadorCeden,$modalidad,$equipos,$formaPago,$sec,$estado,$observacion,$ubicacion,$distrito);
        }
        elseif ($modalidad === "Postpago") 
        {
            $model->editarMovilPortaPost($codigo,$asesor,$nombre,$dni,$telefonoRef,$producto,$promocion,$tipo,$telefono,$lineaProce,$operadorCeden,$modalidad,$plan,$equipos,$formaPago,$sec,$estado,$observacion,$ubicacion,$distrito);
        }
    }
    elseif ($tipo === "Renovacion     ") 
    {
        if ($modalidad === "Prepago ") 
        {
            $model->editarMovilRenoPre($codigo,$asesor,$nombre,$dni,$telefonoRef,$producto,$promocion,$tipo,$telefono,$lineaProce,$modalidad,$equipos,$formaPago,$sec,$estado,$observacion,$ubicacion,$distrito);
        }
        elseif ($modalidad === "Postpago") 
        {
            $model->editarMovilRenoPost($codigo,$asesor,$nombre,$dni,$telefonoRef,$producto,$promocion,$tipo,$telefono,$lineaProce,$modalidad,$plan,$equipos,$formaPago,$sec,$estado,$observacion,$ubicacion,$distrito);
        }
    }
}
?>
<script>
    window.history.back();
</script>