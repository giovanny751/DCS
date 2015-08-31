<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Variables extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Variables__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('variables/index', $this->data);
    }
    function consult_variables(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Variables__model->consult_variables($post);
        $this->layout->view('variables/consult_variables', $this->data);
    }
    function save_variables(){
        $post=$this->input->post();
                $id=$this->Variables__model->save_variables($post);
        
                        
        redirect('index.php/Variables/consult_variables', 'location');
    }
    function delete_variables(){
        $post=$this->input->post();
        $this->Variables__model->delete_variables($post);
        redirect('index.php/Variables/consult_variables', 'location');
    }
    function edit_variables(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Variables/consult_variables', 'location');
        $this->data['datos']=$this->Variables__model->edit_variables($this->data['post']);
        $this->layout->view('variables/index', $this->data);
    }
                    function autocomplete_descripcion(){
                  $info = auto("variables","variable_codigo","descripcion",$this->input->get('term'));
                  $this->output->set_content_type('application/json')->set_output(json_encode($info));
                }
            }
?>
