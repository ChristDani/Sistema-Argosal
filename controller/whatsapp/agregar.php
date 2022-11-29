<?php 

require_once '../../model/whatsapp.php';

$model = new Whatsapp();

$asesor = $_POST['asesor'];
$nombre = $_POST['nombre'];
$dni = $_POST['dni'];
$telefonoRef = $_POST['telefonoRef'];
$producto = $_POST['producto'];
$promocion = $_POST['promocion'];
$tipo = $_POST['tipo'];
$tipoFija = $_POST['tipoFija'];
$telefono = !empty($_POST['telefono']) ? $_POST['telefono'] : "---";
$lineaProce = $_POST['lineaProce'];
$operadorCeden = $_POST['operadorCeden'];
$modalidad = $_POST['modalidad'];
$plan = $_POST['plan'];
$equipos = $_POST['equipos'];
$planFija = $_POST['planFija'];
$modoFija = $_POST['modoFija'];
$formaPago = $_POST['formaPago'];
$sec = !empty($_POST['sec']) ? $_POST['sec'] : "---";
$estado = $_POST['estado'];
$observacion = $_POST['observaciones'];
$ubicacion = $_POST['ubicacion'];
$distrito = $_POST['distrito'];

if ($producto === "Fija") 
{
    if ($tipoFija === "Alta") 
    {
        $model->agregarFijaAlta($asesor,$nombre,$dni,$telefonoRef,$producto,$promocion,$tipoFija,$planFija,$modoFija,$formaPago,$sec,$estado,$observacion,$ubicacion,$distrito);
    }
    elseif ($tipoFija === "Portabilidad") 
    {
        $model->agregarFijaPortabilidad($asesor,$nombre,$dni,$telefonoRef,$producto,$promocion,$tipoFija,$telefono,$planFija,$modoFija,$formaPago,$sec,$estado,$observacion,$ubicacion,$distrito);
    }
}
elseif ($producto === "Movil") 
{
    if ($tipo === "Linea Nueva") 
    {
        if ($modalidad === "Prepago") 
        {
            $model->agregarMovilNewPre($asesor,$nombre,$dni,$telefonoRef,$producto,$promocion,$tipo,$modalidad,$equipos,$formaPago,$sec,$estado,$observacion,$ubicacion,$distrito);
        }
        elseif ($modalidad === "Postpago") 
        {
            $model->agregarMovilNewPost($asesor,$nombre,$dni,$telefonoRef,$producto,$promocion,$tipo,$modalidad,$plan,$equipos,$formaPago,$sec,$estado,$observacion,$ubicacion,$distrito);
        }
    }
    elseif ($tipo === "Portabilidad") 
    {
        if ($modalidad === "Prepago") 
        {
            $model->agregarMovilPortaPre($asesor,$nombre,$dni,$telefonoRef,$producto,$promocion,$tipo,$telefono,$lineaProce,$operadorCeden,$modalidad,$equipos,$formaPago,$sec,$estado,$observacion,$ubicacion,$distrito);
        }
        elseif ($modalidad === "Postpago") 
        {
            $model->agregarMovilPortaPost($asesor,$nombre,$dni,$telefonoRef,$producto,$promocion,$tipo,$telefono,$lineaProce,$operadorCeden,$modalidad,$plan,$equipos,$formaPago,$sec,$estado,$observacion,$ubicacion,$distrito);
        }
    }
    elseif ($tipo === "Renovacion") 
    {
        if ($modalidad === "Prepago") 
        {
            $model->agregarMovilRenoPre($asesor,$nombre,$dni,$telefonoRef,$producto,$promocion,$tipo,$telefono,$lineaProce,$modalidad,$equipos,$formaPago,$sec,$estado,$observacion,$ubicacion,$distrito);
        }
        elseif ($modalidad === "Postpago") 
        {
            $model->agregarMovilRenoPost($asesor,$nombre,$dni,$telefonoRef,$producto,$promocion,$tipo,$telefono,$lineaProce,$modalidad,$plan,$equipos,$formaPago,$sec,$estado,$observacion,$ubicacion,$distrito);
        }
    }
}
?>
<script>
    window.history.back();
</script>
