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
        $this->layout->view('pacientes/index', $this->data);
    }

    function autocomplete_cedula_paciente() {
        $info = auto("pacientes", "id_paciente", "cedula_paciente", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function autocomplete_nombres() {
        $info = auto("pacientes", "id_paciente", "nombres", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function autocomplete_apellidos() {
        $info = auto("pacientes", "id_paciente", "apellidos", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

}

?>
