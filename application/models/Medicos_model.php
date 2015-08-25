<?php 
class Medicos_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function save_medicos($post){
        if(isset($post['campo'])){ 
        $this->db->where($post["campo"],$post[$post["campo"]]);
            unset($post['campo']);
            $this->db->update('medicos',$post);
        }else{
            $this->db->insert('medicos',$post);
        }
        
    }
    function delete_medicos($post){
        $this->db->set('ACTIVO','N');
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $this->db->update('medicos');
    }
    function edit_medicos($post){
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $datos=$this->db->get('medicos',$post);
        return $datos=$datos->result();
    }
    function consult_medicos($post){
            if(isset($post['medico_codigo']))
        if($post['medico_codigo']!="")
        $this->db->like('medico_codigo',$post['medico_codigo']);
                    if(isset($post['medico_nombre']))
        if($post['medico_nombre']!="")
        $this->db->like('medico_nombre',$post['medico_nombre']);
                    if(isset($post['medico_fecha_creacion']))
        if($post['medico_fecha_creacion']!="")
        $this->db->like('medico_fecha_creacion',$post['medico_fecha_creacion']);
                    if(isset($post['medico_matricula_prof']))
        if($post['medico_matricula_prof']!="")
        $this->db->like('medico_matricula_prof',$post['medico_matricula_prof']);
                    if(isset($post['medico_direccion']))
        if($post['medico_direccion']!="")
        $this->db->like('medico_direccion',$post['medico_direccion']);
                    if(isset($post['medico_telefono_fijo']))
        if($post['medico_telefono_fijo']!="")
        $this->db->like('medico_telefono_fijo',$post['medico_telefono_fijo']);
                    if(isset($post['medico_celular']))
        if($post['medico_celular']!="")
        $this->db->like('medico_celular',$post['medico_celular']);
                    if(isset($post['medico_email']))
        if($post['medico_email']!="")
        $this->db->like('medico_email',$post['medico_email']);
                    if(isset($post['medico_borrado']))
        if($post['medico_borrado']!="")
        $this->db->like('medico_borrado',$post['medico_borrado']);
                    if(isset($post['activo']))
        if($post['activo']!="")
        $this->db->like('activo',$post['activo']);
                                    $this->db->select('medico_codigo');
                                $this->db->select('medico_nombre');
                                $this->db->select('medico_matricula_prof');
                                $this->db->select('medico_direccion');
                                $this->db->select('medico_telefono_fijo');
                                $this->db->select('medico_celular');
                                $this->db->select('medico_email');
                        $this->db->where('ACTIVO','S');
        $datos=$this->db->get('medicos');
        $datos=$datos->result();
        return $datos;
    }
}
?>
