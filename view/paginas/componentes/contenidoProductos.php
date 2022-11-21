<h1>PRODUCTOS</h1>

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
        <div class="col d-flex justify-content-end">
            <div class="form-floating">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                    <option selected>Todos</option>
                    <option value="1">Centro</option>
                    <option value="2">Lima</option>
                    <option value="3">Norte</option>
                    <option value="4">Sur</option>
                </select>
                <label for="floatingSelect">Proviene</label>
            </div> 
        </div>
        <div class="col d-flex justify-content-end align-items-center">
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Buscar">
                <label for="floatingInput">Buscar CAC</label>
            </div>
        </div>
        <div class="col d-flex justify-content-end align-items-center">
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Buscar">
                <label for="floatingInput">Buscar equipo</label>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#Detalles">
                    <div class="card-body">
                        <div class="head d-flex justify-content-around">
                            <p>Nombre</p>
                            <p></p>
                            <p></p>
                            <p>Centro</p>
                            <p></p>
                            <p></p>
                            <p>Region</p>
                        </div>
                        <div class="body">
                            <div class="row my-2">
                                <h4 class="text-center">NombreAlmacen</h4>
                            </div>
                            <div class="row text-center">
                                <div class="col">
                                    <p class="success">Libres</p>
                                </div>
                                <div class="col">
                                    <p class="danger">Bloqueados</p>
                                </div>
                                <div class="col">
                                    <p>Stock</p>
                                </div>
                            </div>
                            <div class="row text-center" style="border-top: 1px solid #b9b9b9;">
                                <p class="my-1 text-muted">Descripcion</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>       
    </div>
</div>