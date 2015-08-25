<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_user($username, $pass) {
        $this->db->where('usu_email', $username);
        $this->db->where('usu_contrasena', $pass);
//        $this->db->where('usu_status','0');
        $query = $this->db->get('user');
//        echo $this->db->last_query();die;
        return $query->result_array();
    }

    public function listo_politica($username, $pass) {
        $this->db->set('usu_politicas', '1');
        $this->db->where('usu_correo', $username);
        $this->db->where('usu_password', $pass);
        $this->db->update('user');
    }

    public function validacionusuario($iduser) {
        $this->db->where('usu_id', $iduser);
        $query = $this->db->get('user');
        return $query->result();
    }

    function admin_inicio() {
        $this->db->where('ini_id', 1);
        $dato = $this->db->get('inicio');
        return $dato->result();
    }

    function reset($mail) {
        $datos = rand(1000000, 8155555);
        $this->db->get('usu_password', $datos);
        $this->db->where('usu_correo', $mail);
        $this->db->get('user');
        return $datos;
    }

    function create($data) {
        $this->db->insert_batch('user', $data);
    }

    function filteruser($apellido = null, $cedula = null, $estado = null, $nombre = null) {
        if (!empty($apellido))
            $this->db->where('usu_apellido', $apellido);
        if (!empty($cedula))
            $this->db->where('usu_cedula', $cedula);
        if (!empty($estado))
            $this->db->where('est_id', $estado);
        if (!empty($nombre))
            $this->db->where('usu_nombre', $nombre);
        $this->db->join("ingreso","ingreso.usu_id = user.usu_id","LEFT");
        $user = $this->db->get('user');
        return $user->result();
    }
    function consultageneral(){
        
        $this->db->join("ingreso","ingreso.usu_id = user.usu_id","LEFT");
        $user = $this->db->get('user');
        return $user->result();
        
    }

}
