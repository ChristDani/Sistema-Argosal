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

    if ($filas != null) 
    {
        $i=$empezar+1;
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
                echo "<button id='anterior'>Anterior</button>";
            }
        }
        echo "<ul id='paginador'>";
        for ($i=1; $i<=10; $i++) 
        {
            //En el bucle, muestra la paginación
            // echo "<li><a href='index.php?pagina=clientes&hojaM=$i'>$i</a></li>";
            echo "<li><a data-pagina='$i'>$i</a></li>";
        }
        echo "</ul>";
        echo "<button id='siguiente'>Siguiente</button>";
        // echo "<button onclick='Siguiente();'>Siguiente</button>";
    }
    echo "</div>";
    echo "</div>"; 

    function Sigiuente(){
        if (isset($_GET["hojaM"])) 
        {
            header("Location: index.php?pagina=clientes&hojaM=2");
        }
        else{
            header("Location: index.php?pagina=clientes&hojaM=3");
        }
    }
    
}
?>