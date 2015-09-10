<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Medicos extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Medicos__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }

    function index() {
        $this->data['post'] = $this->input->post();
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
        $this->layout->view('medicos/index', $this->data);
    }

    function autocomplete_nombre() {
        $info = auto("medicos", "medico_codigo", "nombre", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }
    function autocomplete_matricula_profesional() {
        $info = auto("medicos", "medico_codigo", "matricula_profesional", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

}

?>
