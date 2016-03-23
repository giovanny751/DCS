<?php

require_once("lib/nusoap.php");

//crearConexion();
 function crearConexion(){
        //Creaci�n de la conexi�n, nuevo objeto mysqli
        $conexion = new mysqli('localhost', 'root', 'hdevT3l3m3tr14$2015', 'telemetria');  
        //Si sucede alg�n error se imprime lo sucedido
        if($conexion->connect_error){
            die("Error en la conexion : ".$conexion->connect_errno.
                                      "-".$conexion->connect_error);
        }
        else
		{
			//Si nada sucede retornamos la conexi�n
				//echo 'Conectado correctamente';
			
			// Collation

			//como estaba colocando problemas con el cotejaamiento O colleccion de datos
			//se  aplique esto SOLO UNA VEZ  para todas las tablas,
			//de esta forma se pueden realizar los insert sin problemas.
			//retirar el comentario desde la siguiente l�nea
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
$server->register("getconsultaequipo",array('cedula' => 'xsd:string','invitado' => 'xsd:string','pin' => 'xsd:string'),
array("return" => "xsd:string"),"urn:eq","urn:eq#getconsultaequipo");

function gethelloworld($name) {
$myname    =    "My Name Is <b>".$name . "</b>";
return $myname;
}


function autenticacion($username, $password,$valor) {
	$con = crearConexion();
if(isset($username) and isset($password) )
          {
           //Aqu� se ccompara lo que se envia en la cabecear con la informaci�n dentro de la base de datos    
			$sql="SELECT sha1(dev_user) as dev_user,dev_pass FROM ws_data ";
		
		if($valor==2){
			$sql = $sql." WHERE id=2";
		}
		//return $sql; exit;
		
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
					$registros['registros'][1]='Error al intentar la inserci�n';
					//return false;
				}
			}else {
				/*Registro para Brigadas viene sin cedula por lo que el registro se debe hacer en la tabla sin inconvenientes*/
				
				$sqlinsert="INSERT INTO lectura_equipo(fecha_creacion,serial_equipo,variable_codigo,lectura_numerica) VALUES ('".$fecha."','".$serial."','".$variable."','".$lectura."')";
				
				$resultado=$con->query($sqlinsert);
			
				if($resultado){
					$registros['registros'][0]='1';
					$registros['registros'][1]='Grabado con exito, brigada';
			
				}else{
					$registros['registros'][0]='0';
					$registros['registros'][1]='Error al intentar la inserci�n';
			
				}
				
				//$registros['registros'][0]='0';
				//$registros['registros'][1]='No se encuentra Paciente';
				//return false;
			}
			
			 
		
	}else{
		$registros['registros'][0]='0';
		$registros['registros'][1]='Usuario No Autorizado';
	}
	 return json_encode($registros);
}

function getconsultaequipo($cedula,$usuario,$password) {
	$registros= array();
	$contador=0;
	//return 'hola';
	$valor=2;
	$login=autenticacion($usuario,$password,$valor);
	//return $login;
	if ($login){
		$con = crearConexion(); 	
			$cant=0;
			$sql="SELECT id_paciente AS id FROM pacientes WHERE cedula_paciente='".$cedula."'";
			$idpaciente=$con->query($sql)->fetch_object()->id;
			$res=$con->query($sql);
			
			if($idpaciente>0){
				
				$sqlconsulta="SELECT  e.descripcion,e.serial FROM equipos e
								INNER JOIN paciente_equipo_tipoequipo pe ON pe.id_equipo=e.id_equipo
								WHERE pe.id_paciente=".$idpaciente;
				
				//return $sqlconsulta;
			
				$resultado=$con->query($sqlconsulta);
				$retorno='';
				//$registros[0]='';
				if($resultado){
						while ($fila = $resultado->fetch_assoc()) {
				
							if($contador==0) {
								//$registros[0]=$fila['descripcion'].','.$fila['serial'];
								$retorno=$fila['descripcion'].','.$fila['serial'];
							}
							else {
								//$registros[0]=$registros[0].';'.$fila['descripcion'].','.$fila['serial'];
								$retorno=$retorno.';'.$fila['descripcion'].','.$fila['serial'];
							}
							$contador++;
						}
				/*
				 * 
				 /* //funciona pero no se si quiere la estrutura de array
				 $registros['registros'][0]='';
				if($resultado){
						while ($fila = $resultado->fetch_assoc()) {
				
							if($contador==0) $registros['registros'][0]=$fila['descripcion'].','.$fila['serial'];
							else $registros['registros'][0]=$registros['registros'][0].';'.$fila['descripcion'].','.$fila['serial'];
								
							$contador++;
						}
				 * /
				 * 
				 * */
				}else{
					$registros['registros'][0]='0';
					$registros['registros'][1]='Error en la consulta';
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
	 //return json_encode($registros);
	 if($registros['registros'][0]=='0') return json_encode($registros);
	 else	 return $retorno;
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>


