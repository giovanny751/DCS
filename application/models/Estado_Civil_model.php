<?php

class Estado_Civil_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    function detail() {

        $estadoCivil = $this->db->get("estado_civil");
        return $estadoCivil->result();
    }


}

?>