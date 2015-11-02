<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Presentacion extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Ingreso_model');
        $this->load->model('Roles_model');
        $this->load->helper('miscellaneous');
        $this->load->helper('security');
//        echo $this->session->userdata('usu_id')."****";die;
        validate_login($this->session->userdata('usu_id'));
    }

    function principal() {
        $this->data['content'] = $this->modulos('prueba', null, $this->data['user']['usu_id']);
        $this->layout->view('presentacion/principal', $this->data);
    }

    function modulos($datosmodulos, $html = null, $usuarioid) {
        $tipo = 2;
        $menu = $this->Ingreso_model->menu($datosmodulos, $usuarioid, $tipo);
        $i = array();
        foreach ($menu as $modulo)
            $i[$modulo['menu_id']][$modulo['menu_nombrepadre']][$modulo['menu_idpadre']] [] = array($modulo['menu_idhijo'], $modulo['menu_controlador'], $modulo['menu_accion']);
        if ($datosmodulos == 'prueba')
            $html .="<ul class='nav navbar-nav'>";
        else
            $html .="<ul class='dropdown-menu'>";
        foreach ($i as $padre => $nombrepapa)
            foreach ($nombrepapa as $nombrepapa => $menuidpadre)
                foreach ($menuidpadre as $modulos => $menu)
                    foreach ($menu as $submenus):
                        $html .= "<li><a href='" . base_url("index.php/" . $submenus[1] . "/" . $submenus[2]) . "' >" . strtoupper($nombrepapa) . "</a>";
                        if (!empty($submenus[0]))
                            $html .=$this->modulos($submenus[0], null, $usuarioid);
                        $html .= "</li>";
                    endforeach;
        $html.="</ul>";
        return $html;
    }

    function principal_menu() {
        return $menu = $this->load->view('presentacion/modulos');
    }

    function administracionmenu() {
        $this->load->view('presentacion/menu', $this->data);
    }

    function consultadatosmenu() {
        $idgeneral = $this->input->post('idgeneral');
        if (!empty($idgeneral)) {
            $datos = $this->Ingreso_model->consultamenu($idgeneral);
            $this->output->set_content_type('application/json')->set_output(json_encode($datos[0]));
        } else {
            redirect('auth/login', 'refresh');
        }
    }

    public function creacionmenu() {

        $this->data['hijo'] = $this->input->post('menu');
        $this->data['nombrepadre'] = $this->input->post('nombrepadre');
        $this->data['idgeneral'] = $this->input->post('idgeneral');
        if (empty($this->data['idgeneral']))
            $this->data['hijo'] = 0;
        $this->data['menu'] = $this->Ingreso_model->consultahijos($this->data['idgeneral']);
        if (!empty($this->data['idgeneral'])) {
            $this->data['menu'] = $this->Ingreso_model->hijos($this->data['idgeneral']);
        }
        $this->layout->view('presentacion/creacionmenu', $this->data);
    }

    function guardarmodulo() {
        if (!empty($this->data['user'])) {
            $modulo = $this->input->post('modulo');
            $padre = $this->input->post('padre');
            $general = $this->input->post('general');
            $actualizamodulo = $this->Ingreso_model->actualizahijos($general);

            $guardamodulo = $this->Ingreso_model->guardarmodulo($modulo, $padre, $general);
            $menu = $this->Ingreso_model->cargamenu($general);


            $this->output->set_content_type('application/json')->set_output(json_encode($menu));
        } else {
            redirect('auth/login', 'refresh');
        }
    }

    function guardaatribustosmodulo() {
        $idgeneral = $this->input->post('idgeneral');
        if (!empty($idgeneral)) {
            $controlador = $this->input->post('controlador');
            $accion = $this->input->post('accion');
            $estado = $this->input->post('estado');
            $nombre = $this->input->post('nombre');

            $this->Ingreso_model->guardaatributos($idgeneral, $controlador, $accion, $estado, $nombre);
        } else {
            redirect('auth/login', 'refresh');
        }
    }

    function usuario() {
        $this->data['roles'] = $this->Roles_model->roles();
        $this->data['usaurios'] = $this->Ingreso_model->totalusuarios();
        $this->layout->view('presentacion/usuario', $this->data);
    }

    function permisosporrol() {
        $idrol = $this->input->post('idrol');
        $idusuario = $this->input->post('idusuario');
        $data = array();
        for ($i = 0; $i < count($idrol); $i++) {
            $data[$i] = array("" => $idrol, "" => $idusuario);
        }

        $permisos = $this->permisorolporusuario('prueba', $idrol, $idusuario);
        echo $permisos;
    }

    function consultausuario() {
        $id = $this->input->post('id');
        if (!empty($id)) {
            $usuario = $this->Ingreso_model->consultausuario($id);
            $this->output->set_content_type('application/json')->set_output(json_encode($usuario[0]));
        } else {
            redirect('auth/login', 'refresh');
        }
    }

    function guardarusuario() {
        $this->Ingreso_model->guardarusuario($this->input->post('usuario'), $this->input->post('email'), $this->input->post('contrasena'));
    }

    function eliminarmodulo() {
        $idgeneral = $this->input->post('idgeneral');
        if (!empty($idgeneral))
            $eliminar = $this->Ingreso_model->eliminar($idgeneral);
    }

    function permisosusuarios() {
        $this->data['usuarios'] = $this->Ingreso_model->usuarios();
        $this->layout->view('presentacion/permisosusuarios', $this->data);
    }

    function permisosmenu($iduser, $datosmodulos = 'prueba', $dato = null) {
        $menu = $this->Ingreso_model->menu($iduser, $datosmodulos, 1);
        $i = array();
        foreach ($menu as $modulo)
            $i[$modulo['menu_id']][$modulo['menu_nombrepadre']][$modulo['menu_idpadre']][$modulo['modulo_menuid']] [] = $modulo['menu_idhijo'];

        if ($datosmodulos == 'prueba')
            echo "<ul class='principal'>";
        else
            echo "<ul>";
        foreach ($i as $padre => $nombrepapa)
            foreach ($nombrepapa as $nombrepapa => $menuidpadre)
                foreach ($menuidpadre as $modulos => $menu)
                    foreach ($menu as $permiosos => $menuprincipal)
                        foreach ($menuprincipal as $submenus):
                            if (!empty($permiosos))
                                echo "<li><a href=''>" . strtoupper($nombrepapa) . "</a><input type='checkbox' checked='checked' value='" . $padre . "' name='" . $padre . "' papa='" . $padre . "'>";
                            else
                                echo "<li><a href=''>" . strtoupper($nombrepapa) . "</a><input type='checkbox'  value='" . $padre . "' name='" . $padre . "' papa='" . $padre . "'>";
                            if (!empty($submenus))
                                $this->permisosmenu($iduser, $submenus);
                            echo "</li>";
                        endforeach;
        echo "</ul>";
    }

    function retornamenutotal() {
        return $this->permisosmenu($this->input->post('usuario'));
    }

    function savepermissionsuser() {

        $this->data['user'] = $this->input->post('usuario');
        $eliminarpermisos = $this->Ingreso_model->eliminarpermisos($this->data['user']);
        $usuario = $this->input->post();
        $datos = array();
        foreach ($usuario as $papa => $modulos) {
            $datos[] = array('usu_id' => $this->data['user'], 'modulo_menuid' => $modulos);
        }

        $guardarpermisos = $this->Ingreso_model->permisosmodulo($datos);
    }

    function permisoroles($datosmodulos, $html = null,$s=null) {
        $menu = $this->Ingreso_model->permisoroles($datosmodulos);
        $i = array();
        foreach ($menu as $modulo)
            $i[$modulo['menu_id']][$modulo['menu_nombrepadre']][$modulo['menu_idpadre']] [] = array($modulo['menu_idhijo'], $modulo['menu_controlador'], $modulo['menu_accion']);

        $html .="<ul>";
        foreach ($i as $padre => $nombrepapa)
            foreach ($nombrepapa as $nombrepapa => $menuidpadre)
                foreach ($menuidpadre as $modulos => $menu)
                    foreach ($menu as $submenus):
                        $html .= "<tr><td>".($s==null?'':'&nbsp;&nbsp;&nbsp;')."<input type='checkbox' class='seleccionados ".($s==null?'':$s)."'  atr='".str_replace(' ','',strtoupper($nombrepapa))."' name='permisorol[]' value='" . $padre . "'></td><td>".($s==null?'<br><b>':'')."<li>" . strtoupper($nombrepapa) . "";
                        if (!empty($submenus[0]))
                            $html .=$this->permisoroles($submenus[0],' ',  str_replace(' ','',strtoupper($nombrepapa)));
                        $html .= "</li></td></tr>";
                    endforeach;
        $html.="</ul>";
        return $html;
    }

    function roles() {
        $this->data['content'] = "<table border='0' width='100%'>".$this->permisoroles('prueba', null)."</table>";
        $this->data['roles'] = $this->Roles_model->roles();
        $this->layout->view('presentacion/roles', $this->data);
    }

    function guardarroles() {

        $nombre = $this->input->post('nombre');

        if (!empty($nombre)) {
            $permisorol = $this->input->post('permisorol');
            $id = $this->Roles_model->guardarrol($nombre);
            $insert = array();
            for ($i = 0; $i < count($permisorol); $i++) {
                $insert[] = array('rol_id' => $id, 'menu_id' => $permisorol[$i]);
            }
            $this->Roles_model->insertapermisos($insert);
            $roles = $this->Roles_model->roles();
            $this->output->set_content_type('application/json')->set_output(json_encode($roles));
            die;
        } else {
            $id = $this->input->post('rol');
            $this->Roles_model->eliminpermisosrol($id);
        }
        $permisorol = $this->input->post('permisorol');
        $insert = array();
        for ($i = 0; $i < count($permisorol); $i++)
            $insert[] = array('rol_id' => $id, 'menu_id' => $permisorol[$i]);
        $this->Roles_model->insertapermisos($insert);
    }

    function eliminarrol() {
        $id = $this->input->post('id');
        $this->Roles_model->eliminarrol($id);
        $this->Roles_model->eliminpermisosrol($id);
    }

    function guardaratributosmenu() {
        $this->Ingreso_model->guardaratributosmenu($this->input->post('nombre'), $this->input->post('controlador'), $this->input->post('accion'), $this->input->post('estado'), $this->input->post('id'));
    }

    function administracionareas() {
        $this->data['cargos'] = $this->Ingreso_model->areas();
        $this->data['pais'] = $this->Ingreso_model->paises();
        $this->layout->view('presentacion/administracionareas', $this->data);
    }

    function guardararea() {
        $this->Ingreso_model->guardararea($this->input->post('area'));
        $this->output->set_content_type('application/json')->set_output(json_encode($this->Ingreso_model->areas()));
    }

    function guardarcargo() {
        $this->Ingreso_model->guardarcargo($this->input->post('area'), $this->input->post('cargo'));
    }

    function permisousuarios($datosmodulos, $html = null, $idusuario) {

        $tipo = 1;
        $menu = $this->Ingreso_model->menu($datosmodulos, $idusuario, $tipo);
        $i = array();

        foreach ($menu as $modulo)
            $i[$modulo['menu_id']][$modulo['menu_nombrepadre']][$modulo['menu_idpadre']] [] = array($modulo['menu_idhijo'], $modulo['menu_controlador'], $modulo['menu_accion'], $modulo['menudos']);
        if ($datosmodulos == 'prueba')
            $html .="<ul>";
        else
            $html .="<ul>";
        foreach ($i as $padre => $nombrepapa)
            foreach ($nombrepapa as $nombrepapa => $menuidpadre)
                foreach ($menuidpadre as $modulos => $menu)
                    foreach ($menu as $submenus):
                        if ($submenus[3] == $padre) {
                            $checked = 'checked';
                        } else {
                            $checked = '';
                        }
                        $html .= "<li> <div>" . strtoupper($nombrepapa) . "</div><div align='center'><input type='checkbox' " . $checked . " name='permisousuario[]' value='" . $padre . "'></div>";
                        if (!empty($submenus[0]))
                            $html .=$this->permisousuarios($submenus[0], null, $idusuario);
                        $html .= "</li>";
                    endforeach;
        $html.="</ul>";
        return $html;
    }

    function permisos() {
        echo $this->permisousuarios('prueba', null, $this->input->post('id'));
    }

    function guardarpermisos() {
        $rol = $this->input->post('idrol');
        $usuario = $this->input->post('idusuario');
        $this->Ingreso_model->eliminarpermisosusuario($usuario);
        $this->Ingreso_model->actualizausuariorol($usuario);
        $data = array();
        $i = 0;
        for ($i = 0; $i < count($rol); $i++) {
            $data[$i] = array(
                "rol_id" => $rol[$i],
                "usu_id" => $usuario
            );
        }
        $this->Ingreso_model->permisosusuariomenu($data);
    }

    function guardarpais() {
        $this->Ingreso_model->guardarpais($this->input->post('pais'));
        $pais = $this->Ingreso_model->paises();
        $this->output->set_content_type('application/json')->set_output(json_encode($pais));
    }

    function guardarciudad() {
        $insertar[] = array('pai_id' => $this->input->post('pais'), 'ciu_nombre' => $this->input->post('ciudad'));
        $this->Ingreso_model->guardarciudad($insertar);
    }

    function guardartipoproducto() {
        $this->Ingreso_model->guardartipoproducto($this->input->post('tipoproducto'));
    }

    function rolesasignados() {
        $roles = $this->Ingreso_model->rolesasignados($this->input->post('id'));
        $this->output->set_content_type('application/json')->set_output(json_encode($roles));
    }

    function recordarcontrasena() {
        $this->layout->view('presentacion/recordarcontrasena');
    }

    function guardarcontrasena() {
        $this->Ingreso_model->guardarcontrasena($this->input->post('password'), $this->data['user']['usu_id']);
    }

    function rol() {

        $this->data['roles'] = $this->Roles_model->rolxusuario($this->session->userdata('usu_id'));
        $this->layout->view("presentacion/rol", $this->data);
    }

    function guardarroldefecto() {
        $this->load->model("User_model");
        $rol = $this->input->post("rol");
        $usu_id = $this->session->userdata('usu_id');
        $this->User_model->rolxdefecto($rol, $usu_id);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */