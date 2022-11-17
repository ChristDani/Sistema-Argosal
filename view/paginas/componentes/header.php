<header>
    <div class="logo">
        <img src="view/static/img/logo-claro.png">
    </div>
    <ul class="listado">
    <?php
        echo "<li><a href='index.php?pagina=clientes&dni=$dni'><span class='material-symbols-outlined'>groups</span>Clientes</a></li>";
        echo "<li><a href='index.php?pagina=equipos&dni=$dni'><span class='material-symbols-outlined'>inventory</span>Productos</a></li>";
    if ($tipoU == 'director') {
        echo "<li><a href='index.php?pagina=metas&dni=$dni'><span class='material-symbols-outlined'>monitoring</span>Metas</a></li>";
        echo "<li><a href='index.php?pagina=progreso&dni=$dni'><span class='material-symbols-outlined'> insights</span>Progreso</a></li>";
    }
    ?>
    </ul>
    <ul class="saliiir">
    <li><span class="material-symbols-outlined">account_circle</span><?php echo $tusu; ?></li>
    <li><a href="controller/acceso/logout.php"><span class="material-symbols-outlined">logout</span>Salir</a></li>
    </ul>
</header>