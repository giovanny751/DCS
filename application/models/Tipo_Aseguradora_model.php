<?php

class Tipo_Aseguradora_model extends CI_Model {
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


    function detail() {

        $tipoaseguradora = $this->db->get("tipo_aseguradora");
        return $tipoaseguradora->result();
    }


}

?>