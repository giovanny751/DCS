<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Tipos de Equipos    </h5>
</div>
<div class='well'>
<form action="<?php echo base_url('index.php/').'/Tipo_equipo/consult_tipo_equipo'; ?>" method="post" >
    <div class="row">
                    <div class="col-md-3">
                    <label for="tipo_equipo_cod">
                        Código
                                            </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="text" value="<?php echo (isset($post['tipo_equipo_cod'])?$post['tipo_equipo_cod']:'' ) ?>" class="form-control   " id="tipo_equipo_cod" name="tipo_equipo_cod">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="referencia">
                    Referencia                        </label>
                </div>
                <div class="col-md-3">
                    
                                        <script>
                        $('document').ready(function() {
                            $('#referencia').autocomplete({
                                source: "<?php echo base_url("index.php//Tipo_equipo/autocomplete_referencia") ?>",
                                minLength: 3
                            });
                        });
                    </script>
                                            <input type="text" value="<?php echo (isset($post['referencia'])?$post['referencia']:'' ) ?>" class="form-control obligatorio  " id="referencia" name="referencia">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="estado">
                    Estado                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <select  class="form-control obligatorio  " id="estado" name="estado">
                            <option value=""></option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                                                    <br>
                </div>

                </div>
    <button type="button" class="btn btn-dcs limpiar">Limpiar</button>
    <button class="btn btn-dcs">Consultar</button>
</form>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                                    <th></th>
                                    <th>Referencia</th>
                                    <th>Estado</th>
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
                        . '<a href="javascript:" class="btn btn-dcs" onclick="editar('.$valor.')"><i class="fa fa-pencil"></i></a>'
                        . '<a href="javascript:" class="btn btn-dcs" onclick="delete_('.$valor.')"><i class="fa fa-trash-o"></i></a>'
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
        <a href="<?php echo base_url()."/index.php/Tipo_equipo/index" ?>" class="btn btn-dcs" >Nuevo</a>
    </div>
</div>
<?php  if(isset($campo)){ ?>
<form action="<?php echo base_url('index.php/')."/Tipo_equipo/edit_tipo_equipo"; ?>" method="post" id="editar">
    <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
    <input type="hidden" name="campo" value="<?php echo $campo ?>">
</form>
<form action="<?php echo base_url('index.php/')."/Tipo_equipo/delete_tipo_equipo"; ?>" method="post" id="delete">
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
