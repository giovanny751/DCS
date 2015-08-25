<?php

class Crea_formularios_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function tablas() {
        $datos = $this->db->query('show tables');
//        foreach ($datos->result() as $key => $value) {
//            $da[]=$value->$key;
//        }
//        echo "<pre>";
//        print_r($datos->result());
//        echo "</pre>";
        return $datos->result();
    }

    public function info_table($post) {
        $datos = $this->db->query('describe ' . $post['tabla']);
        return $datos->result();
    }

    public function info_input() {
        $datos = $this->db->query('select * from tipo_inputs');
        return $datos->result();
    }

}
