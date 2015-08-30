<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Prueba extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Prueba__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('prueba/index', $this->data);
    }
    function consult_prueba(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Prueba__model->consult_prueba($post);
        $this->layout->view('prueba/consult_prueba', $this->data);
    }
    function save_prueba(){
        $post=$this->input->post();
        $this->Prueba__model->save_prueba($post);
        redirect('index.php/Prueba/consult_prueba', 'location');
    }
    function delete_prueba(){
        $post=$this->input->post();
        $this->Prueba__model->delete_prueba($post);
        redirect('index.php/Prueba/consult_prueba', 'location');
    }
    function edit_prueba(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Prueba/consult_prueba', 'location');
        $this->data['datos']=$this->Prueba__model->edit_prueba($this->data['post']);
        $this->layout->view('prueba/index', $this->data);
    }
                    function autocomplete_nombre(){
                  $info = auto("sexo","Sex_id","Sex_Sexo",$this->input->get('term'));
                  $this->output->set_content_type('application/json')->set_output(json_encode($info));
                }
            }
?>
