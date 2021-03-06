<?php

class Examenes__model extends CI_Model {
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

    function save_examenes($post) {
        if (isset($post['campo'])) {
            $this->db->where($post["campo"], $post[$post["campo"]]);
            $id = $post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('examenes', $post);
        } else {
            $this->db->insert('examenes', $post);
            $id = $this->db->insert_id();
        }
        return $id;
    }

    function delete_examenes($post) {
        $this->db->set('ACTIVO', 'N');
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $this->db->update('examenes');
    }

    function edit_examenes($post) {
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $datos = $this->db->get('examenes', $post);
        return $datos = $datos->result();
    }

    function consult_examenes($post) {
        if (isset($post['examen_cod']))
            if ($post['examen_cod'] != "")
                $this->db->like('examen_cod', $post['examen_cod']);
        if (isset($post['examen_nombre']))
            if ($post['examen_nombre'] != "")
                $this->db->like('examen_nombre', $post['examen_nombre']);
        if (isset($post['estado']))
            if ($post['estado'] != "")
                $this->db->like('estado', $post['estado']);
        if (isset($post['examen_fecha_creacion']))
            if ($post['examen_fecha_creacion'] != "")
                $this->db->like('examen_fecha_creacion', $post['examen_fecha_creacion']);
        if (isset($post['activo']))
            if ($post['activo'] != "")
                $this->db->like('activo', $post['activo']);
        $this->db->select('examen_cod');
        $this->db->select('examen_nombre');
        $this->db->select('estado');
        $this->db->where('ACTIVO', 'S');
        if(empty($post))$this->db->where("1",2);
        $datos = $this->db->get('examenes');
        $datos = $datos->result();
        return $datos;
    }

    public function referencia($post) {
        if (!empty($post['examen_cod']))
            $this->db->where_not_in('examen_cod', $post['examen_cod']);
        $this->db->where('examen_nombre', $post['examen_nombre']);
        $this->db->where('ACTIVO', 'S');
        $datos = $this->db->get('examenes');
        $datos = $datos->result();
        return count($datos);
    }

}

?>
