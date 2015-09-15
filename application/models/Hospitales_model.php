<?php 
class Hospitales_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function save_hospitales($post){
        if(isset($post['campo'])){ 
        $this->db->where($post["campo"],$post[$post["campo"]]);
            unset($post['campo']);
            $this->db->update('hospitales',$post);
        }else{
            $this->db->insert('hospitales',$post);
        }
        
    }
    function delete_hospitales($post){
        $this->db->set('ACTIVO','N');
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $this->db->update('hospitales');
    }
    function edit_hospitales($post){
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $datos=$this->db->get('hospitales',$post);
        return $datos=$datos->result();
    }
    function consult_hospitales($post){
        
        if(isset($post['codigo_hospital']))
        if($post['codigo_hospital']!="")
        $this->db->like('codigo_hospital',$post['codigo_hospital']);
                    if(isset($post['nombre']))
        if($post['nombre']!="")
        $this->db->like('nombre',$post['nombre']);
                    if(isset($post['estado']))
        if($post['estado']!="")
        $this->db->like('estado',$post['estado']);
                    if(isset($post['fecha_creacion']))
        if($post['fecha_creacion']!="")
        $this->db->like('fecha_creacion',$post['fecha_creacion']);
                    if(isset($post['direccion']))
        if($post['direccion']!="")
        $this->db->like('direccion',$post['direccion']);
                    if(isset($post['telefono_fijo']))
        if($post['telefono_fijo']!="")
        $this->db->like('telefono_fijo',$post['telefono_fijo']);
                    if(isset($post['celular']))
        if($post['celular']!="")
        $this->db->like('celular',$post['celular']);
                    if(isset($post['email']))
        if($post['email']!="")
        $this->db->like('email',$post['email']);
                    if(isset($post['activo']))
        if($post['activo']!="")
        $this->db->like('activo',$post['activo']);
                                    $this->db->select('codigo_hospital');
                                $this->db->select('nombre');
                                $this->db->select('estado');
                                $this->db->select('direccion');
                                $this->db->select('telefono_fijo');
                                $this->db->select('celular');
                                $this->db->select('email');
                        $this->db->where('ACTIVO','S');
        if(empty($post))$this->db->where("1",2);                
        $datos=$this->db->get('hospitales');
        $datos=$datos->result();
        return $datos;
    }
    public function referencia($post) {
        if(!empty($post['codigo_hospital']))
        $this->db->where_not_in('codigo_hospital', $post['codigo_hospital']);
        $this->db->where('nombre', $post['nombre']);
        $this->db->where('ACTIVO', 'S');
        $datos = $this->db->get('hospitales');
        $datos =$datos->result();
        return count($datos);
    }
}
?>
