<?php
require_once("../../model/usuarios.php");

$dni= isset($_POST['dni']) ? $_POST['dni'] : null;

$consultas=new user();
$userdetecte=$consultas->buscarUser($dni);

if ($userdetecte != null) 
{
	foreach($userdetecte as $udt) 
	{
        $detectedniUser = $udt[0];
        $detecteNombreUser = trim($udt[1]);
        $detecteTipoUser = $udt[3];
        $detecteFechaUser = $udt[5]->format('l j \of F Y h:i:s A');
        $detecteEstadoUser = $udt[6];
        $detectefotoUser = trim($udt[7]);
    }
}

$output=[];
$output['data']= '';

$output['data'].= "<div class='row row-cols-lg-2'>";
$output['data'].= "<div class='col d-flex justify-content-center align-items-center'>";
$output['data'].= "<img class='img-fluid rounded-5' src='view/static/ProfileIMG/$detectefotoUser'>";
$output['data'].= "</div>";
$output['data'].= "<div class='gap-3 col-xl-6 d-grid align-items-center'>";
$output['data'].= "<h2>$detectedniUser</h2>";
$output['data'].= "<h2>$detecteNombreUser</h2>";
if ($detecteTipoUser === "1") 
{
    $output['data'].= "<h2>Administrador</h2>";
}
elseif ($detecteTipoUser === "0") 
{
    $output['data'].= "<h2>Asesor</h2>";
}
if ($detecteEstadoUser === "0") 
{
    $output['data'].= "<h2 class='secondary'>Desconectado</h2>";
}
elseif ($detecteEstadoUser === "1") 
{
    $output['data'].= "<h2 class='success'>Conectado</h2>";
}
elseif ($detecteEstadoUser === "2") 
{
    $output['data'].= "<h2 class='warning'>Ausente</h2>";
}
elseif ($detecteEstadoUser === "3") 
{
    $output['data'].= "<h2 class='danger'>Ocupado</h2>";
}
$output['data'].= "</div>";
$output['data'].= "</div>";
$output['data'].= "<div class='d-flex justify-content-between align-items-center text-center'>";
$output['data'].= "<h4 class='text-muted'>Desde $detecteFechaUser</h4>";
$output['data'].= "</div>";

echo json_encode($output, JSON_UNESCAPED_UNICODE); //por si viene con 'ñ' o tildes...
?>