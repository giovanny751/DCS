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
class Tareas extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Ingreso_model');
        $this->load->model('Roles_model');
        $this->load->helper('miscellaneous');
        $this->load->helper('security');
        validate_login($this->session->userdata('usu_id'));
    }

    function nuevatarea(){
        
        $this->layout->view("tareas/nuevatarea");
    }
    function guardartarea(){
        $data[] = array(
            
        );
    }
    function actividadhijo(){
        $this->layout->view("tareas/actividadhijo");
    }
    function guardaractividadhijo(){
//        $data[] =
    }
    function planes(){
        $this->layout->view("tareas/planes");
    }
    function guardarplan(){
        $this->load->model("Planes_model");
        $data[] = array(
            'est_id'=>$this->input->post('estado'),
            'pla_nombre'=>$this->input->post('nombre'),
            'pla_descripcion'=>$this->input->post('descripcion'),
            'pla_fechaInicio'=>$this->input->post('fechainicio'),
            'pla_fechaFin'=>$this->input->post('fechafin'),
            'pla_avanceProgramado'=>$this->input->post('avanceprogramado'),
            'pla_presupuesto'=>$this->input->post('presupuesto'),
            'pla_avanceReal'=>$this->input->post('avancereal'),
            'pla_costoReal'=>$this->input->post('costoreal'),
            'pla_eficiencia'=>$this->input->post('eficiencia'),
            'pla_norma'=>$this->input->post('norma'),
            'pla_responsable'=>$this->input->post('responsable')
        );
        $this->Planes_model->create($data);
    }
    function listadoplanes(){
        $this->layout->view("tareas/listadoplanes");
    }
    function listadoregistros(){
        $this->layout->view("tareas/listadoregistros");
    }
    function configuracionsistema(){
        
        $this->layout->view("tareas/configuracionsistema");
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */