<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hospitales extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Hospitales_model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('hospitales/index', $this->data);
    }
    function consult_hospitales(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Hospitales_model->consult_hospitales($post);
        $this->layout->view('hospitales/consult_hospitales', $this->data);
    }
    function save_hospitales(){
        $post=$this->input->post();
        $this->Hospitales_model->save_hospitales($post);
        redirect('index.php/Hospitales/consult_hospitales', 'location');
    }
    function delete_hospitales(){
        $post=$this->input->post();
        $this->Hospitales_model->delete_hospitales($post);
        redirect('index.php/Hospitales/consult_hospitales', 'location');
    }
    function edit_hospitales(){
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Hospitales_model->edit_hospitales($this->data['post']);
        $this->layout->view('hospitales/index', $this->data);
    }
}
?>
