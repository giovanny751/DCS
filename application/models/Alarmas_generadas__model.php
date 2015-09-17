<?php 
class Alarmas_generadas__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function save_alarmas_generadas($post){
        if(isset($post['campo'])){ 
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $id=$post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('alarmas_generadas',$post);
        }else{
            $this->db->insert('alarmas_generadas',$post);
            $id=$this->db->insert_id();
        }
        return $id;
        
    }
    function delete_alarmas_generadas($post){
        $this->db->set('ACTIVO','N');
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $this->db->update('alarmas_generadas');
    }
    function edit_alarmas_generadas($post){
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $datos=$this->db->get('alarmas_generadas',$post);
        return $datos=$datos->result();
    }
    function consult_alarmas_generadas($post){
            if(isset($post['id_alarmas_generadas']))
        if($post['id_alarmas_generadas']!="")
        $this->db->like('id_alarmas_generadas',$post['id_alarmas_generadas']);
                    if(isset($post['id_niveles_alarma']))
        if($post['id_niveles_alarma']!="")
        $this->db->like('id_niveles_alarma',$post['id_niveles_alarma']);
                    if(isset($post['descripcion']))
        if($post['descripcion']!="")
        $this->db->like('descripcion',$post['descripcion']);
                    if(isset($post['fecha_creacion']))
        if($post['fecha_creacion']!="")
        $this->db->like('fecha_creacion',$post['fecha_creacion']);
                    if(isset($post['id_lectura_equipo']))
        if($post['id_lectura_equipo']!="")
        $this->db->like('id_lectura_equipo',$post['id_lectura_equipo']);
                    if(isset($post['analisis_resultado']))
        if($post['analisis_resultado']!="")
        $this->db->like('analisis_resultado',$post['analisis_resultado']);
                    if(isset($post['estado_id']))
        if($post['estado_id']!="")
        $this->db->like('estado_id',$post['estado_id']);
                    if(isset($post['lectura_id']))
        if($post['lectura_id']!="")
        $this->db->like('lectura_id',$post['lectura_id']);
                    if(isset($post['activo']))
        if($post['activo']!="")
        $this->db->like('activo',$post['activo']);
                                    $this->db->select('id_alarmas_generadas');
                                $this->db->select('id_niveles_alarma');
                                $this->db->select('descripcion');
                                $this->db->select('id_lectura_equipo');
                                $this->db->select('analisis_resultado');
                        $this->db->where('ACTIVO','S');
        $datos=$this->db->get('alarmas_generadas');
        $datos=$datos->result();
        return $datos;
    }
}
?>
