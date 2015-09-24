<?php

class Alarmas_generadas__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function save_alarmas_generadas($post) {
        if (isset($post['campo'])) {
            $this->db->where($post["campo"], $post[$post["campo"]]);
            $id = $post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('alarmas_generadas', $post);
        } else {
            $this->db->insert('alarmas_generadas', $post);
            $id = $this->db->insert_id();
        }
        return $id;
    }

    function delete_alarmas_generadas($post) {
        $this->db->set('ACTIVO', 'N');
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $this->db->update('alarmas_generadas');
    }

    function edit_alarmas_generadas($post) {
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $this->db->select('fecha_nacimiento,foto,peso,estatura,lectura_equipo.id_paciente,alarmas_generadas.id_alarmas_generadas,cedula_paciente,nombres,apellidos,lectura_equipo.fecha_creacion');
        $this->db->select('alarmas_generadas.descripcion,tipo_alarma.analisis_resultados,examen_nombre,niveles_alarma.analisis_resultado');
        $this->db->select('lectura_numerica,protocolos.descripcion descripcion_protocolo,protocolos.nombre nombre_procolo,alarmas_generadas.estado_id,alarmas_generadas.fecha_atencion,alarmas_generadas.descripcion descrip');
        $this->db->where('alarmas_generadas.ACTIVO', 'S');
        $this->db->join('niveles_alarma', 'niveles_alarma.id_niveles_alarma=alarmas_generadas.id_niveles_alarma', 'left');
        $this->db->join('lectura_equipo', 'lectura_equipo.id_lectura_equipo=alarmas_generadas.id_lectura_equipo', 'left');
        $this->db->join('pacientes', 'pacientes.id_paciente=lectura_equipo.id_paciente', 'left');
        $this->db->join('tipo_alarma', 'alarmas_generadas.id_tipo_alarma=tipo_alarma.id_tipo_alarma', 'left');
        $this->db->join('examenes', 'tipo_alarma.examen=examenes.examen_cod', 'left');
        $this->db->join('protocolos', 'niveles_alarma.id_protocolo=protocolos.id_protocolo', 'left');
        $datos = $this->db->get('alarmas_generadas');
//        echo $this->db->last_query();
        return $datos = $datos->result();
    }

    function consult_alarmas_generadas($post) {
        if (isset($post['id_alarmas_generadas']))
            if ($post['id_alarmas_generadas'] != "")
                $this->db->like('id_alarmas_generadas', $post['id_alarmas_generadas']);
        if (isset($post['id_niveles_alarma']))
            if ($post['id_niveles_alarma'] != "")
                $this->db->like('id_niveles_alarma', $post['id_niveles_alarma']);
        if (isset($post['descripcion']))
            if ($post['descripcion'] != "")
                $this->db->like('descripcion', $post['descripcion']);
        if (isset($post['fecha_creacion']))
            if ($post['fecha_creacion'] != "")
                $this->db->like('fecha_creacion', $post['fecha_creacion']);
        if (isset($post['id_lectura_equipo']))
            if ($post['id_lectura_equipo'] != "")
                $this->db->like('id_lectura_equipo', $post['id_lectura_equipo']);
        if (isset($post['analisis_resultado']))
            if ($post['analisis_resultado'] != "")
                $this->db->like('analisis_resultado', $post['analisis_resultado']);
        if (isset($post['estado_id']))
            if ($post['estado_id'] != "")
                $this->db->like('estado_id', $post['estado_id']);
        if (isset($post['lectura_id']))
            if ($post['lectura_id'] != "")
                $this->db->like('lectura_id', $post['lectura_id']);
        if (isset($post['activo']))
            if ($post['activo'] != "")
                $this->db->like('activo', $post['activo']);
        $this->db->select('color,alarmas_generadas.id_alarmas_generadas,cedula_paciente,nombres,apellidos,lectura_equipo.fecha_creacion');
        $this->db->select('alarmas_generadas.descripcion,tipo_alarma.analisis_resultados,examen_nombre,niveles_alarma.analisis_resultado');
        $this->db->select('lectura_numerica,protocolos.nombre nombre_procolo,alarmas_generadas.estado_id,alarmas_generadas.fecha_atencion,alarmas_generadas.descripcion descrip');
        $this->db->where('alarmas_generadas.ACTIVO', 'S');
        $this->db->join('niveles_alarma', 'niveles_alarma.id_niveles_alarma=alarmas_generadas.id_niveles_alarma', 'left');
        $this->db->join('lectura_equipo', 'lectura_equipo.id_lectura_equipo=alarmas_generadas.id_lectura_equipo', 'left');
        $this->db->join('pacientes', 'pacientes.id_paciente=lectura_equipo.id_paciente', 'left');
        $this->db->join('tipo_alarma', 'alarmas_generadas.id_tipo_alarma=tipo_alarma.id_tipo_alarma', 'left');
        $this->db->join('examenes', 'tipo_alarma.examen=examenes.examen_cod', 'left');
        $this->db->join('protocolos', 'niveles_alarma.id_protocolo=protocolos.id_protocolo', 'left');
        $datos = $this->db->get('alarmas_generadas');
        $datos = $datos->result();
        return $datos;
    }
    function buscar_pacientes($post){
        $this->db->where('cedula_paciente',$post['cedula']);
        $datos=$this->db->get('pacientes');
        $datos=$datos->result();
        return $datos;
    }
    function buscar_pacientes_examen($post){
        $this->db->select('examen_cod');
        $this->db->where('id_paciente',$post['id_paciente']);
        $datos=$this->db->get('paciente_examen_variable');
        $datos=$datos->result();
        return $datos;
    }

}

?>
