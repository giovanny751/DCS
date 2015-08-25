<?php

class Tamano_empresa_model extends CI_Model {

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