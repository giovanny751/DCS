<?php

class Numero_empleados_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($data) {
        $this->db->insert_batch("numero_empleados", $data);
    }

    function update($data) {
        $this->db->update("numero_empleados", $data);
    }

    function detail() {
        $cargo = $this->db->get("numero_empleados");
        return $cargo->result();
    }

    function delete($id) {
        $this->db->where("numEmp_id", $id);
        $this->db->delete("numero_empleados");
    }

}

?>