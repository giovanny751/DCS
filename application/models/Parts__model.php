<?php 
class Parts__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function save_parts($post){
        if(isset($post['campo'])){ 
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $id=$post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('parts',$post);
        }else{
            $this->db->insert('parts',$post);
            $id=$this->db->insert_id();
        }
        return $id;
        
    }
    function delete_parts($post){
        $this->db->set('ACTIVO','N');
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $this->db->update('parts');
    }
    function edit_parts($post){
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $datos=$this->db->get('parts',$post);
        return $datos=$datos->result();
    }
    function consult_parts($post){
            if(isset($post['id']))
        if($post['id']!="")
        $this->db->like('id',$post['id']);
                    if(isset($post['descripcion']))
        if($post['descripcion']!="")
        $this->db->like('descripcion',$post['descripcion']);
                    if(isset($post['notes']))
        if($post['notes']!="")
        $this->db->like('notes',$post['notes']);
                    if(isset($post['ACTIVO']))
        if($post['ACTIVO']!="")
        $this->db->like('ACTIVO',$post['ACTIVO']);
                                    $this->db->select('id');
                                $this->db->select('descripcion');
                                $this->db->select('notes');
                        $this->db->where('ACTIVO','S');
        $datos=$this->db->get('parts');
        $datos=$datos->result();
        return $datos;
    }
    function validaexistencia($cc){
        $this->db->where("descripcion",$cc);
        $this->db->where("activo",'S');
        $data = $this->db->get('parts');
        return $data->result();
    }
}
?>
