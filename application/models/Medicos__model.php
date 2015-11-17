<?php

class Medicos__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function save_medicos($post) {
        $procedimientos_deta = $post['procedimientos_deta'];
        unset($post['procedimientos_deta']);
        if (isset($post['campo'])) {
            $this->db->where($post["campo"], $post[$post["campo"]]);
            $id = $post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('medicos', $post);
        } else {
            $this->db->insert('medicos', $post);
            $id = $this->db->insert_id();
        }
        $this->db->where('id_medico', $id);
        $this->db->delete('as_medicos_parts');
        foreach ($procedimientos_deta as $key => $value) {
            $this->db->set('id_medico', $id);
            $this->db->set('id_proc_parts', $value);
            $this->db->insert('as_medicos_parts');
        }

        return $id;
    }

    function delete_medicos($post) {
        $this->db->set('ACTIVO', 'N');
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $this->db->update('medicos');
    }

    function edit_medicos($post) {
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $datos = $this->db->get('medicos', $post);
        return $datos = $datos->result();
    }

    function as_medicos_parts($post) {
        $this->db->select('parts.*');
        $this->db->where("id_medico", $post[$post["campo"]]);
        $datos = $this->db->join('parts', 'parts.id=as_medicos_parts.id_proc_parts');
        $datos = $this->db->get('as_medicos_parts');
        return $datos = $datos->result();
    }

    function consult_medicos($post) {
        if (isset($post['medico_codigo']))
            if ($post['medico_codigo'] != "")
                $this->db->like('medico_codigo', $post['medico_codigo']);
        if (isset($post['nombre']))
            if ($post['nombre'] != "")
                $this->db->like('nombre', $post['nombre']);
        if (isset($post['fecha_creacion']))
            if ($post['fecha_creacion'] != "")
                $this->db->like('fecha_creacion', $post['fecha_creacion']);
        if (isset($post['Estado']))
            if ($post['Estado'] != "")
                $this->db->like('Estado', $post['Estado']);
        if (isset($post['matricula_profesional']))
            if ($post['matricula_profesional'] != "")
                $this->db->like('matricula_profesional', $post['matricula_profesional']);
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
        if (isset($post['activo']))
            if ($post['activo'] != "")
                $this->db->like('activo', $post['activo']);
        $this->db->select('medico_codigo');
        $this->db->select('nombre');
        $this->db->select('Estado');
        $this->db->select('matricula_profesional');
        $this->db->select('direccion');
        $this->db->select('telefono_fijo');
        $this->db->select('celular');
        $this->db->select('email');
        $this->db->where('ACTIVO', 'S');
        if (empty($post))
            $this->db->where("1", 2);
        $datos = $this->db->get('medicos');
        $datos = $datos->result();
        return $datos;
    }

    public function referencia($post) {
        if (!empty($post['medico_codigo']))
            $this->db->where_not_in('medico_codigo', $post['medico_codigo']);
        $this->db->where('nombre', $post['nombre']);
        $this->db->where('ACTIVO', 'S');
        $datos = $this->db->get('medicos');
        $datos = $datos->result();
        return count($datos);
    }

    public function referencia2($post) {
        if (!empty($post['medico_codigo']))
            $this->db->where_not_in('medico_codigo', $post['medico_codigo']);
        $this->db->where('matricula_profesional', $post['matricula_profesional']);
        $this->db->where('ACTIVO', 'S');
        $datos = $this->db->get('medicos');
        $datos = $datos->result();
//        echo $this->db->last_query();
        return count($datos);
    }

}

?>
