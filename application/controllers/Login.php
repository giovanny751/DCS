<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('Ingreso_model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
    }

    public function index() {
        $datos = $this->session->userdata('usu_id');
        if (!empty($datos)) {
            redirect('index.php/presentacion/principal', 'location');
        } else {
            $this->load->view('login/index');
        }
    }

    public function make_hash($var = 1) {
        echo make_hash($var);
    }

    public function politica() {
        $this->user_model->listo_politica($this->input->post('username'), $this->input->post('password'));
        $this->verify();
    }

    function verify() {
        $user = $this->user_model->get_user($this->input->post('username'), $this->input->post('password'));
        if (!empty($user) > 0) {
            if ($user[0]['usu_politicas'] == 0) {
                $this->data['inicio'] = $this->user_model->admin_inicio();
                $this->load->view('login/politicas', $this->data);
            } else {
                $this->acceso($user);
                $data[] = array(
                    'usu_id'=>$user[0]['usu_id'],  
                    'ing_fechaIngreso'=>date('Y-m-d H:i:s')   
                );
                $this->Ingreso_model->insertingreso($data);
                redirect('index.php/presentacion/principal', 'location');
            }
        } else {
            $this->session->set_flashdata(array('message' => 'Su n&uacute;mero de documento no se encuentra registrado en el sistema.', 'message_type' => 'warning'));
            redirect('', 'refresh');
        }
    }

    public function logout() {
        $this->session->set_userdata('logged_in', FALSE);
        $this->session->sess_destroy();
        redirect('index.php/login', 'location');
    }
    function acceso($user = null, $id = NULL) {
        $i = 0;
        if (!empty($id)) {
            $user = $this->user_model->validacionusuario(deencrypt_id($id));
            $i = 1;
        }
        $this->session->set_userdata($user[0]);
        if ($i == 1) {
            $ruta = 'index.php/presentacion/principal';
            redirect($ruta, 'location');
        }
    }
    function reset() {
        $mail = $this->input->post('email');
        $password = $this->user_model->reset($mail);
        mail($mail, "Restablecer la contraseña. ", 'clave: ' . $password);
    }

}
