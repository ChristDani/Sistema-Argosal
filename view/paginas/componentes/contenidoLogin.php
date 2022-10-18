<div class="banner">
    <img src="view/static/img/icono1.png" alt="Argosal">
</div>
<div class="formLogin">
    <a href="index.php"><img src="view/static/img/icono5.png" alt=""></a>
    <h2 class="form__container__title">Inicio de Sesion</h2>
    <form action="controller/acceso/login.php" method="post">
        <label for="dni">
            <span id="subir">Ingresa tu DNI:</span>
            <input type="text" name="dni" id="dni" required autocomplete='off' maxlength="8" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
        </label>

        <label for="clave">
            <span id="subir">Ingresa tu Clave:</span>
            <input type="password" name="clave" id="clave" maxlength="6" required autocomplete='off' oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
        </label>

        <input class="btnLogin" type="submit" value="Entrar">
    </form>
</div>