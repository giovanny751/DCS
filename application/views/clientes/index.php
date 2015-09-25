<div class="row">
    <span class="tituloH">Clientes</span>
    <span class="cuadroH1"></span>
    <span class="cuadroH2"></span>
    <span class="cuadroH3"></span>
</div>
    <form action="<?php echo base_url('index.php/')."/Clientes/save_clientes"; ?>" method="post" onsubmit="return campos()"  enctype="multipart/form-data">
        <div class="row">
                                    <?php $id=(isset($datos[0]->id_cliente)?$datos[0]->id_cliente:'' ) ?>
                                                <input type="hidden" value="<?php echo (isset($datos[0]->id_cliente)?$datos[0]->id_cliente:'' ) ?>" class=" form-control   " id="id_cliente" name="id_cliente">
                    

                    <div class="col-md-3">
                        <label for="nombre">
                            *                             Nombre                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->nombre)?$datos[0]->nombre:'' ) ?>" class=" form-control obligatorio  " id="nombre" name="nombre">

                            
                    </div>

                    

                    <div class="col-md-3">
                        <label for="id_tipo_cliente">
                                                        Tipo cliente                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <?php echo lista("id_tipo_cliente", "id_tipo_cliente", "form-control ", "tipo_cliente", "id_tipo_cliente", "descripcion", null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>

                            
                    </div>
                </div>
        <div class="row">
                    <div class="col-md-3">
                        <label for="fecha_inicio_contrato">
                                                        Fecha inicio contrato                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->fecha_inicio_contrato)?$datos[0]->fecha_inicio_contrato:'' ) ?>" class="form-control fecha" id="fecha_inicio_contrato" name="fecha_inicio_contrato">

                            
                    </div>

                    

                    <div class="col-md-3">
                        <label for="fecha_fin_contrato">
                                                        Fecha fin contrato                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="text" value="<?php echo (isset($datos[0]->fecha_fin_contrato)?$datos[0]->fecha_fin_contrato:'' ) ?>" class=" form-control fecha " id="fecha_fin_contrato" name="fecha_fin_contrato">
                    </div>
            </div>
            <div class="row">

                    

                    <div class="col-md-3">
                        <label for="estado">
                            *                             Estado                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <select  class="form-control obligatorio  " id="estado" name="estado">
                                <option value=""></option>
                                <option value="Activo" <?php echo (isset($datos[0]->estado)?(($datos[0]->estado=='Activo')?'selected="selected"':''):'' ) ?>>Activo</option>
                                <option value="Inactivo" <?php echo (isset($datos[0]->estado)?(($datos[0]->estado=='Inactivo')?'selected="selected"':''):'' ) ?>>Inactivo</option>
                            </select>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="email">
                                                         Email                        </label>
                    </div>
                    <div class="col-md-3">
                                                    <input type="email" value="<?php echo (isset($datos[0]->email)?$datos[0]->email:'' ) ?>" class=" form-control   " id="email" name="email">

                            
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
                <a href="<?php echo base_url('index.php')."/Clientes/consult_clientes" ?>" class="btn btn-dcs">Listado </a>
            </span>
            <span id="boton_cargar" style="display: none">
                <h2>Cargando ...</h2>
            </span>
        </div>
        <div class="row"><div style="float: right"><b>Los campos en * son obligatorios</b></div></div>
    </form>
<script>
    $('#nombre').change(function(){
        var nombre=$('#nombre').val();
        var id_cliente=$('#id_cliente').val();
        $.post('<?php echo base_url('index.php/Clientes/buscar_nombre')?>',{nombre:nombre,id_cliente:id_cliente})
                .done(function(msg){
                    if(msg==0){
                        alerta('verde','Nombre valido')
                    }else{
                        alerta('rojo','Nombre no valido')
                        $('#nombre').val('');
                        return false
                    }
                })
    })
    function campos() {
        $('input[type="file"]').each(function(key, val) {
            var img = $(this).val();
            var r = (img.indexOf('jpg') != -1) ? '' : ((img.indexOf('png') != -1) ? '' : ((img.indexOf('gif') != -1) ? '' : false))
            if (r === false) {
                alert('Tipo de archivo no valido');
                return false;
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
//    $('.fecha').datepicker({ dateFormat: 'yy-mm-dd' });


</script>
