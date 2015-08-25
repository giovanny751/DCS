<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Medicos extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Medicos_model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('medicos/index', $this->data);
    }
    function consult_medicos(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Medicos_model->consult_medicos($post);
        $this->layout->view('medicos/consult_medicos', $this->data);
    }
    function save_medicos(){
        $post=$this->input->post();
        $this->Medicos_model->save_medicos($post);
        redirect('index.php/Medicos/consult_medicos', 'location');
    }
    function delete_medicos(){
        $post=$this->input->post();
        $this->Medicos_model->delete_medicos($post);
        redirect('index.php/Medicos/consult_medicos', 'location');
    }
    function edit_medicos(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Medicos/consult_medicos', 'location');
        
        $this->data['datos']=$this->Medicos_model->edit_medicos($this->data['post']);
        $this->layout->view('medicos/index', $this->data);
    }
}
?>
