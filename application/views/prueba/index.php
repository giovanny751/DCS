<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i>     </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php/')."/Prueba/save_prueba"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">
        <div class="row">
                                    <?php $id=(isset($datos[0]->id)?$datos[0]->id:'' ) ?>
                        

                    <div class="col-md-12">
                        <label for="id">
                            *                             id                        </label>
                    </div>
                    <div class="col-md-12">
                                                    <input type="text" value="<?php echo (isset($datos[0]->id)?$datos[0]->id:'' ) ?>" class=" form-control obligatorio  " id="id" name="id">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-12">
                        <label for="nombre">
                            *                             nombre                        </label>
                    </div>
                    <div class="col-md-12">
                        <?php echo lista("nombre", "nombre", "form-control obligatorio", "ciudad", "ciu_id", "ciu_nombre", (isset($datos[0]->nombre)?$datos[0]->nombre:'' ), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                        <br>
                    </div>

                    

                    <div class="col-md-12">
                        <label for="fecha">
                            *                             fecha                        </label>
                    </div>
                    <div class="col-md-12">
                                                    <input type="text" value="<?php echo (isset($datos[0]->fecha)?$datos[0]->fecha:'' ) ?>" class=" form-control obligatorio  " id="fecha" name="fecha">

                            
                                                <br>
                    </div>

                    

                    <div class="col-md-12">
                        <label for="activo">
                            *                             activo                        </label>
                    </div>
                    <div class="col-md-12">
                                                    <input type="text" value="<?php echo (isset($datos[0]->activo)?$datos[0]->activo:'' ) ?>" class=" form-control obligatorio  " id="activo" name="activo">

                            
                                                <br>
                    </div>

                            </div>
        <?php if(isset($post['campo'])){ ?>
        <input type="hidden" name="<?php echo $post['campo']?>" value="<?php echo $post[$post['campo']]?>">
        <input type="hidden" name="campo" value="<?php echo $post['campo']?>">
        <?php } ?>
        <div class="row">
            <span id="boton_guardar">
                <button class="btn btn-dcs" >Guardar</button> 
                <input class="btn btn-dcs" type="reset" value="Limpiar">
                <a href="<?php echo base_url('index.php')."/Prueba/consult_prueba" ?>" class="btn btn-dcs">Listado </a>
            </span>
            <span id="boton_cargar" style="display: none">
                <h2>Cargando ...</h2>
            </span>
        </div>
        <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
    </form>
</div>
<script>
    function campos() {
        $('input[type="file"]').each(function(key, val) {
            var img = $(this).val();
            if (img != "") {
                var r = (img.indexOf('jpg') != -1) ? '' : ((img.indexOf('png') != -1) ? '' : ((img.indexOf('gif') != -1) ? '' : false))
                if (r === false) {
                    alert('Tipo de archivo no valido');
                    return false;
                }
            }
        });
        if (obligatorio('obligatorio') == false) {
            return false
        } else {
            $('#boton_guardar').hide();
            $('#boton_cargar').show();
            return true;
        }
    }
    $('body').delegate('.number', 'keypress', function(tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });
    $('.fecha').datepicker({ dateFormat: 'yy-mm-dd' });


</script>
