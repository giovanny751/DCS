<?php 
class Contacto_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function save_contacto($post){
        if(isset($post['campo'])){ 
        $this->db->where($post["campo"],$post[$post["campo"]]);
            unset($post['campo']);
            $this->db->update('contacto',$post);
        }else{
            $this->db->insert('contacto',$post);
        }
        
    }
    function delete_contacto($post){
        $this->db->set('ACTIVO','N');
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $this->db->update('contacto');
    }
    function edit_contacto($post){
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $datos=$this->db->get('contacto',$post);
        return $datos=$datos->result();
    }
    function consult_contacto($post){
            if(isset($post['contacto_id']))
        if($post['contacto_id']!="")
        $this->db->like('contacto_id',$post['contacto_id']);
                    if(isset($post['contacto_documento']))
        if($post['contacto_documento']!="")
        $this->db->like('contacto_documento',$post['contacto_documento']);
                    if(isset($post['contacto_nombre']))
        if($post['contacto_nombre']!="")
        $this->db->like('contacto_nombre',$post['contacto_nombre']);
                    if(isset($post['contacto_fecha_creacion']))
        if($post['contacto_fecha_creacion']!="")
        $this->db->like('contacto_fecha_creacion',$post['contacto_fecha_creacion']);
                    if(isset($post['contacto_direccion']))
        if($post['contacto_direccion']!="")
        $this->db->like('contacto_direccion',$post['contacto_direccion']);
                    if(isset($post['contacto_telefono_fijo']))
        if($post['contacto_telefono_fijo']!="")
        $this->db->like('contacto_telefono_fijo',$post['contacto_telefono_fijo']);
                    if(isset($post['contacto_celular']))
        if($post['contacto_celular']!="")
        $this->db->like('contacto_celular',$post['contacto_celular']);
                    if(isset($post['contacto_email']))
        if($post['contacto_email']!="")
        $this->db->like('contacto_email',$post['contacto_email']);
                    if(isset($post['contacto_parentesco']))
        if($post['contacto_parentesco']!="")
        $this->db->like('contacto_parentesco',$post['contacto_parentesco']);
                    if(isset($post['contacto_llaves']))
        if($post['contacto_llaves']!="")
        $this->db->like('contacto_llaves',$post['contacto_llaves']);
                    if(isset($post['contacto_cuidador']))
        if($post['contacto_cuidador']!="")
        $this->db->like('contacto_cuidador',$post['contacto_cuidador']);
                    if(isset($post['contacto_borrador']))
        if($post['contacto_borrador']!="")
        $this->db->like('contacto_borrador',$post['contacto_borrador']);
                    if(isset($post['activo']))
        if($post['activo']!="")
        $this->db->like('activo',$post['activo']);
                                    $this->db->select('contacto_id');
                                $this->db->select('contacto_documento');
                                $this->db->select('contacto_nombre');
                                $this->db->select('contacto_direccion');
                                $this->db->select('contacto_telefono_fijo');
                                $this->db->select('contacto_celular');
                                $this->db->select('contacto_email');
                                $this->db->select('contacto_parentesco');
                                $this->db->select('contacto_llaves');
                                $this->db->select('contacto_cuidador');
                        $this->db->where('ACTIVO','S');
        $datos=$this->db->get('contacto');
        $datos=$datos->result();
        return $datos;
    }
}
?>
