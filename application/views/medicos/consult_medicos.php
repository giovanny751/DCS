<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i>Medicos
    </h5>
</div>
<div class='well'>
<form action="<?php echo base_url('index.php/') . '/Medicos/consult_medicos'; ?>" method="post" >
        <div class="row">                <div class="col-md-3">
                <label for="medico_codigo">
                    Codigo
                </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['medico_codigo']) ? $post['medico_codigo'] : '' ) ?>" class="form-control   " id="medico_codigo" name="medico_codigo">
                <br>
            </div>

                      <div class="col-md-3">
                <label for="nombre">
                    Nombre                        </label>
            </div>
            <div class="col-md-3">

                <script>
                    $('document').ready(function() {
                        $('#nombre').autocomplete({
                            source: "<?php echo base_url("index.php//Medicos/autocomplete_nombre") ?>",
                            minLength: 3
                        });
                    });
                    $('document').ready(function() {
                        $('#matricula_profesional').autocomplete({
                            source: "<?php echo base_url("index.php//Medicos/autocomplete_matricula_profesional") ?>",
                            minLength: 3
                        });
                    });
                </script>
                <input type="text" value="<?php echo (isset($post['nombre']) ? $post['nombre'] : '' ) ?>" class="form-control obligatorio  " id="nombre" name="nombre">
                <br>
            </div>

        </div><div class="row">                <div class="col-md-3">
                <label for="Estado">
                    Estado                        </label>
            </div>
            <div class="col-md-3">

                <select  class="form-control obligatorio  " id="Estado" name="Estado">
                    <option value=""></option>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
                <br>
            </div>

            <div class="col-md-3">
                <label for="matricula_profesional">
                    Matrícula profesional                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['matricula_profesional']) ? $post['matricula_profesional'] : '' ) ?>" class="form-control obligatorio  " id="matricula_profesional" name="matricula_profesional">
                <br>
            </div>

        </div>
        <button type="button" class="btn btn-danger limpiar">Limpiar</button>
        <button class="btn btn-success">Consultar</button>
</form>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
            <th>Código</th>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Matricula profesional</th>
            <th>Dirección</th>
            <th>Teléfono fijo</th>
            <th>Celular</th>
            <th>Email</th>
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
<div class="row">
    <div class="col-md-12" style="float:right">
        <a href="<?php echo base_url() . "/index.php/Medicos/index" ?>" class="btn btn-success" >Nuevo</a>
    </div>
</div>
<?php if (isset($campo)) { ?>
    <form action="<?php echo base_url('index.php/') . "/Medicos/edit_medicos"; ?>" method="post" id="editar">
        <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
        <input type="hidden" name="campo" value="<?php echo $campo ?>">
    </form>
    <form action="<?php echo base_url('index.php/') . "/Medicos/delete_medicos"; ?>" method="post" id="delete">
        <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>3">
        <input type="hidden" name="campo" value="<?php echo $campo ?>">
    </form>
<?php } ?>
</div>
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
