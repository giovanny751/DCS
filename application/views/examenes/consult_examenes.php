<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Exámenes    </h5>
</div>
<div class='well'>
<form action="<?php echo base_url('index.php/').'/Examenes/consult_examenes'; ?>" method="post" >
    <div class="row">
                    <div class="col-md-3">
                    <label for="examen_cod">
                    Código                        </label>
                </div>
                <div class="col-md-3">
                    
                                            <input type="hidtextden" value="<?php echo (isset($post['examen_cod'])?$post['examen_cod']:'' ) ?>" class="form-control   " id="examen_cod" name="examen_cod">
                                            <br>
                </div>

                            <div class="col-md-3">
                    <label for="examen_nombre">
                    Nombre                        </label>
                </div>
                <div class="col-md-3">
                    
                                        <script>
                        $('document').ready(function() {
                            $('#examen_nombre').autocomplete({
                                source: "<?php echo base_url("index.php//Examenes/autocomplete_examen_nombre") ?>",
                                minLength: 3
                            });
                        });
                    </script>
                                            <input type="text" value="<?php echo (isset($post['examen_nombre'])?$post['examen_nombre']:'' ) ?>" class="form-control obligatorio  " id="examen_nombre" name="examen_nombre">
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
    <button type="button" class="btn btn-dcs">Limpiar</button>
    <button class="btn btn-dcs">Consultar</button>
</form>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                                    <th>Código</th>
                                    <th>Nombre</th>
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
        <a href="<?php echo base_url()."/index.php/Examenes/index" ?>" class="btn btn-dcs" >Nuevo</a>
    </div>
</div>
<?php  if(isset($campo)){ ?>
<form action="<?php echo base_url('index.php/')."/Examenes/edit_examenes"; ?>" method="post" id="editar">
    <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
    <input type="hidden" name="campo" value="<?php echo $campo ?>">
</form>
<form action="<?php echo base_url('index.php/')."/Examenes/delete_examenes"; ?>" method="post" id="delete">
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
