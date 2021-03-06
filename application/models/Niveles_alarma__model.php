<?php

class Niveles_alarma__model extends CI_Model {
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

    function save_niveles_alarma($post) {
        if (isset($post['campo'])) {
            $this->db->where($post["campo"], $post[$post["campo"]]);
            unset($post['campo']);
            $this->db->update('niveles_alarma', $post);
        } else {
            $this->db->insert('niveles_alarma', $post);
        }
    }

    function delete_niveles_alarma($post) {
        $this->db->set('ACTIVO', 'N');
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $this->db->update('niveles_alarma');
    }

    function edit_niveles_alarma($post) {
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $datos = $this->db->get('niveles_alarma', $post);
        return $datos = $datos->result();
    }

    function consult_niveles_alarma($post) {
        if (isset($post['id_niveles_alarma']))
            if ($post['id_niveles_alarma'] != "")
                $this->db->like('id_niveles_alarma', $post['id_niveles_alarma']);
        if (isset($post['descripcion']))
            if ($post['descripcion'] != "")
                $this->db->like('descripcion', $post['descripcion']);
        if (isset($post['fecha_creacion']))
            if ($post['fecha_creacion'] != "")
                $this->db->like('fecha_creacion', $post['fecha_creacion']);
        if (isset($post['examen_cod']))
            if ($post['examen_cod'] != "")
                $this->db->like('examen_cod', $post['examen_cod']);
        if (isset($post['analisis_resultado']))
            if ($post['analisis_resultado'] != "")
                $this->db->like('analisis_resultado', $post['analisis_resultado']);
        if (isset($post['n_repeticiones_minimas']))
            if ($post['n_repeticiones_minimas'] != "")
                $this->db->like('n_repeticiones_minimas', $post['n_repeticiones_minimas']);
        if (isset($post['n_repeticiones_maximas']))
            if ($post['n_repeticiones_maximas'] != "")
                $this->db->like('n_repeticiones_maximas', $post['n_repeticiones_maximas']);
        if (isset($post['tiempo']))
            if ($post['tiempo'] != "")
                $this->db->like('tiempo', $post['tiempo']);
        if (isset($post['frecuencia']))
            if ($post['frecuencia'] != "")
                $this->db->like('frecuencia', $post['frecuencia']);
        if (isset($post['color']))
            if ($post['color'] != "")
                $this->db->like('color', $post['color']);
        if (isset($post['id_protocolo']))
            if ($post['id_protocolo'] != "")
                $this->db->like('id_protocolo', $post['id_protocolo']);
        if (isset($post['activo']))
            if ($post['activo'] != "")
                $this->db->like('activo', $post['activo']);
        $this->db->select('id_niveles_alarma');
        $this->db->select('descripcion');

//        $this->db->select('analisis_resultado');
        $this->db->select('n_repeticiones_minimas');
        $this->db->select('n_repeticiones_maximas');
        $this->db->select('color');
//                                $this->db->select('id_protocolo');
        $this->db->where('ACTIVO', 'S');
        if (empty($post))
            $this->db->where("1", 2);
        $datos = $this->db->get('niveles_alarma');
        $datos = $datos->result();
        return $datos;
    }
    function buscar_niveles_alarma($data) {
        $this->db->select('count(*) gtg', false);
        $this->db->where('descripcion', $data['descripcion']);
        $this->db->where('n_repeticiones_minimas', $data['n_repeticiones_minimas']);
        $this->db->where('color', $data['color']);
        $this->db->where('n_repeticiones_maximas', $data['n_repeticiones_maximas']);
        $this->db->where('id_protocolo', $data['id_protocolo']);
        $datos = $this->db->get('niveles_alarma');
        $datos = $datos->result();
        if (count($datos)) {
            return $datos[0]->gtg;
        }else{
            return 0;
        }
//        $this->db->insert_batch('nivel_tipo_alarma', $data);
    }

}

?>
