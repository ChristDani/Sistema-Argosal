<?php
require_once "conexion.php";

class metas
{
    public function listar()
    {
        $filas=null;
        $model=new conexion();
		$conexion=$model->conectar();
        $sql="select * from metas";
        $rs=sqlsrv_query($conexion,$sql);

        while($row=sqlsrv_fetch_array($rs))
		{
            $filas[]=$row;
        }
        
        $conexion=$model->desconectar();
        return $filas;
    }

    public function editar($portamen69,$portamay69,$altapost,$altaprepa,$portaprepa,$renovacion,$hfc_ftth,$ifi)
    {
        $model=new conexion();
        $con=$model->conectar();

        $sql="exec sp_editar_metas '$portamen69','$portamay69','$altapost','$altaprepa','$portaprepa','$renovacion','$hfc_ftth','$ifi'";

        $rs=sqlsrv_query($con,$sql);

		$con=$model->desconectar();
        return "Metas Actualizadas Satisfactoriamente...";
    }
}
?>