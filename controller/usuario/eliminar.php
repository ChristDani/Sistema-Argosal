<?php
require_once "../../model/usuarios.php";
$model = new user();

$dni = $_POST['code'];

$model->eliminarUsuario($dni);
?>
<script>
    window.history.back();
</script>