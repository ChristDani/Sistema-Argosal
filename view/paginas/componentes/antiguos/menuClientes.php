<div class="menu">
    <hgroup><h2>Elija el origen de los datos.</h2></hgroup>
    <div class="botones">
        <button onclick="mostrarWhats();">Whatsapp</button>
        <?php
            if ($tipoU == 'Administrador') {
                echo "<button onclick='mostrarMasi();'>Masiva</button>";
            }
        ?>
        <button onclick="mostrarLand();">Landing</button>
    </div>
</div>