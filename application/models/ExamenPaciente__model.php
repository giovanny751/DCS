<?php

class ExamenPaciente__model extends CI_Model {

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
