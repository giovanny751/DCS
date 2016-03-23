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

    function index() {
        $this->data['post'] = $this->input->post();
        $this->layout->view('equipos/index', $this->data);
    }

    function Informes_estados() {
        $this->data['post'] = $this->input->post();
        $this->layout->view('equipos/Informes_estados', $this->data);
    }

    function consult_equipos() {
        $post = $this->input->post();
        $this->data['post'] = $this->input->post();
        $this->data['datos'] = $this->Equipos__model->consult_equipos($post);
        $this->layout->view('equipos/consult_equipos', $this->data);
    }

    function save_equipos() {
        $post = $this->input->post();
        $post['imagen'] = basename($_FILES['imagen']['name']);
        $post['adjuntar_certificado'] = basename($_FILES['adjuntar_certificado']['name']);
        $id = $this->Equipos__model->save_equipos($post);

        $targetPath = "./uploads/equipos";
        if (!file_exists($targetPath)) {
            mkdir($targetPath, 0777, true);
        }
        $targetPath = "./uploads/equipos/" . $id;
        if (!file_exists($targetPath)) {
            mkdir($targetPath, 0777, true);
        }
        $target_path = $targetPath . '/' . basename($_FILES['imagen']['name']);
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path)) {
            
        }
        $targetPath = "./uploads/equipos";
        if (!file_exists($targetPath)) {
            mkdir($targetPath, 0777, true);
        }
        $targetPath = "./uploads/equipos/" . $id;
        if (!file_exists($targetPath)) {
            mkdir($targetPath, 0777, true);
        }
        $target_path = $targetPath . '/' . basename($_FILES['adjuntar_certificado']['name']);
        if (move_uploaded_file($_FILES['adjuntar_certificado']['tmp_name'], $target_path)) {
            
        }

        redirect('index.php/Equipos/consult_equipos', 'location');
    }

    function delete_equipos() {
        $post = $this->input->post();
        $this->Equipos__model->delete_equipos($post);
        redirect('index.php/Equipos/consult_equipos', 'location');
    }

    function edit_equipos() {
        $this->data['post'] = $this->input->post();
        if (!isset($this->data['post']['campo']))
            redirect('index.php/Equipos/consult_equipos', 'location');
        $this->data['datos'] = $this->Equipos__model->edit_equipos($this->data['post']);
        $this->data['equipo_examen_variable'] = $this->Equipos__model->equipo_examen_variable($this->data['post']);
        $this->layout->view('equipos/index', $this->data);
    }

    function edit_equipos2() {
        $this->data['post'] = $this->input->post();
        if (!isset($this->data['post']['campo']))
            redirect('index.php/Equipos/consult_equipos', 'location');
        $this->data['datos'] = $this->Equipos__model->edit_equipos($this->data['post']);
        $this->data['equipo_examen_variable'] = $this->Equipos__model->equipo_examen_variable($this->data['post']);
        $this->load->view('equipos/index', $this->data);
    }

    function autocomplete_ubicacion() {
        $info = auto("equipos", "id_equipo", "ubicacion", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }
    function buscar_serial(){
        $this->data['post']=$this->input->post();
        echo $this->data['datos']=$this->Equipos__model->buscar_serial($this->data['post']);
    }

    function autocomplete_descripcion() {
        $info = auto("equipos", "id_equipo", "descripcion", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function traer_variables() {
        $post = $this->input->post();
        echo lista("variable_codigo[]", "1", "form-control obligatorio variable_codigo", "variables", "variable_codigo", "hl7tag", null, array("ACTIVO" => "S", "examen_cod" => $post['id_examen']), /* readOnly? */ false);
    }

    function traer_variables2() {
        $post = $this->input->post();
        echo lista("variable_codigo", "1", "form-control obligatorio variable_codigo", "variables", "variable_codigo", "hl7tag", null, array("ACTIVO" => "S", "examen_cod" => $post['id_examen']), /* readOnly? */ false);
    }

    function obterner_informe() {
        $post = $this->input->post();
        if ($post['accion'] == 2) {
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Documentos.xls"');
            header('Cache-Control: max-age=0');
            echo '<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">';
        }
        if ($post['informe'] == 1) {
            $this->tabla1();
        }
        if ($post['informe'] == 2) {
            $this->tabla2();
        }
    }

    function tabla1() {
        $this->data['post'] = $post = $this->input->post();
        $this->data['array'] = $this->Equipos__model->informacion_tabla1($post);
        $this->load->view('equipos/tabla1', $this->data);
    }

    function tabla2() {
        $this->data['post'] = $post = $this->input->post();
        $this->data['array'] = $this->Equipos__model->informacion_tabla2($post);
        $this->load->view('equipos/tabla2', $this->data);
    }

    function verificar_equipo() {
        $this->data['post'] = $post = $this->input->post();
        echo $datos = $this->Equipos__model->verificar_equipo($post);
    }

    function imprimir_acta() {
        $id_equipo = $this->input->get('id_equipo');
		//$fechaimpresion=date("d/m/Y H:i:s");
		$fechaimpresion=date("d/m/Y");
		//print $fechaimpresion; exit;
		
        if (isset($id_equipo)) {
            if (!empty($id_equipo)) {
                $this->db->where('id_equipo', $this->input->get('id_equipo'));
                $this->db->join('tipo_equipo', 'tipo_equipo.tipo_equipo_cod=equipos.tipo_equipo_cod');
                $datos = $this->db->get('equipos');
                $datos = $datos->result();
            }
        } else {
            $this->db->where('id_paciente', $this->input->get('id_paciente'));
            $datos_equipo = $this->db->get('paciente_equipo_tipoequipo');
            $datos_equipo = $datos_equipo->result();
            $a = array();
            foreach ($datos_equipo as $value) {
                $a[] = $value->id_equipo;
            }
            if (count($a) > 0) {
                $this->db->where_in('id_equipo', $a);
                $this->db->join('tipo_equipo', 'tipo_equipo.tipo_equipo_cod=equipos.tipo_equipo_cod');
                $datos = $this->db->get('equipos');
                $datos = $datos->result();
            }
        }

        $this->db->where('id_paciente', $this->input->get('id_paciente'));
        $datos2 = $this->db->get('pacientes');
        $datos2 = $datos2->result();
		
        $html = '';
        $html.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        $html.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        $html.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        $html.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ACTA DE ENTREGA DE EQUIPOS';
        $html.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        $html.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<table border="1"><tr><td>N°</td></tr></table>';
//        $html.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        $html.='<p>';
        $html.='<table>';
        $html.='<tr>';
        $html.='<td>Señor(a):</td>';
        $html.='<td></td>';
        $html.='<td>Dirección:</td>';
        $html.='<td>' . (isset($datos2[0]->direccion) ? $datos2[0]->direccion : '') . '</td>';
        $html.='</tr>';
        $html.='<tr>';
        $html.='<td>Nombre:</td>';
        $html.='<td>' . (isset($datos2[0]->nombres) ? $datos2[0]->nombres : '') . '</td>';
        $html.='<td>Barrio:</td>';
        $html.='<td>' . (isset($datos2[0]->barrio) ? $datos2[0]->barrio : '') . '</td>';
        $html.='</tr>';
        $html.='<tr>';
        $html.='<td>Apellidos:</td>';
        $html.='<td>' . (isset($datos2[0]->apellidos) ? $datos2[0]->apellidos : '') . '</td>';
        $html.='<td>Ciudad:</td>';
        $html.='<td>' . (isset($datos2[0]->ciudad) ? $datos2[0]->ciudad : '') . '</td>';
        $html.='</tr>';
        $html.='<tr>';
        $html.='<td>Cedula:</td>';
        $html.='<td>' . (isset($datos2[0]->cedula_paciente) ? $datos2[0]->cedula_paciente : '') . '</td>';
        $html.='<td>Telefono:</td>';
        $html.='<td>' . (isset($datos2[0]->telefono_fijo) ? $datos2[0]->telefono_fijo : '') . '</td>';
        $html.='</tr>';
        $html.='<tr>';
        $html.='<td>Fecha de Impresión:</td>';
        $html.='<td>'.  $fechaimpresion .'</td>';
        $html.='<td>Celular:</td>';
        $html.='<td>' . (isset($datos2[0]->celular) ? $datos2[0]->celular : '') . '</td>';
        $html.='</tr>';
		$html.='<tr>';
        $html.='<td colspan="3">Fecha y Hora de Entrega:________________________</td>';
        $html.='<td></td>';
        $html.='<td></td>';
        $html.='<td></td>';
        $html.='</tr>';
        $html.='</table>';
        $html.='<p>';
        $html.='<table border="1" width="100%">';
        $html.='<tr >';
        $html.='<td height="60px"> Observaciones';
        $html.='</td>';
        $html.='</tr>';
        $html.='</table>';
        $html.='<p>';
        $html.='<table border="0" style="background-color: #ccc;" width="100%">';
        $html.='<tr>';
        $html.='<td> ';
        $html.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        $html.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        $html.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        $html.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        $html.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        $html.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        $html.='Equipos';
        $html.='</td>';
        $html.='</tr>';
        $html.='</table>';
        $html.='<p>';
        $html.='<table border="1">';
        $html.='<tr>';
        $html.='<td>Equipo</td>';
        $html.='<td>Serial /N°</td>';
        $html.='<td>Tipo Equipo</td>';
        $html.='</tr>';

        foreach ($datos as $value) {
            $html.='<tr><td>' . $value->descripcion . '</td>';
            $html.='<td>' . $value->serial . '</td>';
            $html.='<td>' . $value->referencia . '</td></tr>';
        }

        $html.='</table>';
        $html.='<p>';
        $html.='</p>';
        $html.='<p>';
        $html.='</p>';
        $html.='<p>';
        $html.='</p>';
        $html.='<p>';
        $html.='</p>';
        $html.='Entregado por:';
        $html.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        $html.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        $html.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        $html.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        $html.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        $html.='Entregado a:';
        $html.='<p>';
        $html.='</p>';
        $html.='<p>';
        $html.='</p>';
        $html.='__________________________';
        $html.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
//        $html.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
//        $html.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        $html.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        $html.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        $html.='__________________________';
		
        pdf($html);
    }

    function AltiriaSMS() {
        $sDestination='573124212513';
        $sMessage='Texto de prueba SGM';
        
        $sData = "cmd=sendsms&domainId=demo&login=sgmcomco&passwd=sgmcomco&dest=" . str_replace(",", "&dest=", $sDestination) . "&msg=" . urlencode(utf8_encode(substr($sMessage, 0, 160)));
        $fp = fsockopen("www.altiria.net", 80);
        // Reemplazar la cadena sustituirPOSTsmspor la parte correspondiente
        // de la URL suministrada por Altiria al dar de alta el servicio
        $buf = "POST /api/http HTTP/1.0\r\n";
        $buf .= "Host: www.altiria.net\r\n";
        $buf .= "Content-type: application/x-www-form-urlencoded; charset=UTF-8\r\n";
        $buf .= "Content-length: " . strlen($sData) . "\r\n";
        $buf .= "\r\n";
        $buf .= $sData;
        fputs($fp, $buf);
        $buf = "";
        while (!feof($fp))
            $buf .= fgets($fp, 128);
        fclose($fp);
        if (strstr($buf, "ERROR"))
            $resp = $buf;
        else
            $resp = "";


        
        if (!$resp)
            print "Mensaje enviado correctamente!\n";
        else
            echo strstr($resp, "ERROR");
    }

}

?>
