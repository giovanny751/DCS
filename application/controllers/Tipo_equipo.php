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
class Tipo_equipo extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Tipo_equipo__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }

    function index() {
        $this->data['post'] = $this->input->post();
        $this->layout->view('tipo_equipo/index', $this->data);
    }

    function consult_tipo_equipo() {
        $post = $this->input->post();
        $this->data['post'] = $this->input->post();
        $this->data['datos'] = $this->Tipo_equipo__model->consult_tipo_equipo($post);
        $this->layout->view('tipo_equipo/consult_tipo_equipo', $this->data);
    }

    function save_tipo_equipo() {
        $post = $this->input->post();
        $id = $this->Tipo_equipo__model->save_tipo_equipo($post);


        redirect('index.php/Tipo_equipo/consult_tipo_equipo', 'location');
    }

    function delete_tipo_equipo() {
        $post = $this->input->post();
        $this->Tipo_equipo__model->delete_tipo_equipo($post);
        redirect('index.php/Tipo_equipo/consult_tipo_equipo', 'location');
    }

    function edit_tipo_equipo() {
        $this->data['post'] = $this->input->post();
        if (!isset($this->data['post']['campo']))
            redirect('index.php/Tipo_equipo/consult_tipo_equipo', 'location');
        $this->data['datos'] = $this->Tipo_equipo__model->edit_tipo_equipo($this->data['post']);
        $this->layout->view('tipo_equipo/index', $this->data);
    }

    function autocomplete_referencia() {
        $info = auto("tipo_equipo", "tipo_equipo_cod", "referencia", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function referencia() {
        $post = $this->input->post();
        $this->data['post'] = $this->input->post();
        echo $datos = $this->Tipo_equipo__model->referencia($post);
//        $this->layout->view('clientes/consult_clientes', $this->data);
    }

}

?>
