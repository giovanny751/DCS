<?php 
class Tipo_alarma__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function save_tipo_alarma($post){
        if(isset($post['campo'])){ 
        $this->db->where($post["campo"],$post[$post["campo"]]);
            unset($post['campo']);
            $this->db->update('tipo_alarma',$post);
        }else{
            $this->db->insert('tipo_alarma',$post);
        }
        
    }
    function delete_tipo_alarma($post){
        $this->db->set('ACTIVO','N');
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $this->db->update('tipo_alarma');
    }
    function edit_tipo_alarma($post){
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $datos=$this->db->get('tipo_alarma',$post);
        return $datos=$datos->result();
    }
    function consult_tipo_alarma($post){
            if(isset($post['id_tipo_alarma']))
        if($post['id_tipo_alarma']!="")
        $this->db->like('id_tipo_alarma',$post['id_tipo_alarma']);
                    if(isset($post['descripcion']))
        if($post['descripcion']!="")
        $this->db->like('descripcion',$post['descripcion']);
                    if(isset($post['fecha_creacion']))
        if($post['fecha_creacion']!="")
        $this->db->like('fecha_creacion',$post['fecha_creacion']);
                    if(isset($post['examen']))
        if($post['examen']!="")
        $this->db->like('examen',$post['examen']);
                    if(isset($post['analisis_resultados']))
        if($post['analisis_resultados']!="")
        $this->db->like('analisis_resultados',$post['analisis_resultados']);
                    if(isset($post['id_niveles_alarma']))
        if($post['id_niveles_alarma']!="")
        $this->db->like('id_niveles_alarma',$post['id_niveles_alarma']);
                    if(isset($post['activo']))
        if($post['activo']!="")
        $this->db->like('activo',$post['activo']);
                                    $this->db->select('id_tipo_alarma');
                                $this->db->select('descripcion');
                                $this->db->select('examen');
                                $this->db->select('analisis_resultados');
                                $this->db->select('id_niveles_alarma');
                        $this->db->where('ACTIVO','S');
        $datos=$this->db->get('tipo_alarma');
        $datos=$datos->result();
        return $datos;
    }
}
?>
