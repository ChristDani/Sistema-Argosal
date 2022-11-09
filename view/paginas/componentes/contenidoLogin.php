<div class="body">
    <div class="row">
        <div class="col">
            <div class="card text-center" id="date">
                <div class="card-body date">
                    <div class="row align-items-center">
                        <div class="col">
                            <h1 id="hora"></h1>
                        </div>
                        <div class="col">
                            <h1 id="min"></h1>
                        </div>
                        <div class="two col text-center">
                            <h1 id="second"></h1>                            
                            <h1 id="pre"></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="login-card-container">
                <div class="login-card">
                    <div class="login-card-header">
                        <h1>Iniciar sesion</h1>
                    </div>
                    <form action="controller/acceso/login.php" method="post" class="login-card-form">
                        <div class="form-item">
                            <span class="form-item-icon material-symbols-outlined">person</span>
                            <input type="text" name="dni" id="dni" required autocomplete='off' maxlength="8" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Ingresa tu DNI">
                        </div>
                        <div class="form-item">
                            <span class="form-item-icon material-symbols-outlined">lock</span>
                            <input type="password" name="clave" id="clave" maxlength="6" required autocomplete='off' oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Ingresa tu clave">
                        </div>
                        <button type="submit">Entrar</button>
                    </form>
                </div>
            </div>
        </div>

    </div>    
</div>

<script src="view/static/login.js"></script>



