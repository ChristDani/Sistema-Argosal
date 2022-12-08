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
            <div class="row">
              <div class="col-lg-6 mb-3">
                  <label class="filein align-items-center d-grid filein justify-content-center p-lg-5 p-sm-0">
                      <input type="file" name="cac" id="cac">
                      <h3>SUBIR CAC</h3>
                  </label>
              </div>
              <div class="col-lg-6 mb-3">
                  <label class="filein align-items-center d-grid filein justify-content-center p-lg-5 p-sm-0">
                      <input type="file" name="dac" id="dac">
                      <h3>SUBIR DAC</h3>
                  </label>
              </div>
              <div class="col-lg-6 mb-3">
                  <label class="filein align-items-center d-grid filein justify-content-center p-lg-5 p-sm-0">
                      <input type="file" name="acd" id="acd">
                      <h3>SUBIR ACD</h3>
                  </label>
              </div>
              <div class="col-lg-6 mb-3">
                  <label class="filein align-items-center d-grid filein justify-content-center p-lg-5 p-sm-0">
                      <input type="file" name="cadena" id="cadena">
                      <h3>SUBIR CADENA</h3>
                  </label>
              </div>
            </div>
            <h3>Productos</h3>
            <div class="col-lg-6 mb-3">
                <label class="filein align-items-center d-grid filein justify-content-center p-lg-5 p-sm-0">
                    <input type="file" name="productos" id="productos">
                    <h3>SUBIR PRODUCTOS</h3>
                </label>
            </div>
            <h3>Masiva</h3>
            <div class="col-lg-6 mb-3">
                <label class="filein align-items-center d-grid filein justify-content-center p-lg-5 p-sm-0">
                    <input type="file" name="masiva" id="masiva">
                    <h3>SUBIR MASIVA</h3>
                </label>
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
      </div>
    </div>
  </div>
</div>