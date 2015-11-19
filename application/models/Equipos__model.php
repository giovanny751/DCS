<?php

class Equipos__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function save_equipos($post) {
        $variable_codigo = $post['variable_codigo'];
        $examen = $post['examen'];
//        $estado_examen = $post['estado_examen'];

        if (empty($post['imagen']))
            unset($post['imagen']);
        if (empty($post['adjuntar_certificado']))
            unset($post['adjuntar_certificado']);
        unset($post['variable_codigo']);
        unset($post['examen']);
//        unset($post['estado_examen']);

        if (isset($post['campo'])) {
            $this->db->where($post["campo"], $post[$post["campo"]]);
            $id = $post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('equipos', $post);
        } else {
            $this->db->set('estado', 'DISPONIBLE');
            $this->db->insert('equipos', $post);
            $id = $this->db->insert_id();
        }

        $this->db->where('id_equipo', $id);
        $this->db->delete('equipo_examen_variable');
        for ($i = 0; $i < count($variable_codigo); $i++) {
            $this->db->set('examen_cod', $examen[$i]);
            $this->db->set('variable_codigo', $variable_codigo[$i]);
            $this->db->set('id_equipo', $id);
//            $this->db->set('estado', $estado_examen[$i]);
            $this->db->insert('equipo_examen_variable');
        }
        $this->db->set('equipo_id', $id);
        $this->db->set('id_estado', $post['estado']);
        $this->db->set('fecha', date('Y-m-j'));
        $this->db->set('ubicacion', $post['ubicacion']);
        $this->db->set('usuario', $this->session->userdata('usu_id'));
        $this->db->insert('historial_equipo_estado');


//        die();
        return $id;
    }

    function delete_equipos($post) {
        $this->db->set('ACTIVO', 'N');
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $this->db->update('equipos');
    }

    function edit_equipos($post) {
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $datos = $this->db->get('equipos', $post);
        return $datos = $datos->result();
    }

    function equipo_examen_variable($post) {
        $this->db->select('equipo_examen_variable.*,examenes.examen_nombre');
        $this->db->where('id_equipo', $post[$post["campo"]]);
        $this->db->join('examenes', 'examenes.examen_cod=equipo_examen_variable.examen_cod');
        $datos = $this->db->get('equipo_examen_variable');
        return $datos = $datos->result();
    }

    function consult_equipos($post) {
        if (isset($post['id_equipo']))
            if ($post['id_equipo'] != "")
                $this->db->like('id_equipo', $post['id_equipo']);
        if (isset($post['descripcion']))
            if ($post['descripcion'] != "")
                $this->db->like('descripcion', $post['descripcion']);
        if (isset($post['fecha_creacion']))
            if ($post['fecha_creacion'] != "")
                $this->db->like('fecha_creacion', $post['fecha_creacion']);
        if (isset($post['estado']))
            if ($post['estado'] != "")
                $this->db->like('tipo_equipo.estado', $post['estado']);
        if (isset($post['ubicacion']))
            if ($post['ubicacion'] != "")
                $this->db->like('ubicacion', $post['ubicacion']);
        if (isset($post['serial']))
            if ($post['serial'] != "")
                $this->db->like('serial', $post['serial']);
        if (isset($post['fabricante']))
            if ($post['fabricante'] != "")
                $this->db->like('fabricante', $post['fabricante']);
        if (isset($post['fecha_fabricacion']))
            if ($post['fecha_fabricacion'] != "")
                $this->db->like('fecha_fabricacion', $post['fecha_fabricacion']);
        if (isset($post['tipo_equipo_cod']))
            if ($post['tipo_equipo_cod'] != "")
                $this->db->like('equipos.tipo_equipo_cod', $post['tipo_equipo_cod']);
        if (isset($post['imagen']))
            if ($post['imagen'] != "")
                $this->db->like('imagen', $post['imagen']);
        if (isset($post['responsable']))
            if ($post['responsable'] != "")
                $this->db->like('responsable', $post['responsable']);
        if (isset($post['observaciones']))
            if ($post['observaciones'] != "")
                $this->db->like('observaciones', $post['observaciones']);
        if (isset($post['activo']))
            if ($post['activo'] != "")
                $this->db->like('activo', $post['activo']);
        if (isset($post['fecha_ultima_calibracion']))
            if ($post['fecha_ultima_calibracion'] != "")
                $this->db->like('fecha_ultima_calibracion', $post['fecha_ultima_calibracion']);
        if (isset($post['empresa_certificadora']))
            if ($post['empresa_certificadora'] != "")
                $this->db->like('empresa_certificadora', $post['empresa_certificadora']);
        if (isset($post['adjuntar_certificado']))
            if ($post['adjuntar_certificado'] != "")
                $this->db->like('adjuntar_certificado', $post['adjuntar_certificado']);
        if (isset($post['examen_cod']))
            if ($post['examen_cod'] != "")
                $this->db->like('examen_cod', $post['examen_cod']);
        if (isset($post['variable_codigo']))
            if ($post['variable_codigo'] != "")
                $this->db->like('variable_codigo', $post['variable_codigo']);
        $this->db->select('id_equipo');
        $this->db->select('descripcion');
        $this->db->select('tipo_equipo.estado');
        $this->db->select('ubicacion');
        $this->db->select('serial');
        $this->db->select('fabricante');
        $this->db->select('fecha_fabricacion');
        $this->db->select('referencia');
        $this->db->select('responsable');
        $this->db->join('tipo_equipo', 'equipos.tipo_equipo_cod=tipo_equipo.tipo_equipo_cod');
        $this->db->where('equipos.ACTIVO', 'S');
        if (empty($post))
            $this->db->where("1", 2);
        $datos = $this->db->get('equipos');
        $datos = $datos->result();
        return $datos;
    }
    function informacion_tabla1($post){
        if(!empty($post['estado']))
        $this->db->where('estado_equipos.id_estado',$post['estado']);
        if(!empty($post['descripcion']))
        $this->db->like('equipos.descripcion',$post['descripcion']);
        if(!empty($post['id_equipo']))
        $this->db->where('tipo_equipo.tipo_equipo_cod',$post['id_equipo']);
        $this->db->select("tipo_equipo.referencia,equipos.descripcion,equipos.serial,estado_equipos.estado,equipos.fecha_ultima_calibracion,'1' cantidad",false);
        $this->db->join('tipo_equipo','tipo_equipo.tipo_equipo_cod=equipos.tipo_equipo_cod');
        $this->db->join('estado_equipos','estado_equipos.id_estado=equipos.estado');
        $datos=$this->db->get('equipos');
        $datos = $datos->result();
        return $datos;
    }
    function informacion_tabla2($post){
        if(!empty($post['estado']))
        $this->db->where('estado_equipos.id_estado',$post['estado']);
//        if(!empty($post['descripcion']))
//        $this->db->like('equipos.descripcion',$post['descripcion']);
        if(!empty($post['id_equipo']))
        $this->db->where('tipo_equipo.tipo_equipo_cod',$post['id_equipo']);
        
        if(!empty($post['fecha_ini']))
        $this->db->where('historial_equipo_estado.fecha >',$post['fecha_ini']);
        
        if(!empty($post['fecha_fin']))
        $this->db->where('historial_equipo_estado.fecha <',$post['fecha_fin']);
        
        $this->db->select("tipo_equipo.referencia,equipos.descripcion,equipos.serial,estado_equipos.estado,historial_equipo_estado.ubicacion, historial_equipo_estado.fecha,user.usu_usuario",false);
        $this->db->join('tipo_equipo','tipo_equipo.tipo_equipo_cod=equipos.tipo_equipo_cod');
        $this->db->join('estado_equipos','estado_equipos.id_estado=equipos.estado');
        $this->db->join('historial_equipo_estado','estado_equipos.id_estado=historial_equipo_estado.id_estado and historial_equipo_estado.equipo_id=equipos.id_equipo');
        $this->db->join('user','user.usu_id=historial_equipo_estado.usuario','left');
        $datos=$this->db->get('equipos');
        $datos = $datos->result();
        return $datos;
    }
    function verificar_equipo($post){
        $this->db->select("count(id_equipo) as id_equipo",false);
        $this->db->where("id_equipo",$post['id_equipo']);
        $datos=$this->db->get("paciente_equipo_tipoequipo");
        return $datos->result();
    }

}

?>
