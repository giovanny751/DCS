<?php

class Brigadas__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function save_brigadas($post) {
        if(isset($post['equipos'])){
        $equi=$post['equipos'];
        unset($post['equipos']);
        }else{
            $equi=array();
        }
        if (isset($post['campo'])) {
            $this->db->where($post["campo"], $post[$post["campo"]]);
            $id = $post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('brigadas', $post);
        } else {
            $this->db->insert('brigadas', $post);
            $id = $this->db->insert_id();
        }
        
        
        $this->db->where('id_brigada',$id);
        $this->db->delete('brigadas_equipo');
        foreach ($equi as $key => $value) {
            $this->db->set('id_brigada',$id);
            $this->db->set('id_equipo',$value);
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
        $this->db->join('equipos','equipos.id_equipo=brigadas_equipo.id_equipo');
        $datos = $this->db->get('brigadas_equipo');
        return $datos = $datos->result();
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
