<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 *
 * @package     NYGSOFT
 * @author      Gerson J Barbosa / Nelson G Barbosa
 * @copyright   www.nygsoft.com
 * @celular     301 385 9952 - 312 421 2513
 * @email       javierbr12@hotmail.com    
 */
class Pacientes extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Pacientes__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }

    function index() {
        $this->data['post'] = $this->input->post();
        $this->data['variables'] = $this->Pacientes__model->consultavariables();
        $this->data['contactos'] = "";
        $this->data['aseguradora'] = "";
        $this->data['hospital'] = "";
        $this->layout->view('pacientes/index', $this->data);
    }

    function consult_pacientes() {
        $post = $this->input->post();
        $this->data['post'] = $this->input->post();
        $this->data['datos'] = $this->Pacientes__model->consult_pacientes($post);
        $this->layout->view('pacientes/consult_pacientes', $this->data);
    }
    function consult_pacientes2() {
        $post = $this->input->post();
        $this->data['post'] = $this->input->post();
        $data['data'] = $this->Pacientes__model->consult_pacientes($post, $this->input->post("length"), $this->input->post("start"));
        $data['recordsFiltered'] = count($this->Pacientes__model->consult_pacientes($post));
        $data['recordsTotal'] = $data['recordsFiltered'];
        echo json_encode($data);
    }

    function referencia() {
        $post = $this->input->post();
        $this->data['post'] = $this->input->post();
        echo $datos = $this->Pacientes__model->referencia($post);
//        $this->layout->view('clientes/consult_clientes', $this->data);
    }

    function save_pacientes() {
        $post = $this->input->post();
        $post['foto'] = basename($_FILES['foto']['name']);
        $post['documento'] = basename($_FILES['documento']['name']);
        $id = $this->Pacientes__model->save_pacientes($post);
//die();
        $targetPath = "./uploads/pacientes";
        if (!file_exists($targetPath)) {
            mkdir($targetPath, 0777, true);
        }
        $targetPath = "./uploads/pacientes/" . $id;
        if (!file_exists($targetPath)) {
            mkdir($targetPath, 0777, true);
        }
        $target_path = $targetPath . '/' . basename($_FILES['foto']['name']);
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_path)) {
            
        }
        $target_path = $targetPath . '/' . basename($_FILES['documento']['name']);
        if (move_uploaded_file($_FILES['documento']['tmp_name'], $target_path)) {
            
        }

        redirect('index.php/Pacientes/consult_pacientes', 'location');
    }

    function delete_pacientes() {
        $post = $this->input->post();
        $this->Pacientes__model->delete_pacientes($post);
        redirect('index.php/Pacientes/consult_pacientes', 'location');
    }

    function edit_pacientes() {
        $this->data['post'] = $this->input->post();
        if (!isset($this->data['post']['campo']))
            redirect('index.php/Pacientes/consult_pacientes', 'location');
        $this->data['datos'] = $this->Pacientes__model->edit_pacientes($this->data['post']);
        $this->data['contactos'] = $this->Pacientes__model->contactos($this->data['post']);
        $this->data['aseguradora'] = $this->Pacientes__model->aseguradora_paciente($this->data['post']);
        $this->data['hospital'] = $this->Pacientes__model->hospital_paciente($this->data['post']);
        $this->data['paciente_examen_variable'] = $this->Pacientes__model->paciente_examen_variable($this->data['post']);
        $this->data['paciente_equipo_tipoEquipo'] = $this->Pacientes__model->paciente_equipo_tipoEquipo($this->data['post']);
        $this->layout->view('pacientes/index', $this->data);
    }

    function copiar_paciente() {
        $this->data['post'] = $this->input->post();
        $this->data['paciente_examen_variable'] = $this->Pacientes__model->paciente_examen_variable($this->data['post']);
        echo $d = $this->load->view('pacientes/copiar_paciente', $this->data, true);
    }

    function eliminarcontacto() {

        $this->data['datos'] = $this->Pacientes__model->eliminar_pacientes($this->input->post("con_id"));
    }

    function eliminar_hospitalpaciente() {

        $this->data['datos'] = $this->Pacientes__model->eliminar_hospitalpaciente($this->input->post("id"));
    }

    function eliminar_aseguradorapaciente() {

        $this->data['datos'] = $this->Pacientes__model->eliminar_aseguradorapaciente($this->input->post("id"));
    }

    function autocomplete_cedula_paciente() {
        $tipo_usuario = $this->session->userdata('tipo_usuario');
        if ($tipo_usuario == 2) {//medico
            $this->db->join('medicos','pacientes.medico=medicos.medico_codigo');
            $this->db->where('medicos.cedula', $this->session->userdata('usu_cedula'));
        }
        if ($tipo_usuario == 3) {//paciente
            $this->db->where('cedula_paciente', $this->session->userdata('usu_cedula'));
        }
        $info = auto("pacientes", "id_paciente", "cedula_paciente", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function autocomplete_hospitales() {
        $tipo_usuario = $this->session->userdata('tipo_usuario');

//        if ($tipo_usuario == 2) {//medico
//            $this->db->where('cedula_paciente', $this->session->userdata('usu_cedula'));
//        }
        if ($tipo_usuario == 3) {//paciente
            $this->db->where('cedula_paciente', $this->session->userdata('usu_cedula'));
        }
        $info = $this->auto4("hospitales", "codigo_hospital", "nombre", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function autocomplete_aseguradora() {
        $info = $this->auto3("aseguradoras", "aseguradora_id", "nombre", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function autocomplete_descripcion() {
        $get=$this->input->get();
        if(isset($get['examen'])){
            if(!empty($get['examen'])){
            $examen=explode(',', $get['examen']);
            $this->db->where_in('equipo_examen_variable.examen_cod',$examen);
            }
        }
        if (isset($get['tipo_equipo_cod']))
            if (!empty($get['tipo_equipo_cod'])) {
                $this->db->where('tipo_equipo.tipo_equipo_cod', $this->input->get('tipo_equipo_cod'));
            }
        $info = $this->auto5("equipos", "id_equipo", "equipos.descripcion", $this->input->get('term'));
//        $tipo_equipo_cod=$this->input->get('tipo_equipo_cod');


        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function auto5($tabla, $idcampo, $nombrecampo, $letra) {
        $this->db->where('tipo_equipo.activo', 'S');
        $this->db->where('equipos.estado', '1');
        $this->db->join('tipo_equipo', 'tipo_equipo.tipo_equipo_cod=' . $tabla . '.tipo_equipo_cod');
        $this->db->join('equipo_examen_variable', 'equipo_examen_variable.id_equipo=' . $tabla . '.id_equipo');
        $search = buscador($tabla, $nombrecampo, $letra, 'serial');
//            print_r($search);
        $h = 0;
        foreach ($search as $result) {
            $data[$h] = array(
                'id' => $result->$idcampo,
                'label' => $result->descripcion,
                'value' => $result->descripcion . " :: " . $result->serial . " :: " . $result->fecha_ultima_calibracion . " :: " . $result->id_equipo . " :: " . $result->referencia
            );
            $h++;
        }
        return $data;
    }

    function autocomplete_nivel() {
        $info = $this->auto6("niveles_alarma", "id_niveles_alarma", "descripcion", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function autocomplete_nivel2() {
        $info = $this->auto8("niveles_alarma", "id_niveles_alarma", "descripcion", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function auto8($tabla, $idcampo, $nombrecampo, $letra) {
        $search = buscador($tabla, $nombrecampo, $letra);
        $h = 0;
        foreach ($search as $result) {
            $data[$h] = array(
                'id' => $result->$idcampo,
                'label' => $result->$nombrecampo,
                'value' => $result->descripcion . " :: " . $result->id_niveles_alarma . " :: " . $result->n_repeticiones_minimas . " :: " . $result->n_repeticiones_maximas . " :: " . $result->color
            );
            $h++;
        }
        return $data;
    }

    function autocomplete_nom_paciente() {
        $info = $this->auto7("pacientes", "id_paciente", "nombres", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function auto7($tabla, $idcampo, $nombrecampo, $letra) {
        $search = buscador($tabla, $nombrecampo, $letra, 'cedula_paciente');
        $h = 0;
        foreach ($search as $result) {
            $data[$h] = array(
                'id' => $result->$idcampo,
                'label' => $result->$nombrecampo,
                'value' => $result->cedula_paciente . " :: " . $result->nombres . " :: " . $result->id_paciente
            );
            $h++;
        }
        return $data;
    }

    function auto6($tabla, $idcampo, $nombrecampo, $letra) {
        $search = buscador($tabla, $nombrecampo, $letra);
        $h = 0;
        foreach ($search as $result) {
            $data[$h] = array(
                'id' => $result->$idcampo,
                'label' => $result->$nombrecampo,
                'value' => $result->descripcion . " :: " . $result->id_niveles_alarma
            );
            $h++;
        }
        return $data;
    }

    function auto3($tabla, $idcampo, $nombrecampo, $letra) {
        $search = buscador($tabla, $nombrecampo, $letra);
        $h = 0;
        foreach ($search as $result) {
            $data[$h] = array(
                'id' => $result->$idcampo,
                'label' => $result->$nombrecampo,
                'value' => $result->tipo . " :: " . $result->nombre . " :: " . $result->direccion . " :: " . $result->telefono_fijo . " :: " . $result->celular . " :: " . $result->aseguradora_id
            );
            $h++;
        }
        return $data;
    }

    function auto4($tabla, $idcampo, $nombrecampo, $letra) {
        $search = buscador($tabla, $nombrecampo, $letra);
        $h = 0;
        foreach ($search as $result) {
            $data[$h] = array(
                'id' => $result->$idcampo,
                'label' => $result->$nombrecampo,
                'value' => $result->nombre . " :: " . $result->direccion . " :: " . $result->telefono_fijo . " :: " . $result->celular . " :: " . $result->email . " :: " . $result->codigo_hospital
            );
            $h++;
        }


        return $data;
    }

    function autocomplete_contacto_id() {
        $info = $this->auto2("contacto", "contacto_id", "nombre", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function auto2($tabla, $idcampo, $nombrecampo, $letra) {
        $search = buscador($tabla, $nombrecampo, $letra);
        $h = 0;
        foreach ($search as $result) {
            $data[$h] = array(
                'id' => $result->$idcampo,
                'label' => $result->documento . " " . $result->$nombrecampo,
                'value' => $result->$nombrecampo . " :: " . $result->direccion . " :: " . $result->telefono_fijo . " :: " . $result->celular . " :: " . $result->email . " :: " . $result->parentesco . " :: " . $result->llaves . " :: " . $result->contacto_id
            );
            $h++;
        }
        return $data;
    }

    function autocomplete_nombres() {
        $info = auto("pacientes", "id_paciente", "nombres", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function autocomplete_apellidos() {
        $info = auto("pacientes", "id_paciente", "apellidos", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function cliente() {
        $post = $this->input->post();
        echo lista("cliente", "cliente", "form-control obligatorio", "clientes", "id_cliente", "nombre", null, array("ACTIVO" => "S", 'id_tipo_cliente' => $post['id_tipo_cliente']), /* readOnly? */ false);
    }

}

?>
