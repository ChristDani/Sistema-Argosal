<div class="modal fade" id="agregararchivos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Añadir Archivos</h1>
        <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="controller/archivos/agregar.php" method="post" enctype="multipart/form-data">
          
            <h3>Ubicaciones</h3>
            <div>
                <label for="cac">CAC</label><input type="file" name="cac" id="cac">
            </div>
            <div>
                <label for="dac">DAC</label><input type="file" name="dac" id="dac">
            </div>
            <div>
                <label for="acd">ACD</label><input type="file" name="acd" id="acd">
            </div>
            <div>
                <label for="cadena">Cadena</label><input type="file" name="cadena" id="cadena">
            </div>
            <h3>Productos</h3>
            <input type="file" name="productos" id="productos">
            <h3>Masiva</h3>
            <input type="file" name="masiva" id="masiva">

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
      </div>
    </div>
  </div>
</div>