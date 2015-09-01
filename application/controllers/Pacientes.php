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
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('pacientes/index', $this->data);
    }
    function consult_pacientes(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Pacientes__model->consult_pacientes($post);
        $this->layout->view('pacientes/consult_pacientes', $this->data);
    }
    function save_pacientes(){
        $post=$this->input->post();
                $id=$this->Pacientes__model->save_pacientes($post);
        
                        
        redirect('index.php/Pacientes/consult_pacientes', 'location');
    }
    function delete_pacientes(){
        $post=$this->input->post();
        $this->Pacientes__model->delete_pacientes($post);
        redirect('index.php/Pacientes/consult_pacientes', 'location');
    }
    function edit_pacientes(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Pacientes/consult_pacientes', 'location');
        $this->data['datos']=$this->Pacientes__model->edit_pacientes($this->data['post']);
        $this->layout->view('pacientes/index', $this->data);
    }
    }
?>
