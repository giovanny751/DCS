
<h1>Exámenes</h1>
<form action="<?php echo base_url('index.php/')."/Examenes/save_examenes"; ?>" method="post" onsubmit="return campos()">
    <div>
        <div class="row">

                    <div class="col-md-3">
                        <label for="examen_cod">
                                                            </label>
                    </div>
                    <div class="col-md-3">
                                                <input type="hidden" value="<?php echo (isset($datos[0]->examen_cod)?$datos[0]->examen_cod:'' ) ?>" class="form-control   " id="examen_cod" name="examen_cod">
                                                <br>
                    </div>

                    </div><div class="row">

                    <div class="col-md-3">
                        <label for="examen_nombre">
                        *          Nombre                            </label>
                    </div>
                    <div class="col-md-3">
                                                <input type="text" value="<?php echo (isset($datos[0]->examen_nombre)?$datos[0]->examen_nombre:'' ) ?>" class="form-control obligatorio  " id="examen_nombre" name="examen_nombre">
                                                <br>
                    </div>

                            </div>
        <?php if(isset($post['campo'])){ ?>
        <input type="hidden" name="<?php echo $post['campo']?>" value="<?php echo $post[$post['campo']]?>">
        <input type="hidden" name="campo" value="<?php echo $post['campo']?>">
        <?php } ?>
        <div class="row">
            <span id="boton_guardar">
                <button class="btn btn-success" >Guardar</button> 
                <input class="btn btn-success" type="reset" value="Limpiar">
                <a href="<?php echo base_url('index.php')."/Examenes/consult_examenes" ?>" class="btn btn-success">Listado </a>
            </span>
            <span id="boton_cargar" style="display: none">
                <h2>Cargando ...</h2>
            </span>
        </div>
        <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
</form>
<script>
    function campos() {

        if (obligatorio('obligatorio') == false) {
            return false
        } else {
            $('#boton_guardar').hide();
            $('#boton_cargar').show();
            return true;
        }
    }
    $('body').delegate('.number', 'keypress', function (tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });
    $('.fecha').datepicker();
</script>
