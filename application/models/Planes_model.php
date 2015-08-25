<?php

class Planes_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    function create($data) {

         $this->db->insert_batch("planes",$data);
    }


}

?>