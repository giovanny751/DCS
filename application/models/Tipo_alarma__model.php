<?php

class Tipo_alarma__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function save_tipo_alarma($post) {
        if (isset($post['equipo_id'])) {
                $equipo_id = $post['equipo_id'];
                unset($post['equipo_id']);
            }
        if (isset($post['campo'])) {
            $this->db->where($post["campo"], $post[$post["campo"]]);
            $id = $post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('tipo_alarma', $post);
        } else {
            $this->db->insert('tipo_alarma', $post);
            $id = $this->db->insert_id();
        }
        echo $this->db->last_query();
        $this->db->where('id_tipo_alarma', $id);
        $this->db->delete('tipo_alarma_nivel');
        if (isset($equipo_id))
            for ($i = 0; $i < count($equipo_id); $i++) {
                $this->db->set('id_tipo_alarma', $id);
                $this->db->set('id_niveles_alarma',$equipo_id[$i]);
                $this->db->insert('tipo_alarma_nivel');
            }
    }

    function delete_tipo_alarma($post) {
        $this->db->set('ACTIVO', 'N');
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $this->db->update('tipo_alarma');
    }

    function edit_tipo_alarma($post) {
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $datos = $this->db->get('tipo_alarma', $post);
        return $datos = $datos->result();
    }

    function consult_tipo_alarma($post) {
        if (isset($post['id_tipo_alarma']))
            if ($post['id_tipo_alarma'] != "")
                $this->db->like('id_tipo_alarma', $post['id_tipo_alarma']);
        if (isset($post['descripcion']))
            if ($post['descripcion'] != "")
                $this->db->like('tipo_alarma.descripcion', $post['descripcion']);
        if (isset($post['fecha_creacion']))
            if ($post['fecha_creacion'] != "")
                $this->db->like('fecha_creacion', $post['fecha_creacion']);
        if (isset($post['examen']))
            if ($post['examen'] != "")
                $this->db->like('tipo_alarma.examen', $post['examen']);
        if (isset($post['analisis_resultados']))
            if ($post['analisis_resultados'] != "")
                $this->db->like('analisis_resultados', $post['analisis_resultados']);
        if (isset($post['id_niveles_alarma']))
            if ($post['id_niveles_alarma'] != "")
                $this->db->like('id_niveles_alarma', $post['id_niveles_alarma']);
        if (isset($post['activo']))
            if ($post['activo'] != "")
                $this->db->like('activo', $post['activo']);
        $this->db->select('id_tipo_alarma');
        $this->db->select('tipo_alarma.descripcion');
        $this->db->select('examen_nombre');
        $this->db->select('hl7tag');
        $this->db->join('examenes','tipo_alarma.examen=examenes.examen_cod');
        $this->db->join('variables','tipo_alarma.variable_codigo=variables.variable_codigo');
        $this->db->select('analisis_resultados');
//                                $this->db->select('id_niveles_alarma');
        $this->db->where('examenes.ACTIVO', 'S');
        $this->db->where('variables.ACTIVO', 'S');
        $this->db->where('tipo_alarma.ACTIVO', 'S');
        if (empty($post))
            $this->db->where("1", 2);
        $datos = $this->db->get('tipo_alarma');
        $datos = $datos->result();
        return $datos;
    }
    function tipo_alarma_nivel($post) {

        $this->db->where("tipo_alarma_nivel.id_tipo_alarma", $post[$post["campo"]]);
        $this->db->join("niveles_alarma", "niveles_alarma.id_niveles_alarma = tipo_alarma_nivel.id_niveles_alarma");
        $paciente = $this->db->get("tipo_alarma_nivel");
        return $paciente->result();
    }

    function save_nivel_tipo($data) {

//        $this->db->insert_batch('nivel_tipo_alarma', $data);
    }
    function confirmar_duplicado($post) {
        $datos=$this->db->query('select * 
                from niveles_alarma 
                where 
                n_repeticiones_minimas <= (select n_repeticiones_minimas from niveles_alarma where id_niveles_alarma='.$post['nuevo'].')
                and n_repeticiones_maximas >= (select n_repeticiones_minimas from niveles_alarma where id_niveles_alarma='.$post['nuevo'].')
                and id_niveles_alarma in ('.$post['anteriores'].')');
        $datos=$datos->result();
        echo count($datos);
        $datos=$this->db->query('select * 
                from niveles_alarma 
                where 
                n_repeticiones_minimas <= (select n_repeticiones_maximas from niveles_alarma where id_niveles_alarma='.$post['nuevo'].')
                and n_repeticiones_maximas >= (select n_repeticiones_maximas from niveles_alarma where id_niveles_alarma='.$post['nuevo'].')
                and id_niveles_alarma in ('.$post['anteriores'].')');
        $datos=$datos->result();
        echo count($datos);
    }

}

?>
