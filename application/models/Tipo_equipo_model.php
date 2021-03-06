<?php 
class Tipo_equipo_model extends CI_Model {
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
    function save_tipo_equipo($post){
        if(isset($post['campo'])){ 
        $this->db->where($post["campo"],$post[$post["campo"]]);
            unset($post['campo']);
            $this->db->update('tipo_equipo',$post);
        }else{
            $this->db->insert('tipo_equipo',$post);
        }
        
    }
    function delete_tipo_equipo($post){
        $this->db->set('ACTIVO','N');
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $this->db->update('tipo_equipo');
    }
    function edit_tipo_equipo($post){
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $datos=$this->db->get('tipo_equipo',$post);
        return $datos=$datos->result();
    }
    function consult_tipo_equipo($post){
            if(isset($post['tipo_equipo_cod']))
        if($post['tipo_equipo_cod']!="")
        $this->db->like('tipo_equipo_cod',$post['tipo_equipo_cod']);
                    if(isset($post['referencia']))
        if($post['referencia']!="")
        $this->db->like('referencia',$post['referencia']);
                    if(isset($post['fecha_creacion']))
        if($post['fecha_creacion']!="")
        $this->db->like('fecha_creacion',$post['fecha_creacion']);
                    if(isset($post['activo']))
        if($post['activo']!="")
        $this->db->like('activo',$post['activo']);
                                    $this->db->select('tipo_equipo_cod');
                                $this->db->select('referencia');
                        $this->db->where('ACTIVO','S');
        $datos=$this->db->get('tipo_equipo');
        $datos=$datos->result();
        return $datos;
    }
}
?>
