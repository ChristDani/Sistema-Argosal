<div class="modal fade" id="EditarUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Usuario</h1>
        <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="controller/usuario/editar.php" method="post" enctype="multipart/form-data">
          <input hidden type="text" name="dniedit" id="dniedit"> <!--no mover-->
          
          <label>Foto de Perfil</label>
          <img id="fotoPerfiledit1" class="img-fluid rounded-5" src="view/static/ProfileIMG/">
          <input type="file" name="fotoPerfiledit" id="fotoPerfiledit">

          <div class="form-floating mb-3">
            <input class="form-control" placeholder="Nombre" autocomplete="off" type="text" name="nombreedit" id="nombreedit">
            <label for="nombre">Nombre</label>
          </div>
          <div class="form-floating mb-3">
            <input class="form-control" placeholder="clave" autocomplete="off" type="text" name="claveedit" id="claveedit">
            <label for="clave">Clave</label>
          </div>
          <input hidden type="text" name="claveedit2" id="claveedit2" readonly>

          <!-- <label>Foto FaceId</label>
          <input type="file" name="fotoedit" id="fotoedit"> -->
          <input hidden type="text" name="fotoedit1" id="fotoedit1" readonly>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Editar</button>
          </form>
      </div>
    </div>
  </div>
</div>