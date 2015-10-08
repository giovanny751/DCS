<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Community Auth - MY_Controller
 *
 * Community Auth is an open source authentication application for CodeIgniter 2.1.3
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2013, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */
class MY_Controller extends CI_Controller {

//  public $template_file = 'templates/main2';
    protected $data = array();

    /**
     * Class constructor
     */
    public function __construct() {
        // creación dinámica del menú
        parent::__construct();
        header('Pragma: no-cache');
        $this->load->database();
        $this->load->library('layout', 'layout_main');
        $this->load->helper('miscellaneous');
        $this->data['user']=$this->session->userdata();
        $this->data["usu_id"] = $this->session->userdata('usu_id');
        $existencia = $this->consultaacceso($this->data['user']);
        
//        if($existencia == false){
//            echo "No tiene permisos por favor cominicarse con el administrador del sistema";
//            die;
//        }
    }
    public function consultaacceso($usu_id){
        $this->load->model('Ingreso_model');
        $ci =& get_instance();
        $controller = $ci->router->fetch_class();
        $method = $ci->router->fetch_method();
        $consulta = $this->Ingreso_model->consultapermisosmenu($usu_id['usu_id'],$controller,$method);
        if(!empty($consulta)){
            return true;
        }else{
            return false;
        }
    }

}

/* End of file MY_Controller.php */
/* Location: /application/libraries/MY_Controller.php */