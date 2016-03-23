<?php

class Parts__model extends CI_Model {
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
    function cantidadroles($id){        
        $this->db->select('roles.rol_id,rol_nombre');
        $this->db->distinct('roles.rol_id,rol_nombre');
        $this->db->where('permisos.usu_id',$id);
        $this->db->join('permisos','permisos.rol_id = roles.rol_id');
        $roles = $this->db->get('roles');
        return $roles->result_array();
    }
    
    function roles(){
        
        $consulta = $this->db->get('roles');
        return $consulta->result_array();
    }
    
    function guardarrol($nombre){
        $this->db->set('rol_nombre',$nombre[]);
        $this->db->insert('roles');
        return $this->db->insert_id();
    } 
    function insertapermisos($insert){
        $this->db->insert_batch('permisos_rol',$insert);
    }
    
    function eliminarrol($id){
        $this->db->where('rol_id',$id);
        $this->db->insert('roles');
    }
    function eliminpermisosrol($idrol){
        $this->db->where('rol_id',$idrol);
        $this->db->delete('permisos_rol');
    }
    function rolxusuario($usu_id){
        $this->db->where("rol_estado",1);
        $this->db->where("permisos.usu_id",$usu_id);
        $this->db->join("permisos","permisos.rol_id = roles.rol_id");
        $rol = $this->db->get("roles");
        return $rol->result();
    }
	
	function todosLosProcedimientos(){
		//select * from parts order by id desc		
		  $this->db->where("partsgroup_id",1);
		  $datos=$this->db->get('parts');
		return $datos=$datos->result();		
	}
	
	function medicosPorProcedimiento($id_proc,$id_medico=null){	
		$this->db->select("m.medico_codigo as id,m.nombre as medico,count(c.id) as cant");	
		$this->db->where("mp.id_proc_parts",$id_proc);
		$this->db->where("m.activo='S'");
		if($id_medico)		
			$this->db->where("mp.id_medico",$id_medico);		
		
		$this->db->join("medicos m","m.medico_codigo = mp.id_medico");
		$this->db->join("as_citas c","c.id_medico = m.medico_codigo and c.estado <3 ",'left');
		$this->db->group_by("m.medico_codigo");
		$datos=$this->db->get('as_medicos_parts mp');	
//echo $this->db->last_query();			
		return $datos=$datos->result();		
	}
	
	function plantillasDelProcedimiento($id_proc,$documento, $id_informe=null){		
		if($documento=="registro") 
			$this->db->where("tipo_doc",1);
		if($documento=="informe")//para traer datos ya guardados			
			 $this->db->join("as_detalle_informe di","di.id_plantilla=as_plantillas.id and di.id_informe=$id_informe ",'left');			
			 
		$this->db->where("id_proc_parts",$id_proc);			
		$this->db->join("parts","parts.id = as_plantillas.id_proc_parts");		
		$this->db->order_by("as_plantillas.tipo_doc,as_plantillas.orden");			
		$datos=$this->db->get('as_plantillas');	
//echo $this->db->last_query();		
		return $datos=$datos->result();		
	}

	/*Inserta la cita con su respectiva atencion e informe*/
	function insertarCita($post,$files){  //print "Noooo";  exit;
		$id_procedimiento=$post['procedimientos'];
			//var_dump("archivo :",$campo,"concepto: ");			
			//var_dump($arreglo_archivos['name']);
			
		//inserta cita	
		$this->db->set('id_paciente',$post['id_paciente']);
        $this->db->set('cedula',$post['cedula']);
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
		$this->db->set('cedula',$post['cedula']);
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
				
				
			  //subir archivo al dd
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
	
	function modificarRegistro($post,$files){
		//var_dump($post,"<hr>",$files);exit;		
		//modificar cita
		if($post['estado']==1){ //si no se pide anular se modifican los campos
			$this->db->set('id_medico',$post['id_medico']);
			$this->db->set('id_proc_parts',$post['procedimientos']);			
			$this->db->set('updated_at',date('Y-m-d h:i'));
			//$this->db->set('updated_by','1');				
		}
		$this->db->set('estado',$post['estado']);
		$this->db->where('id',$post['id_cita']);
		$this->db->update('as_citas');		
		
		//modificar plantillas ...detalle de informe.. que no son files	
		if($post['estado']==1){
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
				//modificar detalle de informe				
				$this->db->set('concepto',$concepto);				
				$this->db->where('id_informe',$post['id_informe']);				
				$this->db->where('id_plantilla',$id_plantilla);				
				$this->db->update('as_detalle_informe');									
			  }
		    }
	    }
		
		
		//modificar detalle de informe.. que son files	
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
							
