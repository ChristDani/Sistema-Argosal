<?php

require_once("model/masiva.php");

function listarMasiva($empezar,$cantidad)
{

    $empezar2 = $empezar;
    $cantidad2 = $cantidad;
    $consultas=new Masiva();

    $filas=$consultas->listarMasiva($empezar2,$cantidad2);

    //Cuenta el número total de registros
    $total_registros = $consultas->contarMasiva();
    //Obtiene el total de páginas existentes
    $total_paginas = ceil($total_registros / $cantidad);

    echo '<div class="campos">';
    echo "<div class='mostrar'>";
    echo "<label>Mostrar</label>";
    echo "<select>";
    echo "<option>10</option>";
    echo "<option>25</option>";
    echo "<option>50</option>";
    echo "<option>100</option>";
    echo "</select>";
    echo "<label>Registros.</label>";
    echo "</div>";
    echo "<button>Excel</i></button>";
    echo "<div class='buscar'>";
    echo "<label for='txtBuscar'>Buscar:</label>";
    echo "<input id='txtBuscar' type='text' placeholder='Buscar...'>";
    echo "</div>";
    echo '</div>';
    echo '<div class="tabla">';
    echo '<center><table border=1 width="100%">';
    echo '<thead>';
    echo '<tr>';
    echo '<th width="6%">N°</th>';
    echo '<th width="10%">Documento</th>';
    echo '<th width="10%">Nombres</th>';
    echo '<th width="10%">Celular</th>';
    echo '<th width="10%">F-Activacion</th>';
    echo '<th width="10%">Operador</th>';
    echo '<th width="10%">Plan</th>';
    echo '<th width="10%">Dirección</th>';
    echo '<th width="10%">Distrito</th>';
    echo '<th width="10%">Provincia</th>';
    echo '<th width="10%">Departamento</th>';
    echo '<th width="10%">Estado</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    if ($filas != null) 
    { $i=$empezar+1;
        foreach ($filas as $fila) 
        {
            echo "<tr>";
            echo "<td align='center'>$i</td>";
            echo "<td align='center'>$fila[0]</td>";
            echo "<td align='center'>$fila[1]</td>";
            echo "<td align='center'>$fila[3]</td>";
            echo "<td align='center'>$fila[4]</td>";
            echo "<td align='center'>$fila[5]</td>";
            echo "<td align='center'>$fila[6]</td>";
            echo "<td align='center'>$fila[7]</td>";
            echo "<td align='center'>$fila[8]</td>";
            echo "<td align='center'>$fila[9]</td>";
            echo "<td align='center'>$fila[10]</td>";
            echo "<td align='center'>$fila[12]</td>";
            echo "</tr>";
            $i+=1;
        }
    }
    else
    {
        echo "<tr>";
        echo "<td align='center' colspan=14 height='100px'>La tabla aún no contiene datos</td>";
        echo "</tr>";
    }
    echo '</tbody>';
    echo '</table></center>';
    echo '</div>';

    //Crea un bucle donde $i es igual 1, y hasta que $i sea menor o igual a X, a sumar (1, 2, 3, etc.)
    //Nota: X = $total_paginas
    echo "<div class='paginacion'>";
    $ini=$empezar+1;
    $fin=$empezar+10;
    echo "<div class='mensaje'><label>Mostrando Registros del $ini al $fin de un Total de $total_registros Registros.</label></div>";
    echo "<div class='pasar'>";
    if ($filas != null) 
    {
        if (isset($_GET["hojaM"]))
        {
            $hoja=$_GET["hojaM"];
            if ($hoja!=1) {
                echo "<button onclick='paginaAnterior();'>Anterior</button>";
            }
        }
        echo "<div class='numeros'>";
        for ($i=1; $i<=5; $i++) 
        {
            //En el bucle, muestra la paginación
            echo "<a href='index.php?pagina=clientes&hojaM=".$i."'>".$i."</a>";
        }
        echo "</div>";
        echo "<button onclick='paginaSiguiente();'>Siguiente</button>";
    }
    echo "</div>";
    echo "</div>"; 
    
}
?>