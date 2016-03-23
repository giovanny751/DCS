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
class Parts extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Parts__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }

    function index() {
        $this->data['post'] = $this->input->post();
        $this->layout->view('parts/index', $this->data);
    }

    function consult_parts() {
        $post = $this->input->post();
        $this->data['post'] = $this->input->post();
        $this->data['datos'] = $this->Parts__model->consult_parts($post);
        $this->layout->view('parts/consult_parts', $this->data);
    }

    function save_parts() {
        $post = $this->input->post();
        $id = $this->Parts__model->save_parts($post);


        redirect('index.php/Parts/consult_parts', 'location');
    }

    function delete_parts() {
        $post = $this->input->post();
        $this->Parts__model->delete_parts($post);
        redirect('index.php/Parts/consult_parts', 'location');
    }

    function edit_parts() {
        $this->data['post'] = $this->input->post();
        if (!isset($this->data['post']['campo']))
            redirect('index.php/Parts/consult_parts', 'location');
        $this->data['datos'] = $this->Parts__model->edit_parts($this->data['post']);
        $this->layout->view('parts/index', $this->data);
    }

    function confirm_descripcion() {
        $datos = $this->Parts__model->validaexistencia($this->input->post('descripcion'));
        echo count($datos);
    }

    function cuntar_medicos($id) {
        $this->db->select(' count(id) as id ');
        $this->db->where('id_proc_parts', $id);
        $this->db->where('activo','S');
        $this->db->join('as_medicos_parts', 'as_medicos_parts.id_medico=medicos.medico_codigo');
        $datos = $this->db->get('medicos');
        $datos = $datos->result();
        return $datos[0]->id;
    }

    function cuntar_pacientes($id) {
        $this->db->select(' count(c.id) as id ');
        $this->db->where('c.id_proc_parts', $id);
        $datos = $this->db->get('as_citas c');
        $datos = $datos->result();
        return $datos[0]->id;
    }

    function consult_medicos() {
        $id = $this->input->post();
        $this->db->select(' medicos.nombre ');
        $this->db->where('activo','S');
        $this->db->join('as_medicos_parts', 'as_medicos_parts.id_medico=medicos.medico_codigo');
        $this->db->where('id_proc_parts', $id['id_medico']);
        $datos = $this->db->get('medicos ');
        $datos = $datos->result();
//        echo $this->db->last_query();
        if (count($datos))
            echo json_encode($datos);
        else
            echo 1;
    }

}

?>
