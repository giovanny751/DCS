<?php

class AsInforme__model extends CI_Model {
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
   	
	function todosLosProcedimientos(){
		//select * from parts order by id desc		
		  $this->db->where("partsgroup_id",1);
		  $datos=$this->db->get('parts');
		return $datos=$datos->result();		
	}
	
	function medicosPorProcedimiento($id_proc){	
		$this->db->where("id_proc_parts",$id_proc);	
		$this->db->join("as_medicos","as_medicos.id = as_medicos_parts.id_medico");
		//$this->db->left_join("as_citas","as_citas.id_medico = as_medicos.id ");
		$datos=$this->db->get('as_medicos_parts');
		return $datos=$datos->result();		
	}
	
	function plantillasDelProcedimiento($id_proc){	
		$this->db->where("id_proc_parts",$id_proc);	
		$this->db->join("parts","parts.id = as_plantillas.id_proc_parts");		
		$datos=$this->db->get('as_plantillas');
		return $datos=$datos->result();		
	}

	
	function insertarCita($post,$files,$id_paciente,$cedula){
		$id_procedimiento=$post['procedimientos'];
			//var_dump("archivo :",$campo,"concepto: ");			
			//var_dump($arreglo_archivos['name']);
			
		//inserta cita	
		$this->db->set('id_paciente',$id_paciente);
        $this->db->set('cedula',$cedula);
        $this->db->set('id_medico',$post['id_medico']);
        $this->db->set('id_proc_parts',$post['procedimientos']);
        $this->db->set('fecha',date('Y-m-d h:i'));
        $this->db->set('fecha_fin',date('Y-m-d h:i'));
        $this->db->set('estado',1);
        $this->db->set('created_at',date('Y-m-d h:i'));
        //$this->db->set('created_by',date('Y-m-d h:i'));
        $this->db->insert('as_citas');
		$id_cita=$this->db->insert_id();
		
		//inserta atencion
		$this->db->set('id_cita',$id_cita);
		$this->db->set('fecha_llegada',date('Y-m-d h:i'));
		//$this->db->set('id_customer',$post['id_medico']); ??eps
		$this->db->set('estado',1);        
        $this->db->set('created_at',date('Y-m-d h:i'));        
        $this->db->insert('as_atencion_pacientes');
		$id_atencion=$this->db->insert_id();
		
		//insertar el informe		
		$this->db->set('id_atencion',$id_atencion);
		$this->db->set('cedula',$cedula);
		$this->db->set('fecha',date('Y-m-d h:i'));		
		$this->db->set('estado',1);        
        $this->db->set('created_at',date('Y-m-d h:i'));        
        $this->db->insert('as_informe');
		$id_informe=$this->db->insert_id();
		
		
		//insertar detalle de informe.. que no son files	
		foreach($post as $campo=>$concepto){			 
		  $prefijo=substr($campo,0,3);			
			if($prefijo=="pl_"){ //es plantilla				
				 $nombre_campo=substr($campo,3);
				
				//buscar el identificador de la plantilla a travès del nombre del campo y del procedimiento
				$this->db->where("id_proc_parts",$post['procedimientos']);
				$this->db->where("nombre_campo",$nombre_campo);
		        $datos=$this->db->get('as_plantillas');
				
				$datos=$datos->result();
				foreach($datos as $key){
				  $id_plantilla= $key->id;
				}				
				//insertar detalle de informe		
				$this->db->set('id_informe',$id_informe);
				$this->db->set('id_plantilla',$id_plantilla);
				$this->db->set('concepto',$concepto);				
				$this->db->insert('as_detalle_informe');									
			}
		}
			
		//insertar detalle de informe.. que son files	
		foreach($files as $campo=>$arreglo_archivos){		
			$prefijo=substr($campo,0,3);
			$nombre_campo=substr($campo,3);	
			if($prefijo=="pl_"  and $arreglo_archivos['name']!=""){ //es plantilla	
			
			   //buscar el identificador de la plantilla a travès del nombre del campo y del procedimiento
				$this->db->where("id_proc_parts",$post['procedimientos']);
				$this->db->where("nombre_campo",$nombre_campo);
		        $datos=$this->db->get('as_plantillas');
				
				$datos=$datos->result();
				foreach($datos as $key){
				 $id_plantilla= $key->id;
				 $directorio= $key->directorio_imagen;
				}				
				
				
			  //bajar archivo al dd
			    $tempFile=$arreglo_archivos['tmp_name'];
			    $targetPath=$_SERVER['DOCUMENT_ROOT']."/images/".$directorio;
                $nombre_archivo=$id_informe."_".$id_plantilla."_".$arreglo_archivos['name']; //con id del inf + id dr plantilla para identificar			 
	            $targetFile = rtrim($targetPath,'/') . '/'.$nombre_archivo;
			  if(move_uploaded_file($tempFile,$targetFile)){
				  //insertar detalle de informe		
				$this->db->set('id_informe',$id_informe);
				$this->db->set('id_plantilla',$id_plantilla);
				$this->db->set('concepto',$arreglo_archivos['name']);	//nombre real		
				$this->db->set('observaciones',$nombre_archivo); 	//identif del archivo subido		
				$this->db->insert('as_detalle_informe');								
			  }			  				
		    }			
		}
			
    }
	
	
	function traerDatosInforme($id){
		$this->db->where("id",$id);
		$datos=$this->db->get('as_informe');
		return $datos=$datos->result();	
	}
	
}