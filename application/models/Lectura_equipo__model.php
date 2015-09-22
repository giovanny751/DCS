<?php 
class Lectura_equipo__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function save_lectura_equipo($post){
        if(isset($post['campo'])){ 
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $id=$post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('lectura_equipo',$post);
        }else{
            $this->db->insert('lectura_equipo',$post);
            $id=$this->db->insert_id();
        }
        return $id;
        
    }
    function delete_lectura_equipo($post){
        $this->db->set('ACTIVO','N');
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $this->db->update('lectura_equipo');
    }
    function edit_lectura_equipo($post){
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $datos=$this->db->get('lectura_equipo',$post);
        return $datos=$datos->result();
    }
    function consult_lectura_equipo($post){
            if(isset($post['id_lectura_equipo']))
        if($post['id_lectura_equipo']!="")
        $this->db->like('id_lectura_equipo',$post['id_lectura_equipo']);
                    if(isset($post['id_paciente']))
        if($post['id_paciente']!="")
        $this->db->like('id_paciente',$post['id_paciente']);
                    if(isset($post['id_equipo']))
        if($post['id_equipo']!="")
        $this->db->like('id_equipo',$post['id_equipo']);
                    if(isset($post['variable_codigo']))
        if($post['variable_codigo']!="")
        $this->db->like('variable_codigo',$post['variable_codigo']);
                    if(isset($post['lectura_numerica']))
        if($post['lectura_numerica']!="")
        $this->db->like('lectura_numerica',$post['lectura_numerica']);
                    if(isset($post['lectura_texto']))
        if($post['lectura_texto']!="")
        $this->db->like('lectura_texto',$post['lectura_texto']);
                    if(isset($post['fecha_creacion']))
        if($post['fecha_creacion']!="")
        $this->db->like('fecha_creacion',$post['fecha_creacion']);
                    if(isset($post['activo']))
        if($post['activo']!="")
        $this->db->like('activo',$post['activo']);
                    if(isset($post['serial_equipo']))
        if($post['serial_equipo']!="")
        $this->db->like('serial_equipo',$post['serial_equipo']);
                                    $this->db->select('id_lectura_equipo');
                                $this->db->select('id_paciente');
                                $this->db->select('id_equipo');
                                $this->db->select('variable_codigo');
                                $this->db->select('lectura_numerica');
                                $this->db->select('lectura_texto');
                                $this->db->select('serial_equipo');
                        $this->db->where('ACTIVO','S');
        $datos=$this->db->get('lectura_equipo');
        $datos=$datos->result();
        return $datos;
    }
}
?>
