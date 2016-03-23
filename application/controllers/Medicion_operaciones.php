<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Medicion_operaciones extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Medicion_operaciones__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('medicion_operaciones/index', $this->data);
    }
    function consult_medicion_operaciones(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Medicion_operaciones__model->consult_medicion_operaciones($post);
        $this->layout->view('medicion_operaciones/consult_medicion_operaciones', $this->data);
    }
    function save_medicion_operaciones(){
        $post=$this->input->post();
                $id=$this->Medicion_operaciones__model->save_medicion_operaciones($post);
        
                        
        redirect('index.php/Medicion_operaciones/consult_medicion_operaciones', 'location');
    }
    function delete_medicion_operaciones(){
        $post=$this->input->post();
        $this->Medicion_operaciones__model->delete_medicion_operaciones($post);
        redirect('index.php/Medicion_operaciones/consult_medicion_operaciones', 'location');
    }
    function edit_medicion_operaciones(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Medicion_operaciones/consult_medicion_operaciones', 'location');
        $this->data['datos']=$this->Medicion_operaciones__model->edit_medicion_operaciones($this->data['post']);
        $this->layout->view('medicion_operaciones/index', $this->data);
    }
                    function autocomplete_CodigoBus(){
                  $info = auto("Buses","Bus_Id","Bus_Codigo",$this->input->get('term'));
                  $this->output->set_content_type('application/json')->set_output(json_encode($info));
                }
            }
?>
