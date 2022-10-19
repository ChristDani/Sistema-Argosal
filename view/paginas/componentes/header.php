<header>
    <div class="logo">
        <img src="view/static/img/logo-claro.png">
    </div>
    <?php
    if ($tipoU == 'director') {
        echo '<ul>';
        echo "<li><a href='index.php?pagina=clientes&dni=$dni'>Clientes</a></li>";
        echo "<li><a href='index.php?pagina=equipos&dni=$dni'>Equipos</a></li>";
        echo '</ul>';
    }
    ?>
</header>