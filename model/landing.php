<?php
require_once "conexion.php";

class Landing
{

    public function listarLanding($empieza,$cantidad)
    {

        $cantidad2=$cantidad;
        $empieza2=$empieza;

        $filas=null;
        $model=new conexion();
        $conexion=$model->conectar();
        $sql="SELECT * FROM landing order by documento offset $empieza2 rows fetch next $cantidad2 rows only";
        $rscat=sqlsrv_query($conexion,$sql);
        while($row=sqlsrv_fetch_array($rscat))
        {
            $filas[]=$row;
        }
        $conexion=$model->desconectar();
        return $filas;

    }

    public function contarLanding()
    {

        $filas=null;
        $model=new conexion();
        $conexion=$model->conectar();
        $sql="SELECT * FROM landing";
        $rscat=sqlsrv_query($conexion,$sql);
        while($row=sqlsrv_fetch_array($rscat))
        {
            $filas[]=$row;
        }
        $conexion=$model->desconectar();
        if ($filas != null){
            return count($filas);
        }else {
            return 0;
        }
    }

}

?>