<?php

class Empresa_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    function create($data) {

         $this->db->insert_batch("empresa",$data);
    }
        function detail(){
        $empresa = $this->db->get("empresa");
        return $empresa->result();
    }
    
    function update($data){
        
        $this->db->update("empresa",$data);
    }


}

?>