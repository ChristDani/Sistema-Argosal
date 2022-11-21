<div id="imagen" class="body card d-flex flex-wrap justify-content-center align-items-center" style="height:100vh;">
    <div class="container-fluid d-flex flex-wrap justify-content-center align-items-center">
        <div class="row">
            <div class="col mb-3 d-flex flex-wrap justify-content-center align-items-center">
                <div class="login-card card shadow" style="width:21rem;">
                    <div class="card-body">
                        <div class="login-card-header">
                            <h1>Iniciar sesion</h1>
                        </div>
                        <form action="controller/acceso/login.php" method="post" class="login-card-form">
                            <div class="form-item mb-3">
                                <span class="form-item-icon material-symbols-outlined">person</span>
                                <input class="form-control" type="text" name="dni" id="dni" required autocomplete='off' maxlength="8" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Ingresa tu DNI">
                            </div>
                            <div class="form-item mb-3">
                                <span class="form-item-icon  material-symbols-outlined">lock</span>
                                <input class="form-control" type="password" name="clave" id="clave" maxlength="6" required autocomplete='off' oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Ingresa tu clave">
                            </div>
                            <button type="submit">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col"></div>
            <div class="col mx-5 d-flex flex-wrap justify-content-center align-items-center">
                <div class="hours card" style="width:16rem;">
                    <div class="card-body date">
                        <div class="row  align-items-center">
                            <div class="col">
                                <h1 id="hora"></h1>
                            </div>
                            <div class="col">
                                <h1 id="min"></h1>
                            </div>
                            <div class="col two text-center">
                                <h1 id="second"></h1>                            
                                <h1 id="pre"></h1>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="view/static/login.js"></script>
