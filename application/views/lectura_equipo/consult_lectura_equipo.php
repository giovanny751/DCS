<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i> Lectura Equipo    </h5>
</div>
<div class='well'>
    <form action="<?php echo base_url('index.php/') . '/Lectura_equipo/consult_lectura_equipo'; ?>" method="post" >
        <div class="row">
            <div class="col-md-3">
                <label for="id_paciente">
                    paciente                        </label>
            </div>
            <div class="col-md-3">

                <?php echo lista("id_paciente", "id_paciente", "form-control obligatorio", "pacientes", "id_paciente", "nombres", (isset($datos[0]->id_paciente) ? $datos[0]->id_paciente : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                    <br>
            </div>

            <div class="col-md-3">
                <label for="variable_codigo">
                    Variable                        </label>
            </div>
            <div class="col-md-3">

                <?php echo lista("variable_codigo", "variable_codigo", "form-control obligatorio", "variables", "variable_codigo", "hl7tag", (isset($datos[0]->variable_codigo) ? $datos[0]->variable_codigo : ''), array("ACTIVO" => "S"), /* readOnly? */ false); ?>                    <br>
            </div>

            <div class="col-md-3">
                <label for="lectura_numerica">
                    Lectura Numerica                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['lectura_numerica']) ? $post['lectura_numerica'] : '' ) ?>" class="form-control obligatorio  number" id="lectura_numerica" name="lectura_numerica">
                <br>
            </div>

            <div class="col-md-3">
                <label for="lectura_texto">
                    Lectura Texto                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['lectura_texto']) ? $post['lectura_texto'] : '' ) ?>" class="form-control obligatorio  " id="lectura_texto" name="lectura_texto">
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
                <th>paciente</th>
                <th>Variable</th>
                <th>Lectura Numerica</th>
                <th>Lectura Texto</th>
                <th>Acción</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($datos as $key => $value) {
                        echo "<tr>";
                        $i = 0;

                        foreach ($value as $key2 => $value2) {
                            echo "<td>" . $value->$key2 . "</td>";
                            if ($i == 0) {
                                $campo = $key2;
                                $valor = "'" . $value->$key2 . "'";
                            }
                            $i++;
                        }
                        echo "<td>"
                        . '<a href="javascript:" class="btn btn-success" onclick="editar(' . $valor . ')"><i class="fa fa-pencil"></i></a>'
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
        <a href="<?php echo base_url() . "/index.php/Lectura_equipo/index" ?>" class="btn btn-success" >Nuevo</a>
    </div>
</div>
<?php if (isset($campo)) { ?>
    <form action="<?php echo base_url('index.php/') . "/Lectura_equipo/edit_lectura_equipo"; ?>" method="post" id="editar">
        <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
        <input type="hidden" name="campo" value="<?php echo $campo ?>">
    </form>
    <form action="<?php echo base_url('index.php/') . "/Lectura_equipo/delete_lectura_equipo"; ?>" method="post" id="delete">
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
