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
class reportes extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Reportes_model');
    }

    public function creacionreporte() {
        $this->data['hijo'] = $this->input->post('menu');
        $this->data['nombrepadre'] = $this->input->post('nombrepadre');
        $this->data['idgeneral'] = $this->input->post('idgeneral');
        if (empty($this->data['idgeneral']))
            $this->data['hijo'] = 0;
        $this->data['menu'] = $this->Reportes_model->consultahijos($this->data['idgeneral']);
        if (!empty($this->data['idgeneral']))
            $this->data['menu'] = $this->Reportes_model->hijos($this->data['idgeneral']);
        $this->layout->view('reportes/creacionreporte', $this->data);
    }

    function guardarmodulo() {

        $modulo = $this->input->post('modulo');
        $padre = $this->input->post('padre');
        $general = $this->input->post('general');
        $actualizamodulo = $this->Reportes_model->actualizahijos($general);
        $guardamodulo = $this->Reportes_model->guardarmodulo($modulo, $padre, $general);
        $menu = $this->Reportes_model->cargamenu($general);
        $this->output->set_content_type('application/json')->set_output(json_encode($menu));
    }

    function consultadatosmenu() {

        $idgeneral = $this->input->post('idgeneral');
        if (!empty($idgeneral)) {
            $datos = $this->ingreso_model->consultamenu($idgeneral);
            $this->output->set_content_type('application/json')->set_output(json_encode($datos[0]));
        } else {
            redirect('auth/login', 'refresh');
        }
    }

    function inforeport() {
        $id = $this->input->post('id');
        $informacion = $this->Reportes_model->inforeport($id);
        $this->output->set_content_type('application/json')->set_output(json_encode($informacion[0]));
    }

    function editreport() {
        $this->Reportes_model->editreport($this->input->post('id'), $this->input->post('nombre'), $this->input->post('estado'));
    }

    function allreport() {
        $reportes = $this->Reportes_model->inforeport($this->input->post('id'));
        $this->output->set_content_type('application/json')->set_output(json_encode($reportes[0]));
    }

    function guardartodoreporte() {
        $query = $this->input->post('query');
        $data = array(
            'rep_nombrepadre' => $this->input->post('reporte'),
            'rep_query' => $query,
            'rep_host' => $this->input->post('host'),
            'rep_user' => $this->input->post('user'),
            'rep_password' => $this->input->post('password'),
        );
        $this->Reportes_model->guardartodoreporte($data, $this->input->post('idreporte'));
    }

    function validarquery() {
        $id = 1;
        $this->Reportes_model->validarquery($id, $this->input->post('query'));
    }

    function guardarreporte() {
        $this->Reportes_model->guardarreporte($this->input->post('nuevoreporte'));
        $reportes = $this->Reportes_model->totalreportes();
        $this->output->set_content_type('application/json')->set_output(json_encode($reportes));
    }

    function logicareportes($datosmodulos = 'prueba', $report = null) {
        $informacion = $this->Reportes_model->visualizacionreporte($datosmodulos);
        $i = array();
        foreach ($informacion as $modulo)
            $i[$modulo['rep_id']][$modulo['rep_nombrepadre']][$modulo['rep_idpadre']] [] = array($modulo['rep_idhijo']);

        $report .= "<ul>";
        foreach ($i as $padre => $nombrepapa):
            foreach ($nombrepapa as $nombrepapa => $menuidpadre):
                foreach ($menuidpadre as $modulos => $menu):
                    foreach ($menu as $submenus):
                        $report .= "<li>" . strtoupper($nombrepapa) . "<input type='radio' value='" . $padre . "' name='seleccionreporte'>";
                        $report = $this->logicareportes($submenus[0], $report);
                        $report .= "</li>";
                    endforeach;
                endforeach;
            endforeach;
        endforeach;
        $report .= "</ul>";
        return $report;
    }

    function informacionreporte() {
        $this->data['logicareportes'] = $this->logicareportes($datosmodulos = 'prueba');
        $this->layout->view('reportes/informacionreporte', $this->data);
    }

    function abrirxml() {
        $idreporte = $this->input->post('seleccionreporte');
        $reporte = $this->Reportes_model->consultareporte($idreporte);
        if (!empty($reporte[0]['rep_query'])) {


            $query = $reporte[0]['rep_query'];


            $t = <<< EOF
<?xml version="1.0" encoding="iso-8859-1"?>    
<datos>        
$query
</datos>        
EOF;

            $this->data['xml'] = @simplexml_load_string($t);
            $this->data['informacion'] = $this->Reportes_model->ejecucionquery($this->data['xml']->query);
            $this->data['opcion'] = 1;
            $this->layout->view('reportes/abrirxml', $this->data);
        } else {
            $this->data['opcion'] = 2;
            $this->data['info'] = "<div class='alert alert-info'><center>NO HAY REPORTE</center></div>";
            $this->layout->view('reportes/abrirxml', $this->data);
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */