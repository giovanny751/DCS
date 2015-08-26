
<h1>Variables</h1>
<form action="<?php echo base_url('index.php/')."/Variables/save_variables"; ?>" method="post" onsubmit="return campos()">
    <div>
    <div class="row">

                <div class="col-md-3">
                                                        </div>
                <div class="col-md-3">
                    <input type="hidden" value="<?php echo (isset($datos[0]->variable_cod)?$datos[0]->variable_cod:'' ) ?>" class="form-control   " id="variable_cod" name="variable_cod">
                    <br>
                </div>

                </div><div class="row">

                <div class="col-md-3">
                    *                     Descripción                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($datos[0]->variable_descrip)?$datos[0]->variable_descrip:'' ) ?>" class="form-control obligatorio  " id="variable_descrip" name="variable_descrip">
                    <br>
                </div>

                </div><div class="row">

                <div class="col-md-3">
                    *                     Examen                </div>
                <div class="col-md-3">
                    <?php echo lista("examen_cod", "examen_cod", "form-control obligatorio", "examenes", "examen_cod", "examen_nombre", null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                    <br>
                </div>

                                </div>
        <?php if(isset($post['campo'])){ ?>
        <input type="hidden" name="<?php echo $post['campo']?>" value="<?php echo $post[$post['campo']]?>">
        <input type="hidden" name="campo" value="<?php echo $post['campo']?>">
        <?php } ?>
<div class="row">
        <button class="btn btn-success">Guardar</button> 
        <input class="btn btn-success" type="reset" value="Limpiar">
        <a href="<?php echo base_url('index.php')."/Variables/consult_variables" ?>" class="btn btn-success">Listado </a>
</div>
        <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
</form>
<script>
    function campos() {
        if (obligatorio('obligatorio') == false) {
            return false
        } else {
            return true;
        }
    }
    $('body').delegate('.number', 'keypress', function(tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });
    $('.fecha').datepicker();
</script>
