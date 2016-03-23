<?php

class ExamenPaciente__model extends CI_Model {
/**
 *
 * @package     NYGSOFT
 * @author      Gerson J Barbosa / Nelson G Barbosa
 * @copyright   www.nygsoft.com
 * @celular     301 385 9952 - 312 421 2513
 * @email       javierbr12@hotmail.com    
 */
    function __construct() {
        parent::__construct();
    }

    function consultar(){
        
        $this->db->join("examenes","examenes.examen_cod = examen_paciente.examen_cod");
        $data = $this->db->get("examen_paciente");
        return $data->result();
    }

}

?>
