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
class Aseguradoras extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Aseguradoras__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('aseguradoras/index', $this->data);
    }
    	function referencia(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        echo $datos=$this->Aseguradoras__model->referencia($post);
//        $this->layout->view('clientes/consult_clientes', $this->data);
    }
    function consult_aseguradoras(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Aseguradoras__model->consult_aseguradoras($post);
        $this->layout->view('aseguradoras/consult_aseguradoras', $this->data);
    }
    function save_aseguradoras(){
        $post=$this->input->post();
                $id=$this->Aseguradoras__model->save_aseguradoras($post);
        
                        
        redirect('index.php/Aseguradoras/consult_aseguradoras', 'location');
    }
    function delete_aseguradoras(){
        $post=$this->input->post();
        $this->Aseguradoras__model->delete_aseguradoras($post);
        redirect('index.php/Aseguradoras/consult_aseguradoras', 'location');
    }
    function edit_aseguradoras(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Aseguradoras/consult_aseguradoras', 'location');
        $this->data['datos']=$this->Aseguradoras__model->edit_aseguradoras($this->data['post']);
        $this->layout->view('aseguradoras/index', $this->data);
    }
    function edit_aseguradoras2(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Aseguradoras/consult_aseguradoras', 'location');
        $this->data['datos']=$this->Aseguradoras__model->edit_aseguradoras($this->data['post']);
        $this->load->view('aseguradoras/index', $this->data);
    }
                    function autocomplete_nombre(){
                  $info = auto("aseguradoras","aseguradora_id","nombre",$this->input->get('term'));
                  $this->output->set_content_type('application/json')->set_output(json_encode($info));
                }
            }
?>
