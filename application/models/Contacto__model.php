<?php

class Contacto__model extends CI_Model {
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

    function save_contacto($post) {
        if (!isset($post['cuidador']))
            $this->db->set('cuidador', '');
        if (!isset($post['llaves']))
            $this->db->set('llaves', '');
        if (isset($post['campo'])) {
            $this->db->where($post["campo"], $post[$post["campo"]]);
            $id = $post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('contacto', $post);
        } else {
            $this->db->insert('contacto', $post);
            $id = $this->db->insert_id();
        }
        return $id;
    }

    function delete_contacto($post) {
//        $this->db->set('ACTIVO', 'N');
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $this->db->delete('contacto');
    }

    function edit_contacto($post) {
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $datos = $this->db->get('contacto', $post);
        return $datos = $datos->result();
    }

    function consult_contacto($post) {
        if (isset($post['contacto_id']))
            if ($post['contacto_id'] != "")
                $this->db->like('contacto_id', $post['contacto_id']);
        if (isset($post['documento']))
            if ($post['documento'] != "")
                $this->db->like('documento', $post['documento']);
        if (isset($post['nombre']))
            if ($post['nombre'] != "")
                $this->db->like('nombre', $post['nombre']);
        if (isset($post['Estado']))
            if ($post['Estado'] != "")
                $this->db->where('Estado', $post['Estado']);
        if (isset($post['fecha_creacion']))
            if ($post['fecha_creacion'] != "")
                $this->db->like('fecha_creacion', $post['fecha_creacion']);
        if (isset($post['direccion']))
            if ($post['direccion'] != "")
                $this->db->like('direccion', $post['direccion']);
        if (isset($post['telefono_fijo']))
            if ($post['telefono_fijo'] != "")
                $this->db->like('telefono_fijo', $post['telefono_fijo']);
        if (isset($post['celular']))
            if ($post['celular'] != "")
                $this->db->like('celular', $post['celular']);
        if (isset($post['email']))
            if ($post['email'] != "")
                $this->db->like('email', $post['email']);
        if (isset($post['parentesco']))
            if ($post['parentesco'] != "")
                $this->db->like('parentesco', $post['parentesco']);
        if (isset($post['llaves']))
            if ($post['llaves'] != "")
                $this->db->like('llaves', $post['llaves']);
        if (isset($post['cuidador']))
            if ($post['cuidador'] != "")
                $this->db->like('cuidador', $post['cuidador']);
        if (isset($post['activo']))
            if ($post['activo'] != "")
                $this->db->where('activo', $post['activo']); 
        $this->db->select('contacto_id');
        $this->db->select('documento');
        $this->db->select('nombre');
        $this->db->select('Estado');
        $this->db->select('direccion');
        $this->db->select('telefono_fijo');
        $this->db->select('celular');
        $this->db->select('email');
        $this->db->select('parentesco');
        $this->db->select('llaves');
        $this->db->select('cuidador');   
        if(empty($post))$this->db->where("1",2);
        $datos = $this->db->get('contacto');
//        echo $this->db->last_query();
        $datos = $datos->result();
        return $datos;
    }

    public function referencia($post) {
        if (!empty($post['contacto_id']))
            $this->db->where_not_in('contacto_id', $post['contacto_id']);
        $this->db->where('documento', $post['documento']);
        $this->db->where('ACTIVO', 'S');
        $datos = $this->db->get('contacto');
        $datos = $datos->result();
        return count($datos);
    }
}

?>
