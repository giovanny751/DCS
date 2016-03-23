<?php

class Cargo_model extends CI_Model {
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
        $this->db->insert_batch("cargo", $data);
    }

    function update($data) {
        $this->db->update("cargo", $data);
    }

    function detail() {
        $this->db->select("cargo.car_id");
        $this->db->select("cargo.car_nombre");
        $this->db->select("c.car_nombre as jefe");
        $this->db->select("cargo.car_porcentajearl");
        $this->db->join("cargo as c","cargo.car_jefe = c.car_id","left");
        $cargo = $this->db->get("cargo");
//        echo $this->db->last_query();die;
        return $cargo->result();
    }

    function delete($id) {
        $this->db->where("car_id", $id);
        $this->db->delete("cargo");
    }
    function consultahijos($id){
        
        $this->db->where("c.car_id", $id);
        $this->db->join("cargo as c","cargo.car_jefe = c.car_id","left");
        $cantidad = $this->db->count_all_results("cargo");
        return $cantidad;
    }

}

?>