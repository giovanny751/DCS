<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Parts extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Parts__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('parts/index', $this->data);
    }
    function consult_parts(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Parts__model->consult_parts($post);
        $this->layout->view('parts/consult_parts', $this->data);
    }
    function save_parts(){
        $post=$this->input->post();
                $id=$this->Parts__model->save_parts($post);
        
                        
        redirect('index.php/Parts/consult_parts', 'location');
    }
    function delete_parts(){
        $post=$this->input->post();
        $this->Parts__model->delete_parts($post);
        redirect('index.php/Parts/consult_parts', 'location');
    }
    function edit_parts(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Parts/consult_parts', 'location');
        $this->data['datos']=$this->Parts__model->edit_parts($this->data['post']);
        $this->layout->view('parts/index', $this->data);
    }
    function confirm_descripcion() {
        $datos = $this->Parts__model->validaexistencia($this->input->post('descripcion'));
        echo count($datos);
    }
    }
?>
