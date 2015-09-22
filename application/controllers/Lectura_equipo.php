<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lectura_equipo extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Lectura_equipo__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('lectura_equipo/index', $this->data);
    }
    function consult_lectura_equipo(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Lectura_equipo__model->consult_lectura_equipo($post);
        $this->layout->view('lectura_equipo/consult_lectura_equipo', $this->data);
    }
    function save_lectura_equipo(){
        $post=$this->input->post();
                $id=$this->Lectura_equipo__model->save_lectura_equipo($post);
        
                        
        redirect('index.php/Lectura_equipo/consult_lectura_equipo', 'location');
    }
    function delete_lectura_equipo(){
        $post=$this->input->post();
        $this->Lectura_equipo__model->delete_lectura_equipo($post);
        redirect('index.php/Lectura_equipo/consult_lectura_equipo', 'location');
    }
    function edit_lectura_equipo(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Lectura_equipo/consult_lectura_equipo', 'location');
        $this->data['datos']=$this->Lectura_equipo__model->edit_lectura_equipo($this->data['post']);
        $this->layout->view('lectura_equipo/index', $this->data);
    }
    }
?>