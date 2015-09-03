<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_user($username, $pass) {
        $this->db->where('usu_usuario', $username);
        $this->db->where('usu_contrasena', $pass);
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function listo_politica($username, $pass) {
        $this->db->set('usu_politicas', '1');
        $this->db->where('usu_email', $username);
        $this->db->where('usu_contrasena', $pass);
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
        $this->db->set('usu_contrasena', $datos);
        $this->db->where('usu_email', $mail);
        $this->db->update('user');
        return $datos;
    }
    function actualizar($mail) {
        $this->db->set('usu_cambiocontrasena', 1);
        $this->db->where('usu_email', $mail);
        $this->db->get('user');
        return $datos;
    }

    function create($data) {
        $this->db->insert_batch('user', $data);
//        echo $this->db->last_query();die;
    }
    function validaexistencia($cc){
        
        $this->db->where("usu_cedula",$cc);
        $data = $this->db->get('user');
        return $data->result();
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
        
        $this->db->select("user.usu_id as id,user.*,ingreso.Ing_fechaIngreso as ingreso");
        $this->db->join("ingreso","ingreso.usu_id = user.usu_id and ingreso.ing_fechaIngreso = (select max(ing_fechaIngreso) from ingreso ) ","LEFT");
        $user = $this->db->get('user');
//        echo $this->db->last_query();die;
        return $user->result();
        
    }
    function consultausuarioxid($id){
        
        $this->db->where("usu_id",$id);
        $user = $this->db->get("user");
        return $user->result();
    }
    function update($data,$id){
        $this->db->where("usu_id",$id);
        
        $this->db->update("user",$data);
    }
    function consultausuarioxcedula($cedula){
        
         $this->db->where("usu_cedula",$cedula);
        $user = $this->db->get("user");
        return $user->result();
        
    }
    function rolxdefecto($rol,$usu_id){
        
        $this->db->where("usu_id",$usu_id);
        $this->db->set("rol_id",$rol);
        $this->db->update("user");
        
    }
}
