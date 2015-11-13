<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Brigadas extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Brigadas__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }

    function index() {
        $this->data['post'] = $this->input->post();
        $this->data['brigadas_equipo'] = array();
        $this->layout->view('brigadas/index', $this->data);
    }

    function consult_brigadas() {
        $post = $this->input->post();
        $this->data['post'] = $this->input->post();
        $this->data['datos'] = $this->Brigadas__model->consult_brigadas($post);
        $this->layout->view('brigadas/consult_brigadas', $this->data);
    }

    function save_brigadas() {
        $post = $this->input->post();
        $id = $this->Brigadas__model->save_brigadas($post);
        redirect('index.php/Brigadas/consult_brigadas', 'location');
    }

    function delete_brigadas() {
        $post = $this->input->post();
        $this->Brigadas__model->delete_brigadas($post);
        redirect('index.php/Brigadas/consult_brigadas', 'location');
    }

    function edit_brigadas() {
        $this->data['post'] = $this->input->post();
        if (!isset($this->data['post']['campo']))
            redirect('index.php/Brigadas/consult_brigadas', 'location');
        $this->data['datos'] = $this->Brigadas__model->edit_brigadas($this->data['post']);
        $this->data['brigadas_equipo'] = $this->Brigadas__model->brigadas_equipo($this->data['post']);
        $this->layout->view('brigadas/index', $this->data);
    }

    function autocomplete_nombre() {
        $info = auto("brigadas", "id_brigada", "nombre", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

}

?>
