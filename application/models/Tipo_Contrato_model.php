<?php

class Tipo_Contrato_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    function detail() {

        $tipocontrato = $this->db->get("tipo_contrato");
        return $tipocontrato->result();
    }


}

?>