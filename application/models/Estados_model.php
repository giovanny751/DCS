<?php

class Estados_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    function detail() {
        $estados = $this->db->get("estados");
        return $estados->result();
    }


}

?>