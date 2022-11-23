<h1>DATOS</h1>

<div class="card">
    <div class="bare row d-flex justify-content-center align-items-center">
        <div class="col d-flex justify-content-start align-items-center">
            <div class="d-flex justify-content-center align-items-baseline">
                <p class="mx-1" for="numRegistrosM">Mostrar</p>
                <select name="numRegistrosM" id="numRegistrosM" class="mx-1 form-select" aria-label="Default select example">
                    <option value="12">12</option>
                    <option value="28">28</option>
                    <option value="52">52</option>
                    <option value="100">100</option>
                </select>
                <p class="mx-1" for="numRegistrosM">Registros</p>
            </div>
        </div>
        <div class="col d-flex justify-content-center align-items-center">
            <a href="#" class="btn success-bg" onclick="exportTableToExcel('tablaMasi', 'Data-Masiva')">
                <div>Excel</div>
            </a>
        </div>
        <div class="col d-flex justify-content-end align-items-center">
            <div class="form-floating">
                <input type="text" class="form-control" id="busquedaM" placeholder="Buscar" onkeyup="getDataM(1);">
                <label for="busquedaM">Buscar</label>
            </div>
        </div>
    </div>
    <div class="row mb-4" id="resultadosM">
        
    </div>
    <div class="bare d-flex justify-content-between mb-3">
        <div class="mensaje">
            <h3 class="text-muted m-3" id="msgM"></h3>
        </div>
        <div id="munM">
            
        </div>
    </div>
</div>

<script src="controller/masiva/listarMasiva.js"></script>        

<!-- <div class="modal fade" id="Detalles" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Detalles</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Aqui van los detalles
      </div>
      <div class="modal-footer">
        <button class="btn danger-bg" data-bs-target="#Editar" data-bs-toggle="modal">Editar</button>
      </div>
    </div>
  </div>
</div> -->