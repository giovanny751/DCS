<?php

class Brigadas__model extends CI_Model {
/**
 *
 * @package     NYGSOFT
 * @author      Gerson J Barbosa / Nelson G Barbosa
 * @copyright   www.nygsoft.com
 * @celular     301 385 9952 - 312 421 2513
 * @email       javierbr12@hotmail.com    
 */
    function __construct() {
        parent::__construct();
    }

    function save_brigadas($post) {
        if (isset($post['equipos'])) {
            $equi = $post['equipos'];
            unset($post['equipos']);
        } else {
            $equi = array();
        }
        unset($post['tipo_equipo_cod']);

        if (isset($post['campo'])) {
            $this->db->where($post["campo"], $post[$post["campo"]]);
            $id = $post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('brigadas', $post);
        } else {
//            echo "entro";
//            print_r($post);
            if (isset($post['id_brigada']))
                if (!empty($post['id_brigada'])) {
                    $this->db->where('id_brigada', $post['id_brigada']);
                    $this->db->update('brigadas', $post);
                } else
                    $this->db->insert('brigadas', $post);
            else
                $this->db->insert('brigadas', $post);
            $id = $this->db->insert_id();
        }


        $this->db->where('id_brigada', $id);
        $this->db->delete('brigadas_equipo');
        foreach ($equi as $key => $value) {
            $this->db->set('id_brigada', $id);
            $this->db->set('id_equipo', $value);
            $this->db->insert('brigadas_equipo');
        }

        return $id;
    }

    function delete_brigadas($post) {
        $this->db->set('ACTIVO', 'N');
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $this->db->update('brigadas');
    }

    function edit_brigadas($post) {
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $datos = $this->db->get('brigadas', $post);
        return $datos = $datos->result();
    }

    function brigadas_equipo($post) {
        $this->db->select('equipos.*');
        $this->db->where('id_brigada', $post[$post["campo"]]);
        $this->db->join('equipos', 'equipos.id_equipo=brigadas_equipo.id_equipo');
        $datos = $this->db->get('brigadas_equipo');
        return $datos = $datos->result();
    }

    function buscar_alarmas($post) {
        $this->db->select('lectura_equipo.id_lectura_equipo,lectura_equipo.serial_equipo,examenes.examen_nombre,variables.hl7tag,lectura_equipo.lectura_numerica');
        $this->db->join('equipos', 'equipos.serial=lectura_equipo.serial_equipo');
        $this->db->join('examenes', 'equipos.examen_cod=examenes.examen_cod');
        $this->db->join('variables', 'variables.variable_codigo=lectura_equipo.variable_codigo');
        $this->db->where('id_paciente', null);
        $this->db->or_where('id_paciente', 0);
        $datos = $this->db->get('lectura_equipo');
        return $datos = $datos->result();
    }

    function save_pacientes($post) {

        $this->db->select('id_paciente', false);
        $this->db->where('cedula_paciente', $post['modal_cedula']);
        $datos = $this->db->get('pacientes');
        $datos = $datos->result();

        $this->db->set('nombres', $post['modal_nombre']);
        $this->db->set('apellidos', $post['modal_apellidos']);
        $this->db->set('fecha_nacimiento', $post['modal_fecha']);
        $this->db->set('estatura', $post['modal_estatura']);
        $this->db->set('cedula_paciente', $post['modal_cedula']);
        $this->db->set('sexo', $post['sexo']);
        $this->db->set('rh', $post['rh']);
        $this->db->set('tipo_documento', $post['tipo_documento']);
        $this->db->set('estrato', $post['estrato']);
        if (count($datos)) {
            $id = $datos[0]->id_paciente;
            $this->db->where('cedula_paciente', $post['modal_cedula']);
            $datos = $this->db->update('pacientes');
        } else {
            $this->db->insert('pacientes');
            $id = $this->db->insert_id();
        }
        $ff = explode(',', $post['id_lectura']);
        foreach ($ff as $value) {
            if (!empty($value)) {
                $this->db->set('id_paciente', $id);
                $this->db->where('id_lectura_equipo', $value);
                $this->db->update('lectura_equipo');
            }
        }
    }

    function consult_brigadas($post) {
        if (isset($post['id_brigada']))
            if ($post['id_brigada'] != "")
                $this->db->like('id_brigada', $post['id_brigada']);
        if (isset($post['nombre']))
            if ($post['nombre'] != "")
                $this->db->like('nombre', $post['nombre']);
        if (isset($post['id_cliente']))
            if ($post['id_cliente'] != "")
                $this->db->like('id_cliente', $post['id_cliente']);
        if (isset($post['Direccion']))
            if ($post['Direccion'] != "")
                $this->db->like('Direccion', $post['Direccion']);
        if (isset($post['ciudad']))
            if ($post['ciudad'] != "")
                $this->db->like('ciudad', $post['ciudad']);
        if (isset($post['activo']))
            if ($post['activo'] != "")
                $this->db->like('activo', $post['activo']);
        $this->db->select('id_brigada');
        $this->db->select('nombre');
//        $this->db->select('id_cliente');
        $this->db->select('Direccion');
        $this->db->select('ciudad');
        $this->db->where('ACTIVO', 'S');
        $datos = $this->db->get('brigadas');
        $datos = $datos->result();
        return $datos;
    }

}

?>
