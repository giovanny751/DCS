<?php

class Medicos__model extends CI_Model {
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
        
        
        $this->db->select('count(*) datos');
        $this->db->where('usu_cedula',$post['cedula_paciente']);
        $datos=$this->db->get('user');
        $datos=$datos->result();
//        echo $datos[0]->datos;
        if($datos[0]->datos==0){
            $this->db->set('usu_cedula',$post['cedula']);
            $this->db->set('usu_usuario',$post['cedula']);
            $this->db->set('usu_contrasena',sha1($post['cedula']));
            $this->db->set('usu_nombre',$post['nombre']);
            $this->db->set('usu_email',$post['email']);
            $this->db->set('est_id',1);
            $this->db->set('tipo_usuario',2);
            $this->db->insert('user');
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

    function form_consulta($post) {
        if (!empty($post['estado'])) {
            if ($post['estado'] == 1) {
                $this->db->where('(c.estado', $post['estado'], false);
                $this->db->or_where('c.estado', "2)", false);
            } else {
                $this->db->where('c.estado', $post['estado']);
            }
        }
        if (!empty($post['paciente'])) {
            $this->db->like('(pac.apellidos', $post['paciente'], false);
            $this->db->or_like('pac.nombres', $post['paciente']);
            $this->db->where('1', '1)', false);
        }
        if (!empty($post['Procedimientos'])) {
            $this->db->like('p.description', $post['Procedimientos']);
        }
        if (!empty($post['fecha_ini'])) {
            $this->db->where('c.fecha >', $post['fecha_ini'].' 00:00:00');
        }
        if (!empty($post['fecha_fin'])) {
            $this->db->where('c.fecha <', $post['fecha_fin'].' 23:59:59');
        }
        if (!empty($post['procedimientos_form'])) {
            $this->db->like('p.description',$post['procedimientos_form'] );
        }
        $this->db->where('m.medico_codigo', $post['medico_codigo']);

        $this->db->select(" a.id_cita,i.id as id_informe,pac.id_paciente,i.id, c.fecha  as fecha_ingreso , 
pac.nombres, pac.apellidos, p.description,
case 
  when(c.estado=1 or c.estado=2 ) then 'Sin Atender' 
  when(c.estado=3 ) then 'Atendido' 
  else 'Anulado' end  as estado  ,concepto as motivo ,
i.fecha as fecha_atencion,m.nombre,pac.cedula_paciente", false);
        $this->db->join('pacientes pac ', 'pac.cedula_paciente = c.cedula', 'inner', false);
        $this->db->join('parts p  ', 'p.id=c.id_proc_parts', 'inner', false);
        $this->db->join('medicos m  ', 'm.medico_codigo=c.id_medico', 'inner', false);
        $this->db->join('as_atencion_pacientes a  ', 'c.id=a.id_cita', 'inner', false);
        $this->db->join('as_informe i  ', 'a.id=i.id_atencion', 'inner', false);
        $this->db->join('as_detalle_informe di', 'i.id=di.id_informe', 'inner', false);
        $this->db->join('as_plantillas pl', 'pl.id=di.id_plantilla ', 'inner', false);
        $this->db->where('pl.nombre_campo', 'motivo');
        $datos = $this->db->get('as_citas c');
//        echo $this->db->last_query();
        return $datos->result();
    }

}

?>
