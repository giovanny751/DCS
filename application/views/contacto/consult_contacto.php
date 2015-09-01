<div class="widgetTitle" >
    <h5>
        <i class="glyphicon glyphicon-ok"></i>Contactos
    </h5>
</div>
<div class='well'>

<form action="<?php echo base_url('index.php/') . '/Contacto/consult_contacto'; ?>" method="post" >
        <div class="row">                <div class="col-md-3">
                <label for="contacto_id">
                </label>
            </div>
            <div class="col-md-3">

                <input type="hidden" value="<?php echo (isset($post['contacto_id']) ? $post['contacto_id'] : '' ) ?>" class="form-control   " id="contacto_id" name="contacto_id">
                <br>
            </div>

        </div><div class="row">                <div class="col-md-3">
                <label for="documento">
                    Cédula o NIT                        </label>
            </div>
            <div class="col-md-3">

                <input type="text" value="<?php echo (isset($post['documento']) ? $post['documento'] : '' ) ?>" class="form-control obligatorio  " id="documento" name="documento">
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
                            source: "<?php echo base_url("index.php//Contacto/autocomplete_nombre") ?>",
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
                <label for="cuidador">
                    Cuidador                        </label>
            </div>
            <div class="col-md-3">
                <input type="checkbox" value="SI" class="form-control   " id="cuidador" name="cuidador">
                <br>
            </div>

        </div>
        <button class="btn btn-success">Consultar</button>
</form>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
            <th style='display: none'></th>
            <th>Cédula o NIT</th>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Dirección</th>
            <th>Telefono_fijo</th>
            <th>Celular</th>
            <th>Email</th>
            <th>Parentesco</th>
            <th>Tiene o no llaves de la casa</th>
            <th>Cuidador</th>
            <th>Acción</th>
            </thead>
            <tbody>
                <?php
                foreach ($datos as $key => $value) {
                    echo "<tr>";
                    $i = 0;
                    foreach ($value as $key2 => $value2) {
                        if ($i == 0) {
                            echo "<td style='display: none'>" . $value->$key2 . "</td>";
                        } else {
                            echo "<td>" . $value->$key2 . "</td>";
                        }

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
        <a href="<?php echo base_url() . "/index.php/Contacto/index" ?>" class="btn btn-success" >Nuevo</a>
    </div>
</div>
<?php if (isset($campo)) { ?>
    <form action="<?php echo base_url('index.php/') . "/Contacto/edit_contacto"; ?>" method="post" id="editar">
        <input type="hidden" name="<?php echo $campo ?>" id="<?php echo $campo ?>2">
        <input type="hidden" name="campo" value="<?php echo $campo ?>">
    </form>
    <form action="<?php echo base_url('index.php/') . "/Contacto/delete_contacto"; ?>" method="post" id="delete">
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
