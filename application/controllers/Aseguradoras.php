<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Aseguradoras extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Aseguradoras_model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('aseguradoras/index', $this->data);
    }
    function consult_aseguradoras(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Aseguradoras_model->consult_aseguradoras($post);
        $this->layout->view('aseguradoras/consult_aseguradoras', $this->data);
    }
    function save_aseguradoras(){
        $post=$this->input->post();
        $this->Aseguradoras_model->save_aseguradoras($post);
        redirect('index.php/Aseguradoras/consult_aseguradoras', 'location');
    }
    function delete_aseguradoras(){
        $post=$this->input->post();
        $this->Aseguradoras_model->delete_aseguradoras($post);
        redirect('index.php/Aseguradoras/consult_aseguradoras', 'location');
    }
    function edit_aseguradoras(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Aseguradoras/consult_aseguradoras', 'location');
        $this->data['datos']=$this->Aseguradoras_model->edit_aseguradoras($this->data['post']);
        $this->layout->view('aseguradoras/index', $this->data);
    }
}
?>
