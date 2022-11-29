<h1>CONFIGURACIONES</h1>
<div class="row mb-4">
    <div class="col-xl-10 col-lg-8 mx-auto">
        <div class="d-flex justify-content-around row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1>Tus Datos</h1>    
                        </div>
                        <div class="row row-cols-lg-2">
                            <div class="col mb-3 d-flex justify-content-center align-items-center my-2">
                                <!-- <ion-icon name="person-circle-outline"></ion-icon> -->
                                <div class="profilecong" style="background-image: url(view/static/ProfileIMG/<?php echo $configfotoUser;?>);"></div>
                            </div>
                            <div class="gap-3 col-xl-6 my-2 d-grid align-items-center">
                                <h2><?php echo $configNombreUser; ?></h2>
                                <?php if ($configTipoUser === "1") { ?>
                                    <h2>Administrador</h2>
                                <?php }elseif ($configTipoUser === "0") { ?>
                                    <h2>Asesor</h2>
                                <?php } ?>
                                <?php if ($configEstadoUser === "0") { ?>
                                    <h2 class="secondary">Desconectado</h2>
                                <?php }elseif ($configEstadoUser === "1") { ?>
                                    <h2 class="success">Conectado</h2>
                                <?php }elseif ($configEstadoUser === "2") { ?>
                                    <h2 class="warning">Ausente</h2>
                                <?php }elseif ($configEstadoUser === "3") { ?>
                                    <h2 class="danger">Ocupado</h2>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h4 class="text-muted text-center">Desde<?php echo " $configFechaUser"; ?></h4>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EditarUsuario">
                                Editar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($tipoUsuario === "1") { ?>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1>Usuarios</h1>
                        </div>
                        <?php if ($listaUsuarios != null) 
                                {
                                foreach ($listaUsuarios as $u) 
                                { 
                                    if ($u[0] != $dniUsuario) 
                                    {?>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="row d-grid justify-content-arround">
                                                    <a class="btn d-flex gap-1 " data-bs-toggle="modal" data-bs-target="#Eliminar">
                                                    <?php if ($u[6] === "0") { ?>
                                                        <div class="content bg-secondary d-flex align-items-center">
                                                            <div class="usercong" style="background-image: url(view/static/ProfileIMG/<?php echo $u[7];?>);"></div>
                                                        </div>
                                                    <?php }elseif ($u[6] === "1") { ?>
                                                        <div class="content bg-success d-flex align-items-center">
                                                            <div class="usercong" style="background-image: url(view/static/ProfileIMG/<?php echo $u[7];?>);"></div>
                                                        </div>
                                                    <?php }elseif ($u[6] === "2") { ?>
                                                        <div class="content bg-warning d-flex align-items-center">
                                                            <div class="usercong" style="background-image: url(view/static/ProfileIMG/<?php echo $u[7];?>);"></div>
                                                        </div>
                                                    <?php }elseif ($u[6] === "3") { ?>
                                                        <div class="content bg-danger d-flex align-items-center">
                                                            <div class="usercong" style="background-image: url(view/static/ProfileIMG/<?php echo $u[7];?>);"></div>
                                                        </div>
                                                    <?php } ?>
                                                    <!-- <div class="usercong" style="background-image: url(view/static/ProfileIMG/<?php echo $u[7];?>);"></div> -->
                                                    <div class="">
                                                        <h2><?php echo strtoupper($u[1]); ?></h2>            
                                                        <?php if ($u[3] === "1") { ?>
                                                        <h4 class="text-muted">Administrador</h4>
                                                        <?php }elseif ($u[3] === "0") { ?>
                                                        <h4 class="text-muted">Asesor</h4>
                                                        <?php } ?>
                                                    </div>
                                                    </a>
                                                </div>                                                
                                            </div>
                        <?php           }
                                    }
                                } ?>
                        <div class="d-flex justify-content-end mt-1">
                            <button type="submit" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#Añadir">Añadir Usuario</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
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

<?php include_once "contenidoModalEditarUsuario.php"; ?>
<?php include_once "contenidoModalAñadirUsuario.php"; ?>
<?php include_once "contenidoModalEliminarUsuario.php"; ?>

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
