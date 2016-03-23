<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * @package     NYGSOFT
 * @author      Gerson J Barbosa / Nelson G Barbosa
 * @copyright   www.nygsoft.com
 * @celular     301 385 9952 - 312 421 2513
 * @email       javierbr12@hotmail.com    
 */
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

        $this->db->select('*');
        $this->db->order_by('id', 'desc');
        $datos = $this->db->get('configuracion');
        $this->data['configuracion'] = $datos->result();

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
        $tipo_usuario = $this->session->userdata('tipo_usuario');

        if ($tipo_usuario == 2) {//medico
            $this->db->join('medicos', 'pacientes.medico=medicos.medico_codigo');
            $this->db->where('medicos.cedula', $this->session->userdata('usu_cedula'));
        }
        if ($tipo_usuario == 3) {//paciente
            $this->db->where('cedula_paciente', $this->session->userdata('usu_cedula'));
        }

        $datos = $this->Alarmas_generadas__model->busqueda_cedula2($post);
        $this->output->set_content_type('application/json')->set_output(json_encode($datos));
//        echo json_encode($datos);
    }
    function busqueda_cedulaDatos() {
        $post = $this->input->post();
        $tipo_usuario = $this->session->userdata('tipo_usuario');

        if ($tipo_usuario == 2) {//medico
            $this->db->join('medicos', 'pacientes.medico=medicos.medico_codigo');
            $this->db->where('medicos.cedula', $this->session->userdata('usu_cedula'));
        }
        if ($tipo_usuario == 3) {//paciente
            $this->db->where('cedula_paciente', $this->session->userdata('usu_cedula'));
        }

        $data['data'] = $this->Alarmas_generadas__model->busqueda_cedula2Datos($post, $this->input->post("length"), $this->input->post("start"));
        $data['recordsFiltered'] = count($this->Alarmas_generadas__model->Contadorbusqueda_cedula2Datos($post));
        $data['recordsTotal'] = $data['recordsFiltered'];
        echo json_encode($data);
        
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

    function busqueda_variable() {
        $this->db->where('examen_cod', $this->input->post('examen'));
        $datos = $this->db->get('variables');
        $datos = $datos->result();
        $this->output->set_content_type('application/json')->set_output(json_encode($datos));
    }

    function graficas() {
        $post = $this->input->post();
//        $this->load->view('alarmas_generadas/graficas', $this->data);
        $datos = $this->Alarmas_generadas__model->busqueda_cedula($post);

        if (count($datos)) {

            $fechas = array();
//        $total = array();
            foreach ($datos as $key => $value) {
                $fecha = substr($value->mi_fecha, 0, -3);
                $datop[$value->hl7tag][$fecha] = $value->lectura_numerica;
                if (!in_array($fecha, $fechas))
                    array_push($fechas, $fecha);
            }


            $fecha_array = array();
            foreach ($datos as $value) {
                for ($i = 0; $i < count($fechas); $i++) {
                    if (!isset($datop[$value->hl7tag][$fechas[$i]])) {
                        $fecha_array[$value->hl7tag][$fechas[$i]] = $datop[$value->hl7tag][$fechas[$i]] = 0;
                    } else {
                        $fecha_array[$value->hl7tag][$fechas[$i]] = $datop[$value->hl7tag][$fechas[$i]];
                    }
                }
            }
//            print_y($fecha_array);
            foreach ($fecha_array as $key => $value) {
                $o[] = $key;
                foreach ($value as $key2 => $value2) {
                    if ($key2 != 0)
                        if (isset($total[$key2])) {
                            $total[$key2] = $total[$key2] . ',' . $value2;
                        } else {
                            $total[$key2] = $value2;
                        }
                }
            }
            foreach ($total as $key => $value) {
                $value2 = explode(',', $value);
                $s = array();
                $s[0] = $key;
                for ($i = 0; $i < count($value2); $i++) {
                    array_push($s, (int) $value2[$i]);
                }
                $data[] = $s;
            }
            $this->output->set_content_type('application/json')->set_output(json_encode(array($data, $o)));
        } else {
            echo 1;
        }
    }

    function configuracion() {
        $post = $this->input->post();
        if (isset($post['tiempo'])) {
            $this->db->set('fecha', date('Y-m-d'));
            $this->db->set('tiempo', $post['tiempo']);
            $this->db->insert('configuracion');
        }
        $this->db->select('*');
        $this->db->order_by('id', 'desc');
        $datos = $this->db->get('configuracion');
        $this->data['datos'] = $datos->result();
        $this->layout->view('alarmas_generadas/configuracion', $this->data);
    }

}

?>
