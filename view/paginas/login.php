<?php
$mensajeLogin = isset($_SESSION["Mensaje"]) ? $_SESSION["Mensaje"] : null;
$intentos = isset($_SESSION["intentos"]) ? $_SESSION["intentos"] : 0;

if ($intentos == 3) {?>
    <script>
        var timejsjs = 180000
        let timeshow = 0
            setInterval(() => {
                if (timejsjs > 0) {
                    timeshow = timejsjs / 1000;
                    timejsjs = timejsjs-1000;
                } else{
                    setTimeout(() => {
                        <?php session_destroy();?>
                        location.reload();
                    }, 500);
                }
            }, 1000);
    </script>
<?php } ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Argo</title>
    <link rel="icon" href="view/static/img/icono.png">
    <link rel="stylesheet" href="view/static/css/reset.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="view/static/css/styleLogin.css">
</head>
<body>
    <div class="m-0 vh-100" id="imagen">
        <div class="fondo m-0 vh-100 row justify-content-center align-items-center">
            <div class="row justify-content-center align-items-center" >
                <div class="col-auto px-5 mb-5 text-center">
                    <div class="card login-card">
                        <div class="card-body">
                            <?php if ($intentos < 3) {?>
                                <div class="login-card-header">
                                    <h1>Iniciar sesion</h1>
                                    <?php echo $mensajeLogin; ?>
                                </div>
                                <form action="controller/acceso/login.php" method="post" class="login-card-form">
                                    <div class="form-item mb-3">
                                        <ion-icon name="person-outline"></ion-icon>
                                        <input class="form-control" type="text" name="dni" id="dni" required autocomplete='off' maxlength="8" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Ingresa tu DNI">
                                    </div>
                                    <div class="form-item mb-3">
                                        <ion-icon name="lock-closed-outline"></ion-icon>
                                        <input class="form-control" type="password" name="clave" id="clave" required autocomplete='off' placeholder="Ingresa tu clave">
                                    </div>
                                    <div class="form-item d-flex justify-content-end">
                                        <button type="submit" class="mx-2">Entrar</button>
                                    </div>
                                </form>                
                            <?php }elseif ($intentos == 3) {?>
                                <div class="login-card-header">
                                    <h3 class="text-danger">Se excedió el limite de intentos posibles.</h3>
                                    <h5 class='text-danger'>Podrá intentar después de <span id="tiempoespera">180</span> segundos.</h5>
                                </div>
                                <script>
                                    let timeespera = document.getElementById('tiempoespera');
                                    setInterval(() => {
                                        timeespera.innerHTML = timeshow;
                                    }, 1000);
                                </script>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <div class="col-auto px-5 text-center">
                    <div class="card hours">
                        <div class="align-items-center card-body d-flex date gap-3 justify-content-center">
                            <h1 id="hora"></h1>
                            <h1 id="min"></h1>
                            <div class="row two">
                                <h1 id="second"></h1>
                                <h1 id="pre"></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
<script src="view/static/js/login.js"></script>    
</body>
</html>