<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

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
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('contacto/index', $this->data);
    }
    function consult_contacto(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Contacto__model->consult_contacto($post);
        $this->layout->view('contacto/consult_contacto', $this->data);
    }
    function save_contacto(){
        $post=$this->input->post();
        $this->Contacto__model->save_contacto($post);
        redirect('index.php/Contacto/consult_contacto', 'location');
    }
    function delete_contacto(){
        $post=$this->input->post();
        $this->Contacto__model->delete_contacto($post);
        redirect('index.php/Contacto/consult_contacto', 'location');
    }
    function edit_contacto(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Contacto/consult_contacto', 'location');
        $this->data['datos']=$this->Contacto__model->edit_contacto($this->data['post']);
        $this->layout->view('contacto/index', $this->data);
    }
    }
?>