			  //subir archivo al dd
			    $tempFile=$arreglo_archivos['tmp_name'];
			    $targetPath=$_SERVER['DOCUMENT_ROOT']."/images/".$directorio;
                $nombre_archivo=$post['id_informe']."_".$id_plantilla."_".$arreglo_archivos['name']; //con id del inf + id dr plantilla para identificar			 
	            $targetFile = rtrim($targetPath,'/') . '/'.$nombre_archivo;
			  if(move_uploaded_file($tempFile,$targetFile)){
				  //modificar detalle de informe		
				$this->db->set('concepto',$arreglo_archivos['name']);	//nombre real		
				$this->db->set('observaciones',$nombre_archivo); 	//identif del archivo subido	
				$this->db->where('id_informe',$post['id_informe']);				
				$this->db->where('id_plantilla',$id_plantilla);				
				$this->db->update('as_detalle_informe');							
			  }else { print "No se puede mover el archivo";			
				exit;	}		  
		    }			
		}
	}
	
	/*encuentra la informaciòn de un registro*/
	function traerDatosInforme($id){
		$this->db->select("i.id,i.estado,i.fecha,c.cedula,c.id_medico,pa.nombres,pa.apellidos,pa.fecha_nacimiento,pa.estatura,pa.peso,pa.direccion,pa.celular,p.description,p.id as id_proc");
		$this->db->where("i.id",$id);
		$this->db->join("as_atencion_pacientes a","a.id=i.id_atencion");
		$this->db->join("as_citas c","c.id=a.id_cita");
		$this->db->join("parts p","p.id=c.id_proc_parts");
		$this->db->join("pacientes pa","pa.id_paciente=c.id_paciente");
		$datos=$this->db->get('as_informe i');
		//echo $this->db->last_query(); exit;
		return $datos=$datos->result();	
	}
	
	
	/*encuentra la informaciòn de una cita*/
	function traerDatosRegistro($id_cita){ //print "hello".$id_cita;  exit;
		$this->db->select("c.id as id_cita,i.id as id_informe,c.estado,c.cedula,p.id as id_proc,m.nombre as medico,m.medico_codigo as id_medico");
		$this->db->where("c.id",$id_cita);
		$this->db->join("as_atencion_pacientes a","a.id_cita=c.id");
		$this->db->join("as_informe i","i.id_atencion=a.id");
		$this->db->join("parts p","p.id=c.id_proc_parts");
		$this->db->join("pacientes pa","pa.id_paciente=c.id_paciente");
		$this->db->join("medicos m","m.medico_codigo=c.id_medico");
		$datos=$this->db->get('as_citas c');
		return $datos=$datos->result();	
	}
	
	
	
	/*Insertar los demás campos ingresados por el profesional que hace el informe*/
	function insertarInforme($post){		
		//insertar detalle de informe.. que no son files			
		foreach($post as $campo=>$concepto){			 
		  $prefijo=substr($campo,0,3);			
			if($prefijo=="pl_"){ //es plantilla				
				$nombre_campo=substr($campo,3);
				
				//buscar el identificador de la plantilla a travès del nombre del campo y del procedimiento
				$this->db->where("id_proc_parts",$post['id_procedimiento']);
				$this->db->where("nombre_campo",$nombre_campo);
		        $datos=$this->db->get('as_plantillas');
				
				$datos=$datos->result();
				foreach($datos as $key){
				  $id_plantilla= $key->id;
				  $tipo_documento=$key->tipo_doc; //1 para plantillas de formulario ingreso y 2 para informes
				}
				
				//insertar detalle de informe
				if($tipo_documento==2)	{
					$this->db->set('id_informe',$post['id_informe']);
					$this->db->set('id_plantilla',$id_plantilla);
					$this->db->set('concepto',$concepto);				
					$this->db->insert('as_detalle_informe');	
				}												
			}
		}
		//actualizar estado del informe a cerrado
		$this->db->set('estado',2);
		$this->db->where('id',$post['id_informe']);
		$this->db->update('as_informe');
		
		//obtener id de cita y de atencion para actualizar el estado	
		$this->db->select("c.id as id_cita,a.id as id_atencion");
		$this->db->where("i.id",$post['id_informe']);
		$this->db->join("as_atencion_pacientes a","a.id_cita=c.id");
		$this->db->join("as_informe i","i.id_atencion=a.id");
		$datos=$this->db->get('as_citas c');
		$resultado=$datos->result();
		foreach($resultado as $key){
			$this->db->set('estado',3);
			$this->db->where('id',$key->id_cita);
		    $this->db->update('as_citas');
			
			$this->db->set('estado',3);
			$this->db->where('id',$key->id_atencion);
		    $this->db->update('as_atencion_pacientes');			
		}		
		
	}
        


	function save_parts($post) { 
        if (isset($post['campo'])) {
            $this->db->where($post["campo"], $post[$post["campo"]]);
            $id = $post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('parts', $post);
        } else {
            $this->db->insert('parts', $post);
            $id = $this->db->insert_id();
        }
        return $id;
    }

    function delete_parts($post) {
        $this->db->set('ACTIVO', 'N');
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $this->db->update('parts');
    }

    function edit_parts($post) {
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $datos = $this->db->get('parts', $post);
        return $datos = $datos->result();
    }

    function consult_parts($post) {
        if (isset($post['id']))
            if ($post['id'] != "")
                $this->db->like('id', $post['id']);
        if (isset($post['description']))
            if ($post['description'] != "")
                $this->db->like('description', $post['description']);
        if (isset($post['notes']))
            if ($post['notes'] != "")
                $this->db->like('notes', $post['notes']);
        if (isset($post['ACTIVO']))
            if ($post['ACTIVO'] != "")
                $this->db->like('ACTIVO', $post['ACTIVO']);
        $this->db->select('id');
        $this->db->select('description');
//        $this->db->select('notes');
        $this->db->where('ACTIVO', 'S');
        $datos = $this->db->get('parts');
        $datos = $datos->result();
        return $datos;
    }

    function validaexistencia($cc) {
        $this->db->where("description", $cc);
        $this->db->where("activo", 'S');
        $data = $this->db->get('parts');
        return $data->result();
    }
	
}