<?php 
    require_once('controller/masiva/listarMasiva.php'); 
    
    $cantidad_resultados_por_pagina = 10;
    //Comprueba si está seteado el GET de HTTP
    if (isset($_GET["hojaM"])) 
    {
        //Si el GET de HTTP SÍ es una string / cadena, procede
        if (is_string($_GET["hojaM"])) 
        {
            //Si la string es numérica, define la variable 'pagina'
            if (is_numeric($_GET["hojaM"])) 
            {
                //Si la petición desde la paginación es la página uno
                //en lugar de ir a 'index.php?pagina=1' se iría directamente a 'index.php'
                if ($_GET["hojaM"] == 1) 
                {
                    header("Location: index.php?pagina=clientes");
                    die();
                } 
                else 
                { //Si la petición desde la paginación no es para ir a la pagina 1, va a la que sea
                    $pagina = $_GET["hojaM"];
                };
            } 
            else 
            { //Si la string no es numérica, redirige al index (por ejemplo: index.php?pagina=AAA)
                header("Location: index.php?pagina=clientes");
                die();
            };
        };
    } 
    else 
    { //Si el GET de HTTP no está seteado, lleva a la primera página (puede ser cambiado al index.php o lo que sea)
        $pagina = 1;
    };

    //Define el número 0 para empezar a paginar multiplicado por la cantidad de resultados por página
    $empezar_desde = ($pagina-1) * $cantidad_resultados_por_pagina;

?>
<div id="masiva" class="contenedor">
    <div class="campos">
        <div class='mostrar'>
            <label>Mostrar</label>
            <select>
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
            <label>Registros.</label>
        </div>
        <button>Excel</i></button>
        <div class='buscar'>
            <label for='txtBuscar'>Buscar:</label>
            <input id='txtBuscar' type='text' placeholder='Buscar...'>
        </div>
    </div>
    <div class="tabla">
        <center>
            <table border=1 width="100%">
                <thead>
                    <tr>
                    <th width="6%">N°</th>
                    <th width="10%">Documento</th>
                    <th width="10%">Nombres</th>
                    <th width="10%">Celular</th>
                    <th width="10%">F-Activacion</th>
                    <th width="10%">Operador</th>
                    <th width="10%">Plan</th>
                    <th width="10%">Dirección</th>
                    <th width="10%">Distrito</th>
                    <th width="10%">Provincia</th>
                    <th width="10%">Departamento</th>
                    <th width="10%">Estado</th>
                    </tr>
                </thead>
                <tbody id='resultados'>
                    <?php listarMasiva($empezar_desde, $cantidad_resultados_por_pagina); ?>
</div>