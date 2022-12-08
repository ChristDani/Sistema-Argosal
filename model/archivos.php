<?php
require_once "conexion.php";

class archivos
{
    public function insertarProductos($region,$nombre,$centro,$almacen,$nombreAlmacen,$material,$descripcion,$libres,$bloqueados)
    {
        $model=new conexion();
        $con=$model->conectar();
        
        $sql="exec sp_insertar_producto '$region','$nombre','$centro','$almacen','$nombreAlmacen','$material','$descripcion','$libres','$bloqueados'";

		$rs=sqlsrv_query($con,$sql);

		$con=$model->desconectar();
        return "Proceso realizado con éxito";
    }

    public function insertarCac($region,$pdv,$nombre,$entrega,$direccion,$distrito,$provincia,$departamento,$horario)
    {
        $model=new conexion();
        $con=$model->conectar();
        
        $sql="exec sp_insertar_cac '$region','$pdv','$nombre','$entrega','$direccion','$distrito','$provincia','$departamento','$horario'";

		$rs=sqlsrv_query($con,$sql);

		$con=$model->desconectar();
        return "Proceso realizado con éxito";
    }

    public function insertarDac($nombre,$distrito,$provincia,$departamento,$region,$direccion,$descripcion)
    {
        $model=new conexion();
        $con=$model->conectar();
        
        $sql="exec sp_insertar_dac '$nombre','$distrito','$provincia','$departamento','$region','$direccion','$descripcion'";

		$rs=sqlsrv_query($con,$sql);

		$con=$model->desconectar();
        return "Proceso realizado con éxito";
    }

    public function insertarAcd($region,$pdv,$nombre,$entrega,$pdvsisact,$codpdv,$descripcion,$direccion,$distrito,$provincia,$departamento,$horario,$estado,$alta,$baja)
    {
        $model=new conexion();
        $con=$model->conectar();
        
        $sql="exec sp_insertar_acd '$region','$pdv','$nombre','$entrega','$pdvsisact','$codpdv','$descripcion','$direccion','$distrito','$provincia','$departamento','$horario','$estado','$alta','$baja'";

		$rs=sqlsrv_query($con,$sql);

		$con=$model->desconectar();
        return "Proceso realizado con éxito";
    }

    public function insertarCadena($region,$razonsocial,$codigointer,$codpdv,$pdvsisact,$entrega,$direccion,$distrito,$provincia,$departamento,$dias,$horario,$estado)
    {
        $model=new conexion();
        $con=$model->conectar();
        
        $sql="exec sp_insertar_cadena '$region','$razonsocial','$codigointer','$codpdv','$pdvsisact','$entrega','$direccion','$distrito','$provincia','$departamento','$dias','$horario','$estado'";

		$rs=sqlsrv_query($con,$sql);

		$con=$model->desconectar();
        return "Proceso realizado con éxito";
    }

    public function insertarMasiva($documento,$nombre,$tel_Fijo,$celular,$fechaActivacion,$operador,$tipo_plan,$direccion,$distrito,$provincia,$departamento)
    {
        $model=new conexion();
        $con=$model->conectar();
        
        $sql="exec sp_insertar_masiva '$documento','$nombre','$tel_Fijo','$celular','$fechaActivacion','$operador','$tipo_plan','$direccion','$distrito','$provincia','$departamento'";

		$rs=sqlsrv_query($con,$sql);

		$con=$model->desconectar();
        return "Proceso realizado con éxito";
    }
}
?>