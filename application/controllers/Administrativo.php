<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Administrativo extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Ingreso_model');
        $this->load->model('Roles_model');
        $this->load->helper('miscellaneous');
        $this->load->helper('security');
        validate_login($this->session->userdata('usu_id'));
    }

    function creacionempleados() {

        $this->load->model('Tipo_Contrato_model');
        $this->load->model('Sexo_model');
        $this->load->model('Estado_Civil_model');
        $this->load->model('Cargo_model');
        $this->load->model('Tipo_Aseguradora_model');
        $this->load->model('Dimension2_model');
        $this->load->model('Dimension_model');

        $this->data['tipocontrato'] = $this->Tipo_Contrato_model->detail();
        $this->data['sexo'] = $this->Sexo_model->detail();
        $this->data['estadocivil'] = $this->Estado_Civil_model->detail();
        $this->data['cargo'] = $this->Cargo_model->detail();
        $this->data['tipoaseguradora'] = $this->Tipo_Aseguradora_model->detail();
        $this->data['dimension'] = $this->Dimension_model->detail();
        $this->data['dimension2'] = $this->Dimension2_model->detail();
//        if ($this->consultaacceso($this->data["usu_id"])) :
            $this->layout->view("administrativo/creacionempleados", $this->data);
//        else:
//            $this->layout->view("permisos");
//        endif;
    }

    function guardarempleado() {
        $this->load->model('Empleado_model');

        echo $this->input->post('fechadenacimiento');
        die;

        $data[] = array(
            'Emp_codigo' => $this->input->post('codigo'),
            'Emp_Cedula' => $this->input->post('cedula'),
            'TipDoc_id' => $this->input->post('tipodocumento'),
            'Emp_Nombre' => $this->input->post('nombre'),
            'Emp_Apellidos' => $this->input->post('apellidos'),
            'sex_Id' => $this->input->post('sexo'),
            'Emp_FechaNacimiento' => $this->input->post('fechadenacimiento'),
            'Emp_Estatura' => $this->input->post('estatura'),
            'Emp_Peso' => $this->input->post('peso'),
            'Emp_Telefono' => $this->input->post('telefono'),
            'Emp_Direccion' => $this->input->post('direccion'),
            'Emp_Contacto' => $this->input->post('contacto'),
            'Emp_TelefonoContacto' => $this->input->post('telefonocontacto'),
            'Emp_Email' => $this->input->post('email'),
            'EstCiv_id' => $this->input->post('estadocivil'),
            'TipCon_Id' => $this->input->post('tipocontrato'),
            'Emp_FechaInicioContrato' => $this->input->post('fechainiciocontrato'),
            'Emp_FechaFinContrato' => $this->input->post('fechafincontrato'),
            'Emp_PlanObligatorioSalud' => $this->input->post('planobligatoriodesalud'),
            'Emp_FechaAfiliacionArl' => $this->input->post('fechaafiliacionarl'),
            'TipAse_Id' => $this->input->post('tipoaseguradora'),
            'Ase_Id' => $this->input->post('nombreaseguradora'),
            'Dim_id' => $this->input->post('dimension1'),
            'Dim_IdDos' => $this->input->post('dimension2'),
            'Est_id' => $this->input->post('estado'),
            'Car_id' => $this->input->post('cargo')
        );

        $this->Empleado_model->create($data);
    }

    function listadoempleados() {
        $this->load->model('Tipo_documento_model');
        $this->data["tipodocumento"] = $this->Tipo_documento_model->detail();
        $this->layout->view("administrativo/listadoempleados", $this->data);
    }

    function consultaempleados() {
        $this->load->model('Empleado_model');
        $cedula = $this->input->post('cedula');
        $nombre = $this->input->post('nombre');
        $apellido = $this->input->post('apellido');
        $codigo = $this->input->post('codigo');
        $tipodocumento = $this->input->post('tipodocumento');
        $estado = $this->input->post('estado');

        $this->data['listado'] = $this->Empleado_model->filtroempleados($cedula, $nombre, $apellido, $codigo, $tipodocumento, $estado);
        $this->output->set_content_type('application/json')->set_output(json_encode($this->data['listado']));
    }

    function creacionusuarios() {

        $user = $this->input->post('usu_id');
        if (!isset($user))
            $est = array(1);
        else
            $est = array(1, 2);
        $this->load->model('Estados_model');
        $this->load->model('User_model');
        $this->data['estado'] = $this->Estados_model->detail($est);
        $this->data['usuario'] = "";

        if (!empty($user)) {
            $this->data['usuario'] = $this->User_model->consultausuarioxid($this->input->post('usu_id'));
//            var_dump($this->data['usuario']);die;
        }
        $this->layout->view("administrativo/creacionusuarios", $this->data);
    }

    function listadousuarios() {
        $this->load->model('Tipo_documento_model');
        $this->load->model('Estados_model');
        $this->load->model('User_model');
        $this->data["tipodocumento"] = $this->Tipo_documento_model->detail();
        $this->data["estados"] = $this->Estados_model->detail();
        $this->data["usuarios"] = $this->User_model->consultageneral();
        $this->layout->view("administrativo/listadousuarios", $this->data);
    }

    function consultarusuario() {
        $this->load->model('User_model');
        $this->data['usuarios'] = $this->User_model->filteruser(
                $this->input->post('apellido')
                , $this->input->post('cedula')
                , $this->input->post('estado')
                , $this->input->post('nombre')
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($this->data['usuarios']));
    }

    function guardarusuario() {
        $this->load->model('User_model');
        $data = array(
            'usu_contrasena' => $this->input->post('contrasena'),
            'est_id' => $this->input->post('estado'),
            'usu_politicas' => '0',
            'usu_cedula' => $this->input->post('cedula'),
            'usu_nombre' => $this->input->post('nombres'),
            'usu_apellido' => $this->input->post('apellidos'),
            'usu_usuario' => $this->input->post('usuario'),
            'usu_email' => $this->input->post('email'),
            'usu_fechaCreacion' => date('Y-m-d H:i:s')
        );
        $data1 = $this->User_model->validaexistencia($this->input->post('cedula'));
        $cedu = $this->input->post('cedula');
        if (empty($data1))
            $this->User_model->create($data);
        else
            $this->User_model->update_user($data, $cedu);
    }

    function confirm_cedula() {
        $this->load->model('User_model');
        $datos = $this->User_model->validaexistencia($this->input->post('cedula'));
        echo count($datos);
    }

    function confirm_usuario() {
        $this->load->model('User_model');
        $datos = $this->User_model->validaexistencia_usuario($this->input->post('usuario'));
        echo count($datos);
    }

    function actualizarusuario() {
        $this->load->model('User_model');
        $data = array(
            'usu_contrasena' => $this->input->post('contrasena'),
            'est_id' => $this->input->post('estado'),
            'usu_cedula' => $this->input->post('cedula'),
            'usu_nombre' => $this->input->post('nombres'),
            'usu_apellido' => $this->input->post('apellidos'),
            'usu_usuario' => $this->input->post('usuario'),
            'usu_email' => $this->input->post('email'),
            'sex_id' => $this->input->post('genero'),
            'car_id' => $this->input->post('cargo'),
            'emp_id' => $this->input->post('empleado'),
//            'usu_cambiocontrasena' => $this->input->post('cambiocontrasena'),
            'usu_fechaCreacion' => date('Y-m-d H:i:s')
        );

        $this->User_model->update($data, $this->input->post('usuid'));
    }

    function cargos() {
        $this->load->model('Cargo_model');
        $this->data["cargo"] = $this->Cargo_model->detail();
        $this->layout->view("administrativo/cargos", $this->data);
    }

    function guardarcargo() {

        $this->load->model('Cargo_model');

        $cargo = $this->input->post("cargo");
        $cargojefe = $this->input->post("cargojefe");
        $porcentaje = $this->input->post("porcentaje");
        $data = array();
        for ($i = 0; $i < count($cargo); $i++) {
            $data[$i] = array(
                "car_nombre" => $cargo[$i],
                "car_jefe" => $cargojefe[$i],
                "car_porcentajearl" => $porcentaje[$i],
            );
        }

        $this->Cargo_model->create($data);
        $this->data["cargo"] = $this->Cargo_model->detail();
        $this->output->set_content_type('application/json')->set_output(json_encode($this->data["cargo"]));
    }

    function eliminarcargo() {

        $this->load->model('Cargo_model');
        $consulta = $this->Cargo_model->consultahijos($this->input->post('id'));
        if ($consulta > 0) {
            echo 1;
        } else {
            $this->Cargo_model->delete($this->input->post('id'));
            echo 2;
        }
    }

    function dimension() {
        $this->load->model('Dimension_model');
        $this->data['dimension'] = $this->Dimension_model->detail();
        $this->layout->view("administrativo/dimension", $this->data);
    }

    function guardardimension() {
        $this->load->model('Dimension_model');
        $data[0] = array(
            "dim_codigo" => $this->input->post('codigo'),
            "dim_descripcion" => $this->input->post('descripcion')
        );
        $this->Dimension_model->create($data);
        $dimension = $this->Dimension_model->detail();
        $this->output->set_content_type('application/json')->set_output(json_encode($dimension));
    }

    function eliminardimension() {
        $this->load->model('Dimension_model');
        $this->Dimension_model->delete($this->input->post('id'));
    }

    function actualizardimension() {
        $this->load->model('Dimension_model');
    }

    function empresa() {
        $this->load->model("Empresa_model");
        $this->load->model('Tamano_empresa_model');
        $this->load->model('Numero_empleados_model');
        $this->load->model('Dimension_model');
        $this->load->model('Dimension2_model');
        $this->data['tamano'] = $this->Tamano_empresa_model->detail();
        $this->data['numero'] = $this->Numero_empleados_model->detail();
        $this->data['dimensionuno'] = $this->Dimension_model->detail();
        $this->data['dimensiondos'] = $this->Dimension2_model->detail();
        $this->data['informacion'] = $this->Empresa_model->detail();
//        var_dump($this->data['informacion']);die;
        $this->layout->view("administrativo/empresa", $this->data);
    }

    function guardarempresa() {
        $this->load->model("Empresa_model");
        $data[] = array(
            "emp_razonSocial" => $this->input->post("razonsocial"),
            "emp_nit" => $this->input->post("nit"),
            "emp_direccion" => $this->input->post("direccion"),
            "ciu_id" => $this->input->post("ciudad"),
            "tam_id" => $this->input->post("tamano"),
            "numEmp_id" => $this->input->post("empleados"),
            "actEco_id" => $this->input->post("actividadeconomica"),
            "Dim_id" => $this->input->post("dimension1"),
            "Dimdos_id" => $this->input->post("dimension2"),
            "emp_representante" => $this->input->post("representante")
//            "emp_logo"=>$this->input->post("")
        );
        $datos = $this->Empresa_model->detail();
        if (count($datos) == 0)
            $this->Empresa_model->create($data);
        else
            $this->Empresa_model->update($data[0]);
    }

    function eliminar_usuarios() {
        $this->load->model('User_model');
        $post = $this->input->post();
        $this->User_model->eliminar_usuarios($post);
    }

    function autocomplete_cedula() {
        $info = auto("user", "usu_id", "usu_cedula", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function autocomplete_nombre() {
        $info = auto("user", "usu_id", "usu_nombre", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function autocomplete_apellido() {
        $info = auto("user", "usu_id", "usu_apellido", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function autocomplete_cedulausuario() {
        $info = auto("user", "usu_id", "usu_contrasena", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function autocomplete_nombreusuario() {
        $info = auto("user", "usu_id", "usu_nombre", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function autocomplete_apellidousuario() {
        $info = auto("user", "usu_id", "usu_apellido", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */