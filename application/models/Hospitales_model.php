<?php 
class Hospitales_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function save_hospitales($post){
        if(isset($post['campo'])){ 
        $this->db->where($post["campo"],$post[$post["campo"]]);
            unset($post['campo']);
            $this->db->update('hospitales',$post);
        }else{
            $this->db->insert('hospitales',$post);
        }
        
    }
    function delete_hospitales($post){
        $this->db->set('ACTIVO','N');
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $this->db->update('hospitales');
    }
    function edit_hospitales($post){
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $datos=$this->db->get('hospitales',$post);
        return $datos=$datos->result();
    }
    function consult_hospitales($post){
            if(isset($post['hospital_cod']))
        if($post['hospital_cod']!="")
        $this->db->like('hospital_cod',$post['hospital_cod']);
                    if(isset($post['hospital_nombre']))
        if($post['hospital_nombre']!="")
        $this->db->like('hospital_nombre',$post['hospital_nombre']);
                    if(isset($post['hospital_fecha_creacion']))
        if($post['hospital_fecha_creacion']!="")
        $this->db->like('hospital_fecha_creacion',$post['hospital_fecha_creacion']);
                    if(isset($post['hospital_direccion']))
        if($post['hospital_direccion']!="")
        $this->db->like('hospital_direccion',$post['hospital_direccion']);
                    if(isset($post['hospital_telefono_fijo']))
        if($post['hospital_telefono_fijo']!="")
        $this->db->like('hospital_telefono_fijo',$post['hospital_telefono_fijo']);
                    if(isset($post['hospital_celular']))
        if($post['hospital_celular']!="")
        $this->db->like('hospital_celular',$post['hospital_celular']);
                    if(isset($post['hospital_email']))
        if($post['hospital_email']!="")
        $this->db->like('hospital_email',$post['hospital_email']);
                    if(isset($post['hospital_borrado']))
        if($post['hospital_borrado']!="")
        $this->db->like('hospital_borrado',$post['hospital_borrado']);
                    if(isset($post['activo']))
        if($post['activo']!="")
        $this->db->like('activo',$post['activo']);
                                    $this->db->select('hospital_cod');
                                $this->db->select('hospital_nombre');
                                $this->db->select('hospital_direccion');
                                $this->db->select('hospital_telefono_fijo');
                                $this->db->select('hospital_celular');
                                $this->db->select('hospital_email');
                        $this->db->where('ACTIVO','S');
        $datos=$this->db->get('hospitales');
        $datos=$datos->result();
        return $datos;
    }
}
?>
