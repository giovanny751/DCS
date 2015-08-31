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
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('equipos/index', $this->data);
    }
    function consult_equipos(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Equipos__model->consult_equipos($post);
        $this->layout->view('equipos/consult_equipos', $this->data);
    }
    function save_equipos(){
        $post=$this->input->post();
                            $post['imagen']=basename($_FILES['imagen']['name']);
                                    $post['adjuntar_certificado']=basename($_FILES['adjuntar_certificado']['name']);
                        $id=$this->Equipos__model->save_equipos($post);
        
                        $targetPath = "./uploads/equipos";
                if (!file_exists($targetPath)) {
                    mkdir($targetPath, 0777, true);
                }
                $targetPath = "./uploads/equipos/".$id;
                if (!file_exists($targetPath)) {
                    mkdir($targetPath, 0777, true);
                }
                $target_path = $targetPath.'/'. basename($_FILES['imagen']['name']);
                if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path)) {

                }    
                                $targetPath = "./uploads/equipos";
                if (!file_exists($targetPath)) {
                    mkdir($targetPath, 0777, true);
                }
                $targetPath = "./uploads/equipos/".$id;
                if (!file_exists($targetPath)) {
                    mkdir($targetPath, 0777, true);
                }
                $target_path = $targetPath.'/'. basename($_FILES['adjuntar_certificado']['name']);
                if (move_uploaded_file($_FILES['adjuntar_certificado']['tmp_name'], $target_path)) {

                }    
                                
        redirect('index.php/Equipos/consult_equipos', 'location');
    }
    function delete_equipos(){
        $post=$this->input->post();
        $this->Equipos__model->delete_equipos($post);
        redirect('index.php/Equipos/consult_equipos', 'location');
    }
    function edit_equipos(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Equipos/consult_equipos', 'location');
        $this->data['datos']=$this->Equipos__model->edit_equipos($this->data['post']);
        $this->layout->view('equipos/index', $this->data);
    }
                    function autocomplete_ubicacion(){
                  $info = auto("equipos","id_equipo","ubicacion",$this->input->get('term'));
                  $this->output->set_content_type('application/json')->set_output(json_encode($info));
                }
            }
?>
