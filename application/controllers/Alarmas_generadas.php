<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alarmas_generadas extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Alarmas_generadas__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }

    function index() {
        $this->data['post'] = $this->input->post();
        $this->layout->view('alarmas_generadas/index', $this->data);
    }

    function consult_alarmas_generadas() {
        $post = $this->input->post();
        $this->data['post'] = $this->input->post();
        $this->data['datos'] = $this->Alarmas_generadas__model->consult_alarmas_generadas($post);
        $this->layout->view('alarmas_generadas/consult_alarmas_generadas', $this->data);
    }

    function save_alarmas_generadas() {
        $post = $this->input->post();
        $id = $this->Alarmas_generadas__model->save_alarmas_generadas($post);


        redirect('index.php/Alarmas_generadas/consult_alarmas_generadas', 'location');
    }

    function delete_alarmas_generadas() {
        $post = $this->input->post();
        $this->Alarmas_generadas__model->delete_alarmas_generadas($post);
        redirect('index.php/Alarmas_generadas/consult_alarmas_generadas', 'location');
    }

    function busqueda_cedula() {
        $post = $this->input->post();
        $datos = $this->Alarmas_generadas__model->busqueda_cedula($post);
        echo json_encode($datos);
    }

    function edit_alarmas_generadas() {
        $this->data['post'] = $this->input->post();
        if (!isset($this->data['post']['campo']))
            redirect('index.php/Alarmas_generadas/consult_alarmas_generadas', 'location');
        $this->data['datos'] = $this->Alarmas_generadas__model->edit_alarmas_generadas($this->data['post']);
        $this->layout->view('alarmas_generadas/index', $this->data);
    }

    function datos_pacientes() {
        $this->layout->view('alarmas_generadas/datos_pacientes');
    }

    function buscar_pacientes() {
        $post = $this->input->post();
        $datos = $this->Alarmas_generadas__model->buscar_pacientes($post);
        echo json_encode($datos);
    }

    function buscar_pacientes_examen() {
        $post = $this->input->post();
        $datos = $this->Alarmas_generadas__model->buscar_pacientes_examen($post);
        foreach ($datos as $value) {
            $s[] = $value->examen_cod;
        }
        if(count($datos)>0)
        $this->db->where_in('examen_cod', $s);
        echo lista("examen_cod", "examen_cod", "form-control obligatorio", "examenes", "examen_cod", "examen_nombre", null, array("ACTIVO" => "S"), /* readOnly? */ false);
//        echo json_encode($datos);
    }

    function graficas() {
        $post = $this->input->post();
//        $this->load->view('alarmas_generadas/graficas', $this->data);
        $datos = $this->Alarmas_generadas__model->busqueda_cedula($post);

        foreach ($datos as $key => $value) {
            $data[]=array($value->hl7tag,5);
        }
        

$data[0]=array('6-5',5);	
$data[1]=array('6-3',5);	
$data[2]=array('6-6',4);	
$data[3]=array('6-7',6);	
$data[4]=array('6-8',8);	
$data[5]=array('6-9',1);	
echo json_encode($data);

    }

}

?>
