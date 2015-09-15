<?php 
class Prueba__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function save_prueba($post){
        if(isset($post['campo'])){ 
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $id=$post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('prueba',$post);
        }else{
            $this->db->insert('prueba',$post);
            $id=$this->db->insert_id();
        }
        return $id;
        
    }
    function delete_prueba($post){
        $this->db->set('ACTIVO','N');
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $this->db->update('prueba');
    }
    function edit_prueba($post){
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $datos=$this->db->get('prueba',$post);
        return $datos=$datos->result();
    }
    function consult_prueba($post){
            if(isset($post['id']))
        if($post['id']!="")
        $this->db->like('id',$post['id']);
                    if(isset($post['nombre']))
        if($post['nombre']!="")
        $this->db->like('nombre',$post['nombre']);
                    if(isset($post['fecha']))
        if($post['fecha']!="")
        $this->db->like('fecha',$post['fecha']);
                    if(isset($post['activo']))
        if($post['activo']!="")
        $this->db->like('activo',$post['activo']);
                                    $this->db->select('id');
                                $this->db->select('nombre');
                                $this->db->select('fecha');
                                $this->db->select('activo');
                        $this->db->where('ACTIVO','S');
        if(empty($post))$this->db->where("1",2);
        $datos=$this->db->get('prueba');
        $datos=$datos->result();
        return $datos;
    }
}
?>
