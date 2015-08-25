<?php

class Dimension_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($data) {
        $this->db->insert_batch("dimension", $data);
    }

    function update($data) {
        $this->db->update("dimension", $data);
    }

    function detail() {
        $cargo = $this->db->get("dimension");
        return $cargo->result();
    }

    function delete($id) {
        $this->db->where("dim_id", $id);
        $this->db->delete("dimension");
    }

}

?>