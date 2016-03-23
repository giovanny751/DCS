<?php

class Variables__model extends CI_Model {
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

    function save_variables($post) {
        if (isset($post['campo'])) {
            $this->db->where($post["campo"], $post[$post["campo"]]);
            $id = $post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('variables', $post);
        } else {
            $this->db->insert('variables', $post);
            $id = $this->db->insert_id();
        }
        return $id;
    }

    function delete_variables($post) {
        $this->db->set('ACTIVO', 'N');
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $this->db->update('variables');
    }

    function edit_variables($post) {
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $datos = $this->db->get('variables', $post);
        return $datos = $datos->result();
    }

    function consult_variables($post) {
        if (isset($post['variable_codigo']))
            if ($post['variable_codigo'] != "")
                $this->db->like('variable_codigo', $post['variable_codigo']);
        if (isset($post['hl7tag']))
            if ($post['hl7tag'] != "")
                $this->db->like('hl7tag', $post['hl7tag']);
        if (isset($post['descripcion']))
            if ($post['descripcion'] != "")
                $this->db->like('descripcion', $post['descripcion']);
        if (isset($post['fecha_creacion']))
            if ($post['fecha_creacion'] != "")
                $this->db->like('fecha_creacion', $post['fecha_creacion']);
        if (isset($post['examen_cod']))
            if ($post['examen_cod'] != "")
                $this->db->like('examen_cod', $post['examen_cod']);
        if (isset($post['activo']))
            if ($post['activo'] != "")
                $this->db->like('activo', $post['activo']);
        $this->db->select('variable_codigo');
        $this->db->select('hl7tag');
        $this->db->select('descripcion');
        //        $this->db->select('examen_cod');
        $this->db->select('examen_nombre');
        $this->db->join('examenes','examenes.examen_cod=variables.examen_cod','left');
        $this->db->where('variables.ACTIVO', 'S');
        $this->db->where('examenes.ACTIVO', 'S');
        if(empty($post))$this->db->where("1",2);
        $datos = $this->db->get('variables');
        $datos = $datos->result();
        return $datos;
    }
    public function referencia($post) {
        if(!empty($post['variable_codigo']))
        $this->db->where_not_in('variable_codigo', $post['variable_codigo']);
        $this->db->where('hl7tag', $post['hl7tag']);
        $this->db->where('ACTIVO', 'S');
        $datos = $this->db->get('variables');
        $datos =$datos->result();
        return count($datos);
    }
}

?>
