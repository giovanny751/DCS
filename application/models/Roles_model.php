<?php

class Roles_model extends CI_Model {
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
    function cantidadroles($id){
        
        $this->db->select('roles.rol_id,rol_nombre');
        $this->db->distinct('roles.rol_id,rol_nombre');
        $this->db->where('permisos.usu_id',$id);
        $this->db->join('permisos','permisos.rol_id = roles.rol_id');
        $roles = $this->db->get('roles');
        return $roles->result_array();
    }
    
    function roles(){
        $this->db->select('roles.*,(select count(*) from permisos where rol_id=roles.rol_id ) cantidad ');
        $consulta = $this->db->get('roles');
        return $consulta->result_array();
    }
    
    function guardarrol($nombre){
        $this->db->set('rol_nombre',$nombre);
        $this->db->insert('roles');
        return $this->db->insert_id();
    } 
    function insertapermisos($insert){
        $this->db->insert_batch('permisos_rol',$insert);
    }
    
    function eliminarrol($id){
        $this->db->where('rol_id',$id);
        $this->db->delete('roles');
    }
    function eliminpermisosrol($idrol){
        $this->db->where('rol_id',$idrol);
        $this->db->delete('permisos_rol');
    }
    function rolxusuario($usu_id){
        $this->db->where("rol_estado",1);
        $this->db->where("permisos.usu_id",$usu_id);
        $this->db->join("permisos","permisos.rol_id = roles.rol_id");
        $rol = $this->db->get("roles");
        return $rol->result();
    }
}