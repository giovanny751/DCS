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
class Contacto extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Contacto__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }

    function index() {
        $this->data['post'] = $this->input->post();
        $this->layout->view('contacto/index', $this->data);
    }

    function consult_contacto() {
        $post = $this->input->post();
        $this->data['post'] = $this->input->post();
        $this->data['datos'] = $this->Contacto__model->consult_contacto($post);
        $this->layout->view('contacto/consult_contacto', $this->data);
    }

    function save_contacto() {
        $post = $this->input->post();
        $id = $this->Contacto__model->save_contacto($post);
        redirect('index.php/Contacto/consult_contacto', 'location');
    }

    function delete_contacto() {
        $post = $this->input->post();
        $this->Contacto__model->delete_contacto($post);
        redirect('index.php/Contacto/consult_contacto', 'location');
    }

    function edit_contacto() {
        $this->data['post'] = $this->input->post();
        if (!isset($this->data['post']['campo']))
            redirect('index.php/Contacto/consult_contacto', 'location');
        $this->data['datos'] = $this->Contacto__model->edit_contacto($this->data['post']);
        $this->layout->view('contacto/index', $this->data);
    }
    function edit_contacto2() {
        $this->data['post'] = $this->input->post();
        if (!isset($this->data['post']['campo']))
            redirect('index.php/Contacto/consult_contacto', 'location');
        $this->data['datos'] = $this->Contacto__model->edit_contacto($this->data['post']);
        $this->load->view('contacto/index', $this->data);
    }

    function autocomplete_nombre() {
        $info = auto("contacto", "contacto_id", "nombre", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function referencia() {
        $post = $this->input->post();
        $this->data['post'] = $this->input->post();
        echo $datos = $this->Contacto__model->referencia($post);
//        $this->layout->view('clientes/consult_clientes', $this->data);
    }

}

?>
