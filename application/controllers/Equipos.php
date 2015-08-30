<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Equipos extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Equipos__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('equipos/index', $this->data);
    }
    function consult_equipos(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Equipos__model->consult_equipos($post);
        $this->layout->view('equipos/consult_equipos', $this->data);
    }
    function save_equipos(){
        $post=$this->input->post();
        $this->Equipos__model->save_equipos($post);
        redirect('index.php/Equipos/consult_equipos', 'location');
    }
    function delete_equipos(){
        $post=$this->input->post();
        $this->Equipos__model->delete_equipos($post);
        redirect('index.php/Equipos/consult_equipos', 'location');
    }
    function edit_equipos(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Equipos/consult_equipos', 'location');
        $this->data['datos']=$this->Equipos__model->edit_equipos($this->data['post']);
        $this->layout->view('equipos/index', $this->data);
    }
}
?>
