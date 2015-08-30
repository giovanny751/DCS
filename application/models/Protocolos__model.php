<?php 
class Protocolos__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function save_protocolos($post){
        if(isset($post['campo'])){ 
        $this->db->where($post["campo"],$post[$post["campo"]]);
            unset($post['campo']);
            $this->db->update('protocolos',$post);
        }else{
            $this->db->insert('protocolos',$post);
        }
        
    }
    function delete_protocolos($post){
        $this->db->set('ACTIVO','N');
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $this->db->update('protocolos');
    }
    function edit_protocolos($post){
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $datos=$this->db->get('protocolos',$post);
        return $datos=$datos->result();
    }
    function consult_protocolos($post){
            if(isset($post['id_protocolo']))
        if($post['id_protocolo']!="")
        $this->db->like('id_protocolo',$post['id_protocolo']);
                    if(isset($post['nombre']))
        if($post['nombre']!="")
        $this->db->like('nombre',$post['nombre']);
                    if(isset($post['fecha_creacion']))
        if($post['fecha_creacion']!="")
        $this->db->like('fecha_creacion',$post['fecha_creacion']);
                    if(isset($post['version']))
        if($post['version']!="")
        $this->db->like('version',$post['version']);
                    if(isset($post['estado']))
        if($post['estado']!="")
        $this->db->like('estado',$post['estado']);
                    if(isset($post['descripcion']))
        if($post['descripcion']!="")
        $this->db->like('descripcion',$post['descripcion']);
                    if(isset($post['enviar_sms']))
        if($post['enviar_sms']!="")
        $this->db->like('enviar_sms',$post['enviar_sms']);
                    if(isset($post['enviar_email']))
        if($post['enviar_email']!="")
        $this->db->like('enviar_email',$post['enviar_email']);
                    if(isset($post['activo']))
        if($post['activo']!="")
        $this->db->like('activo',$post['activo']);
                                    $this->db->select('id_protocolo');
                                $this->db->select('nombre');
                                $this->db->select('version');
                                $this->db->select('estado');
                                $this->db->select('descripcion');
                                $this->db->select('enviar_sms');
                                $this->db->select('enviar_email');
                        $this->db->where('ACTIVO','S');
        $datos=$this->db->get('protocolos');
        $datos=$datos->result();
        return $datos;
    }
}
?>
