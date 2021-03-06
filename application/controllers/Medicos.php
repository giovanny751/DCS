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
class Medicos extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Medicos__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
        $this->data['tipo_usuario'] = $this->session->userdata('tipo_usuario');
        if($this->data['tipo_usuario']==2){
            $this->db->where('cedula',$this->session->userdata('usu_cedula'));
        }
    }

    function autocomplete_correo() {
        $info = auto("user", "usu_id", "usu_email", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function autocomplete_nombre_usuario() {
        $info = auto("user", "usu_id", "usu_nombre", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function index() {
        $this->data['post'] = $this->input->post();
        $this->data['as_medicos_parts'] = array();
        $this->layout->view('medicos/index', $this->data);
    }

    function consult_medicos() {
        $post = $this->input->post();
        $this->data['post'] = $this->input->post();
        $this->data['datos'] = $this->Medicos__model->consult_medicos($post);
        $this->layout->view('medicos/consult_medicos', $this->data);
    }

    function save_medicos() {
        $post = $this->input->post();
        $id = $this->Medicos__model->save_medicos($post);

        redirect('index.php/Medicos/consult_medicos', 'location');
    }

    function referencia() {
        $post = $this->input->post();
        $this->data['post'] = $this->input->post();
        echo $datos = $this->Medicos__model->referencia($post);
//        $this->layout->view('clientes/consult_clientes', $this->data);
    }

    function referencia2() {
        $post = $this->input->post();
        $this->data['post'] = $this->input->post();
        echo $datos = $this->Medicos__model->referencia2($post);
//        $this->layout->view('clientes/consult_clientes', $this->data);
    }

    function delete_medicos() {
        $post = $this->input->post();
        $this->Medicos__model->delete_medicos($post);
        redirect('index.php/Medicos/consult_medicos', 'location');
    }

    function edit_medicos() {
        $this->data['post'] = $this->input->post();
        if (!isset($this->data['post']['campo']))
            redirect('index.php/Medicos/consult_medicos', 'location');
        $this->data['datos'] = $this->Medicos__model->edit_medicos($this->data['post']);
        $this->data['as_medicos_parts'] = $this->Medicos__model->as_medicos_parts($this->data['post']);
        $this->layout->view('medicos/index', $this->data);
    }

    function autocomplete_nombre() {
        $info = auto("medicos", "medico_codigo", "nombre", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function autocomplete_paciente() {
        $info = auto("pacientes", "id_paciente", "nombres", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function autocomplete_matricula_procedimientos() {
        $info = auto("parts", "id", "description", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function autocomplete_matricula_profesional() {
        $info = auto("medicos", "medico_codigo", "matricula_profesional", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function form_consulta() {
        $post = $this->input->post();
        $datos = $this->Medicos__model->form_consulta($post);
        $this->output->set_content_type('application/json')->set_output(json_encode($datos));
    }

}

?>
