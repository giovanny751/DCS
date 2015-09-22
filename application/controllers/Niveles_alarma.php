<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Niveles_alarma extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Niveles_alarma__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('niveles_alarma/index', $this->data);
    }
    function consult_niveles_alarma(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Niveles_alarma__model->consult_niveles_alarma($post);
        $this->layout->view('niveles_alarma/consult_niveles_alarma', $this->data);
    }
    function save_niveles_alarma(){
        $post=$this->input->post();
        $this->Niveles_alarma__model->save_niveles_alarma($post);
        redirect('index.php/Niveles_alarma/consult_niveles_alarma', 'location');
    }
    function delete_niveles_alarma(){
        $post=$this->input->post();
        $this->Niveles_alarma__model->delete_niveles_alarma($post);
        redirect('index.php/Niveles_alarma/consult_niveles_alarma', 'location');
    }
    function edit_niveles_alarma(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Niveles_alarma/consult_niveles_alarma', 'location');
        $this->data['datos']=$this->Niveles_alarma__model->edit_niveles_alarma($this->data['post']);
        $this->layout->view('niveles_alarma/index', $this->data);
    }
    function tipo_alarma(){
        $this->data['post']=$this->input->post();
        echo lista("id_tipo_alarma", "id_tipo_alarma", "form-control obligatorio", "tipo_alarma", "id_tipo_alarma", "descripcion", null, array("ACTIVO" => "S",'examen'=>$this->data['post']['examen_cod']), /* readOnly? */ false); 
    }
}
?>
