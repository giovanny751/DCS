<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Pacientes    </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php/') . '/Pacientes/consult_pacientes'; ?>" method="post" >
        <div class="row">


            <div class="col-md-3">
                <label for="cedula_paciente">
                    Cédula paciente                        </label>
            </div>
            <div class="col-md-3">

                <script>
                    $('document').ready(function() {
                        $('#cedula_paciente').autocomplete({
                            source: "<?php echo base_url("index.php//Pacientes/autocomplete_cedula_paciente") ?>",
                            minLength: 3
                        });
                    });
                </script>
                <input type="text" value="<?php echo (isset($post['cedula_paciente']) ? $post['cedula_paciente'] : '' ) ?>" class="form-control obligatorio  number" id="cedula_paciente" name="cedula_paciente">
                <br>
            </div>

            <div class="col-md-3">
                <label for="nombres">
                    Nombres                        </label>
            </div>
            <div class="col-md-3">

                <script>
                    $('document').ready(function() {
                        $('#nombres').autocomplete({
                            source: "<?php echo base_url("index.php//Pacientes/autocomplete_nombres") ?>",
                            minLength: 3
                        });
                    });
                </script>
                <input type="text" value="<?php echo (isset($post['nombres']) ? $post['nombres'] : '' ) ?>" class="form-control obligatorio  " id="nombres" name="nombres">
                <br>
            </div>

            <div class="col-md-3">
                <label for="apellidos">
                    Apellidos                        </label>
            </div>
            <div class="col-md-3">

                <script>
                    $('document').ready(function() {
                        $('#apellidos').autocomplete({
                            source: "<?php echo base_url("index.php//Pacientes/autocomplete_apellidos") ?>",
                            minLength: 3
                        });
                    });
                </script>
                <input type="text" value="<?php echo (isset($post['apellidos']) ? $post['apellidos'] : '' ) ?>" class="form-control obligatorio  " id="apellidos" name="apellidos">
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
                <th style="display: none"></th>
                <th>Cédula paciente</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Fecha Afiliación</th>
                <th>Dirección</th>
                <th>Barrio</th>
                <th>Ciudad</th>
                <th>Fecha Nacimiento</th>
                <th>Acción</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($datos as $key => $value) {
                        echo "<tr>";
                        $i = 0;

                        foreach ($value as $key2 => $value2) {
                            
                            if ($i == 0) {
                                $campo = $key2;
                                $valor = "'" . $value->$key2 . "'";
                                echo "<td style='display: none'>" . $value->$key2 . "</td>";
                            }else{
                                echo "<td>" . $value->$key2 . "</td>";
                            }
                            $i++;
                        }
                        echo "<td>"
                        . '<a href="javascript:" class="btn btn-dcs" onclick="editar(' . $valor . ')"><i class="fa fa-pencil"></i></a>'
                        . '<a href="javascript:" class="btn btn-danger" onclick="delete_(' . $valor . ')"><i class="fa fa-trash-o"></i></a>'
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
        <a href="<?php echo base_url() . "/index.php/Pacientes/index" ?>" class="btn btn-dcs" >Nuevo</a>
    </div>
</div>
<?php if (isset($campo)) { ?>
    <form action="<?php echo base_url('index.php/') . "/Pacientes/edit_pacientes"; ?>" method="post" id="editar">
        <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
        <input type="hidden" name="campo" value="<?php echo $campo ?>">
    </form>
    <form action="<?php echo base_url('index.php/') . "/Pacientes/delete_pacientes"; ?>" method="post" id="delete">
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
        var r = confirm('Confirma que desea eliminar el registro');
        if (r == false) {
            return false;
        }
        $('#<?php echo $campo ?>3').val(num);
        $('#delete').submit();
    }

    $('body').delegate('.number', 'keypress', function(tecla) {
        if (tecla.charCode > 0 && tecla.charCode < 48 || tecla.charCode > 57)
            return false;
    });
    $('.fecha').datepicker({
        rtl: Metronic.isRTL(),
        autoclose: true
    });
</script>
