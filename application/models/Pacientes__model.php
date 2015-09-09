<?php

class Pacientes__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function save_pacientes($post) {
        if(isset($post['descripcion'])){
            $s="";
            foreach ($post['descripcion'] as $des){
                $s.=$des.",";
            }
            $post['descripcion']=$s;
        }
        if(isset($post['contacto_id'])){
            $s="";
            foreach ($post['contacto_id'] as $des){
                $s.=$des.",";
            }
            $post['contacto_id']=$s;
        }
        
        $examen = $post['examen'];
        $variable_codigo = $post['variable_codigo'];
        $valor_frecuencia = $post['valor_frecuencia'];
        $frecuencia = $post['frecuencia'];
        $valor_minimo = $post['valor_minimo'];
        $valor_maximo = $post['valor_maximo'];
        $contacto_id = $post['contacto_id'];
        if (empty($post['foto']))
            unset($post['foto']);
        unset($post['examen']);
        unset($post['contacto_id2']);
        unset($post['contacto_id']);
        unset($post['variable_codigo']);
        unset($post['valor_frecuencia']);
        unset($post['frecuencia']);
        unset($post['valor_minimo']);
        unset($post['valor_maximo']);
        
        if (isset($post['campo'])) {
            $this->db->where($post["campo"], $post[$post["campo"]]);
            $id = $post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('pacientes', $post);
        } else {
            $this->db->insert('pacientes', $post);
            $id = $this->db->insert_id();
        }
        $this->db->where('id_paciente', $id);
        $this->db->delete('paciente_examen_variable');
        for ($i = 0; $i < count($variable_codigo); $i++) {
            $this->db->set('examen_cod', $examen[$i]);
            $this->db->set('variable_codigo', $variable_codigo[$i]);
            $this->db->set('id_paciente', $id);
            $this->db->set('valor_frecuencia', $valor_frecuencia[$i]);
            $this->db->set('frecuencia', $frecuencia[$i]);
            $this->db->set('valor_minimo', $valor_minimo[$i]);
            $this->db->set('valor_maximo', $valor_maximo[$i]);
            $this->db->insert('paciente_examen_variable');
        }
        $this->db->where('id_paciente', $id);
        $this->db->delete('paciente_contacto');
        for ($i = 0; $i < count($contacto_id); $i++) {
            $this->db->set('contacto_id', $contacto_id[$i]);
            $this->db->set('valor_frecuencia', $valor_frecuencia[$i]);
            $this->db->insert('paciente_contacto');
        }
//        die();
        return $id;
    }
    function buscador($tabla,$nombrecampo,$palabra){
//        $CI = & get_instance();
        $this->db->like($nombrecampo,$palabra);
        $this->db->where('activo','S');
        $user = $this->db->get($tabla);
        return $user->result();
    }

    function delete_pacientes($post) {
        $this->db->set('ACTIVO', 'N');
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $this->db->update('pacientes');
    }

    function edit_pacientes($post) {
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $datos = $this->db->get('pacientes', $post);
        return $datos = $datos->result();
    }
    function paciente_examen_variable($post) {
        $this->db->select('paciente_examen_variable.*,examenes.examen_nombre');
        $this->db->where('id_paciente', $post[$post["campo"]]);
        $this->db->join('examenes','examenes.examen_cod=paciente_examen_variable.examen_cod');
        $datos = $this->db->get('paciente_examen_variable');
        return $datos = $datos->result();
    }

    function consult_pacientes($post) {
        if (isset($post['id_paciente']))
            if ($post['id_paciente'] != "")
                $this->db->like('id_paciente', $post['id_paciente']);
        if (isset($post['cedula_paciente']))
            if ($post['cedula_paciente'] != "")
                $this->db->like('cedula_paciente', $post['cedula_paciente']);
        if (isset($post['nombres']))
            if ($post['nombres'] != "")
                $this->db->like('nombres', $post['nombres']);
        if (isset($post['apellidos']))
            if ($post['apellidos'] != "")
                $this->db->like('apellidos', $post['apellidos']);
        if (isset($post['fecha_afiliacion']))
            if ($post['fecha_afiliacion'] != "")
                $this->db->like('fecha_afiliacion', $post['fecha_afiliacion']);
        if (isset($post['foto']))
            if ($post['foto'] != "")
                $this->db->like('foto', $post['foto']);
        if (isset($post['direccion']))
            if ($post['direccion'] != "")
                $this->db->like('direccion', $post['direccion']);
        if (isset($post['barrio']))
            if ($post['barrio'] != "")
                $this->db->like('barrio', $post['barrio']);
        if (isset($post['ciudad']))
            if ($post['ciudad'] != "")
                $this->db->like('ciudad', $post['ciudad']);
        if (isset($post['fecha_nacimiento']))
            if ($post['fecha_nacimiento'] != "")
                $this->db->like('fecha_nacimiento', $post['fecha_nacimiento']);
        if (isset($post['estatura']))
            if ($post['estatura'] != "")
                $this->db->like('estatura', $post['estatura']);
        if (isset($post['peso']))
            if ($post['peso'] != "")
                $this->db->like('peso', $post['peso']);
        if (isset($post['telefono_fijo']))
            if ($post['telefono_fijo'] != "")
                $this->db->like('telefono_fijo', $post['telefono_fijo']);
        if (isset($post['celular']))
            if ($post['celular'] != "")
                $this->db->like('celular', $post['celular']);
        if (isset($post['email']))
            if ($post['email'] != "")
                $this->db->like('email', $post['email']);
        if (isset($post['fecha_inicio_contrato']))
            if ($post['fecha_inicio_contrato'] != "")
                $this->db->like('fecha_inicio_contrato', $post['fecha_inicio_contrato']);
        if (isset($post['fecha_fin_contrato']))
            if ($post['fecha_fin_contrato'] != "")
                $this->db->like('fecha_fin_contrato', $post['fecha_fin_contrato']);
        if (isset($post['tipo_cliente']))
            if ($post['tipo_cliente'] != "")
                $this->db->like('tipo_cliente', $post['tipo_cliente']);
        if (isset($post['cliente']))
            if ($post['cliente'] != "")
                $this->db->like('cliente', $post['cliente']);
        if (isset($post['medico']))
            if ($post['medico'] != "")
                $this->db->like('medico', $post['medico']);
        if (isset($post['observaciones']))
            if ($post['observaciones'] != "")
                $this->db->like('observaciones', $post['observaciones']);
        if (isset($post['activo']))
            if ($post['activo'] != "")
                $this->db->like('activo', $post['activo']);
        if (isset($post['examen_cod']))
            if ($post['examen_cod'] != "")
                $this->db->like('examen_cod', $post['examen_cod']);
        if (isset($post['hl7tag']))
            if ($post['hl7tag'] != "")
                $this->db->like('hl7tag', $post['hl7tag']);
        if (isset($post['variable_codigo']))
            if ($post['variable_codigo'] != "")
                $this->db->like('variable_codigo', $post['variable_codigo']);
        if (isset($post['valor_frecuencia']))
            if ($post['valor_frecuencia'] != "")
                $this->db->like('valor_frecuencia', $post['valor_frecuencia']);
        if (isset($post['frecuencia']))
            if ($post['frecuencia'] != "")
                $this->db->like('frecuencia', $post['frecuencia']);
        if (isset($post['valor_minimo']))
            if ($post['valor_minimo'] != "")
                $this->db->like('valor_minimo', $post['valor_minimo']);
        if (isset($post['valor_maximo']))
            if ($post['valor_maximo'] != "")
                $this->db->like('valor_maximo', $post['valor_maximo']);
        if (isset($post['observaciones_programas']))
            if ($post['observaciones_programas'] != "")
                $this->db->like('observaciones_programas', $post['observaciones_programas']);
        if (isset($post['contacto_id']))
            if ($post['contacto_id'] != "")
                $this->db->like('contacto_id', $post['contacto_id']);
        if (isset($post['tipo_equipo_cod']))
            if ($post['tipo_equipo_cod'] != "")
                $this->db->like('tipo_equipo_cod', $post['tipo_equipo_cod']);
        if (isset($post['descripcion']))
            if ($post['descripcion'] != "")
                $this->db->like('descripcion', $post['descripcion']);
        if (isset($post['estado']))
            if ($post['estado'] != "")
                $this->db->like('estado', $post['estado']);
        if (isset($post['prioridad']))
            if ($post['prioridad'] != "")
                $this->db->like('prioridad', $post['prioridad']);
        if (isset($post['codigo_hospital']))
            if ($post['codigo_hospital'] != "")
                $this->db->like('codigo_hospital', $post['codigo_hospital']);
        if (isset($post['tipo']))
            if ($post['tipo'] != "")
                $this->db->like('tipo', $post['tipo']);
        if (isset($post['aseguradora_id']))
            if ($post['aseguradora_id'] != "")
                $this->db->like('aseguradora_id', $post['aseguradora_id']);
        $this->db->select('id_paciente');
        $this->db->select('cedula_paciente');
        $this->db->select('nombres');
        $this->db->select('apellidos');
        $this->db->select('fecha_afiliacion');
        $this->db->select('direccion');
        $this->db->select('barrio');
        $this->db->select('ciudad');
        $this->db->select('fecha_nacimiento');
//        $this->db->select('estatura');
//        $this->db->select('peso');
//        $this->db->select('telefono_fijo');
//        $this->db->select('celular');
//        $this->db->select('email');
//        $this->db->select('fecha_inicio_contrato');
//        $this->db->select('fecha_fin_contrato');
//        $this->db->select('tipo_cliente');
//        $this->db->select('cliente');
//        $this->db->select('medico');
//        $this->db->select('observaciones');
//        $this->db->select('examen_cod');
//        $this->db->select('hl7tag');
//        $this->db->select('variable_codigo');
//        $this->db->select('valor_frecuencia');
//        $this->db->select('frecuencia');
//        $this->db->select('valor_minimo');
//        $this->db->select('valor_maximo');
//        $this->db->select('observaciones_programas');
//        $this->db->select('contacto_id');
//        $this->db->select('tipo_equipo_cod');
//        $this->db->select('descripcion');
//        $this->db->select('estado');
//        $this->db->select('prioridad');
//        $this->db->select('codigo_hospital');
//        $this->db->select('tipo');
//        $this->db->select('aseguradora_id');
        $this->db->where('ACTIVO', 'S');
        $datos = $this->db->get('pacientes');
        $datos = $datos->result();
        return $datos;
    }
    function consultavariables(){
        $this->db->where("ACTIVO","S");
        $variable = $this->db->get("variables");
        return $variable->result();
        
    }
}

?>
