<?php
require_once "../../model/usuarios.php";
$model = new user();

$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$clave = sha1($_POST['clave']);
$tipo = $_POST['tipo'];
$foto = $_FILES['foto']['name'];
    $dirfinal = "../../view/static/imgFaceId/".$foto;
    copy($_FILES['foto']['tmp_name'],$dirfinal);

$model->insertarUsuario($dni,$nombre,$clave,$tipo,$foto);
?>
<script>
    alert("Usuario Agregado al Sistema...")
    window.history.back();
</script>