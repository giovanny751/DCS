<?php 
class Aseguradoras__model extends CI_Model {
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
    function save_aseguradoras($post){
        if(isset($post['campo'])){ 
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $id=$post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('aseguradoras',$post);
        }else{
            $this->db->insert('aseguradoras',$post);
            $id=$this->db->insert_id();
        }
        return $id;
        
    }
    function delete_aseguradoras($post){
        $this->db->set('ACTIVO','N');
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $this->db->update('aseguradoras');
    }
    function edit_aseguradoras($post){
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $datos=$this->db->get('aseguradoras',$post);
        return $datos=$datos->result();
    }
    function consult_aseguradoras($post){
            if(isset($post['aseguradora_id']))
        if($post['aseguradora_id']!="")
        $this->db->like('aseguradora_id',$post['aseguradora_id']);
                    if(isset($post['nombre']))
        if($post['nombre']!="")
        $this->db->like('nombre',$post['nombre']);
                    if(isset($post['tipo']))
        if($post['tipo']!="")
        $this->db->like('tipo',$post['tipo']);
                    if(isset($post['estado']))
        if($post['estado']!="")
        $this->db->like('estado',$post['estado']);
                    if(isset($post['fecha_creacion']))
        if($post['fecha_creacion']!="")
        $this->db->like('fecha_creacion',$post['fecha_creacion']);
                    if(isset($post['direccion']))
        if($post['direccion']!="")
        $this->db->like('direccion',$post['direccion']);
                    if(isset($post['telefono_fijo']))
        if($post['telefono_fijo']!="")
        $this->db->like('telefono_fijo',$post['telefono_fijo']);
                    if(isset($post['celular']))
        if($post['celular']!="")
        $this->db->like('celular',$post['celular']);
                    if(isset($post['email']))
        if($post['email']!="")
        $this->db->like('email',$post['email']);
                    if(isset($post['activo']))
        if($post['activo']!="")
        $this->db->like('activo',$post['activo']);
                                    $this->db->select('aseguradora_id');
                                $this->db->select('nombre');
                                $this->db->select('tipo');
                                $this->db->select('estado');
                                $this->db->select('direccion');
                                $this->db->select('telefono_fijo');
                                $this->db->select('celular');
                                $this->db->select('email');
                        $this->db->where('ACTIVO','S');
        if(empty($post))$this->db->where("1",2);                
        $datos=$this->db->get('aseguradoras');
        $datos=$datos->result();
        return $datos;
    }
    public function referencia($post) {
        if(!empty($post['aseguradora_id']))
        $this->db->where_not_in('aseguradora_id', $post['aseguradora_id']);
        $this->db->where('nombre', $post['nombre']);
        $this->db->where('ACTIVO', 'S');
        $datos = $this->db->get('aseguradoras');
        $datos =$datos->result();
        return count($datos);
    }
}
?>
