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
class Validacion extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Brigadas__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
    }

    function enviar() {
        $sql = "SELECT protocolos.*,
            pacientes.id_paciente,
            pacientes.nombres,
            niveles_alarma.descripcion alarmas_nivel_alarma,
            tipo_alarma.descripcion desc_tipo_alarma,
            alarmas_generadas.id_alarmas_generadas,
            lectura_equipo.lectura_numerica
                FROM alarmas_generadas 
                LEFT JOIN niveles_alarma ON niveles_alarma.id_niveles_alarma=alarmas_generadas.id_niveles_alarma 
                LEFT JOIN lectura_equipo ON lectura_equipo.id_lectura_equipo=alarmas_generadas.id_lectura_equipo 
                LEFT JOIN pacientes ON pacientes.id_paciente=lectura_equipo.id_paciente 
                LEFT JOIN tipo_alarma ON alarmas_generadas.id_tipo_alarma=tipo_alarma.id_tipo_alarma 
                LEFT JOIN examenes ON tipo_alarma.examen=examenes.examen_cod 
                LEFT JOIN protocolos ON niveles_alarma.id_protocolo=protocolos.id_protocolo 
                WHERE tipo_alarma.analisis_resultados <> 'Normal' AND alarmas_generadas.ACTIVO = 'S' 
                and alarmas_generadas.reportado=0
                ORDER BY niveles_alarma.color DESC, lectura_equipo.fecha_creacion DESC";
        $datos = $this->db->query($sql);
        $datos = $datos->result();
        foreach ($datos as $value) {
            $sql_pacintes = "select contacto.email,contacto.celular "
                    . "from paciente_contacto "
                    . "join contacto on contacto.contacto_id=paciente_contacto.contacto_id "
                    . "where contacto.activo='S'  and  id_paciente= " . $value->id_paciente;
            $datos_contacto = $this->db->query($sql_pacintes);
            $datos_contacto = $datos_contacto->result();
            $texto = $value->nombres . " -> " . $value->alarmas_nivel_alarma . " -> " . $value->desc_tipo_alarma.' -> '.$value->lectura_numerica;
            if ($value->enviar_sms == 'SI') {
                foreach ($datos_contacto as $value2) {
                    if (!empty($value2->celular)) {
                        $this->AltiriaSMS("57" . $value2->celular, $texto);
                    }
                }
            }
            if ($value->enviar_email == 'SI') {
                $email = '';
//                print_r($datos_contacto);
                foreach ($datos_contacto as $value2) {
                    $email.=$value2->email . ',';
                }
                if (!empty($email)) {
                    $email = substr($email, 0, -1);
                    echo $email;
                    mail($email, 'Alarma ', $texto);
                }
                $this->db->set('reportado', 1);
                $this->db->where('id_alarmas_generadas', $value->id_alarmas_generadas);
                $this->db->update('alarmas_generadas');
            }
        }
    }

    function mensajes() {
        $sDestination = '573124212513';
        $sMessage = 'Texto de prueba SGM';
        $resp = $this->AltiriaSMS($sDestination, $sMessage);
    }

    function AltiriaSMS($sDestination, $sMessage, $debug = null) {
        $sData = "cmd=sendsms&";
        $sData .="domainId=demopr&";
        $sData .="login=gramirez&";
        $sData .="passwd=dcxfukso&";
        $sData .="dest=" . str_replace(",", "&dest=", $sDestination) . "&";
        $sData .="msg=" . urlencode(utf8_encode(substr($sMessage, 0, 160)));
        $fp = fsockopen("www.altiria.net", 80, $errno, $errstr, 10);
        $debug = TRUE;


        if (!$fp) {
//Error de conexion
            $output = "ERROR de conexion: $errno - $errstr<br />\n";
            $output .= "Compruebe que ha configurado correctamente la direccion/url ";
            $output .= "suministrada por altiria<br>";
            return $output;
        } else {
// Reemplazar la cadena â€™/sustituirPOSTsmsâ€™ por la parte correspondiente
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
//Si la llamada se hace con debug, se muestra la respuesta completa del servidor
            if ($debug) {
                print "Respuesta del servidor: <br>" . $buf . "<br>";
            }
//Se comprueba que se ha conectado realmente con el servidor
//y que se obtenga un codigo HTTP OK 200
            if (strpos($buf, "HTTP/1.1 200 OK") === false) {
                $output = "ERROR. Codigo error HTTP: " . substr($buf, 9, 3) . "<br />\n";
                $output .= "Compruebe que ha configurado correctamente la direccion/url ";
                $output .= "suministrada por Altiria<br>";
                return output;
            }


//Se comprueba la respuesta de Altiria
            if (strstr($buf, "ERROR")) {
                $output = $buf . "<br />\n";
                $output .= " Codigo de error de Altiria. Compruebe la especificacion<br>";
                return $output;
            } else
                return "";
        }
    }

}

?>
