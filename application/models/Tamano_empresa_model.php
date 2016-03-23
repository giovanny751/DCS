<?php

class Tamano_empresa_model extends CI_Model {
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
        $this->db->insert_batch("tamano_empresa", $data);
    }

    function update($data) {
        $this->db->update("tamano_empresa", $data);
    }

    function detail() {
        $cargo = $this->db->get("tamano_empresa");
        return $cargo->result();
    }

    function delete($id) {
        $this->db->where("tamEmp_tamano", $id);
        $this->db->delete("tamano_empresa");
    }

}

?>