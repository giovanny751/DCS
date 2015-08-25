<?php 
class Aseguradoras_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function save_aseguradoras($post){
        if(isset($post['campo'])){ 
        $this->db->where($post["campo"],$post[$post["campo"]]);
            unset($post['campo']);
            $this->db->update('aseguradoras',$post);
        }else{
            $this->db->insert('aseguradoras',$post);
        }
        
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
            if(isset($post['asegu_codigo']))
        if($post['asegu_codigo']!="")
        $this->db->like('asegu_codigo',$post['asegu_codigo']);
                    if(isset($post['asegu_tipo']))
        if($post['asegu_tipo']!="")
        $this->db->like('asegu_tipo',$post['asegu_tipo']);
                    if(isset($post['asegu_fecha_creacion']))
        if($post['asegu_fecha_creacion']!="")
        $this->db->like('asegu_fecha_creacion',$post['asegu_fecha_creacion']);
                    if(isset($post['asegu_direccion']))
        if($post['asegu_direccion']!="")
        $this->db->like('asegu_direccion',$post['asegu_direccion']);
                    if(isset($post['asegu_telefono_fijo']))
        if($post['asegu_telefono_fijo']!="")
        $this->db->like('asegu_telefono_fijo',$post['asegu_telefono_fijo']);
                    if(isset($post['asegu_celular']))
        if($post['asegu_celular']!="")
        $this->db->like('asegu_celular',$post['asegu_celular']);
                    if(isset($post['asegu_email']))
        if($post['asegu_email']!="")
        $this->db->like('asegu_email',$post['asegu_email']);
                    if(isset($post['asegu_borrado']))
        if($post['asegu_borrado']!="")
        $this->db->like('asegu_borrado',$post['asegu_borrado']);
                    if(isset($post['activo']))
        if($post['activo']!="")
        $this->db->like('activo',$post['activo']);
                                    $this->db->select('asegu_tipo');
                                $this->db->select('asegu_direccion');
                                $this->db->select('asegu_telefono_fijo');
                                $this->db->select('asegu_celular');
                                $this->db->select('asegu_email');
                        $this->db->where('ACTIVO','S');
        $datos=$this->db->get('aseguradoras');
        $datos=$datos->result();
        return $datos;
    }
}
?>
