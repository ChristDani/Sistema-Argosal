<?php
require_once "../../model/usuarios.php";
$model = new user();

$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$clave = sha1($_POST['clave']);
$tipo = $_POST['tipo'];

$bus = $model->buscarUser($dni);

if ($bus != null) 
{
    foreach($bus as $usre) 
	{
		$activouserrrr = $usre[7];
	}
    if ($activouserrrr == "0") 
    {
        $model->reactivar($dni);
    }
}
else 
{
    $model->insertarUsuario($dni,$nombre,$clave,$tipo);
}
?>
<script>
    window.history.back();
</script>