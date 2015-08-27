<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Crea_formularios extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Crea_formularios_model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }

    public function index() {

        $this->data["tablas"] = $this->Crea_formularios_model->tablas();
//        $this->data["titulo"] = 'crear formulario';
        $this->layout->view('Crea_formularios/index', $this->data);
    }

    public function info_table() {
        $post = $this->input->post();
        $datos = $this->Crea_formularios_model->info_table($post);
        $info_input = $this->Crea_formularios_model->info_input();
        $html = "";
        
        $data = array($datos,$info_input);
        
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
        
//        foreach ($datos as $value) {
//            $html.="<tr>"
//                    . "<td><input type='hidden' name='nombre_campo[]' value='" . $value->Field . "'> " . $value->Field . "</td>"
//                    . "<td>" . $value->Type . "</td>"
//                    . "<td><input type='text' name='nombre_label[]' value='" . $value->Field . "'></td>"
//                    . "<td> <select name='tipo[]'>";
//            foreach ($info_input as $info_input2) {
//                $html.="<option value='" . $info_input2->name . "'>" . $info_input2->name . "</option>";
//            }
//            $html.="</select></td>"
//                    . "<td><select name='obligatorio[]'>"
//                    . "<option value='obligatorio'>Si</option>"
//                    . "<option value=''>No</option>"
//                    . "</select></td>"
//                    . "<td><select name='numero[]'>"
//                    . "<option value=''>No</option>"
//                    . "<option value='number'>Si</option>"
//                    . "</select></td>"
//                    . "<td><select name='fecha[]'>"
//                    . "<option value=''>No</option>"
//                    . "<option value='fecha'>Si</option>"
//                    . "</select></td>"
//                    . "<td><select name='aparezca[]'>"
//                    . "<option value='1'>Si</option>"
//                    . "<option value=''>No</option>"
//                    . "</select></td>"
//                    . "</tr>";
//        }
////        print_r($datos);
//        echo $html;
    }

    public function new_file() {
        $this->data["post"] = $this->input->post();
        $view = $this->load->view('Crea_formularios/view', $this->data, true);
        $controller = $this->load->view('Crea_formularios/controller', $this->data, true);
        $model = $this->load->view('Crea_formularios/model', $this->data, true);
        $view_consulta = $this->load->view('Crea_formularios/view_consulta', $this->data, true);

        $view_consulta =  str_replace('<=?php', '<?php', $view_consulta);
        $view_consulta =  str_replace('?=>', '?>', $view_consulta);
        $model =  str_replace('<=?php', '<?php', $model);
        $model =  str_replace('?=>', '?>', $model);
        $controller =  str_replace('<=?php', '<?php', $controller);
        $controller =  str_replace('?=>', '?>', $controller);
        $view =  str_replace('<=?php', '<?php', $view);
        $view =  str_replace('?=>', '?>', $view);
        
        $controllers="./application/controllers/";
        $models="./application/models/";
        $estructura="./application/views/".$this->data["post"]['tabla']."/";
        mkdir($estructura, 0777, true);
        
        $file = fopen($controllers."/".ucfirst($this->data["post"]['tabla']).".php", "w");
        fwrite($file, $controller . PHP_EOL);
        fclose($file);
        $file = fopen($models."/".ucfirst($this->data["post"]['tabla'])."_model.php", "w");
        fwrite($file, $model . PHP_EOL);
        fclose($file);
        $file = fopen($estructura."/index.php", "w");
        fwrite($file, $view . PHP_EOL);
        fclose($file);
        $file = fopen($estructura."/"."consult_".$this->data["post"]['tabla'].".php", "w");
        fwrite($file, $view_consulta . PHP_EOL);
        fclose($file);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */