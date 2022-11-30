<div class="modal fade" id="Eliminar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">ELIMINAR</h1>
        <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-justify">
        Estas seguro que deseas eliminar al usuario <span id="nombreUser"></span>, al ejecutar esta operacion ya no hay vuelta atras.
      </div>
      <div class="modal-footer justify-content-between">
        <div type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</div>
        <form action="controller/usuario/eliminar.php" method="post">
          <input hidden type="text" name="code" id="code">
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>