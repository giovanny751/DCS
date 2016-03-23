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
class Protocolos extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Protocolos__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('protocolos/index', $this->data);
    }
    function consult_protocolos(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Protocolos__model->consult_protocolos($post);
        $this->layout->view('protocolos/consult_protocolos', $this->data);
    }
    function save_protocolos(){
        $post=$this->input->post();
        $this->Protocolos__model->save_protocolos($post);
        redirect('index.php/Protocolos/consult_protocolos', 'location');
    }
    function delete_protocolos(){
        $post=$this->input->post();
        $this->Protocolos__model->delete_protocolos($post);
        redirect('index.php/Protocolos/consult_protocolos', 'location');
    }
    function edit_protocolos(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Protocolos/consult_protocolos', 'location');
        $this->data['datos']=$this->Protocolos__model->edit_protocolos($this->data['post']);
        $this->layout->view('protocolos/index', $this->data);
    }
}
?>
