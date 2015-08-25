<?php 
class Variables_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function save_variables($post){
        if(isset($post['campo'])){ 
        $this->db->where($post["campo"],$post[$post["campo"]]);
            unset($post['campo']);
            $this->db->update('variables',$post);
        }else{
            $this->db->insert('variables',$post);
        }
        
    }
    function delete_variables($post){
        $this->db->set('ACTIVO','N');
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $this->db->update('variables');
    }
    function edit_variables($post){
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $datos=$this->db->get('variables',$post);
        return $datos=$datos->result();
    }
    function consult_variables($post){
            if(isset($post['variable_cod']))
        if($post['variable_cod']!="")
        $this->db->like('variable_cod',$post['variable_cod']);
                    if(isset($post['variable_descrip']))
        if($post['variable_descrip']!="")
        $this->db->like('variable_descrip',$post['variable_descrip']);
                    if(isset($post['variable_fecha_creacion']))
        if($post['variable_fecha_creacion']!="")
        $this->db->like('variable_fecha_creacion',$post['variable_fecha_creacion']);
                    if(isset($post['examen_cod']))
        if($post['examen_cod']!="")
        $this->db->like('examen_cod',$post['examen_cod']);
                    if(isset($post['variable_borrado']))
        if($post['variable_borrado']!="")
        $this->db->like('variable_borrado',$post['variable_borrado']);
                    if(isset($post['activo']))
        if($post['activo']!="")
        $this->db->like('activo',$post['activo']);
                                    $this->db->select('variable_cod');
                                $this->db->select('variable_descrip');
                                $this->db->select('examen_cod');
                        $this->db->where('ACTIVO','S');
        $datos=$this->db->get('variables');
        $datos=$datos->result();
        return $datos;
    }
}
?>
