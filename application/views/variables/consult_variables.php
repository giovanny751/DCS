<h1>Variables</h1>
<form action="<?php echo base_url('index.php/') . '/Variables/consult_variables'; ?>" method="post" >
    <div>
        <div class="row">                <div class="col-md-3">
            </div>
            <div class="col-md-3">
                <input type="hidden" value="<?php echo (isset($post['variable_codigo']) ? $post['variable_codigo'] : '' ) ?>" class="form-control   " id="variable_codigo" name="variable_codigo">
                <br>
            </div>

        </div>
        <div class="row">                <div class="col-md-3">
                HL7TAG                </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($post['hl7tag']) ? $post['hl7tag'] : '' ) ?>" class="form-control obligatorio  " id="hl7tag" name="hl7tag">
                <br>
            </div>

            <div class="col-md-3">
                Descripción                </div>
            <div class="col-md-3">
                <input type="text" value="<?php echo (isset($post['descripcion']) ? $post['descripcion'] : '' ) ?>" class="form-control obligatorio  " id="descripcion" name="descripcion">
                <br>
            </div>

            <div class="col-md-3">
                Examen                </div>
            <div class="col-md-3">
                <?php echo lista("examen_cod", "examen_cod", "form-control obligatorio", "examenes", "examen_cod", "examen_nombre", null, array("ACTIVO" => "S"), /* readOnly? */ false); ?>
                <br>
            </div>

        </div>
        <button class="btn btn-success">Consultar</button>
    </div>
</form>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
            <th></th>
            <th>HL7TAG</th>
            <th>Descripción</th>
            <th>Examen</th>
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
        <a href="<?php echo base_url() . "/index.php/Variables/index" ?>" class="btn btn-success" >Nuevo</a>
    </div>
</div>
<?php if (isset($campo)) { ?>
    <form action="<?php echo base_url('index.php/') . "/Variables/edit_variables"; ?>" method="post" id="editar">
        <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
        <input type="hidden" name="campo" value="<?php echo $campo ?>">
    </form>
    <form action="<?php echo base_url('index.php/') . "/Variables/delete_variables"; ?>" method="post" id="delete">
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
                    var r = confirm('Confirma que desea eliminar el registro');         if (r == false) {
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
