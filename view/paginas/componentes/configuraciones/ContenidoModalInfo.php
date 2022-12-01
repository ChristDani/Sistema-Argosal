<div class="modal fade" id="InfoUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">INFORMACION</h1>
                <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-justify" id="detalleuserespecifico">

            </div>
            <div class="modal-footer justify-content-between">
                <a class="btn color" data-bs-toggle="modal" data-bs-target="#CambiarTipoUser" id="btncambiar"></a>
                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Eliminar" id="btneliminar">Eliminar</a>
            </div>
        </div>
    </div>
</div>
<?php include_once "contenidoModalEliminarUsuario.php"; ?>
<?php include_once "ContenidoModalCambiarTipoUsuario.php"; ?>