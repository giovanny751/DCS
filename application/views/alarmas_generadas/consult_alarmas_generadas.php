<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Alarmas Generadas    </h5>
</div>
<div class='well'>
<form action="<?php echo base_url('index.php/').'/Alarmas_generadas/consult_alarmas_generadas'; ?>" method="post" >
    <div class="row">
                    <div class="col-md-3">
                    <label for="id_alarmas_generadas">
                                            </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="hidden" value="<?php echo (isset($post['id_alarmas_generadas'])?$post['id_alarmas_generadas']:'' ) ?>" class="form-control   " id="id_alarmas_generadas" name="id_alarmas_generadas">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="id_niveles_alarma">
                    Niveles alarma                        </label>
                </div>
                <div class="col-md-3">
                    
                    <?php echo lista("id_niveles_alarma", "id_niveles_alarma", "form-control obligatorio", "niveles_alarma", "id_niveles_alarma", "descripcion", (isset($datos[0]->id_niveles_alarma)?$datos[0]->id_niveles_alarma:'' ), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                    <br>
                </div>

                            <div class="col-md-3">
                    <label for="descripcion">
                    Descripción                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['descripcion'])?$post['descripcion']:'' ) ?>" class="form-control obligatorio  " id="descripcion" name="descripcion">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="id_lectura_equipo">
                    Lectura equipo                        </label>
                </div>
                <div class="col-md-3">
                    
                    <?php echo lista("id_lectura_equipo", "id_lectura_equipo", "form-control obligatorio", "lectura_equipo", "id_lectura_equipo", "id_paciente", (isset($datos[0]->id_lectura_equipo)?$datos[0]->id_lectura_equipo:'' ), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                    <br>
                </div>

                            <div class="col-md-3">
                    <label for="analisis_resultado">
                    Analisis resultado                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['analisis_resultado'])?$post['analisis_resultado']:'' ) ?>" class="form-control obligatorio  " id="analisis_resultado" name="analisis_resultado">
                                            <br>
                </div>

                </div>
    <button class="btn btn-success">Consultar</button>
</form>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                                    <th></th>
                                    <th>Niveles alarma</th>
                                    <th>Descripción</th>
                                    <th>Lectura equipo</th>
                                    <th>Analisis resultado</th>
                            <th>Acción</th>
            </thead>
            <tbody>
                <?php
                foreach ($datos as $key => $value) {
                echo "<tr>";
                    $i=0;

                    foreach ($value as $key2 => $value2) {
                    echo "<td>".$value->$key2."</td>";
                    if($i==0){
                    $campo=$key2;
                    $valor="'".$value->$key2."'";
                    }
                    $i++;
                    }
                    echo "<td>"
                        . '<a href="javascript:" class="btn btn-success" onclick="editar('.$valor.')"><i class="fa fa-pencil"></i></a>'
                        . '<a href="javascript:" class="btn btn-danger" onclick="delete_('.$valor.')"><i class="fa fa-trash-o"></i></a>'
                        . "</td>";
                    echo "</tr>";
                }
                ?>

            </tbody>
        </table>
    </div>
</div>
</div>
<div class="row">
    <div class="col-md-12" style="float:right">
        <a href="<?php echo base_url()."/index.php/Alarmas_generadas/index" ?>" class="btn btn-success" >Nuevo</a>
    </div>
</div>
<?php  if(isset($campo)){ ?>
<form action="<?php echo base_url('index.php/')."/Alarmas_generadas/edit_alarmas_generadas"; ?>" method="post" id="editar">
    <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
    <input type="hidden" name="campo" value="<?php echo $campo ?>">
</form>
<form action="<?php echo base_url('index.php/')."/Alarmas_generadas/delete_alarmas_generadas"; ?>" method="post" id="delete">
    <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>3">
    <input type="hidden" name="campo" value="<?php echo $campo ?>">
</form>
<?php } ?>
<script>
    function editar(num) {
        $('#<?php echo $campo ?>2').val(num);
        $('#editar').submit();
    }
    function delete_(num) {
        var r=confirm('Confirma que desea eliminar el registro');
        if(r==false){
            return false;
        }
        $('#<?php echo $campo ?>3').val(num);
        $('#delete').submit();
    }

    $('body').delegate('.number', 'keypress', function (tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });
    $('.fecha').datepicker({
        rtl: Metronic.isRTL(),
        autoclose: true
    });
</script>
