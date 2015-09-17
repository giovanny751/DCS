<?php

class Clientes__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function save_clientes($post) {
        if (isset($post['campo'])) {
            $this->db->where($post["campo"], $post[$post["campo"]]);
            $id = $post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('clientes', $post);
        } else {
            $this->db->insert('clientes', $post);
            $id = $this->db->insert_id();
        }
        return $id;
    }

    function delete_clientes($post) {
        $this->db->set('ACTIVO', 'N');
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $this->db->update('clientes');
    }

    function edit_clientes($post) {
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $datos = $this->db->get('clientes', $post);
        return $datos = $datos->result();
    }

    function consult_clientes($post) {
//        print_y($post);
        if (isset($post['id_cliente']))
            if ($post['id_cliente'] != "")
                $this->db->like('id_cliente', $post['id_cliente']);
        if (isset($post['nombre']))
            if ($post['nombre'] != "")
                $this->db->like('nombre', $post['nombre']);
        if (isset($post['fecha_creacion']))
            if ($post['fecha_creacion'] != "")
                $this->db->like('fecha_creacion', $post['fecha_creacion']);
        if (isset($post['id_tipo_cliente']))
            if ($post['id_tipo_cliente'] != "")
                $this->db->like('id_tipo_cliente', $post['id_tipo_cliente']);
        if (isset($post['creado_por']))
            if ($post['creado_por'] != "")
                $this->db->like('creado_por', $post['creado_por']);
        if (isset($post['fecha_inicio_contrato']))
            if ($post['fecha_inicio_contrato'] != "")
                $this->db->like('fecha_inicio_contrato', $post['fecha_inicio_contrato']);
        if (isset($post['fecha_fin_contrato']))
            if ($post['fecha_fin_contrato'] != "")
                $this->db->like('fecha_fin_contrato', $post['fecha_fin_contrato']);
        if (isset($post['estado']))
            if ($post['estado'] != "")
                $this->db->where('estado', $post['estado']);
        if (isset($post['email']))
            if ($post['email'] != "")
                $this->db->like('email', $post['email']);
        if (isset($post['activo']))
            if ($post['activo'] != "")
                $this->db->like('activo', $post['activo']);
        $this->db->select('id_cliente');
        $this->db->select('nombre');
        $this->db->select('descripcion');
        $this->db->select('fecha_inicio_contrato');
        $this->db->select('fecha_fin_contrato');
        $this->db->select('estado');
        $this->db->select('email');
        $this->db->join('tipo_cliente', 'clientes.id_tipo_cliente=tipo_cliente.id_tipo_cliente','left');
        $this->db->where('clientes.ACTIVO', 'S');
//        $this->db->where('tipo_cliente.ACTIVO', 'S');
        if (empty($post))
            $this->db->where("1", 2);
        $datos = $this->db->get('clientes');
        $datos = $datos->result();
        return $datos;
    }

    public function buscar_nombre($post) {
        $this->db->where_not_in('id_cliente', $post['id_cliente']);
        $this->db->where('nombre', $post['nombre']);
        $this->db->where('ACTIVO', 'S');
        $datos = $this->db->get('clientes');
        $datos = $datos->result();
        return count($datos);
    }

}

?>
