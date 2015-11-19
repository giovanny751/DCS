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

    function index() {
        $this->data['post'] = $this->input->post();
        $this->layout->view('equipos/index', $this->data);
    }
    function Informes_estados() {
        $this->data['post'] = $this->input->post();
        $this->layout->view('equipos/Informes_estados', $this->data);
    }

    function consult_equipos() {
        $post = $this->input->post();
        $this->data['post'] = $this->input->post();
        $this->data['datos'] = $this->Equipos__model->consult_equipos($post);
        $this->layout->view('equipos/consult_equipos', $this->data);
    }

    function save_equipos() {
        $post = $this->input->post();
        $post['imagen'] = basename($_FILES['imagen']['name']);
        $post['adjuntar_certificado'] = basename($_FILES['adjuntar_certificado']['name']);
        $id = $this->Equipos__model->save_equipos($post);

        $targetPath = "./uploads/equipos";
        if (!file_exists($targetPath)) {
            mkdir($targetPath, 0777, true);
        }
        $targetPath = "./uploads/equipos/" . $id;
        if (!file_exists($targetPath)) {
            mkdir($targetPath, 0777, true);
        }
        $target_path = $targetPath . '/' . basename($_FILES['imagen']['name']);
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path)) {
            
        }
        $targetPath = "./uploads/equipos";
        if (!file_exists($targetPath)) {
            mkdir($targetPath, 0777, true);
        }
        $targetPath = "./uploads/equipos/" . $id;
        if (!file_exists($targetPath)) {
            mkdir($targetPath, 0777, true);
        }
        $target_path = $targetPath . '/' . basename($_FILES['adjuntar_certificado']['name']);
        if (move_uploaded_file($_FILES['adjuntar_certificado']['tmp_name'], $target_path)) {
            
        }

        redirect('index.php/Equipos/consult_equipos', 'location');
    }

    function delete_equipos() {
        $post = $this->input->post();
        $this->Equipos__model->delete_equipos($post);
        redirect('index.php/Equipos/consult_equipos', 'location');
    }

    function edit_equipos() {
        $this->data['post'] = $this->input->post();
        if (!isset($this->data['post']['campo']))
            redirect('index.php/Equipos/consult_equipos', 'location');
        $this->data['datos'] = $this->Equipos__model->edit_equipos($this->data['post']);
        $this->data['equipo_examen_variable'] = $this->Equipos__model->equipo_examen_variable($this->data['post']);
        $this->layout->view('equipos/index', $this->data);
    }
    function edit_equipos2() {
        $this->data['post'] = $this->input->post();
        if (!isset($this->data['post']['campo']))
            redirect('index.php/Equipos/consult_equipos', 'location');
        $this->data['datos'] = $this->Equipos__model->edit_equipos($this->data['post']);
        $this->data['equipo_examen_variable'] = $this->Equipos__model->equipo_examen_variable($this->data['post']);
        $this->load->view('equipos/index', $this->data);
    }

    function autocomplete_ubicacion() {
        $info = auto("equipos", "id_equipo", "ubicacion", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }
    function traer_variables() {
        $post= $this->input->post();
        echo lista("variable_codigo[]", "1", "form-control obligatorio variable_codigo", "variables", "variable_codigo", "hl7tag", null, array("ACTIVO" => "S","examen_cod"=>$post['id_examen']), /* readOnly? */ false);
    }
    function traer_variables2() {
        $post= $this->input->post();
        echo lista("variable_codigo", "1", "form-control obligatorio variable_codigo", "variables", "variable_codigo", "hl7tag", null, array("ACTIVO" => "S","examen_cod"=>$post['id_examen']), /* readOnly? */ false);
    }
function obterner_informe(){
    $post=$this->input->post();
    if($post['informe']==1){
        $this->tabla1();
    }
    if($post['informe']==2){
        $this->tabla2();
    }
}
    function tabla1(){
        $this->data['post']=$post=$this->input->post();
        $this->data['array']=$this->Equipos__model->informacion_tabla1($post);
        $this->load->view('equipos/tabla1', $this->data);
    }
    function tabla2(){
        $this->data['post']=$post=$this->input->post();
        $this->data['array']=$this->Equipos__model->informacion_tabla2($post);
        $this->load->view('equipos/tabla2', $this->data);
    }

}

?>
