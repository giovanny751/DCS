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
class Tipo_alarma extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Tipo_alarma__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('tipo_alarma/index', $this->data);
    }
    function consult_tipo_alarma(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Tipo_alarma__model->consult_tipo_alarma($post);
        $this->layout->view('tipo_alarma/consult_tipo_alarma', $this->data);
    }
    function save_tipo_alarma(){
        $post=$this->input->post();
        unset($post['id_niveles_alarma']);
        $id = $this->Tipo_alarma__model->save_tipo_alarma($post);
        $data = $this->input->post('id_niveles_alarma');
        $insert = array();
        for($i = 0;$i<count($data);$i++){
            $insert[] = array('id_tipo_alarma'=>$id,'id_niveles_alarma'=>$data[$i]);
        }
        $this->Tipo_alarma__model->save_nivel_tipo($insert);
        
        redirect('index.php/Tipo_alarma/consult_tipo_alarma', 'location');
    }
    function delete_tipo_alarma(){
        $post=$this->input->post();
        $this->Tipo_alarma__model->delete_tipo_alarma($post);
        redirect('index.php/Tipo_alarma/consult_tipo_alarma', 'location');
    }
    function edit_tipo_alarma(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Tipo_alarma/consult_tipo_alarma', 'location');
        $this->data['datos']=$this->Tipo_alarma__model->edit_tipo_alarma($this->data['post']);
        $this->data['tipo_alarma_nivel']=$this->Tipo_alarma__model->tipo_alarma_nivel($this->data['post']);
        $this->layout->view('tipo_alarma/index', $this->data);
    }
    function confirmar_duplicado(){
        $post=$this->input->post();
        if(!empty($post['anteriores'])){
            $post['anteriores'] = substr($post['anteriores'], 0, -1);
            $this->Tipo_alarma__model->confirmar_duplicado($post);
        }else{
            echo '00';
        }
    }
    function buscar_tipo_alarma(){
        $this->data['post']=$this->input->post();
        echo $this->data['datos']=$this->Tipo_alarma__model->buscar_tipo_alarma($this->data['post']);
    }
}
?>
