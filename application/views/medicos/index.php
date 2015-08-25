

<form action="<?php echo base_url('index.php/')."/Medicos/save_medicos"; ?>" method="post" onsubmit="return campos()">
    <div>
    <div class="row">

                <div class="col-md-3">
                                                        </div>
                <div class="col-md-3">
                    <input type="hidden" value="<?php echo (isset($datos[0]->medico_codigo)?$datos[0]->medico_codigo:'' ) ?>" class="form-control   " id="medico_codigo" name="medico_codigo">
                    <br>
                </div>

                </div><div class="row">

                <div class="col-md-3">
                    *                     Nombre                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($datos[0]->medico_nombre)?$datos[0]->medico_nombre:'' ) ?>" class="form-control obligatorio  " id="medico_nombre" name="medico_nombre">
                    <br>
                </div>

                </div><div class="row">

                <div class="col-md-3">
                    *                     Matricula profecional                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($datos[0]->medico_matricula_prof)?$datos[0]->medico_matricula_prof:'' ) ?>" class="form-control obligatorio  " id="medico_matricula_prof" name="medico_matricula_prof">
                    <br>
                </div>

                

                <div class="col-md-3">
                    *                     Dirección                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($datos[0]->medico_direccion)?$datos[0]->medico_direccion:'' ) ?>" class="form-control obligatorio  " id="medico_direccion" name="medico_direccion">
                    <br>
                </div>

                

                <div class="col-md-3">
                    *                     Telefono fijo                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($datos[0]->medico_telefono_fijo)?$datos[0]->medico_telefono_fijo:'' ) ?>" class="form-control obligatorio  number" id="medico_telefono_fijo" name="medico_telefono_fijo">
                    <br>
                </div>

                

                <div class="col-md-3">
                                        Celular                </div>
                <div class="col-md-3">
                    <input type="text" value="<?php echo (isset($datos[0]->medico_celular)?$datos[0]->medico_celular:'' ) ?>" class="form-control   number" id="medico_celular" name="medico_celular">
                    <br>
                </div>

                

                <div class="col-md-3">
                                        Email                </div>
                <div class="col-md-3">
                    <input type="email" value="<?php echo (isset($datos[0]->medico_email)?$datos[0]->medico_email:'' ) ?>" class="form-control   " id="medico_email" name="medico_email">
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
        <a href="<?php echo base_url('index.php')."/Medicos/consult_medicos" ?>" class="btn btn-success">Listado </a>
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
