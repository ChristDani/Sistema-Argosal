<?php
require_once "conexion.php";

class equipos
{
    public function listar()
    {
        $filas=null;
        $model=new conexion();
		$conexion=$model->conectar();
        $sql="select descripcion from productos GROUP BY descripcion HAVING COUNT(*)>=1 order by descripcion asc";
        $rs=sqlsrv_query($conexion,$sql);

        while($row=sqlsrv_fetch_array($rs))
		{
            $filas[]=$row;
        }
        
        $conexion=$model->desconectar();
        return $filas;
    }
}
?>