<?php 
$clase=ucfirst($post['tabla']);
$model=ucfirst($post['tabla'])."__model";
?>
<=?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class <?php echo $clase ?> extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('<?php echo $model; ?>');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('<?php echo $post['tabla']?>/index', $this->data);
    }
    function consult_<?php echo $post['tabla']?>(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this-><?php echo $model; ?>->consult_<?php echo $post['tabla']?>($post);
        $this->layout->view('<?php echo $post['tabla']?>/consult_<?php echo $post['tabla']?>', $this->data);
    }
    function save_<?php echo $post['tabla']?>(){
        $post=$this->input->post();
        $this-><?php echo $model; ?>->save_<?php echo $post['tabla']?>($post);
        redirect('index.php/<?php echo ucfirst($post['tabla'])?>/consult_<?php echo $post['tabla']?>', 'location');
    }
    function delete_<?php echo $post['tabla']?>(){
        $post=$this->input->post();
        $this-><?php echo $model;?>->delete_<?php echo $post['tabla']?>($post);
        redirect('index.php/<?php echo ucfirst($post['tabla'])?>/consult_<?php echo $post['tabla']?>', 'location');
    }
    function edit_<?php echo $post['tabla']?>(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/<?php echo ucfirst($post['tabla'])?>/consult_<?php echo $post['tabla']?>', 'location');
        $this->data['datos']=$this-><?php echo $model;?>->edit_<?php echo $post['tabla']?>($this->data['post']);
        $this->layout->view('<?php echo $post['tabla']?>/index', $this->data);
    }
}
?=>