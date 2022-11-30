<?php
require_once "../../model/usuarios.php";
$model = new user();

$dni = $_POST['code'];

$model->eliminarUsuario($dni);
?>
<script>
    alert("Usuario Eliminado Permanentemente...")
    window.history.back();
</script>