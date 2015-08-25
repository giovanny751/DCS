
<h1>Equipos</h1>
<form action="<?php echo base_url('index.php/')."/Equipos/save_equipos"; ?>" method="post" onsubmit="return campos()">
    <div>
        <div class="row">

                    <div class="col-md-3">
                                                    </div>
                    <div class="col-md-3">
                        <input type="hidden" value="<?php echo (isset($datos[0]->id_equipo)?$datos[0]->id_equipo:'' ) ?>" class="form-control   " id="id_equipo" name="id_equipo">
                        <br>
                    </div>

                    </div><div class="row">

                    <div class="col-md-3">
                        *         Descripción                    </div>
                    <div class="col-md-3">
                        <input type="text" value="<?php echo (isset($datos[0]->descripcion)?$datos[0]->descripcion:'' ) ?>" class="form-control obligatorio  " id="descripcion" name="descripcion">
                        <br>
                    </div>

                    </div><div class="row">

                    <div class="col-md-3">
                        *         Estado                    </div>
                    <div class="col-md-3">
                        <input type="text" value="<?php echo (isset($datos[0]->estado)?$datos[0]->estado:'' ) ?>" class="form-control obligatorio  " id="estado" name="estado">
                        <br>
                    </div>

                    

                    <div class="col-md-3">
                                Ubicacion                    </div>
                    <div class="col-md-3">
                        <input type="text" value="<?php echo (isset($datos[0]->ubicacion)?$datos[0]->ubicacion:'' ) ?>" class="form-control   " id="ubicacion" name="ubicacion">
                        <br>
                    </div>

                    

                    <div class="col-md-3">
                        *         Serial N°                    </div>
                    <div class="col-md-3">
                        <input type="text" value="<?php echo (isset($datos[0]->serial)?$datos[0]->serial:'' ) ?>" class="form-control obligatorio  " id="serial" name="serial">
                        <br>
                    </div>

                    

                    <div class="col-md-3">
                                Fabricante                    </div>
                    <div class="col-md-3">
                        <input type="text" value="<?php echo (isset($datos[0]->fabricante)?$datos[0]->fabricante:'' ) ?>" class="form-control   " id="fabricante" name="fabricante">
                        <br>
                    </div>

                    

                    <div class="col-md-3">
                                Fecha fabricación                    </div>
                    <div class="col-md-3">
                        <input type="text" value="<?php echo (isset($datos[0]->fecha_fabricacion)?$datos[0]->fecha_fabricacion:'' ) ?>" class="form-control   " id="fecha_fabricacion" name="fecha_fabricacion">
                        <br>
                    </div>

                    

                    <div class="col-md-3">
                        *         Tipo equipo                    </div>
                    <div class="col-md-3">
                        <input type="text" value="<?php echo (isset($datos[0]->tipo_equipo_cod)?$datos[0]->tipo_equipo_cod:'' ) ?>" class="form-control obligatorio  " id="tipo_equipo_cod" name="tipo_equipo_cod">
                        <br>
                    </div>

                    

                    <div class="col-md-3">
                                Imagen                    </div>
                    <div class="col-md-3">
                        <input type="text" value="<?php echo (isset($datos[0]->imagen)?$datos[0]->imagen:'' ) ?>" class="form-control   " id="imagen" name="imagen">
                        <br>
                    </div>

                    

                    <div class="col-md-3">
                                Responsable                    </div>
                    <div class="col-md-3">
                        <input type="text" value="<?php echo (isset($datos[0]->responsable)?$datos[0]->responsable:'' ) ?>" class="form-control   " id="responsable" name="responsable">
                        <br>
                    </div>

                    

                    <div class="col-md-3">
                                Observaciones                    </div>
                    <div class="col-md-3">
                        <input type="text" value="<?php echo (isset($datos[0]->observaciones)?$datos[0]->observaciones:'' ) ?>" class="form-control   " id="observaciones" name="observaciones">
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
                <a href="<?php echo base_url('index.php')."/Equipos/consult_equipos" ?>" class="btn btn-success">Listado </a>
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
