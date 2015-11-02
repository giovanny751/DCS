<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

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

    function save_pacientes() {
        $post = $this->input->post();
        $post['foto'] = basename($_FILES['foto']['name']);
        $post['documento'] = basename($_FILES['documento']['name']);
        $id = $this->Pacientes__model->save_pacientes($post);

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
    function copiar_paciente(){
        $this->data['post'] = $this->input->post();
        $this->data['paciente_examen_variable'] = $this->Pacientes__model->paciente_examen_variable($this->data['post']);
        echo $d=$this->load->view('pacientes/copiar_paciente', $this->data,true);
    }
    function eliminarcontacto(){
        
        $this->data['datos'] = $this->Pacientes__model->eliminar_pacientes($this->input->post("con_id"));

    }
    function eliminar_hospitalpaciente(){
        
        $this->data['datos'] = $this->Pacientes__model->eliminar_hospitalpaciente($this->input->post("id"));

    }
    function eliminar_aseguradorapaciente(){
        
        $this->data['datos'] = $this->Pacientes__model->eliminar_aseguradorapaciente($this->input->post("id"));

    }

    function autocomplete_cedula_paciente() {
        $info = auto("pacientes", "id_paciente", "cedula_paciente", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }
    function autocomplete_hospitales() {
        $info = $this->auto4("hospitales", "codigo_hospital", "nombre", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }
    function autocomplete_aseguradora() {
        $info = $this->auto3("aseguradoras", "aseguradora_id", "nombre", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }
    
    
    function autocomplete_descripcion() {
        $info = $this->auto5("equipos", "id_equipo", "equipos.descripcion", $this->input->get('term'));
        $tipo_equipo_cod=$this->input->get('tipo_equipo_cod');
        if(isset($tipo_equipo_cod))
        if(!empty($tipo_equipo_cod)){
            $this->db->where('tipo_equipo_cod',$this->input->get('tipo_equipo_cod'));
        }
        
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }
    function auto5($tabla,$idcampo,$nombrecampo,$letra) {
        $this->db->join('tipo_equipo','tipo_equipo.tipo_equipo_cod='.$tabla.'.tipo_equipo_cod');
            $search = buscador($tabla,$nombrecampo,$letra,'serial');
//            print_r($search);
            $h = 0;
            foreach($search as $result){
                $data[$h] = array(
                    'id' => $result->$idcampo,
                       'label' => $result->descripcion,
                       'value' => $result->descripcion." :: ".$result->serial." :: ".$result->fecha_ultima_calibracion." :: ".$result->id_equipo." :: ".$result->referencia
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
    function auto8($tabla,$idcampo,$nombrecampo,$letra) {
            $search = buscador($tabla,$nombrecampo,$letra);
            $h = 0;
            foreach($search as $result){
                $data[$h] = array(
                    'id' => $result->$idcampo,
                       'label' => $result->$nombrecampo,
                       'value' => $result->descripcion." :: ".$result->id_niveles_alarma." :: ".$result->n_repeticiones_minimas." :: ".$result->n_repeticiones_maximas." :: ".$result->color
                );
                $h++;
            }
            return $data;
    }
    function autocomplete_nom_paciente() {
        $info = $this->auto7("pacientes", "id_paciente", "nombres", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }
    function auto7($tabla,$idcampo,$nombrecampo,$letra) {
            $search = buscador($tabla,$nombrecampo,$letra,'cedula_paciente');
            $h = 0;
            foreach($search as $result){
                $data[$h] = array(
                    'id' => $result->$idcampo,
                       'label' => $result->$nombrecampo,
                       'value' => $result->cedula_paciente." :: ".$result->nombres." :: ".$result->id_paciente
                );
                $h++;
            }
            return $data;
    }
    
    function auto6($tabla,$idcampo,$nombrecampo,$letra) {
            $search = buscador($tabla,$nombrecampo,$letra);
            $h = 0;
            foreach($search as $result){
                $data[$h] = array(
                    'id' => $result->$idcampo,
                       'label' => $result->$nombrecampo,
                       'value' => $result->descripcion." :: ".$result->id_niveles_alarma
                );
                $h++;
            }
            return $data;
    }
    function auto3($tabla,$idcampo,$nombrecampo,$letra) {
            $search = buscador($tabla,$nombrecampo,$letra);
            $h = 0;
            foreach($search as $result){
                $data[$h] = array(
                    'id' => $result->$idcampo,
                       'label' => $result->$nombrecampo,
                       'value' => $result->tipo." :: ".$result->nombre." :: ".$result->direccion." :: ".$result->telefono_fijo." :: ".$result->celular." :: ".$result->aseguradora_id
                );
                $h++;
            }
            return $data;
    }
    
    function auto4($tabla,$idcampo,$nombrecampo,$letra) {
            $search = buscador($tabla,$nombrecampo,$letra);
            $h = 0;
            foreach($search as $result){
                $data[$h] = array(
                    'id' => $result->$idcampo,
                       'label' => $result->$nombrecampo,
                       'value' => $result->nombre." :: ".$result->direccion." :: ".$result->telefono_fijo." :: ".$result->celular." :: ".$result->email." :: ".$result->codigo_hospital
                );
                $h++;
            }
            
            
            return $data;
    }
    function autocomplete_contacto_id() {
        $info = $this->auto2("contacto", "contacto_id", "nombre", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }
    function auto2($tabla,$idcampo,$nombrecampo,$letra) {
            $search = buscador($tabla,$nombrecampo,$letra);
            $h = 0;
            foreach($search as $result){
                $data[$h] = array(
                    'id' => $result->$idcampo,
                       'label' => $result->documento." ".$result->$nombrecampo,
                       'value' => $result->$nombrecampo." :: ".$result->direccion." :: ".$result->telefono_fijo." :: ".$result->celular." :: ".$result->email." :: ".$result->parentesco." :: ".$result->llaves." :: ".$result->contacto_id
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
    function cliente(){
        $post=$this->input->post();
        echo lista("cliente", "cliente", "form-control obligatorio", "clientes", "id_cliente", "nombre", null, array("ACTIVO" => "S",'id_tipo_cliente'=>$post['id_tipo_cliente']), /* readOnly? */ false);
    }

}

?>
