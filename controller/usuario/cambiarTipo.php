<?php
require_once "../../model/usuarios.php";
$model = new user();

$dni = $_POST['dniEliminar'];

$model->cambiarTipoUsuario($dni);
?>
<script>
    window.history.back();
</script>