<?php if ($listar != null)
    
    {
        foreach ($listar as $x)
        {
            if ($x[0] === $dniUsuario)
            {
                if ($x[6] === "0")
                
                {?>
                    <div class="dropdown">
                        <a class="btn btn-sm dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="bg-secondary" style="height:10px; width:10px ; border-radius:10px;"></div>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item d-flex align-items-baseline gap-3" href="controller/usuario/conectarUsuario.php?dni=<?php echo $dniUsuario;?>"><div class="bg-success" style="height:10px; width:10px ; border-radius:10px;"></div>Conectado</a></li>
                            <li><a class="dropdown-item d-flex align-items-baseline gap-3" href="controller/usuario/reposarUsuario.php?dni=<?php echo $dniUsuario;?>"><div class="bg-warning" style="height:10px; width:10px ; border-radius:10px;"></div>Ausente</a></li>
                            <li><a class="dropdown-item d-flex align-items-baseline gap-3" href="#"><div class="bg-danger" style="height:10px; width:10px ; border-radius:10px;"></div>Ocupado</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item d-flex align-items-center gap-3 justify-content-end" href="controller/acceso/logout.php?dni=<?php echo $dniUsuario;?>"><ion-icon class="danger" name="log-out-outline"></ion-icon>Salir</a></li>
                        </ul>
                    </div>
<?php           }
                elseif($x[6] === "1")
                {?>

                    <div class="dropdown">
                        <a class="btn btn-sm dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="bg-success" style="height:10px; width:10px ; border-radius:10px;"></div>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item d-flex align-items-baseline gap-3" href="controller/usuario/reposarUsuario.php?dni=<?php echo $dniUsuario;?>"><div class="bg-warning" style="height:10px; width:10px ; border-radius:10px;"></div>Ausente</a></li>
                            <li><a class="dropdown-item d-flex align-items-baseline gap-3" href="#"><div class="bg-danger" style="height:10px; width:10px ; border-radius:10px;"></div>Ocupado</a></li>
                            <li><a class="dropdown-item d-flex align-items-baseline gap-3" href="controller/usuario/desconectarUsuario.php?dni=<?php echo $dniUsuario;?>"><div class="bg-secondary" style="height:10px; width:10px ; border-radius:10px;"></div>Desconectado</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item d-flex align-items-center gap-3 justify-content-end" href="controller/acceso/logout.php?dni=<?php echo $dniUsuario;?>"><ion-icon class="danger" name="log-out-outline"></ion-icon>Salir</a></li>
                        </ul>
                    </div>
<?php           }
                elseif($x[6] === "2")
                {?>
                    <div class="dropdown">
                        <a class="btn btn-sm dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="bg-warning" style="height:10px; width:10px ; border-radius:10px;"></div>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item d-flex align-items-baseline gap-3" href="controller/usuario/conectarUsuario.php?dni=<?php echo $dniUsuario;?>"><div class="bg-success" style="height:10px; width:10px ; border-radius:10px;"></div>Conectado</a></li>
                            <li><a class="dropdown-item d-flex align-items-baseline gap-3" href="#"><div class="bg-danger" style="height:10px; width:10px ; border-radius:10px;"></div>Ocupado</a></li>
                            <li><a class="dropdown-item d-flex align-items-baseline gap-3" href="controller/usuario/desconectarUsuario.php?dni=<?php echo $dniUsuario;?>"><div class="bg-secondary" style="height:10px; width:10px ; border-radius:10px;"></div>Desconectado</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item d-flex align-items-center gap-3 justify-content-end" href="controller/acceso/logout.php?dni=<?php echo $dniUsuario;?>"><ion-icon class="danger" name="log-out-outline"></ion-icon>Salir</a></li>
                        </ul>
                    </div>

<?php           }
            }
        }
    }
?>