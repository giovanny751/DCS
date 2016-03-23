<?php

require_once("lib/nusoap.php");

//crearConexion();
 function crearConexion(){
        //Creación de la conexión, nuevo objeto mysqli
        $conexion = new mysqli('localhost', 'root', 'hdevT3l3m3tr14$2015', 'telemetria');  
        //Si sucede algún error se imprime lo sucedido
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

			/*	$result=$conexion->query('show tables');
				while($tables = $result->fetch_assoc()) {

					foreach ($tables as $key => $value) {
						$conexion->query("ALTER TABLE ".$value." CONVERT TO CHARACTER SET latin1 COLLATE latin1_general_ci");
					}
				}
				
				echo "Successfull collation change!";
				*/
				
				return $conexion;
		}
        
}

$server = new soap_server();
$server->configureWSDL("Testing WSDL","urn:Testing_WSDL");

$server->register("gethelloworld",array("name" => "xsd:string"),array("return" => "xsd:string"),"urn:helloworld","urn:helloworld#gethelloworld");
$server->register("getinsertlectura",array('fecha' => 'xsd:string','serial' => 'xsd:string','cedula' => 'xsd:string','variable' => 'xsd:string','lectura' => 'xsd:string','usuario' => 'xsd:string','password' => 'xsd:string'),
array("return" => "xsd:string"),"urn:prueba","urn:prueba#getinsertlectura");

function gethelloworld($name) {
$myname    =    "My Name Is <b>".$name . "</b>";
return $myname;
}


function autenticacion($username, $password) {
	$con = crearConexion();
if(isset($username) and isset($password) )
          {
           //Aquí se ccompara lo que se envia en la cabecear con la información dentro de la base de datos    
			$sql="SELECT sha1(dev_user) as dev_user,dev_pass FROM ws_data";
		
	//return $res=$con->query($sql);
			$res=$con->query($sql);
			
			$usuario="";
			$clave="";
			//if($con->errno) die($con->errno);

			while ($fila = $res->fetch_assoc()) {
				
				$usuario=$fila['dev_user'];
				$clave= $fila['dev_pass'];
    
			}


           if($username==$usuario and $password==$clave )
                return true;
           else
               return  false;                   

           }
}

function getinsertlectura($fecha,$serial,$cedula,$variable,$lectura,$usuario,$password) {
	$registros= array();
	//return 'hola';
	$login=autenticacion($usuario,$password);
	//return $login;
	if ($login){
			
			$con = crearConexion(); 	
			$cant=0;
			$sql="SELECT id_paciente AS id FROM pacientes WHERE cedula_paciente='".$cedula."'";

			//$res=$con->query($sql);
			//$idpaciente=mysql_result($res, 0);
			$idpaciente=$con->query($sql)->fetch_object()->id;
			$res=$con->query($sql);
			//return $idpaciente;			
			if($idpaciente>0){
				
				$sqlinsert="INSERT INTO lectura_equipo(fecha_creacion,id_paciente,serial_equipo,variable_codigo,lectura_numerica) VALUES ('".$fecha."','".$idpaciente."','".$serial."','".$variable."','".$lectura."')";
				//return $sqlinsert;
				//$resultado=mysql_query($sqlinsert);
				$resultado=$con->query($sqlinsert);
			//return $resultado;
				if($resultado){
					$registros['registros'][0]='1';
					$registros['registros'][1]='Grabado con exito';
				//	return true;
				}else{
					$registros['registros'][0]='0';
					$registros['registros'][1]='Error al intentar la inserción';
					//return false;
				}
			}else {
				$registros['registros'][0]='0';
				$registros['registros'][1]='No se encuentra Paciente';
				//return false;
			}
			
			 
		
	}else{
		$registros['registros'][0]='0';
		$registros['registros'][1]='Usuario No Autorizado';
	}
	 return json_encode($registros);
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>


