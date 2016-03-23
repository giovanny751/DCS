<?php

class Alarmas_generadas__model extends CI_Model {
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
        $this->db = $this->load->database('default', TRUE);
        $this->db2 = $this->load->database('pacsdb', TRUE);
    }

    function save_alarmas_generadas($post) {

        if (isset($post['campo'])) {
            $this->db->where($post["campo"], $post[$post["campo"]]);
            $id = $post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('alarmas_generadas', $post);
        } else {
            $this->db->insert('alarmas_generadas', $post);
            $id = $this->db->insert_id();
        }

        $this->db->select('contacto.email');
        $this->db->join('lectura_equipo', 'alarmas_generadas.id_lectura_equipo = lectura_equipo.id_lectura_equipo');
        $this->db->join('pacientes', 'lectura_equipo.id_paciente = pacientes.id_paciente');
        $this->db->join('paciente_contacto', 'lectura_equipo.id_paciente = paciente_contacto.id_paciente');
        $this->db->join('contacto', 'paciente_contacto.contacto_id = contacto.contacto_id');
        $this->db->where('id_alarmas_generadas', $id);
        $datos = $this->db->get('alarmas_generadas');
        $datos = $datos->result();
        foreach ($datos as $key => $value) {
            if (!empty($value->email)) {
                mail($value->email, 'asunto', 'pendiente');
            }
        }
        return $id;
    }

    function delete_alarmas_generadas($post) {
        $this->db->set('ACTIVO', 'N');
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $this->db->update('alarmas_generadas');
    }

    function edit_alarmas_generadas($post) {
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $this->db->select('fecha_nacimiento,foto,peso,estatura,lectura_equipo.id_paciente,alarmas_generadas.id_alarmas_generadas,cedula_paciente,nombres,apellidos,lectura_equipo.fecha_creacion');
        $this->db->select('niveles_alarma.descripcion DES_ALAR,tipo_alarma.analisis_resultados,examen_nombre,alarmas_generadas.analisis_resultado');
        $this->db->select('lectura_numerica,protocolos.descripcion descripcion_protocolo,protocolos.nombre nombre_procolo,alarmas_generadas.estado_id,alarmas_generadas.fecha_atencion,alarmas_generadas.descripcion descrip');
        $this->db->where('alarmas_generadas.ACTIVO', 'S');
        $this->db->join('niveles_alarma', 'niveles_alarma.id_niveles_alarma=alarmas_generadas.id_niveles_alarma', 'left');
        $this->db->join('lectura_equipo', 'lectura_equipo.id_lectura_equipo=alarmas_generadas.id_lectura_equipo', 'left');
        $this->db->join('pacientes', 'pacientes.id_paciente=lectura_equipo.id_paciente', 'left');
        $this->db->join('tipo_alarma', 'alarmas_generadas.id_tipo_alarma=tipo_alarma.id_tipo_alarma', 'left');
        $this->db->join('examenes', 'tipo_alarma.examen=examenes.examen_cod', 'left');
        $this->db->join('protocolos', 'niveles_alarma.id_protocolo=protocolos.id_protocolo', 'left');
        $datos = $this->db->get('alarmas_generadas');
//        echo $this->db->last_query();
        return $datos = $datos->result();
    }

    function busqueda_cedula($post) {

        if (isset($post['id_alarmas']))
            if ($post['id_alarmas'] != "")
                $this->db->where_in('id_alarmas_generadas', explode (',',$post['id_alarmas']));
        if (isset($post['cedula']))
            if ($post['cedula'] != "")
                $this->db->where('cedula_paciente', $post['cedula']);
        if (isset($post['variable_codigo']))
            if ($post['variable_codigo'] != "")
                $this->db->where('variables.variable_codigo', $post['variable_codigo']);
        if (isset($post['f_inicial']))
            if ($post['f_inicial'] != "")
                $this->db->where('lectura_equipo.fecha_creacion >=', $post['f_inicial'] . ' 00:00:00');
        if (isset($post['f_fin']))
            if ($post['f_fin'] != "")
                $this->db->where('lectura_equipo.fecha_creacion <=', $post['f_fin'] . ' 11:59:59');
        if (isset($post['examen_cod']))
            if ($post['examen_cod'] != "")
                $this->db->where('examenes.examen_cod ', $post['examen_cod']);

        $this->db->select('examenes.examen_nombre,alarmas_generadas.fecha_creacion,alarmas_generadas.fecha_creacion mi_fecha,variables.descripcion,variables.hl7tag');
        $this->db->select('lectura_numerica,paciente_examen_variable.valor_minimo n_repeticiones_minimas,paciente_examen_variable.valor_maximo n_repeticiones_maximas');

        $this->db->select('color,alarmas_generadas.id_alarmas_generadas,cedula_paciente,nombres,apellidos');
        $this->db->select('tipo_alarma.descripcion t_descrip,niveles_alarma.descripcion DES_ALAR,examen_nombre,alarmas_generadas.analisis_resultado');
        $this->db->select('lectura_numerica,protocolos.nombre nombre_procolo,alarmas_generadas.estado_id,alarmas_generadas.fecha_atencion,alarmas_generadas.descripcion descrip');
//        $this->db->select('');
//        $this->db->where('', 'S');
        $this->db->join('lectura_equipo', "pacientes.id_paciente=lectura_equipo.id_paciente ", 'left', false);
        $this->db->join('alarmas_generadas', "lectura_equipo.id_lectura_equipo=alarmas_generadas.id_lectura_equipo and alarmas_generadas.ACTIVO='S'", 'left', false);
        $this->db->join('niveles_alarma', 'niveles_alarma.id_niveles_alarma=alarmas_generadas.id_niveles_alarma', 'left');
        $this->db->join('tipo_alarma', 'alarmas_generadas.id_tipo_alarma=tipo_alarma.id_tipo_alarma', 'left');
        $this->db->join('variables', 'variables.variable_codigo=lectura_equipo.variable_codigo', 'left');
        $this->db->join('examenes', 'variables.examen_cod=examenes.examen_cod', 'left');
        $this->db->join('protocolos', 'niveles_alarma.id_protocolo=protocolos.id_protocolo', 'left');
        $this->db->join('paciente_examen_variable', 'paciente_examen_variable.id_paciente=pacientes.id_paciente and variables.variable_codigo=paciente_examen_variable.variable_codigo', 'left');
        $this->db->order_by('alarmas_generadas.fecha_creacion');
        $datos = $this->db->get('pacientes');
//                echo $this->db->last_query();
        $datos = $datos->result();

        return $datos;
    }

    function Contadorbusqueda_cedula2Datos($post) {

        if (isset($post['cedula']))
            if ($post['cedula'] != "")
                $this->db->where('cedula_paciente', $post['cedula']);
        if (isset($post['variable_codigo']))
            if ($post['variable_codigo'] != "")
                $this->db->where('variables.variable_codigo', $post['variable_codigo']);
        if (isset($post['f_inicial']))
            if ($post['f_inicial'] != "")
                $this->db->where('lectura_equipo.fecha_creacion >=', $post['f_inicial'] . ' 00:00:00');
        if (isset($post['f_fin']))
            if ($post['f_fin'] != "")
                $this->db->where('lectura_equipo.fecha_creacion <=', $post['f_fin'] . ' 11:59:59');
        if (isset($post['examen_cod']))
            if ($post['examen_cod'] != "")
                $this->db->where('examenes.examen_cod ', $post['examen_cod']); 

        $this->db->select(' alarmas_generadas.id_lectura_equipo,examenes.examen_nombre,alarmas_generadas.fecha_creacion,variables.descripcion,variables.hl7tag');
        $this->db->select('lectura_numerica,paciente_examen_variable.valor_minimo n_repeticiones_minimas,paciente_examen_variable.valor_maximo n_repeticiones_maximas');

        $this->db->select('color,alarmas_generadas.id_alarmas_generadas,cedula_paciente,nombres,apellidos,lectura_equipo.fecha_creacion');
        $this->db->select('tipo_alarma.descripcion t_descrip,niveles_alarma.descripcion DES_ALAR,examen_nombre,alarmas_generadas.analisis_resultado');
        $this->db->select('lectura_numerica,protocolos.nombre nombre_procolo,alarmas_generadas.estado_id,alarmas_generadas.fecha_atencion,alarmas_generadas.descripcion descrip');
//        $this->db->select('');
//        $this->db->where('', 'S');
        $this->db->join('lectura_equipo', "pacientes.id_paciente=lectura_equipo.id_paciente ", 'left', false);
        $this->db->join('alarmas_generadas', "lectura_equipo.id_lectura_equipo=alarmas_generadas.id_lectura_equipo and alarmas_generadas.ACTIVO='S'", 'left');
        $this->db->join('niveles_alarma', 'niveles_alarma.id_niveles_alarma=alarmas_generadas.id_niveles_alarma', 'left');
        $this->db->join('tipo_alarma', 'alarmas_generadas.id_tipo_alarma=tipo_alarma.id_tipo_alarma', 'left');
        $this->db->join('variables', 'variables.variable_codigo=lectura_equipo.variable_codigo', 'left');
        $this->db->join('examenes', 'variables.examen_cod=examenes.examen_cod', 'left');
        $this->db->join('protocolos', 'niveles_alarma.id_protocolo=protocolos.id_protocolo', 'left');
        $this->db->join('paciente_examen_variable', 'paciente_examen_variable.id_paciente=pacientes.id_paciente and variables.variable_codigo=paciente_examen_variable.variable_codigo', 'left');
        $this->db->order_by('alarmas_generadas.fecha_creacion');
        $datos = $this->db->get('pacientes');
//                echo $this->db->last_query();
        return $datos->result();

    }
    
        function busqueda_cedula2Datos($post,$cantidad,$inicio) {

        if (isset($post['cedula']))
            if ($post['cedula'] != "")
                $this->db->where('cedula_paciente', $post['cedula']);
        if (isset($post['variable_codigo']))
            if ($post['variable_codigo'] != "")
                $this->db->where('variables.variable_codigo', $post['variable_codigo']);
        if (isset($post['f_inicial']))
            if ($post['f_inicial'] != "")
                $this->db->where('lectura_equipo.fecha_creacion >=', $post['f_inicial'] . ' 00:00:00');
        if (isset($post['f_fin']))
            if ($post['f_fin'] != "")
                $this->db->where('lectura_equipo.fecha_creacion <=', $post['f_fin'] . ' 11:59:59');
        if (isset($post['examen_cod']))
            if ($post['examen_cod'] != "")
                $this->db->where('examenes.examen_cod ', $post['examen_cod']); 

        $this->db->select(' alarmas_generadas.id_lectura_equipo,examenes.examen_nombre,alarmas_generadas.fecha_creacion,variables.descripcion,variables.hl7tag');
        $this->db->select('lectura_numerica,paciente_examen_variable.valor_minimo n_repeticiones_minimas,paciente_examen_variable.valor_maximo n_repeticiones_maximas');

        $this->db->select('color,alarmas_generadas.id_alarmas_generadas,cedula_paciente,nombres,apellidos,lectura_equipo.fecha_creacion');
        $this->db->select('tipo_alarma.descripcion t_descrip,niveles_alarma.descripcion DES_ALAR,examen_nombre,alarmas_generadas.analisis_resultado');
        $this->db->select('lectura_numerica,protocolos.nombre nombre_procolo,alarmas_generadas.estado_id,alarmas_generadas.fecha_atencion,alarmas_generadas.descripcion descrip');
//        $this->db->select('');
//        $this->db->where('', 'S');
        $this->db->join('lectura_equipo', "pacientes.id_paciente=lectura_equipo.id_paciente ", 'left', false);
        $this->db->join('alarmas_generadas', "lectura_equipo.id_lectura_equipo=alarmas_generadas.id_lectura_equipo and alarmas_generadas.ACTIVO='S'", 'left');
        $this->db->join('niveles_alarma', 'niveles_alarma.id_niveles_alarma=alarmas_generadas.id_niveles_alarma', 'left');
        $this->db->join('tipo_alarma', 'alarmas_generadas.id_tipo_alarma=tipo_alarma.id_tipo_alarma', 'left');
        $this->db->join('variables', 'variables.variable_codigo=lectura_equipo.variable_codigo', 'left');
        $this->db->join('examenes', 'variables.examen_cod=examenes.examen_cod', 'left');
        $this->db->join('protocolos', 'niveles_alarma.id_protocolo=protocolos.id_protocolo', 'left');
        $this->db->join('paciente_examen_variable', 'paciente_examen_variable.id_paciente=pacientes.id_paciente and variables.variable_codigo=paciente_examen_variable.variable_codigo', 'left');
        $this->db->order_by('alarmas_generadas.fecha_creacion');
        $datos = $this->db->get('pacientes',$cantidad,$inicio);
//                echo $this->db->last_query();
        return $datos->result();

    }
    
    function busqueda_cedula2($post) {

        $datos=  $this->busqueda_cedula2Datos($post,200,1);
        
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

        if (isset($post['cedula']))
            if ($post['cedula'] != "")
                $this->db->where('cedula_paciente', $post['cedula']);
        if (isset($post['f_inicial']))
            if ($post['f_inicial'] != "")
                $this->db->where('c.fecha >=', $post['f_inicial'] . ' 00:00:00');
        if (isset($post['f_fin']))
            if ($post['f_fin'] != "")
                $this->db->where('c.fecha <=', $post['f_fin'] . ' 11:59:59');

        $datoss = $this->db->get('as_citas c');
//        echo $this->db->last_query();
        $datoss = $datoss->result();
        if (!empty($post['cedula'])) {
            $datos_b3 = $this->db->query("select description  from parametros limit 1");
            $datos_b3 = $datos_b3->result();
            $datos_b2 = $this->db2->query(" SELECT study_iuid, study_desc, study_datetime,study.num_instances,mods_in_study
                    FROM study
                    INNER JOIN patient ON patient.pk = study.patient_fk
                    WHERE patient.pat_id = '" . $post['cedula'] . "'");
            $datos_b2 = $datos_b2->result();
        } else {
            $datos_b2 = array();
            $datos_b3 = array();
        }
        
        return array($datos, $datoss, $datos_b2, $datos_b3);
    }

    function consult_alarmas_generadas($post) {
        if (isset($post['id_alarmas_generadas']))
            if ($post['id_alarmas_generadas'] != "")
                $this->db->like('id_alarmas_generadas', $post['id_alarmas_generadas']);
        if (isset($post['id_niveles_alarma']))
            if ($post['id_niveles_alarma'] != "")
                $this->db->like('id_niveles_alarma', $post['id_niveles_alarma']);
        if (isset($post['descripcion']))
            if ($post['descripcion'] != "")
                $this->db->like('descripcion', $post['descripcion']);
        if (isset($post['fecha_creacion']))
            if ($post['fecha_creacion'] != "")
                $this->db->like('lectura_equipo.fecha_creacion', $post['fecha_creacion']);
        if (isset($post['id_lectura_equipo']))
            if ($post['id_lectura_equipo'] != "")
                $this->db->like('id_lectura_equipo', $post['id_lectura_equipo']);
        if (isset($post['analisis_resultado']))
            if ($post['analisis_resultado'] != "")
                $this->db->like('alarmas_generadas.analisis_resultado', $post['analisis_resultado']);
        if (isset($post['estado_id']))
            if ($post['estado_id'] != "")
                $this->db->like('estado_id', $post['estado_id']);
        if (isset($post['lectura_id']))
            if ($post['lectura_id'] != "")
                $this->db->like('lectura_id', $post['lectura_id']);
        if (isset($post['examen_cod']))
            if ($post['examen_cod'] != "")
                $this->db->where('examenes.examen_cod', $post['examen_cod']);
        if (isset($post['cedula']))
            if ($post['cedula'] != "")
                $this->db->like('cedula_paciente', $post['cedula']);
        if (isset($post['estado']))
            if ($post['estado'] != "")
                $this->db->where('estado_id', $post['estado']);
        if (isset($post['activo']))
            if ($post['activo'] != "")
                $this->db->where('activo', $post['activo']);
        $this->db->where('tipo_alarma.analisis_resultados <>', 'Normal');
        $this->db->select('niveles_alarma.color,alarmas_generadas.id_alarmas_generadas,cedula_paciente,nombres,apellidos,lectura_equipo.fecha_creacion');
        $this->db->select('tipo_alarma.descripcion t_descrip,niveles_alarma.descripcion DES_ALAR,examen_nombre,alarmas_generadas.analisis_resultado');
        $this->db->select('lectura_numerica,protocolos.nombre nombre_procolo,alarmas_generadas.estado_id,alarmas_generadas.fecha_atencion,alarmas_generadas.descripcion descrip');
        $this->db->where('alarmas_generadas.ACTIVO', 'S');
        $this->db->join('niveles_alarma', 'niveles_alarma.id_niveles_alarma=alarmas_generadas.id_niveles_alarma', 'left');
        $this->db->join('lectura_equipo', 'lectura_equipo.id_lectura_equipo=alarmas_generadas.id_lectura_equipo', 'left');
        $this->db->join('pacientes', 'pacientes.id_paciente=lectura_equipo.id_paciente', 'left');
        $this->db->join('tipo_alarma', 'alarmas_generadas.id_tipo_alarma=tipo_alarma.id_tipo_alarma', 'left');
        $this->db->join('examenes', 'tipo_alarma.examen=examenes.examen_cod', 'left');
        $this->db->join('protocolos', 'niveles_alarma.id_protocolo=protocolos.id_protocolo', 'left');
        $this->db->order_by('niveles_alarma.color,lectura_equipo.fecha_creacion', 'desc');
        $datos = $this->db->get('alarmas_generadas');
        $datos = $datos->result();
//        echo $this->db->last_query();
        return $datos;
    }

    function buscar_pacientes($post) {
        $tipo_usuario = $this->session->userdata('tipo_usuario');

        if ($tipo_usuario == 2) {//medico
            $this->db->join('medicos', 'pacientes.medico=medicos.medico_codigo');
            $this->db->where('medicos.cedula', $this->session->userdata('usu_cedula'));
        }
        if ($tipo_usuario == 3) {//paciente
            $this->db->where('cedula_paciente', $this->session->userdata('usu_cedula'));
        }

        $this->db->where('cedula_paciente', $post['cedula']);
        $datos = $this->db->get('pacientes');
        $datos = $datos->result();
        return $datos;
    }

    function buscar_pacientes_examen($post) {
        $this->db->select('examen_cod');
        $this->db->where('id_paciente', $post['id_paciente']);
        $datos = $this->db->get('paciente_examen_variable');
        $datos = $datos->result();
        return $datos;
    }

}

?>
