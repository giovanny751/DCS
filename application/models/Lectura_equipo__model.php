<?php 
require_once("lib/nusoap.php");

class Lectura_equipo__model extends CI_Model {
/**
 *
 * @package     NYGSOFT
 * @author      Gerson J Barbosa / Nelson G Barbosa
 * @copyright   www.nygsoft.com
 * @celular     301 385 9952 - 312 421 2513
 * @email       javierbr12@hotmail.com    
 */
    function __construct() {
        parent::__construct();
    }
    function save_lectura_equipo($post){
        if(isset($post['campo'])){ 
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $id=$post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('lectura_equipo',$post);
        }else{
            $this->db->insert('lectura_equipo',$post);
            $id=$this->db->insert_id();
        }
        return $id;
        
    }
    function delete_lectura_equipo($post){
        $this->db->set('ACTIVO','N');
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $this->db->update('lectura_equipo');
    }
    function edit_lectura_equipo($post){
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $datos=$this->db->get('lectura_equipo',$post);
        return $datos=$datos->result();
    }
	
	function soap_ws($post){
		//echo 'Hola mundo';
		//var_dump($post);
		//$cedula=$post["cedula"];
		//var_dump('HOLAAAAA',$cedula);
		//exit;
		
		$client = new soapclient("http://telemetria.sgm.com.co/soap_prueba.php?wsdl");
		$versoap = $client->getProxy();

		try{
		
			$cedula='' ;
			$lectura='' ;
			$serial='' ;
			$variable='' ;
			  
			if(isset($post["cedula"])){ $cedula=$post["cedula"];} 
			if(isset($post["variable"])){ $variable=$post["variable"];} 
			if(isset($post["serial"])){ $serial=$post["serial"]; }
			if(isset($post["lectura"])){ $lectura=$post["lectura"]; } 
			$fecha=date("Y-m-d H:i:s");
			
			//$result = $client->getinsertlectura($fecha,$serial,$cedula,$variable,$lectura);
			$result = $versoap->getinsertlectura($fecha,$serial,$cedula,$variable,$lectura);
			
			
		}catch (SoapFault $exception) 
		{
				trigger_error("SOAP Fault: (faultcode: {$exception->faultcode}, faultstring:
				{$exception->faultstring})");

				var_dump($exception);
				//	echo 'EXCEPTION='.$exception; 
		}  
		
			
	}
    function consult_lectura_equipo($post){
            if(isset($post['id_lectura_equipo']))
        if($post['id_lectura_equipo']!="")
        $this->db->like('id_lectura_equipo',$post['id_lectura_equipo']);
                    if(isset($post['id_paciente']))
        if($post['id_paciente']!="")
        $this->db->like('id_paciente',$post['id_paciente']);
                    if(isset($post['id_equipo']))
        if($post['id_equipo']!="")
        $this->db->like('id_equipo',$post['id_equipo']);
                    if(isset($post['variable_codigo']))
        if($post['variable_codigo']!="")
        $this->db->like('variable_codigo',$post['variable_codigo']);
                    if(isset($post['lectura_numerica']))
        if($post['lectura_numerica']!="")
        $this->db->like('lectura_numerica',$post['lectura_numerica']);
                    if(isset($post['lectura_texto']))
        if($post['lectura_texto']!="")
        $this->db->like('lectura_texto',$post['lectura_texto']);
                    if(isset($post['fecha_creacion']))
        if($post['fecha_creacion']!="")
        $this->db->like('fecha_creacion',$post['fecha_creacion']);
                    if(isset($post['activo']))
        if($post['activo']!="")
        $this->db->like('activo',$post['activo']);
                    if(isset($post['serial_equipo']))
        if($post['serial_equipo']!="")
        $this->db->like('serial_equipo',$post['serial_equipo']);
                                    $this->db->select('id_lectura_equipo');
                                $this->db->select('id_paciente');
                                $this->db->select('id_equipo');
                                $this->db->select('variable_codigo');
                                $this->db->select('lectura_numerica');
                                $this->db->select('lectura_texto');
                                $this->db->select('serial_equipo');
                        $this->db->where('ACTIVO','S');
        $datos=$this->db->get('lectura_equipo');
        $datos=$datos->result();
        return $datos;
    }
}
?>
