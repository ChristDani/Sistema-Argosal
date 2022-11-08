<header>
    <div class="logo">
        <img src="view/static/img/logo-claro.png">
    </div>
    <ul>
    <?php
    if ($tipoU == 'director') {
        echo "<li><a href='index.php?pagina=clientes&dni=$dni'>Clientes</a></li>";
        echo "<li><a href='index.php?pagina=equipos&dni=$dni'>Equipos</a></li>";
        echo "<li><a href='index.php?pagina=metas&dni=$dni'>Metas</a></li>";
    }
    ?>
    <li><a href="controller/acceso/logout.php"><span class="material-symbols-outlined">logout</span></a></li>
    </ul>
</header>