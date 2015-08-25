<?php

class Tipo_Aseguradora_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    function detail() {

        $tipoaseguradora = $this->db->get("tipo_aseguradora");
        return $tipoaseguradora->result();
    }


}

?>