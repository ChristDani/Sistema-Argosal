<?php

if ($_FILES['masiva']['name']) 
{
    $masiva = $_FILES['masiva']['name'];
        $dirt = "../../view/static/archivos/masiva/".$masiva;
        copy($_FILES['masiva']['tmp_name'],$dirt);
}

if ($_FILES['productos']['name']) 
{
    $producto = $_FILES['productos']['name'];
        $dirt = "../../view/static/archivos/productos/".$producto;
        copy($_FILES['productos']['tmp_name'],$dirt);
}

if ($_FILES['cac']['name']) 
{
    $cac = $_FILES['cac']['name'];
        $dirt = "../../view/static/archivos/ubicaciones/".$cac;
        copy($_FILES['cac']['tmp_name'],$dirt);
}

if ($_FILES['dac']['name']) 
{
    $dac = $_FILES['dac']['name'];
        $dirt = "../../view/static/archivos/ubicaciones/".$dac;
        copy($_FILES['dac']['tmp_name'],$dirt);
}

if ($_FILES['acd']['name']) 
{
    $acd = $_FILES['acd']['name'];
        $dirt = "../../view/static/archivos/ubicaciones/".$acd;
        copy($_FILES['acd']['tmp_name'],$dirt);
}

if ($_FILES['cadena']['name']) 
{
    $cadena = $_FILES['cadena']['name'];
        $dirt = "../../view/static/archivos/ubicaciones/".$cadena;
        copy($_FILES['cadena']['tmp_name'],$dirt);
}
?>