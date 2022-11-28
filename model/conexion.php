<?php

	class conexion
	{

		public function conectar()
		{
			
			// alejandro
			// $server= "192.168.0.41";
			// $conexion=array("Database"=>"Argosal",
			// "UID"=>"sa",
			// "PWD"=>"123456",
			// "CharacterSet"=>"UTF-8");
			
			// oliver
			$server="localhost";
			$conexion=array("Database"=>"Argosal",
							"UID"=>"sa",
							"PWD"=>"123456",
							"CharacterSet"=>"UTF-8");

			// christian
			// $server="192.168.0.233";
			// $conexion=array("Database"=>"Argosal",
			// 				"UID"=>"paraclase",
			// 				"PWD"=>"12345",
			// 				"CharacterSet"=>"UTF-8");

			$con=sqlsrv_connect($server,$conexion);

			if ($con) 
			{

				return $con;

			}
			else
			{
				echo "Fallo en la conexion con el primer servidor...";
				die( print_r( sqlsrv_errors(), true));

			}
			

		}

		public function desconectar()
		{

			$con=null;
			return $con;

		}

	}


?>