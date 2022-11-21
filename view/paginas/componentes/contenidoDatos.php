<h1>DATOS</h1>

<div class="card">
    <div class="bare row d-flex justify-content-center align-items-center">
        <div class="col d-flex justify-content-start align-items-center">
            <div class="d-flex justify-content-center align-items-baseline">
                <p>Mostrando</p>
                <select class="form-select" aria-label="Default select example">
                    <option selected>10</option>
                    <option value="1">25</option>
                    <option value="2">50</option>
                    <option value="3">100</option>
                </select>
                <p>Registros</p>
            </div>
        </div>
        <div class="col d-flex justify-content-center align-items-center">
            <a href="#" class="btn success-bg">
                <div>Excel</div>
            </a>
        </div>
        <div class="col d-flex justify-content-end align-items-center">
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Buscar">
                <label for="floatingInput">Buscar</label>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#Detalles">
                    <div class="card-body">
                        <div class="head d-flex justify-content-around">
                            <p>Region</p>
                            <p></p>
                            <p></p>
                            <p></p>
                            <p></p>
                            <p></p>
                            <p>71574122</p>
                        </div>
                        <div class="body">
                            <div class="row my-2">
                                <h4 class="text-center">Oliver Delgado Gonzales</h4>
                            </div>
                            <div class="row text-center">
                                <div class="col">
                                    <p>Entel</p>
                                </div>
                                <div class="col">
                                    <p>Postpago</p>
                                </div>
                                <div class="col">
                                    <p>69.90</p>
                                </div>
                            </div>
                            <div class="row text-center" style="border-top: 1px solid #b9b9b9;">
                                <p class="my-1 text-muted">20 de noviembre del 2022</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>        
    </div>
</div>

<div class="modal fade" id="Detalles" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
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
</div>