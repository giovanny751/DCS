<?php

class Empleado_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($data) {
        $this->db->insert_batch("empleado", $data);
    }

    function update($data) {
        $this->db->update("empleado", $data);
    }

    function detail() {

        $empleado = $this->db->get("empleado");
        return $empleado->result();
    }

    function delete($id) {
        $this->db->where("emp_id", $id);
        $this->db->delete("empleado");
    }
    function filtroempleados($cedula,$nombre,$apellido,$codigo,$tipodocumento,$estado){
        
        if(!empty($cedula))$this->db->where('Emp_Cedula',$cedula);
        if(!empty($nombre))$this->db->where('Emp_Nombre',$nombre);
        if(!empty($apellido))$this->db->where('Emp_Apellidos',$apellido);
        if(!empty($codigo))$this->db->where('Emp_codigo',$codigo);
        if(!empty($tipodocumento))$this->db->where('TipDoc_id',$tipodocumento);
        if(!empty($estado))$this->db->where('Est_id',$estado);
        $empleado = $this->db->get("empleado");
        return $empleado->result();
        
    }

}

?>