<?php

/*$conexion = new mysqli('localhost', 'root', 'hdevT3l3m3tr14$2015', 'telemetria');  
if($conexion->connect_error){
            die("Error en la conexion : ".$conexion->connect_errno.
                                      "-".$conexion->connect_error);
        }
        else
		{
			//Si nada sucede retornamos la conexión
				//echo 'Conectado correctamente';
			
			// Collation

			//como estaba colocando problemas con el cotejaamiento O colleccion de datos
			//se  aplique esto SOLO UNA VEZ  para todas las tablas,
			//de esta forma se pueden realizar los insert sin problemas.
			//retirar el comentario desde la siguiente línea
			///* hasta que encuentre el echo "Successfull collation change!"*/
			//Una vez se ejecute el soap con el cliente se vuelve a comentar las lineas

	/*			$result=$conexion->query('show tables');
				while($tables = $result->fetch_assoc()) {

					foreach ($tables as $key => $value) {
						$conexion->query("ALTER TABLE ".$value." CONVERT TO CHARACTER SET latin1 COLLATE latin1_general_ci");
					}
				}
				
				echo "Successfull collation change!";
				
				
				//return $conexion;
		}
	*/
	
include("lib/nusoap.php");
//$client = new soapclient("http://127.0.0.1/soap/soap_prueba.php?wsdl");
$client = new nusoap_client("http://homecaredev.dcsdigital.com/soap_prueba_sgm.php?wsdl", 'wsdl');
$pass='C0l0mb14$wsroot';
$user='0s04r0wst3l3m3tr14';


	try{
		//$result = $client->getlecturaequipo(14);
		//fecha, serial, cedula, variable, lectura 5626228220=id:13
		
		//$client->getinsertlectura('2015-09-10','87866jjjbsayh','5626228220','67','98');
		//$client->setCredentials(sha1($user),sha1($pass),"basic");
		//$result = $client->getinsertlectura('2015-09-10','87866jjjbsayh','5626228220','67','98');
	
		//$result = $client->call('getinsertlectura', array('2015-12-10','87866jjjbsayh','5626228220','67','98',sha1($user),sha1($pass)));
		
		$result = $client->call('getconsultaequipo', array('5626228220',sha1($user),sha1($pass)));
	

		//echo $result;
	}catch (SoapFault $exception) 
	{
			trigger_error("SOAP Fault: (faultcode: {$exception->faultcode}, faultstring:
			{$exception->faultstring})");

			var_dump($exception);
				//				echo 'EXCEPTION='.$exception; 
	}  
         
echo "<pre>";

var_dump($result);
echo "</pre>";

?>


