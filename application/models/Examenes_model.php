<?php 
class Examenes_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function save_examenes($post){
        if(isset($post['campo'])){ 
        $this->db->where($post["campo"],$post[$post["campo"]]);
            unset($post['campo']);
            $this->db->update('examenes',$post);
        }else{
            $this->db->insert('examenes',$post);
        }
        
    }
    function delete_examenes($post){
        $this->db->set('ACTIVO','N');
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $this->db->update('examenes');
    }
    function edit_examenes($post){
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $datos=$this->db->get('examenes',$post);
        return $datos=$datos->result();
    }
    function consult_examenes($post){
            if(isset($post['examen_cod']))
        if($post['examen_cod']!="")
        $this->db->like('examen_cod',$post['examen_cod']);
                    if(isset($post['examen_nombre']))
        if($post['examen_nombre']!="")
        $this->db->like('examen_nombre',$post['examen_nombre']);
                    if(isset($post['examen_fecha_creacion']))
        if($post['examen_fecha_creacion']!="")
        $this->db->like('examen_fecha_creacion',$post['examen_fecha_creacion']);
                    if(isset($post['activo']))
        if($post['activo']!="")
        $this->db->like('activo',$post['activo']);
                                    $this->db->select('examen_cod');
                                $this->db->select('examen_nombre');
                        $this->db->where('ACTIVO','S');
        $datos=$this->db->get('examenes');
        $datos=$datos->result();
        return $datos;
    }
}
?>
