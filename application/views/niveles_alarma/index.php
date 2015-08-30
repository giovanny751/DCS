
<h1>Niveles alarmas</h1>
<form action="<?php echo base_url('index.php/')."/Niveles_alarma/save_niveles_alarma"; ?>" method="post" onsubmit="return campos()">
    <div>
        <div class="row">

                    <div class="col-md-3">
                        <label for="id_niveles_alarma">
                                                            </label>
                    </div>
                    <div class="col-md-3">
                                                <input type="hidden" value="<?php echo (isset($datos[0]->id_niveles_alarma)?$datos[0]->id_niveles_alarma:'' ) ?>" class="form-control   " id="id_niveles_alarma" name="id_niveles_alarma">
                                                <br>
                    </div>

                    </div><div class="row">

                    <div class="col-md-3">
                        <label for="descripcion">
                        *         Descripción                            </label>
                    </div>
                    <div class="col-md-3">
                                                <input type="text" value="<?php echo (isset($datos[0]->descripcion)?$datos[0]->descripcion:'' ) ?>" class="form-control obligatorio  " id="descripcion" name="descripcion">
                                                <br>
                    </div>

                    </div><div class="row">

                    <div class="col-md-3">
                        <label for="examen_cod">
                                Examen                            </label>
                    </div>
                    <div class="col-md-3">
                                                <input type="text" value="<?php echo (isset($datos[0]->examen_cod)?$datos[0]->examen_cod:'' ) ?>" class="form-control   " id="examen_cod" name="examen_cod">
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="analisis_resultado">
                                Analisis resultado                            </label>
                    </div>
                    <div class="col-md-3">
                                                <input type="text" value="<?php echo (isset($datos[0]->analisis_resultado)?$datos[0]->analisis_resultado:'' ) ?>" class="form-control   " id="analisis_resultado" name="analisis_resultado">
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="n_repeticiones_minimas">
                        *         N° repeticiones mínimas                            </label>
                    </div>
                    <div class="col-md-3">
                                                <input type="text" value="<?php echo (isset($datos[0]->n_repeticiones_minimas)?$datos[0]->n_repeticiones_minimas:'' ) ?>" class="form-control obligatorio  number" id="n_repeticiones_minimas" name="n_repeticiones_minimas">
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="n_repeticiones_maximas">
                        *         N° repeticiones máximas                            </label>
                    </div>
                    <div class="col-md-3">
                                                <input type="text" value="<?php echo (isset($datos[0]->n_repeticiones_maximas)?$datos[0]->n_repeticiones_maximas:'' ) ?>" class="form-control obligatorio  number" id="n_repeticiones_maximas" name="n_repeticiones_maximas">
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="tiempo">
                        *         Tiempo                            </label>
                    </div>
                    <div class="col-md-3">
                                                <input type="text" value="<?php echo (isset($datos[0]->tiempo)?$datos[0]->tiempo:'' ) ?>" class="form-control obligatorio  number" id="tiempo" name="tiempo">
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="frecuencia">
                        *         Frecuencia                            </label>
                    </div>
                    <div class="col-md-3">
                                                <input type="text" value="<?php echo (isset($datos[0]->frecuencia)?$datos[0]->frecuencia:'' ) ?>" class="form-control obligatorio  " id="frecuencia" name="frecuencia">
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="color">
                        *         Color                            </label>
                    </div>
                    <div class="col-md-3">
                                                <input type="text" value="<?php echo (isset($datos[0]->color)?$datos[0]->color:'' ) ?>" class="form-control obligatorio  " id="color" name="color">
                                                <br>
                    </div>

                    

                    <div class="col-md-3">
                        <label for="id_protocolo">
                        *         protocolo                            </label>
                    </div>
                    <div class="col-md-3">
                                                <input type="text" value="<?php echo (isset($datos[0]->id_protocolo)?$datos[0]->id_protocolo:'' ) ?>" class="form-control obligatorio  " id="id_protocolo" name="id_protocolo">
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
                <a href="<?php echo base_url('index.php')."/Niveles_alarma/consult_niveles_alarma" ?>" class="btn btn-success">Listado </a>
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
