<h1>CONFIGURACIONES</h1>
<div class="row mb-4">
    <div class="col-xl-10 col-lg-8 mx-auto">
        <div class="d-flex justify-content-around row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1>Usuario</h1>    
                        </div>
                        <div class="row row-cols-lg-2">
                            <div class="col mb-3 d-flex justify-content-center align-items-center my-2">
                                <img src="view/static/ProfileIMG/ProfileDefault.png" style="height:200px; border-radius:100px;">
                            </div>
                            <div class="gap-3 col-xl-6 my-2 d-grid align-items-center">
                                <h2>Nombre del usuario</h2>
                                <h2>Tipo de usuario</h2>
                                <h2>Estado</h2>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="text-muted text-center">Fecha de registro</h4>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EditarUsuario">
                                Editar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1>Lista de usuarios</h1>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <h2>Juanito mendez</h2>
                            <button type="submit" class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#Eliminar">Eliminar</button>
                        </div>
                        <div class="d-flex justify-content-end mt-1">
                            <button type="submit" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#Añadir">Añadir Usuario</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mx-auto">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body d-grid justify-content-center align-items-center">
                            <h1>Productos</h1>
                            <label class="filein align-items-center d-grid filein justify-content-center p-lg-5 p-sm-0">
                                <input type="file" name="" id="">
                                <h3>SUBIR</h3>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body d-grid justify-content-center align-items-center">
                            <h1>Ubicaciones</h1>
                            <label class="filein align-items-center d-grid filein justify-content-center p-lg-5 p-sm-0">
                                <input type="file" name="" id="">
                                <h3>SUBIR</h3>
                            </label>
                        </div>
                    </div>
                </div>                
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body d-grid justify-content-center align-items-center">
                            <h1>Masiva</h1>
                            <label class="filein align-items-center d-grid filein justify-content-center p-lg-5 p-sm-0">
                                <input type="file" name="" id="">
                                <h3>SUBIR</h3>
                            </label>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="EditarUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">EDITAR</h1>
        <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Eliminar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">ELIMINAR</h1>
        <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-justify">
        Estas seguro que deseas eliminar a este usuario, al ejecutar esta operacion ya no hay vuelta atras. 
        <BR>
            TODO REGISTRO DE USUARIO SERA ELIMINADO
        </BR> 
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Añadir" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">EDITAR</h1>
        <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

<!-- <div class="col-xl-4">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Tema</h1>
            </div>
            <div class="row d-flex flex-column">
                <h3>Elegir tema de preferencia</h3>
                <div class="align-items-end col d-flex justify-content-between mb-3">
                    <button class="almrda Buttone mx-2 btn btn-link btn-sm d-flex justify-content-center">
                        <div class="color d-flex justify-content-center align-items-center">
                            <ion-icon name="moon-outline"></ion-icon>
                        </div>
                    </button>    
                    <button class="almrda Buttone mx-2 btn btn-link btn-sm d-flex justify-content-center">
                        <div class="color d-flex justify-content-center align-items-center">
                            <ion-icon name="moon-outline"></ion-icon>
                        </div>
                    </button>                           
                </div>
                <h3>Elija el color que desea</h3>
                <div class="col d-flex justify-content-center mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <a href=""><div class="col danger-bg mb-2" style="height:25px; border-radius:50px;"></div></a>
                                    <a href=""><div class="col primary-bg mb-2" style="height:25px; border-radius:50px;"></div></a>
                                    <a href=""><div class="col success-bg" style="height:25px; border-radius:50px;"></div></a>
                                </div>
                                <div class="col mb-3">
                                    <a href=""><div class="col primary-bg mb-2" style="height:25px; border-radius:50px;"></div></a>
                                    <a href=""><div class="col success-bg mb-2" style="height:25px; border-radius:50px;"></div></a>
                                    <a href=""><div class="col danger-bg" style="height:25px; border-radius:50px;"></div></a>
                                </div>    
                                <div class="col mb-3">
                                    <a href=""><div class="col success-bg mb-2" style="height:25px; border-radius:50px;"></div></a>
                                    <a href=""><div class="col primary-bg mb-2" style="height:25px; border-radius:50px;"></div></a>
                                    <a href=""><div class="col danger-bg" style="height:25px; border-radius:50px;"></div></a>
                                </div>                                   
                            </div>                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
