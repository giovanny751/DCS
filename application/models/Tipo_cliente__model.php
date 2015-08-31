<?php 
class Tipo_cliente__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function save_tipo_cliente($post){
        if(isset($post['campo'])){ 
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $id=$post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('tipo_cliente',$post);
        }else{
            $this->db->insert('tipo_cliente',$post);
            $id=$this->db->insert_id();
        }
        return $id;
        
    }
    function delete_tipo_cliente($post){
        $this->db->set('ACTIVO','N');
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $this->db->update('tipo_cliente');
    }
    function edit_tipo_cliente($post){
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $datos=$this->db->get('tipo_cliente',$post);
        return $datos=$datos->result();
    }
    function consult_tipo_cliente($post){
            if(isset($post['id_tipo_cliente']))
        if($post['id_tipo_cliente']!="")
        $this->db->like('id_tipo_cliente',$post['id_tipo_cliente']);
                    if(isset($post['descripcion']))
        if($post['descripcion']!="")
        $this->db->like('descripcion',$post['descripcion']);
                    if(isset($post['fecha_creacion']))
        if($post['fecha_creacion']!="")
        $this->db->like('fecha_creacion',$post['fecha_creacion']);
                    if(isset($post['creado_por']))
        if($post['creado_por']!="")
        $this->db->like('creado_por',$post['creado_por']);
                    if(isset($post['activo']))
        if($post['activo']!="")
        $this->db->like('activo',$post['activo']);
                                    $this->db->select('id_tipo_cliente');
                                $this->db->select('descripcion');
                        $this->db->where('ACTIVO','S');
        $datos=$this->db->get('tipo_cliente');
        $datos=$datos->result();
        return $datos;
    }
}
?>
