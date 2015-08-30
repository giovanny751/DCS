<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tipo_equipo extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Tipo_equipo_model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('tipo_equipo/index', $this->data);
    }
    function consult_tipo_equipo(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Tipo_equipo_model->consult_tipo_equipo($post);
        $this->layout->view('tipo_equipo/consult_tipo_equipo', $this->data);
    }
    function save_tipo_equipo(){
        $post=$this->input->post();
        $this->Tipo_equipo_model->save_tipo_equipo($post);
        redirect('index.php/Tipo_equipo/consult_tipo_equipo', 'location');
    }
    function delete_tipo_equipo(){
        $post=$this->input->post();
        $this->Tipo_equipo_model->delete_tipo_equipo($post);
        redirect('index.php/Tipo_equipo/consult_tipo_equipo', 'location');
    }
    function edit_tipo_equipo(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Tipo_equipo/consult_tipo_equipo', 'location');
        $this->data['datos']=$this->Tipo_equipo_model->edit_tipo_equipo($this->data['post']);
        $this->layout->view('tipo_equipo/index', $this->data);
    }
}
?>
