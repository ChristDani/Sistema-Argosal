<?php

	class conexion
	{

		public function conectar()
		{			
			
			$server="localhost";
			$conexion=array("Database"=>"Argosal",
							"UID"=>"sa",
							"PWD"=>"123456",
							"CharacterSet"=>"UTF-8");

			$con=sqlsrv_connect($server,$conexion);

			if ($con) 
			{
				return $con;
			}
			// else
			// {
			// 	echo "Fallo en la conexion con el primer servidor...";
			// 	die( print_r( sqlsrv_errors(), true));
			// }
		}

		public function desconectar()
		{
			$con=null;
			return $con;
		}
	}
?>