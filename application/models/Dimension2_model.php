<?php

class Dimension2_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($data) {
        $this->db->insert_batch("dimension2", $data);
    }

    function update($data) {
        $this->db->update("dimension2", $data);
    }

    function detail() {
        $cargo = $this->db->get("dimension2");
        return $cargo->result();
    }

    function delete($id) {
        $this->db->where("dim_id", $id);
        $this->db->delete("dimension2");
    }

}

?>