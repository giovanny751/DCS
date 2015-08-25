<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Examenes extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Examenes_model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('examenes/index', $this->data);
    }
    function consult_examenes(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Examenes_model->consult_examenes($post);
        $this->layout->view('examenes/consult_examenes', $this->data);
    }
    function save_examenes(){
        $post=$this->input->post();
        $this->Examenes_model->save_examenes($post);
        redirect('index.php/Examenes/consult_examenes', 'location');
    }
    function delete_examenes(){
        $post=$this->input->post();
        $this->Examenes_model->delete_examenes($post);
        redirect('index.php/Examenes/consult_examenes', 'location');
    }
    function edit_examenes(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Examenes/consult_examenes', 'location');
        
        $this->data['datos']=$this->Examenes_model->edit_examenes($this->data['post']);
        $this->layout->view('examenes/index', $this->data);
    }
}
?>
