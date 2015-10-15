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
        if (count($datos) > 0)
            $this->db->where_in('examen_cod', $s);
        echo lista("examen_cod", "examen_cod", "form-control obligatorio", "examenes", "examen_cod", "examen_nombre", null, array("ACTIVO" => "S"), /* readOnly? */ false);
//        echo json_encode($datos);
    }

    function graficas() {
        $post = $this->input->post();
//        $this->load->view('alarmas_generadas/graficas', $this->data);
        $datos = $this->Alarmas_generadas__model->busqueda_cedula($post);

//        foreach ($datos as $key => $value) {
//            $fecha=$value->fecha_creacion;
//            $data[]=array($value->hl7tag,$value->lectura_numerica);
//        }

        $fechas = array();
//        $total = array();
        foreach ($datos as $key => $value) {
            $datop[$value->hl7tag][$value->fecha_creacion] = $value->lectura_numerica;
            if (!in_array($value->fecha_creacion, $fechas))
                array_push($fechas, $value->fecha_creacion);
        }

        foreach ($datos as $value) {
            for ($i = 0; $i < count($fechas); $i++) {
                if (!isset($datop[$value->hl7tag][$fechas[$i]])) {
                    $datop[$value->hl7tag][$fechas[$i]] = 0;
                }
            }
        }

        foreach ($datop as $key => $value) {
            $o[]=$key;
            foreach ($value as $key2 => $value2) {
                if (isset($total[$key2])) {
                    $total[$key2] = $total[$key2] . ',' . $value2;
                } else {
                    $total[$key2] = $value2;
                }
            }
        }
//        echo "dddd";
//        print_r();

        foreach ($total as $key => $value) {
            $value2=  explode(',', $value);
            $s=array();
            $s[0]=$key;
            for($i=0;$i<count($value2);$i++){
                array_push($s, (int) $value2[$i]);
            }
            $data[] = $s;
        }
        
        
        echo json_encode(array($data,$o));
    }

}

?>
