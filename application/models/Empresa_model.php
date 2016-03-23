<?php

class Empresa_model extends CI_Model {
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