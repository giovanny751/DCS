<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tipo_cliente extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Tipo_cliente__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }

    function index() {
        $this->data['post'] = $this->input->post();
        $this->layout->view('tipo_cliente/index', $this->data);
    }

    function consult_tipo_cliente() {
        $post = $this->input->post();
        $this->data['post'] = $this->input->post();
        $this->data['datos'] = $this->Tipo_cliente__model->consult_tipo_cliente($post);
        $this->layout->view('tipo_cliente/consult_tipo_cliente', $this->data);
    }

    function save_tipo_cliente() {
        $post = $this->input->post();
        $id = $this->Tipo_cliente__model->save_tipo_cliente($post);


        redirect('index.php/Tipo_cliente/consult_tipo_cliente', 'location');
    }

    function delete_tipo_cliente() {
        $post = $this->input->post();
        $this->Tipo_cliente__model->delete_tipo_cliente($post);
        redirect('index.php/Tipo_cliente/consult_tipo_cliente', 'location');
    }

    function edit_tipo_cliente() {
        $this->data['post'] = $this->input->post();
        if (!isset($this->data['post']['campo']))
            redirect('index.php/Tipo_cliente/consult_tipo_cliente', 'location');
        $this->data['datos'] = $this->Tipo_cliente__model->edit_tipo_cliente($this->data['post']);
        $this->layout->view('tipo_cliente/index', $this->data);
    }

    function autocomplete_descripcion() {
        $info = auto("tipo_cliente", "id_tipo_cliente", "descripcion", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }
    function referencia(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        echo $datos=$this->Tipo_cliente__model->referencia($post);
//        $this->layout->view('clientes/consult_clientes', $this->data);
    }

}

?>
